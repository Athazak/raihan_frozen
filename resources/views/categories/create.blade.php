@extends('layouts.app')

@section('title','Tambah Kategori')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h4>Tambah Kategori</h4>

        <form
            action="{{ route('categories.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label>
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control">

                    

            </div>

            <div class="mb-3">

                <label>
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    class="form-control"></textarea>

            </div>

            <button
                class="btn btn-success">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection