@extends('layouts.app')

@section('title','Tambah Barang')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold">

        Tambah Barang

    </h2>

    <p class="text-muted">

        Tambahkan produk frozen food baru ke sistem.

    </p>

</div>

<div class="card border-0 shadow-lg">

    <div class="card-body p-4">

        <form
            action="{{ route('products.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                {{-- FOTO --}}
                <div class="col-lg-4">

                    <label class="form-label fw-semibold">

                        Foto Barang

                    </label>

                    <div class="image-preview">

                        <img
                            id="preview"
                            src="https://placehold.co/400x400?text=Preview"
                            alt="Preview">

                    </div>

                    <input
                        type="file"
                        name="photo"
                        id="photo"
                        class="form-control mt-3">

                </div>

                {{-- FORM --}}
                <div class="col-lg-8">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">

                                Nama Barang

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Kategori

                            </label>

                            <select
                                name="category_id"
                                class="form-select">

                                <option value="">
                                    Pilih Kategori
                                </option>

                                @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                Stok

                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control">

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                Minimum Stok

                            </label>

                            <input
                                type="number"
                                name="minimum_stock"
                                value="20"
                                class="form-control">

                        </div>

                        <div class="col-md-4">

                            <label class="form-label">

                                Satuan

                            </label>

                            <input
                                type="text"
                                name="unit"
                                value="{{ old('unit') }}"
                                class="form-control @error('unit') is-invalid @enderror">

                            {{-- Error Validasi --}}
                            @error('unit')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                            @enderror

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Harga Jual

                            </label>

                            <input
                                type="number"
                                name="selling_price"
                                class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Harga Beli

                            </label>

                            <input
                                type="number"
                                name="purchase_price"
                                class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Berat / Ukuran

                            </label>

                            <input
                                type="text"
                                name="weight_size"
                                class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Lokasi Simpan

                            </label>

                            <input
                                type="text"
                                name="storage_location"
                                class="form-control">

                        </div>

                    </div>

                </div>

            </div>

            <hr class="my-4">

            <label class="form-label">

                Deskripsi

            </label>

            <textarea
                name="description"
                rows="5"
                class="form-control"></textarea>

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="bi bi-check-circle"></i>

                    Simpan Barang

                </button>

                <a
                    href="{{ route('dashboard') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')

<script>
    document
        .getElementById('photo')
        .addEventListener(
            'change',
            function(e) {

                const preview =
                    document.getElementById('preview');

                preview.src =
                    URL.createObjectURL(
                        e.target.files[0]
                    );

            });
</script>

@endpush