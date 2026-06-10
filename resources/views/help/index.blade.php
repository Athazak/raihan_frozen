@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')

<div class="container">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="fw-bold">

            📖 Bantuan Penggunaan Sistem

        </h2>

        <p class="text-muted">

            Panduan penggunaan aplikasi Frozeria Stock Management.

        </p>

    </div>

    {{-- Panduan --}}
    <div class="card border-0 shadow-lg mb-4">

        <div class="card-body">

            <h4 class="mb-4">

                Cara Menggunakan Sistem

            </h4>

            <div class="mb-4">

                <h5>
                    1. Menambah Barang
                </h5>

                <p>
                    Klik menu <strong>Tambah Barang</strong>,
                    isi seluruh data barang kemudian tekan tombol
                    <strong>Simpan Barang</strong>.
                </p>

            </div>

            <div class="mb-4">

                <h5>
                    2. Mengubah Data Barang
                </h5>

                <p>
                    Klik tombol <strong>Edit</strong>
                    pada barang yang ingin diubah.
                </p>

            </div>

            <div class="mb-4">

                <h5>
                    3. Menghapus Barang
                </h5>

                <p>
                    Klik tombol <strong>Hapus</strong>,
                    kemudian konfirmasi penghapusan.
                </p>

            </div>

            <div class="mb-4">

                <h5>
                    4. Mencari Barang
                </h5>

                <p>
                    Gunakan kolom pencarian pada dashboard
                    untuk mencari barang berdasarkan nama.
                </p>

            </div>

            <div>

                <h5>
                    5. Filter Kategori
                </h5>

                <p>
                    Gunakan dropdown kategori untuk menampilkan
                    barang berdasarkan kategori tertentu.
                </p>

            </div>

        </div>

    </div>

    {{-- Data Pengembang --}}
    <div class="card border-0 shadow-lg">

        <div class="card-body">

            <h4 class="mb-4">

                👨‍💻 Data Pengembang

            </h4>

            <table class="table">

                <tr>
                    <th width="200">
                        Nama
                    </th>
                    <td>
                        Raihan tsaqif athazaky
                    </td>
                </tr>

                <tr>
                    <th>
                        NIM
                    </th>
                    <td>
                        2331740010
                    </td>
                </tr>

                <tr>
                    <th>
                        Kelas
                    </th>
                    <td>
                        3A
                    </td>
                </tr>

                <tr>
                    <th>
                        Alamat
                    </th>
                    <td>
                        Lumajang
                    </td>
                </tr>

                <tr>
                    <th>
                        No HP
                    </th>
                    <td>
                        085706646704
                    </td>
                </tr>

                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        athazaky1103@gmail.com
                    </td>
                </tr>

            </table>

        </div>

    </div>

</div>

@endsection