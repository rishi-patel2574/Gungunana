<footer class="footer">
  <div class="container-fluid py-3 d-flex align-items-center justify-content-between">
    
    <!-- Left: Song Info -->
    <div class="song-info d-flex align-items-center">
      <div class="song-img me-1">
        <img id= "myImage" src="admin/<?php echo $sub[5]; ?>" class="img-profile">
      </div>
      <div>
        <h4 id="songTitle" class="mb-0"><strong><?php echo $sub[1]; ?></strong></h4>
        <small id="artistName" class="text-muted"><?php echo $sub[2]; ?></small>
      </div>
    </div>

    <!-- Center: Player Controls -->
    <div class="player-controls d-flex flex-column align-items-center">
      <div class="d-flex justify-content-center">
        <button id="prevBtn" class="btn btn-control" onclick="previous()"><img src="img/previous.png" class="btn-song"></button>
        <button id="playPauseBtn" class="btn btn-control mx-2"><img src="img/play.png" class="btn-song"></button>
        <button id="nextBtn" class="btn btn-control" onclick="next()"><img src="img/next.png" class="btn-song"></button>
      </div>
      <!-- Time Display & Progress Bar -->
      <div class="d-flex align-items-center w-100">
      <?php
        if($_SESSION['sub'] == "YES") 
        {
      ?>
        <span id="currentTime" class="me-2">0:00</span>
        <input type="range" id="seekBar" value="0" min="0" step="1" class="seek-bar flex-grow-1">
        <span id="totalTime" class="ms-2">0:00</span>
      <?php
        }
      ?>
      </div>
    </div>

    <!-- Right: Volume Control -->
    <div class="volume-control d-flex align-items-center">
      <img src="img/volume.png" class="btn-song me-2" alt="Volume">
      <input type="range" id="volumeBar" value="100" min="0" max="100" step="1" class="volume-bar">
    </div>
  </div>

  <audio id="audioPlayer" class="audio-player">
    <source src="admin/<?php echo $sub[4]; ?>" type="audio/mpeg">
    Your browser does not support the audio tag.
  </audio>
</footer>

<script>
    const audio = document.getElementById("audioPlayer");
    const playPauseBtn = document.getElementById("playPauseBtn");
    const seekBar = document.getElementById("seekBar");
    const currentTimeDisplay = document.getElementById("currentTime");
    const totalTimeDisplay = document.getElementById("totalTime");
    const volumeBar = document.getElementById("volumeBar");

    // Format time helper function
    function formatTime(seconds) {
        let min = Math.floor(seconds / 60);
        let sec = Math.floor(seconds % 60);
        return `${min}:${sec < 10 ? '0' : ''}${sec}`;
    }

    // Update total duration when metadata loads
    audio.onloadedmetadata = function () {
        seekBar.max = audio.duration;
        totalTimeDisplay.textContent = formatTime(audio.duration);
    };

    // Play/Pause functionality
    playPauseBtn.addEventListener("click", function () {
        if (audio.paused) {
            audio.play();
            playPauseBtn.innerHTML = '<img src="img/pause.png" class="btn-song">';
        } else {
            audio.pause();
            playPauseBtn.innerHTML = '<img src="img/play.png" class="btn-song">';
        }
    });

    // Update seek bar & current time display as song plays
    audio.addEventListener("timeupdate", function () {
        seekBar.value = audio.currentTime;
        currentTimeDisplay.textContent = formatTime(audio.currentTime);
    });

    // Seek when user interacts with the seek bar
    seekBar.addEventListener("input", function () {
        audio.currentTime = seekBar.value;
    });

    // Volume control
    volumeBar.addEventListener("input", function () {
        audio.volume = volumeBar.value / 100;
    });
    
    //-----------------next()--------------------------
    <?php
      $sql10 = "SELECT * FROM s_details ORDER BY s_id";
      $result10 = mysqli_query($conn, $sql10);
    ?>

    var songList = [];
    var v1, v2, v3, v4, v5, v6;
    var count = false;

    <?php while ($r9 = mysqli_fetch_row($result10)) { ?>
        if(count == true)
        {
          count = false;
          v1 = <?php echo $r9[0]; ?>;
          v2 = "<?php echo $r9[1]; ?>";
          v3 = "<?php echo $r9[2]; ?>";
          v4 = "<?php echo $r9[3]; ?>";
          v5 = "<?php echo $r9[4]; ?>";
          v6 = "<?php echo $r9[5]; ?>";
        }
        songList.push(["<?php echo $r9[0]; ?>", "<?php echo $r9[1]; ?>", "<?php echo $r9[2]; ?>", "<?php echo $r9[3]; ?>", "<?php echo $r9[4]; ?>", "<?php echo $r9[5]; ?>"]);
        if(<?php echo $r9[0]; ?> == <?php echo $sub[0];?>)
        {
          count = true;
        }
    <?php } ?>

    console.log(songList);
    console.log(songList[0]);
    console.log(songList[0][1]);
    
    function next()
    {
      document.getElementById("myImage").src = "admin/" + v6;
      document.getElementById("audioPlayer").src = "admin/" + v5;
      document.getElementById("audioPlayer").load();
      document.getElementById("audioPlayer").play();
      document.getElementById("songTitle").innerHTML = `<strong>${v2}</strong>`;
      document.getElementById("artistName").innerHTML = v3;
      var co = false;
      for (let i = 0; i < songList.length; i++) 
      {
        if(co == true)
        {
          v1 = songList[i][0]; 
          v2 = songList[i][1]; 
          v3 = songList[i][2]; 
          v4 = songList[i][3]; 
          v5 = songList[i][4]; 
          v6 = songList[i][5];
          co = false;
        }   
        else if(v1 == songList[i][0])
        {
          co = true;
        }
      }
    }
    //---------------------------previous()-------------------------
    function previous() 
    {
      var co = false;
      for (let i = songList.length - 1; i >= 0; i--) 
      {
        if (co == true) 
        {
          v1 = songList[i][0]; 
          v2 = songList[i][1]; 
          v3 = songList[i][2]; 
          v4 = songList[i][3]; 
          v5 = songList[i][4]; 
          v6 = songList[i][5];
          co = false;
        }   
        else if (v1 == songList[i][0]) 
        {
          co = true;
        }
      }

      document.getElementById("myImage").src = "admin/" + v6;
      document.getElementById("audioPlayer").src = "admin/" + v5;
      document.getElementById("audioPlayer").load();
      document.getElementById("audioPlayer").play();
      document.getElementById("songTitle").innerHTML = `<strong>${v2}</strong>`;
      document.getElementById("artistName").innerHTML = v3;
    }

</script>