@extends('layouts.app')

@section('title','Edit Barang')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h3 class="mb-4">

            Edit Barang

        </h3>

        <form
            action="{{ route('products.update',$product->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Foto Saat Ini --}}
            @if($product->photo)

            <div class="mb-3">

                <img
                    src="{{ asset('storage/'.$product->photo) }}"
                    width="200"
                    class="rounded">

            </div>

            @endif

            {{-- Upload Foto Baru --}}
            <div class="mb-3">

                <label>Ganti Foto</label>

                <input
                    type="file"
                    name="photo"
                    class="form-control">

            </div>

            {{-- Nama Barang --}}
            <div class="mb-3">

                <label>Nama Barang</label>

                <input
                    type="text"
                    name="name"
                    value="{{ $product->name }}"
                    class="form-control">

            </div>

            {{-- Kategori --}}
            <div class="mb-3">

                <label>Kategori</label>

                <select
                    name="category_id"
                    class="form-select">

                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Stok --}}
            <div class="mb-3">

                <label>Stok</label>

                <input
                    type="number"
                    name="stock"
                    value="{{ $product->stock }}"
                    class="form-control">

            </div>

            {{-- Minimum Stok --}}
            <div class="mb-3">

                <label>Minimum Stok</label>

                <input
                    type="number"
                    name="minimum_stock"
                    value="{{ $product->minimum_stock }}"
                    class="form-control">

            </div>

            {{-- Satuan --}}
            <div class="mb-3">

                <label>Satuan</label>

                <input
                    type="text"
                    name="unit"
                    value="{{ $product->unit }}"
                    class="form-control">

            </div>

            {{-- Harga Jual --}}
            <div class="mb-3">

                <label>Harga Jual</label>

                <input
                    type="number"
                    name="selling_price"
                    value="{{ $product->selling_price }}"
                    class="form-control">

            </div>

            {{-- Harga Beli --}}
            <div class="mb-3">

                <label>Harga Beli</label>

                <input
                    type="number"
                    name="purchase_price"
                    value="{{ $product->purchase_price }}"
                    class="form-control">

            </div>

            {{-- Berat --}}
            <div class="mb-3">

                <label>Berat / Ukuran</label>

                <input
                    type="text"
                    name="weight_size"
                    value="{{ $product->weight_size }}"
                    class="form-control">

            </div>

            {{-- Lokasi --}}
            <div class="mb-3">

                <label>Lokasi Simpan</label>

                <input
                    type="text"
                    name="storage_location"
                    value="{{ $product->storage_location }}"
                    class="form-control">

            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    class="form-control">{{ $product->description }}</textarea>

            </div>

            <button
                class="btn btn-primary">

                Update Barang

            </button>

        </form>

    </div>

</div>

@endsection