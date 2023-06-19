<div id="player"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script>
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      videoId: '1BfCnjr_Vjg',
    });
  }
</script>

<button id="pause-play-button">Pause/Play</button>
<script>
    var pausePlayButton = document.getElementById('pause-play-button');
    pausePlayButton.addEventListener('click', function() {
    var newState = player.getPlayerState() == YT.PlayerState.PLAYING ? 'paused' : 'playing';
    $.ajax({
        url: 'update_state.php',
        method: 'POST',
        data: { state: newState },
        success: function(data) {
        if (data === 'playing') {
            player.playVideo();
        } else {
            player.pauseVideo();
        }
        }
    });
    });
</script>
