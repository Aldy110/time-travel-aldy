<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Memory — Time Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="form-page">

        <div class="form-header">
            <p class="admin-label">TIME TRAVEL</p>

            <h1>Edit Memory</h1>

            <p>
                Perbarui informasi dari memory yang sudah tersimpan.
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
            action="{{ route('admin.memories.update', $memory) }}"
            method="POST"
            enctype="multipart/form-data"
            class="memory-form"
        >

            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="title">Judul Memory</label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title', $memory->title) }}"
                    required
                >
            </div>


            <div class="form-group">
                <label for="description">Deskripsi</label>

                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    required
                >{{ old('description', $memory->description) }}</textarea>
            </div>


            <div class="form-group">
                <label for="date">Tanggal</label>

                <input
                    id="date"
                    type="date"
                    name="date"
                    value="{{ old('date', $memory->date->format('Y-m-d')) }}"
                    required
                >
            </div>


            <div class="form-group">

                <label>Foto Saat Ini</label>

                @if ($memory->image)

                    <img
                        src="{{ asset('storage/' . $memory->image) }}"
                        alt="{{ $memory->title }}"
                        class="form-preview"
                    >

                @else

                    <div class="form-no-image">
                        Belum ada foto
                    </div>

                @endif

            </div>


            <div class="form-group">

                <label for="image">Ganti Foto</label>

                <input
                    id="image"
                    type="file"
                    name="image"
                    accept="image/*"
                >

                <small>
                    Kosongkan jika tidak ingin mengganti foto.
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </main>

</body>
</html>