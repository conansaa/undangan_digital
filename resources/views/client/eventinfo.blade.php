@extends('admin.layout.template')

@section('content')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let sidebar = document.getElementById("sidenav-main");
        if (sidebar) {
            sidebar.style.display = "none";
        }
    });
</script>

<style>
    /* Pastikan kontainer utama memenuhi seluruh lebar */
    .main-content {
        margin-left: 0 !important;  /* Hilangkan margin kiri */
        width: 100% !important;  /* Buat selebar mungkin */
    }
</style>

<div class="container text-center mt-5">
    <h1 class="text-warning">Halo! 👋</h1>
    <p class="lead mt-3">Buat acaramu bersama diikatJanji! 🎉</p>
    <p>Isi detail acaramu secara bertahap dengan panduan yang sudah kami siapkan.</p>

    <a href="{{ route('create.event') }}" class="btn btn-warning mt-3">
        Buat Acara Sekarang 🚀
    </a>
</div>
@endsection

@section('footjs')
    @include('admin.layout.footer.admin')
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Invitation Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Digital Invitation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#templates">Templates</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="#">Create Event</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Digital Invitations</h1>
            <p>Create beautiful wedding invitations in minutes</p>
            <a href="#templates" class="btn btn-light">View Templates</a>
        </div>
    </header>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Digital Invitation. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
