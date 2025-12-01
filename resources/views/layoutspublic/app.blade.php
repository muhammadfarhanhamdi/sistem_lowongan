<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAGANG DPR RI</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome (already in project) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="font-sans antialiased">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Example icon usage (you can remove this comment) -->
    <!--
      Example: a download button with Font Awesome
      <button class="btn btn-primary"><i class="fa fa-download"></i> Download CV</button>
    -->

    <!-- Footer -->
    @include('components.footer')
    <!-- SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Global SweetAlert2 confirmation handler for public layout
        document.addEventListener('DOMContentLoaded', function () {
            document.body.addEventListener('click', function(e){
                var el = e.target.closest('[data-confirm]');
                if (!el) return;
                e.preventDefault();
                var msg = el.getAttribute('data-confirm') || 'Apakah Anda yakin?';
                Swal.fire({
                    title: 'Konfirmasi',
                    text: msg,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then(function(result){
                    if (result.isConfirmed) {
                        if (el.tagName.toLowerCase() === 'a' && el.href) {
                            window.location = el.href;
                        } else if (el.tagName.toLowerCase() === 'button') {
                            var f = el.closest('form');
                            if (f) f.submit();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>