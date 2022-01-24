<?php


namespace App\Http\Helpers;


use App\Models\Role;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Helper
{
    static function assignRoleCache()
    {
        $model = new Role();
        $roles = $model->where('status', 1)->get();
        if (count($roles) > 0) {
            foreach ($roles as $role) {
                $roles_id = $role->id;
                $all_group = UserPermission::where('roles_id', $roles_id)
                    ->leftJoin('modules as modules', 'user_permissions.modules_id', '=', 'modules.id')
                    ->leftJoin('modules as group', 'modules.group_id', '=', 'group.id')
                    ->where('modules.status', 1)
                    ->select('user_permissions.add', 'user_permissions.view', 'user_permissions.update', 'user_permissions.delete', 'modules.name', 'modules.prefix', 'modules.after_prefix', 'modules.type', 'modules.group_id', 'modules.icon', 'group.name as group_name', 'modules.is_visible')->orderBy('modules.sort_id', 'ASC')->get()->toArray();

                $collect = collect($all_group);
                $group_menu = $collect->where('group_name', '!=', null)->groupBy('group_name')->toArray();
                $single_menu = $collect->where('group_name', null)->toArray();

                $menus = [];
                $access = [];
                foreach ($single_menu as $key => $permission) {
                    $menus[$key]['name'] = $permission['name'];
                    $menus[$key]['prefix'] = $permission['prefix'];
                    $menus[$key]['after_prefix'] = $permission['after_prefix'];
                    $menus[$key]['child'] = [];
                    $menus[$key]['icon'] = $permission['icon'];
                    $menus[$key]['is_visible'] = $permission['is_visible'];

                    $access[$permission['prefix']] = [
                        'add' => $permission['add'],
                        'view' => $permission['view'],
                        'update' => $permission['update'],
                        'delete' => $permission['delete'],
                    ];
                }
                foreach ($group_menu as $group_name => $grp_menu) {
                    if (is_array($grp_menu) && count($grp_menu) > 0) {
                        $menus[]['child'] = [
                            'group' => $group_name,
                            'menu' => $grp_menu
                        ];
                        foreach ($grp_menu as $grp_key => $permission) {
                            $access[$permission['prefix']] = [
                                'add' => $permission['add'],
                                'view' => $permission['view'],
                                'update' => $permission['update'],
                                'delete' => $permission['delete'],
                            ];
                        }
                    }
                }
                // dd($menus);
                Cache::forget('menus_' . $roles_id);
                Cache::forget('access_' . $roles_id);

                Cache::rememberForever('menus_' . $roles_id, function () use ($menus) {
                    return $menus;
                });
                Cache::rememberForever('access_' . $roles_id, function () use ($access) {
                    return $access;
                });
            }
        }
    }

}