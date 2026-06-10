@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- Statistik --}}
<div class="row g-4 mb-4">

    {{-- Total Barang --}}
    <div class="col-md-3">
        <div class="card border-0 shadow-lg h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Total Barang
                        </small>

                        <h2 class="mb-0">
                            {{ $totalBarang }}
                        </h2>

                    </div>

                    <i class="bi bi-box-seam fs-1 text-primary"></i>

                </div>

            </div>
        </div>
    </div>

    {{-- Total Kategori --}}
    <div class="col-md-3">
        <div class="card border-0 shadow-lg h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Total Kategori
                        </small>

                        <h2 class="mb-0">
                            {{ $totalKategori }}
                        </h2>

                    </div>

                    <i class="bi bi-tags fs-1 text-success"></i>

                </div>

            </div>
        </div>
    </div>

    {{-- Stok Menipis --}}
    <div class="col-md-3">
        <div class="card border-0 shadow-lg h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Stok Menipis
                        </small>

                        <h2 class="mb-0 text-warning">
                            {{ $stokMenipis }}
                        </h2>

                    </div>

                    <i class="bi bi-exclamation-triangle fs-1 text-warning"></i>

                </div>

            </div>
        </div>
    </div>

    {{-- Stok Habis --}}
    <div class="col-md-3">
        <div class="card border-0 shadow-lg h-100">
            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small class="text-muted">
                            Stok Habis
                        </small>

                        <h2 class="mb-0 text-danger">
                            {{ $stokHabis }}
                        </h2>

                    </div>

                    <i class="bi bi-x-circle fs-1 text-danger"></i>

                </div>

            </div>
        </div>
    </div>

</div>

{{-- Tabel Barang --}}
<div class="card border-0 shadow-lg">

    <div class="card-body">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="mb-0">

                    Daftar Barang

                </h4>

                <small class="text-muted">

                    Kelola stok frozen food Frozeria

                </small>

            </div>

            <a
                href="{{ route('products.create') }}"
                class="btn btn-success">

                <i class="bi bi-plus-circle"></i>

                Tambah Barang

            </a>

        </div>

        {{-- Search dan Filter --}}
        <form
            method="GET"
            action="{{ route('dashboard') }}"
            class="mb-4">

            <div class="row g-2">

                {{-- Search --}}
                <div class="col-md-7">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama barang...">

                </div>

                {{-- Filter --}}
                <div class="col-md-3">

                    <select
                        name="category"
                        class="form-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Tombol Cari --}}
                <div class="col-md-2">

                    <button
                        class="btn btn-primary w-100">

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                </div>

            </div>

        </form>

        {{-- Tabel --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="80">
                            Foto
                        </th>

                        <th>
                            Nama Barang
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Stok
                        </th>

                        <th>
                            Satuan
                        </th>

                        <th>
                            Harga Jual
                        </th>

                        <th width="260">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>

                            {{-- Foto --}}
                            <td>

                                @if($product->photo)

                                    <img
                                        src="{{ asset('storage/'.$product->photo) }}"
                                        alt="{{ $product->name }}"
                                        width="60"
                                        height="60"
                                        class="rounded shadow-sm"
                                        style="object-fit:cover;">

                                @else

                                    <div
                                        class="bg-light rounded d-flex justify-content-center align-items-center"
                                        style="width:60px;height:60px;">

                                        <i class="bi bi-image text-secondary"></i>

                                    </div>

                                @endif

                            </td>

                            {{-- Nama --}}
                            <td>

                                <strong>

                                    {{ $product->name }}

                                </strong>

                            </td>

                            {{-- Kategori --}}
                            <td>

                                <span class="badge bg-primary">

                                    {{ $product->category->name ?? '-' }}

                                </span>

                            </td>

                            {{-- Stok --}}
                            <td>

                                {{ $product->stock }}

                                @if($product->stock == 0)

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @elseif($product->stock < $product->minimum_stock)

                                    <span class="badge bg-warning text-dark">

                                        Menipis

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Aman

                                    </span>

                                @endif

                            </td>

                            {{-- Satuan --}}
                            <td>

                                {{ $product->unit }}

                            </td>

                            {{-- Harga --}}
                            <td>

                                <strong>

                                    Rp {{ number_format($product->selling_price,0,',','.') }}

                                </strong>

                            </td>

                            {{-- Tombol --}}
                            <td>

                                <div class="d-flex gap-1">

                                    <a
                                        href="{{ route('products.show',$product->id) }}"
                                        class="btn btn-info btn-sm">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a
                                        href="{{ route('products.edit',$product->id) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <form
                                        action="{{ route('products.destroy',$product->id) }}"
                                        method="POST"
                                        class="delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="text-center py-5">

                                    <i
                                        class="bi bi-box-seam display-3 text-secondary">
                                    </i>

                                    <h5 class="mt-3">

                                        Belum Ada Data Barang

                                    </h5>

                                    <p class="text-muted">

                                        Klik tombol tambah barang untuk menambahkan data pertama.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection