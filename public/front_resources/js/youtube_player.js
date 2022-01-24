var player;
function ActivePlayer(videoId, placeId) {
        player = new YT.Player(placeId, {
        width: '100%',
        height: 400,
        videoId: videoId,
        playerVars: {
            color: 'white',
            playlist: ''
        },
        events: {
            onReady: initialize,
        }
    });
}
function initialize(){
    updateTimerDisplay();
    updateProgressBar();
    time_update_interval = setInterval(function () {
        updateTimerDisplay();
        updateProgressBar();
    }, 1000);
    clearInterval(time_update_interval);
    //PlayVideo();

}
function updateTimerDisplay(){
    // Update current time text display.
    $('#current-time').text(formatTime( player.getCurrentTime() ));
    $('#duration').text(formatTime( player.getDuration() ));
}

function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
        seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}
$('#progress-bar').on('mouseup touchend', function (e) {
    var newTime = player.getDuration() * (e.target.value / 100);
    player.seekTo(newTime);
});
function updateProgressBar(){
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}
function pushYoutube(){
    player.pauseVideo();
}
$('#play').on('click', function () {
    player.playVideo();
});
function PlayVideo() {
    player.playVideo();
}
$('#pause').on('click', function () {
    player.pauseVideo();
    // var videoURL = $('#video_player').prop('src');
    // videoURL = videoURL.replace("&autoplay=1", "");
    // $('#video_player').prop('src','');
    // $('#video_player').prop('src',videoURL);
});
$('#mute-toggle').on('click', function() {
    var mute_toggle = $(this);

    if(player.isMuted()){
        player.unMute();
        mute_toggle.text('volume_up');
    }
    else{
        player.mute();
        mute_toggle.text('volume_off');
    }
});
$('#volume-input').on('change', function () {
    player.setVolume($(this).val());
});

function  CheckDataExist(value, array){
    let exist = true;
    if (array.length > 0){
        $.each(array, function (i, v) {
            if (v.category_name == value){
                exist = false;
            }
        });
    }

    return exist;
}