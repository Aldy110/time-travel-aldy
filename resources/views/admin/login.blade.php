<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login — Time Travel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="login-page">

        <div class="login-card">

            <p class="admin-label">
                TIME TRAVEL
            </p>

            <h1>
                Admin Login
            </h1>

            <p class="login-subtitle">
                Masuk untuk mengelola memories.
            </p>


            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif


            <form
                action="{{ route('admin.login.submit') }}"
                method="POST"
                class="memory-form"
            >

                @csrf

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <input
                        id="username"
                        type="text"
                        name="username"
                        required
                        autofocus
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="button button-primary login-button"
                >
                    Masuk
                </button>

            </form>


            <a
                href="{{ url('/') }}"
                class="back-home"
            >
                ← Kembali ke Time Travel
            </a>

        </div>

    </main>

</body>
</html>