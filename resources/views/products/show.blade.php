@extends('layouts.app')

@section('title','Detail Barang')

@section('content')

<div class="mb-4">

    <a
        href="{{ route('dashboard') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<div class="card border-0 shadow-lg">

    <div class="card-body p-4">

        <div class="row g-4">

            {{-- FOTO --}}
            <div class="col-lg-4">

                @if($product->photo)

                <img
                    src="{{ asset('storage/'.$product->photo) }}"
                    alt="{{ $product->name }}"
                    class="img-fluid rounded shadow">

                @else

                <div
                    class="bg-light rounded d-flex align-items-center justify-content-center"
                    style="height:350px;">

                    <div class="text-center">

                        <i
                            class="bi bi-image display-1 text-secondary">
                        </i>

                        <p class="text-muted">

                            Tidak ada foto

                        </p>

                    </div>

                </div>

                @endif

            </div>

            {{-- DETAIL --}}
            <div class="col-lg-8">

                <div
                    class="d-flex justify-content-between align-items-start mb-3">

                    <div>

                        <h2 class="fw-bold">

                            {{ $product->name }}

                        </h2>

                        <span class="badge bg-primary">

                            {{ $product->category->name ?? '-' }}

                        </span>

                    </div>

                    {{-- STATUS STOK --}}
                    <div>

                        @if($product->stock == 0)

                        <span class="badge bg-danger fs-6">

                            Stok Habis

                        </span>

                        @elseif($product->stock < $product->minimum_stock)

                            <span class="badge bg-warning text-dark fs-6">

                                Stok Menipis

                            </span>

                            @else

                            <span class="badge bg-success fs-6">

                                Stok Aman

                            </span>

                            @endif

                    </div>

                </div>

                <hr>

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Stok

                            </small>

                            <h5>

                                {{ $product->stock }}
                                {{ $product->unit }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Stok Minimum

                            </small>

                            <h5>

                                {{ $product->minimum_stock }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Harga Jual

                            </small>

                            <h5 class="text-success">

                                Rp {{ number_format($product->selling_price,0,',','.') }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Harga Beli

                            </small>

                            <h5>

                                Rp {{ number_format($product->purchase_price,0,',','.') }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Berat / Ukuran

                            </small>

                            <h5>

                                {{ $product->weight_size ?: '-' }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-box">

                            <small class="text-muted">

                                Lokasi Simpan

                            </small>

                            <h5>

                                {{ $product->storage_location ?: '-' }}

                            </h5>

                        </div>

                    </div>

                </div>

                <hr>

                <h5>

                    Deskripsi

                </h5>

                <p class="text-muted">

                    {{ $product->description ?: 'Tidak ada deskripsi.' }}

                </p>

                <div class="mt-4 d-flex gap-2">

                    <a
                        href="{{ route('products.edit',$product->id) }}"
                        class="btn btn-warning">

                        <i class="bi bi-pencil-square"></i>

                        Edit Barang

                    </a>

                    <form
                        action="{{ route('products.destroy',$product->id) }}"
                        method="POST"
                        class="delete-form">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger">

                            <i class="bi bi-trash"></i>

                            Hapus Barang

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection