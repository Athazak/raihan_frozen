@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">

            <h4>Daftar Barang</h4>

            <a href="{{ route('products.create') }}"
                class="btn btn-success">

                Tambah Barang

            </a>

        </div>

        <table class="table">

            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)

                <tr>

                    <td>{{ $product->name }}</td>

                    <td>
                        {{ $product->category->name ?? '-' }}
                    </td>

                    <td>{{ $product->stock }}</td>

                </tr>

                @empty

                <tr>
                    <td colspan="3">
                        Belum ada data
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection