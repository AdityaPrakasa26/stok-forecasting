<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow-sm" style="width: 400px;">
        <h3 class="text-center mb-4">Login</h3>

        <form action="#" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username / Email</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
            </div>

            <div class="d-grid gap-2">
                {{-- Button login sebagai Admin --}}
                <a href="{{ route('home.admin') }}" class="btn btn-primary">Login sebagai Admin</a>

                {{-- Button login sebagai Staff --}}
                <a href="{{ route('home.staff') }}" class="btn btn-secondary">Login sebagai Staff</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
