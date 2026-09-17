import './bootstrap';
const audio = document.getElementById('audioPlayer');
const player = document.getElementById('musicPlayer');
const toggle = document.getElementById('musicToggle');
const panelClose = document.getElementById('musicClose');

const playButton = document.getElementById('playSong');
const prevButton = document.getElementById('prevSong');
const nextButton = document.getElementById('nextSong');

const progress = document.getElementById('musicProgress');
const title = document.getElementById('musicTitle');
const playlistElement = document.getElementById('playlist');

const volume = document.getElementById('musicVolume');
const status = document.getElementById('musicStatus');

if (audio && player) {

    audio.volume = 0.7;

    const songs = [
        {
            title: 'Remember When',
            file: '/audio/remember-when.mp3'
        },
        {
            title: 'From Eden',
            file: '/audio/from-eden.mp3'
        },
        {
            title: 'Merry Christmas',
            file: '/audio/merry-christmas.mp3'
        }
    ];

    let currentSong = Number(
        localStorage.getItem('timeTravelSong') || 0
    );


    // =========================
    // OPEN / CLOSE
    // =========================

    toggle.addEventListener('click', () => {
        player.classList.toggle('open');
    });

    panelClose.addEventListener('click', () => {
        player.classList.remove('open');
    });


    // =========================
    // LOAD SONG
    // =========================
    function loadSong(index) {

            currentSong = index;

            const song = songs[currentSong];

            audio.src = song.file;
            title.textContent = song.title;

            if (status) {
                status.textContent = 'Ready';
            }

            localStorage.setItem(
                'timeTravelSong',
                currentSong
            );

            updatePlaylist();
    }

}

    // =========================
    // PLAY / PAUSE
    // =========================

    playButton.addEventListener('click', () => {

        if (audio.paused) {

            audio.play();

            playButton.textContent = '⏸';
            status.textContent = 'Playing';

        } else {

            audio.pause();

            playButton.textContent = '▶';
            status.textContent = 'Paused';

        }

    });


    // =========================
    // NEXT
    // =========================

    nextButton.addEventListener('click', () => {

        currentSong++;

        if (currentSong >= songs.length) {
            currentSong = 0;
        }

        loadSong(currentSong);
        audio.play();

        playButton.textContent = '⏸';
    });


    // =========================
    // PREVIOUS
    // =========================

    prevButton.addEventListener('click', () => {

        currentSong--;

        if (currentSong < 0) {
            currentSong = songs.length - 1;
        }

        loadSong(currentSong);
        audio.play();

        playButton.textContent = '⏸';
    });


    // =========================
    // PLAYLIST
    // =========================

    function updatePlaylist() {

        playlistElement.innerHTML = '';

        songs.forEach((song, index) => {

            const button = document.createElement('button');

            button.type = 'button';

            button.className = 'playlist-item';

            if (index === currentSong) {
                button.classList.add('active');
            }

            button.textContent = song.title;

            button.addEventListener('click', () => {

                loadSong(index);

                audio.play();

                playButton.textContent = '⏸';

            });

            playlistElement.appendChild(button);

        });

    }


    // =========================
    // PROGRESS BAR
    // =========================

    audio.addEventListener('timeupdate', () => {

        if (!audio.duration) return;

        progress.value =
            (audio.currentTime / audio.duration) * 100;

    });


    progress.addEventListener('input', () => {

        if (!audio.duration) return;

        audio.currentTime =
            (progress.value / 100) * audio.duration;

    });


    // =========================
    // AUTO NEXT
    // =========================

    audio.addEventListener('ended', () => {

        currentSong++;

        if (currentSong >= songs.length) {
            currentSong = 0;
        }

        loadSong(currentSong);

        audio.play();

    });

    // =========================
    // VOLUME
    // =========================

    volume.addEventListener('input', () => {

        audio.volume = volume.value;

    });

    // =========================
    // INITIALIZE
    // =========================

    