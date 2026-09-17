<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin — Time Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="admin-page">

        <header class="admin-header">

            <div>
                <p class="admin-label">TIME TRAVEL</p>
                <h1>Memory Management</h1>
                <p class="admin-subtitle">
                    Kelola semua memory dan perjalanan yang tersimpan.
                </p>
            </div>

           <div class="admin-actions">

                <a href="{{ url('/') }}" class="button button-secondary">
                    Lihat Website
                </a>

                <a href="{{ route('admin.memories.create') }}" class="button button-primary">
                    + Tambah Memory
                </a>

                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="button button-secondary"
                    >
                        Logout
                    </button>
                </form>

            </div>

        </header>


        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif


        <section class="admin-list">

            @forelse ($memories as $memory)

                <article class="admin-memory">

                    @if ($memory->image)
                        <img
                            src="{{ asset('storage/' . $memory->image) }}"
                            alt="{{ $memory->title }}"
                            class="admin-memory-image"
                        >
                    @else
                        <div class="admin-memory-placeholder">
                            No Image
                        </div>
                    @endif


                    <div class="admin-memory-content">

                        <div class="admin-memory-year">
                            {{ $memory->date->format('Y') }}
                        </div>

                        <h2>
                            {{ $memory->title }}
                        </h2>

                        <p>
                            {{ $memory->description }}
                        </p>

                    </div>


                    <div class="admin-memory-actions">

                        <a
                            href="{{ route('admin.memories.edit', $memory) }}"
                            class="button button-secondary"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.memories.destroy', $memory) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="button button-danger"
                                onclick="return confirm('Hapus memory ini?')"
                            >
                                Hapus
                            </button>
                        </form>

                    </div>

                </article>

            @empty

                <div class="empty-state">
                    <h2>Belum ada memory</h2>
                    <p>Tambahkan memory pertama kamu.</p>

                    <a
                        href="{{ route('admin.memories.create') }}"
                        class="button button-primary"
                    >
                        + Tambah Memory
                    </a>
                </div>

            @endforelse

        </section>

    </main>

</body>
</html>