var YoutubeURL = '';
function VideoLink(data)
{
  YoutubeURL = data;
}
(function($) {
    "use strict";

    var tpj = jQuery;
    var revapi24;
	
	
  	//------ preloader js ------//
    jQuery(window).on('load', function() {
			setTimeout(function(){
			jQuery('.jb_preloader').addClass('loaded');
		}, 1000);

		});
	
	
	 //---- on ready function -----//
    jQuery(document).ready(function($) {
	
			
	
        // ===== Scroll to Top ==== //
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 100) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#return-to-top').on('click', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });
		
		
		
			//----- Main Slider Animation -----//

				(function($) {

            //Function to animate slider captions 
            function doAnimations(elems) {
                //Cache the animationend event in a variable
                var animEndEv = 'webkitAnimationEnd animationend';

                elems.each(function() {
                    var $this = $(this),
                        $animationType = $this.data('animation');
                    $this.addClass($animationType).one(animEndEv, function() {
                        $this.removeClass($animationType);
                    });
                });
            }

            //Variables on page load 
            var $myCarousel = $('#carousel-example-generic'),
                $firstAnimatingElems = $myCarousel.find('.carousel-item:first').find("[data-animation ^= 'animated']");

            //Initialize carousel 
            $myCarousel.carousel();

            //Animate captions in first slide on page load 
            doAnimations($firstAnimatingElems);

            //Pause carousel  
            $myCarousel.carousel('pause');


            //Other slides to be animated on carousel slide event 
            $myCarousel.on('click slide.bs.carousel', function(e) {
                var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                doAnimations($animatingElems);
            });


        })(jQuery);
		

			
			  	//*------ category job slider js -----*//
				$(document).ready(function() {
              $('.partner_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				 smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: true
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              });


            });
			
			// Magnific popup-video



// 	$('.test-popup-link').magnificPopup({
//     type: 'iframe',
//     iframe: {
//         markup: '<div class="mfp-iframe-scaler">'+
//             '<div class="mfp-close"></div>'+
//             '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
//             '<div class="mfp-title">Some caption</div>'+
//             '</div>',
//         patterns: {
//             youtube: {
//                 index: 'youtube.com/',
//                 id: 'v=',
//                 src: 'https://www.youtube.com/embed/ktT9MDmf4_Q'
//             }
//         }
//     }
//     // other options
// });



	//----------- upcoming events slider js -------------//
	
	$(document).ready(function() {
              $('.upcoming_event_slider .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  500: {
                    items: 1,
                    nav: true
                  },
                  700: {
                    items: 2,
                    nav: true
                  },
                  1000: {
                    items: 4,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
		
		
		//----------- about us slider js -------------//
	
	$(document).ready(function() {
              $('.about_us_slider_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  500: {
                    items: 1,
                    nav: true
                  },
                  700: {
                    items: 2,
                    nav: true
                  },
                  1000: {
                    items: 3,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
		
		
 //**----- portfolio wrapper js -------**//
 
    function protfolioIsotope(){
        if ( $('.protfolio_area, .portfolio_grid').length ){ 
            // Activate isotope in container
            $(".protfoli_inner, .portfoli_inner").imagesLoaded( function() {
                $(".protfoli_inner, .portfoli_inner").isotope({
                    layoutMode: 'masonry',  
                }); 
            });  
            
            // Add isotope click function 
            $(".protfoli_filter li").on('click',function(){
                $(".protfoli_filter li").removeClass("active");
                $(this).addClass("active"); 
                var selector = $(this).attr("data-filter");
                $(".protfoli_inner, .portfoli_inner").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 450,
                        easing: "linear",
                        queue: false,
                    }
                });
                return false;
            });  
        };
    }; 
 protfolioIsotope (); 
 
 
 
 //*------ zoom popup js code ------*//
  
			     $('.zoom_popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small></small>';
                }
            }
        });

			//----------- blog slider js -------------//
	
	$(document).ready(function() {
              $('.blog_slider_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  500: {
                    items: 1,
                    nav: true
                  },
                  700: {
                    items: 2,
                    nav: true
                  },
                  1000: {
                    items: 3,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
					
		 //----- counter js -----// 

			$('.counter_section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
				if (visible) {
					$(this).find('.timer').each(function () {
						var $this = $(this);
						$({ Counter: 0 }).animate({ Counter: $this.text() }, {
							duration: 2000,
							easing: 'swing',
							step: function () {
								$this.text(Math.ceil(this.Counter));
							}
						});
					});
					$(this).off('inview');
				}
			});
					
			
			//----------- partner slider js -------------//
	
	$(document).ready(function() {
              $('.partner_item_slider .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 2,
                    nav: true
                  },
                  500: {
                    items: 4,
                    nav: true
                  },
                  900: {
                    items: 5,
                    nav: true
                  },
                  1200: {
                    items: 6,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
							
			//----------- DJ night slider js -------------//
	
	$(document).ready(function() {
              $('.night_club_slider .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
				autoplay:true,
				smartSpeed: 1200,
                responsiveClass: true,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  500: {
                    items: 2,
                    nav: true
                  },
                  900: {
                    items: 4,
                    nav: true
                  },
                  1200: {
                    items: 5,
                    nav: true,
                    loop: true,
                    margin: 20
                  }
                }
              })
            })
			
			
			
			
		 $(document).ready(function() {
            $('.dm_testi_slider_main_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
				center: true,
                responsiveClass: true,
                smartSpeed: 1200,
				navText : ['<i class="flaticon-left-arrow"></i>','<i class="flaticon-right-arrow"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: true,
                        margin: 20
                    }
                }
            })
        })
		
			
				
	/* ------ hover images js ------ */
	function imgHover(){
		$(".tg-postlistitem > div").hover(function(){
			$(".tg-postlistitem > div").removeClass("tg-active");
			$(this).addClass("tg-active");
			$(this).parent().addClass("tg-hover");
		});
		$(".tg-postlistitem > div").mouseleave(function(){
			$(".tg-postlistitem > div").removeClass("tg-active");
			$(".tg-postlistitem > div").parent().removeClass("tg-hover");
		});
	}
	imgHover();
			
			
			
	/*--------------------------
 counterdown
---------------------------- */
	function e() {
	    var e = new Date;
	        e.setDate(e.getDate() + 3);
	    var dd = e.getDate();
	    var mm = e.getMonth() + 1;
	    var y = e.getFullYear();
	    var futureFormattedDate = mm + "/" + dd + "/" + y + ' 12:00:00';
	    return futureFormattedDate;
	}

/*--------------------------
 counter time active
---------------------------- */
	$('.count-list').downCount({
		date: e(),
	    offset: 16
	});
				
			
	//----- Contact Form Submition ------//
	function checkRequire(formId , targetResp){
		targetResp.html('');
		var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
		var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
		var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
		var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
		var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
		var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
		var check = 0;
		$('#er_msg').remove();
		var target = (typeof formId == 'object')? $(formId):$('#'+formId);
		target.find('input , textarea , select').each(function(){
			if($(this).hasClass('require')){
				if($(this).val().trim() == ''){
					check = 1;
					$(this).focus();
					targetResp.html('You missed out some fields.');
					$(this).addClass('error');
					return false;
				}else{
					$(this).removeClass('error');
				}
			}
			if($(this).val().trim() != ''){
				var valid = $(this).attr('data-valid');
				if(typeof valid != 'undefined'){
					if(!eval(valid).test($(this).val().trim())){
						$(this).addClass('error');
						$(this).focus();
						check = 1;
						targetResp.html($(this).attr('data-error'));
						return false;
					}else{
						$(this).removeClass('error');
					}
				}
			}
		});
		return check;
	}
	$(".submitForm").on("click", function() {
		var _this = $(this);
		var targetForm = _this.closest('form');
		var errroTarget = targetForm.find('.response');
		var check = checkRequire(targetForm , errroTarget);
		if(check == 0){
			var formDetail = new FormData(targetForm[0]);
			formDetail.append('form_type' , _this.attr('form-type'));
			$.ajax({
				method : 'post',
				url : 'ajax.php',
				data:formDetail,
				cache:false,
				contentType: false,
				processData: false
			}).done(function(resp){
				if(resp == 1){
					targetForm.find('input').val('');
					targetForm.find('textarea').val('');
					errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
				}else{
					errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
				}
			});
		}
	});


 });

})(jQuery);	