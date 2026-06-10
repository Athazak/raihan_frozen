<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    {{-- Responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Judul halaman --}}
    <title>@yield('title','Frozeria')</title>

    {{-- Load Vite --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
{{-- SweetAlert Success --}}

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Isi halaman --}}
    <div class="container py-4">
        @yield('content')
    </div>

    @if(session('success'))

    <script>
        Swal.fire({

            icon: 'success',

            title: 'Berhasil',

            text: '{{ session("success") }}',

            timer: 2000,

            showConfirmButton: false

        });
    </script>

    @endif

    <script>
        document
            .querySelectorAll('.delete-form')
            .forEach(form => {

                form.addEventListener(
                    'submit',
                    function(e) {
                        e.preventDefault();

                        Swal.fire({

                            title: 'Hapus Data?',

                            text: 'Data akan dihapus permanen',

                            icon: 'warning',

                            showCancelButton: true,

                            confirmButtonText: 'Ya, Hapus',

                            cancelButtonText: 'Batal'

                        }).then((result) => {

                            if (result.isConfirmed) {
                                form.submit();
                            }

                        });
                    }
                );

            });
    </script>
    @stack('scripts')
    <script>
        /*
|--------------------------------------------------------------------------
| Hapus Kategori
|--------------------------------------------------------------------------
*/
        document
            .querySelectorAll('.delete-category-form')
            .forEach(form => {

                form.addEventListener(
                    'submit',
                    function(e) {
                        e.preventDefault();

                        Swal.fire({

                            icon: 'warning',

                            title: 'Hapus Kategori?',

                            text: 'Kategori akan dihapus permanen.',

                            showCancelButton: true,

                            confirmButtonColor: '#dc3545',

                            cancelButtonColor: '#6c757d',

                            confirmButtonText: 'Ya, Hapus',

                            cancelButtonText: 'Batal'

                        }).then((result) => {

                            if (result.isConfirmed) {
                                form.submit();
                            }

                        });

                    }
                );

            });
    </script>
</body>

</html>