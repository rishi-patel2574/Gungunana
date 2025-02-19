<footer class="footer">
  <div class="container-fluid py-3 d-flex align-items-center justify-content-between">
    
    <!-- Left: Song Name -->
    <div class="song-info">
      <h4 class="mb-0">
        <img src="admin/<?php echo htmlspecialchars($sub[5]); ?>" class="img-profile">
        <strong id="songTitle">
          <?php echo htmlspecialchars($sub[1]); ?>
        </strong>
      </h4> 
    </div>

    <!-- Center: Player Controls -->
    <div class="player-controls d-flex flex-column align-items-center">
      <div class="d-flex justify-content-center">
        <button id="prevBtn" class="btn btn-control"><img src="img/previous.png" class="btn-song"></button>
        <button id="playPauseBtn" class="btn btn-control mx-2"><img src="img/play.png" class="btn-song"></button>
        <button id="nextBtn" class="btn btn-control"><img src="img/next.png" class="btn-song"></button>
      </div>
      <!-- Time Display & Progress Bar -->
      <div class="d-flex align-items-center w-100">
      <?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == "YES") { ?>
        <span id="currentTime" class="me-2">0:00</span>
        <input type="range" id="seekBar" value="0" min="0" step="1" class="seek-bar flex-grow-1">
        <span id="totalTime" class="ms-2">0:00</span>
      <?php } ?>
      </div>
    </div>

    <!-- Right: Artist Name -->
    <div class="artist-info">
      <h4 class="mb-0 text-end"><?php echo htmlspecialchars($sub[2]); ?></h4> 
    </div>

  </div>

  <audio id="audioPlayer" class="audio-player" autoplay>
    <source id="audioSource" src="admin/<?php echo htmlspecialchars($sub[4]); ?>" type="audio/mpeg">
    Your browser does not support the audio tag.
  </audio>
</footer>

<?php
$songsArray = [];
if (isset($_GET['like_id'])) {
    $like_id = intval($_GET['like_id']);
    $sql = "SELECT s_details.file_path, s_details.title FROM liked_song 
            JOIN s_details ON liked_song.s_id = s_details.s_id 
            WHERE liked_song.sn = $like_id 
            ORDER BY s_details.s_id ASC";
} elseif (isset($_GET['p_id']) && intval($_GET['p_id']) != 0) {
    $p_id = intval($_GET['p_id']);
    $sql = "SELECT s_details.file_path, s_details.title FROM playlist 
            JOIN s_details ON playlist.song_id = s_details.s_id 
            WHERE playlist.playlist_id = $p_id 
            ORDER BY s_details.s_id ASC";
} else {
    $sql = "SELECT file_path, title FROM s_details ORDER BY s_id ASC";
}

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $songsArray[] = [
        'file_path' => "admin/" . htmlspecialchars($row['file_path']),
        'title' => htmlspecialchars($row['title'])
    ];
}
?>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const audio = document.getElementById("audioPlayer");
    const playPauseBtn = document.getElementById("playPauseBtn");
    const seekBar = document.getElementById("seekBar");
    const currentTimeDisplay = document.getElementById("currentTime");
    const totalTimeDisplay = document.getElementById("totalTime");
    const songTitle = document.getElementById("songTitle");

    let currentIndex = 0;
    let songs = <?php echo json_encode($songsArray); ?>;

    if (songs.length > 0) {
        loadSong(currentIndex);
    }

    function loadSong(index) {
        audio.src = songs[index].file_path;
        songTitle.innerText = songs[index].title;
        audio.play();
    }

    function playNext() {
        currentIndex = (currentIndex + 1) % songs.length;
        loadSong(currentIndex);
    }

    function playPrev() {
        currentIndex = (currentIndex - 1 + songs.length) % songs.length;
        loadSong(currentIndex);
    }

    audio.onended = playNext;

    document.getElementById("nextBtn").addEventListener("click", playNext);
    document.getElementById("prevBtn").addEventListener("click", playPrev);

    playPauseBtn.addEventListener("click", function () {
        if (audio.paused) {
            audio.play();
            playPauseBtn.innerHTML = '<img src="img/pause.png" class="btn-song">';
        } else {
            audio.pause();
            playPauseBtn.innerHTML = '<img src="img/play.png" class="btn-song">';
        }
    });

    function formatTime(seconds) {
        let min = Math.floor(seconds / 60);
        let sec = Math.floor(seconds % 60);
        return `${min}:${sec < 10 ? '0' : ''}${sec}`;
    }

    audio.onloadedmetadata = function () {
        if (seekBar) seekBar.max = audio.duration;
        if (totalTimeDisplay) totalTimeDisplay.textContent = formatTime(audio.duration);
    };

    audio.addEventListener("timeupdate", function () {
        if (seekBar) seekBar.value = audio.currentTime;
        if (currentTimeDisplay) currentTimeDisplay.textContent = formatTime(audio.currentTime);
    });

    if (seekBar) {
        seekBar.addEventListener("input", function () {
            audio.currentTime = seekBar.value;
        });
    }
});

</script>
