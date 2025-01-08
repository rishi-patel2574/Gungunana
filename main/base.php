<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="..\css\bootstrap.min.css">
  
<style>
.music-player {
    max-width: 900px;
    margin: auto;
    background: #121212;
    color: #f8f9fa;
}

.music-player h2 {
    color: #ffc107; /* Matching theme warning color */
}

.song-info h5 {
    color: #17a2b8; /* Info color for title */
}

.song-info p {
    font-size: 16px;
    margin-bottom: 5px;
}

.controls .btn {
    width: 130px;
    transition: transform 0.2s, background-color 0.3s;
}

.controls .btn:hover {
    transform: scale(1.1);
}

.controls .btn-success {
    background-color: #28a745;
    border: none;
}

.controls .btn-success:hover {
    background-color: #218838;
}

.controls .btn-primary {
    background-color: #007bff;
    border: none;
}

.controls .btn-primary:hover {
    background-color: #0056b3;
}

.controls .btn-warning {
    background-color: #ffc107;
    border: none;
}

.controls .btn-warning:hover {
    background-color: #e0a800;
}


</style>
</head>

<body>
<div class="container music-player bg-dark text-white py-4 mt-5 rounded shadow">
    <h2 class="text-center mb-4">Music Player</h2>

    <div class="row align-items-center">
        <!-- Album Art -->
        <div class="col-md-4 text-center">
            <img src="album_art.jpg" alt="Album Art" class="rounded img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
        </div>

        <!-- Song Info -->
        <div class="col-md-8">
            <div class="song-info mb-3">
                <h5 class="mb-1">Song Title: <span id="song-title">Unknown</span></h5>
                <p class="mb-1">Artist: <span id="artist-name">Unknown Artist</span></p>
                <p class="mb-1">Album: <span id="album-name">Unknown Album</span></p>
            </div>

            <!-- Audio Controls -->
            <audio id="audio-player" controls class="w-100">
                <source src="your_song.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <!-- Controls -->
            <div class="controls mt-3 text-center">
                <button id="prev-btn" class="btn btn-primary mx-2"><i class="bi bi-skip-backward-fill"></i> Previous</button>
                <button id="play-btn" class="btn btn-success mx-2"><i class="bi bi-play-fill"></i> Play</button>
                <button id="pause-btn" class="btn btn-warning mx-2"><i class="bi bi-pause-fill"></i> Pause</button>
                <button id="next-btn" class="btn btn-primary mx-2"><i class="bi bi-skip-forward-fill"></i> Next</button>
            </div>
        </div>
    </div>
</div>
