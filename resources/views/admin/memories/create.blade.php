<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Memory — Time Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="form-page">

        <div class="form-header">
            <p class="admin-label">TIME TRAVEL</p>

            <h1>Tambah Memory</h1>

            <p>
                Simpan sebuah momen baru ke dalam perjalananmu.
            </p>
        </div>


        @if ($errors->any())
            <div class="error-message">
                <strong>Ada yang perlu diperbaiki:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form
            action="{{ route('admin.memories.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="memory-form"
        >

            @csrf

            <div class="form-group">
                <label for="title">Judul Memory</label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Hari Pertama Sekolah"
                    required
                >
            </div>


            <div class="form-group">
                <label for="description">Deskripsi</label>

                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    placeholder="Ceritakan sedikit tentang momen ini..."
                    required
                >{{ old('description') }}</textarea>
            </div>


            <div class="form-group">
                <label for="date">Tanggal</label>

                <input
                    id="date"
                    type="date"
                    name="date"
                    value="{{ old('date') }}"
                    required
                >
            </div>


            <div class="form-group">
                <label for="image">Foto Memory</label>

                <input
                    id="image"
                    type="file"
                    name="image"
                    accept="image/*"
                >

                <small>
                    Opsional. Maksimal 5 MB.
                </small>
            </div>


            <div class="form-actions">

                <a
                    href="{{ route('admin.memories.index') }}"
                    class="button button-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="button button-primary"
                >
                    Simpan Memory
                </button>

            </div>

        </form>

    </main>

</body>
</html>