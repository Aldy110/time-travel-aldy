<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Time Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="music-player" id="musicPlayer">

    <button class="music-toggle" id="musicToggle" type="button">
        🎵
    </button>

    <div class="music-panel" id="musicPanel">

        <div class="music-header">
            <div>
                <span class="music-label">NOW PLAYING</span>
                <h3 id="musicTitle">Remember When</h3>
            </div>

            <button id="musicClose" type="button">×</button>
        </div>

        <div class="music-controls">
            <button id="prevSong" type="button">⏮</button>
            <button id="playSong" type="button">▶</button>
            <button id="nextSong" type="button">⏭</button>
        </div>

        <input
            type="range"
            id="musicVolume"
            min="0"
            max="1"
            step="0.01"
            value="0.7"
        >

        <div class="music-bottom">

            <span id="musicStatus">
                Ready
            </span>

            <label class="volume-control">
                🔊
                <input
                    type="range"
                    id="musicVolume"
                    min="0"
                    max="1"
                    step="0.01"
                    value="0.7"
                >
            </label>

        </div>

        <div class="playlist" id="playlist">
            <!-- playlist nanti diisi JavaScript -->
        </div>

    </div>

    <audio id="audioPlayer"></audio>

</div>

<body>

    <nav class="navbar">

        <a href="{{ url('/') }}" class="brand">
            Time Travel
        </a>

        <a
            href="{{ route('admin.memories.index') }}"
            class="nav-admin"
        >
            Manage Memories
        </a>

    </nav>


    <header class="hero">

        <p class="hero-label">
            A COLLECTION OF MEMORIES
        </p>

        <h1>
            Time Travel
        </h1>

        <p class="hero-description">
            Sebuah perjalanan kecil untuk menyimpan,
            melihat kembali, dan mengingat momen-momen
            yang pernah terjadi.
        </p>

    </header>


    <main class="timeline">

        <div class="timeline-heading">
            <span>01</span>
            <h2>My Journey</h2>
        </div>


        <div class="timeline-list">

            @foreach ($memories as $memory)

                <article class="memory-card">

                    <div class="memory-meta">
                        {{ $memory->date->format('d M Y') }}
                    </div>

                    <h3 class="memory-title">
                        {{ $memory->title }}
                    </h3>


                    @if ($memory->image)

                        <img
                            src="{{ asset('storage/' . $memory->image) }}"
                            alt="{{ $memory->title }}"
                            class="memory-image"
                        >

                    @endif


                    <p class="memory-description">
                        {{ $memory->description }}
                    </p>

                </article>

            @endforeach

        </div>

    </main>


    <footer class="footer">

        <p>
            Every moment becomes a memory.
        </p>

        <span>
            Time Travel © {{ date('Y') }}
        </span>

    </footer>

</body>
</html>