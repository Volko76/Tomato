

<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8;', 'root', ''); 
$url = "https://www.youtube.com/watch?v=7RCqpYQLm1M&ab_channel=TUTOUNITYFR";


$HU = $bdd->prepare('SELECT doWeNeedToPlay FROM doWeNeedToPlay;');
$HU->execute();
$dez = $HU->fetch();
echo $dez[0];
$dez[0] = !(bool)$dez[0];
$FE = $bdd->prepare("UPDATE doWeNeedToPlay SET doWeNeedToPlay = ?;");
$FE->execute(array(intval($dez[0])));

header("Cache-Control: max-age=1"); // don't cache ourself
?>





<!DOCTYPE html>
<html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/submit.js"></script>
  <body>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->

    <button type="submit" onclick="pausePlay()" id ="playPauseBtn">Pause/Play</button>
    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          playerVars: {
            'playsinline': 1
          },
          events: {
            'onReady': onPlayerReady
          }
        });
      }
     
      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }
      function pausePlay(event){
        if(<?php json_encode($vars); ?>){
            player.pauseVideo();
        }else{
            player.playVideo();
        }
        window.location.reload();
      }
    </script>
  </body>
</html>

    


