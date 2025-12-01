<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="Themepixels">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/dist/assets/img/favicon.png') }}">

    <title>Perencanaan | DPR RI</title>

    <link rel="stylesheet" href="{{ asset('template/dist/lib/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/lib/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/lib/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/lib/prismjs/themes/prism.min.css') }}">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('SweetAlert/sweetalert2.min.css') }}">
    <style>
        table.dataTable.table-bordered>thead>tr>th,
        table.dataTable.table-bordered>tbody>tr>td {
            border: 1px solid #dee2e6 !important;
        }
        /* Overwrite Select2 style to match bootstrap borders */
        .select2-container .select2-selection--single {
            height: calc(1.5em + 0.75rem + 2px) !important;
            padding-top: 0.375rem !important;
            padding-bottom: 0.375rem !important;
        }
    </style>
</head>

<body>

    @include('sweetalert::alert')


    @include('layouts.sidebar')
    @include('layouts.header')

    <div class="main main-app p-3 p-lg-4">
        @yield('content')
        @include('layouts.footer')
    </div>


    <script src="{{ asset('template/dist/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/chart.js') }}/chart.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('template/dist/lib/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('template/dist/assets/js/script.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/db.data.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/db.sales.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="{{ asset('template/dist/lib/gridjs-jquery/gridjs.production.min.js') }}"></script>
    <script src="{{ asset('template/dist/lib/prismjs/prism.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('SweetAlert/sweetalert2.all.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                scrollX: "100%",
                order: [
                    [0, 'asc']
                ],
                autoWidth: true,
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                colReorder: true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'copy',
                        text: 'Salin'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: 'Cetak'
                    }
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>
    <script>
        // Global SweetAlert2 confirmation handler
        document.addEventListener('DOMContentLoaded', function () {
            // Intercept submit on forms with class 'confirm-form'
            document.querySelectorAll('form.confirm-form').forEach(function(form){
                form.addEventListener('submit', function(e){
                    e.preventDefault();
                    var btn = form.querySelector('button[data-confirm]');
                    var msg = btn ? btn.getAttribute('data-confirm') : 'Apakah Anda yakin?';
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: msg,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                    }).then(function(result){
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Handle buttons/links with data-confirm outside forms
            document.body.addEventListener('click', function(e){
                var el = e.target.closest('[data-confirm]');
                if (!el) return;
                // If inside a form, let the form handler manage it
                var parentForm = el.closest('form');
                if (parentForm && parentForm.classList.contains('confirm-form')) return;

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
                            // find enclosing form
                            var f = el.closest('form');
                            if (f) f.submit();
                        }
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>