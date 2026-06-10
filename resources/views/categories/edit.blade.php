@extends('layouts.app')

@section('title','Edit Kategori')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h4>Edit Kategori</h4>

        <form
            action="{{ route('categories.update',$category->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>
                    Nama Kategori
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $category->name }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    class="form-control">{{ $category->description }}</textarea>

            </div>

            <button
                class="btn btn-primary">

                Update

            </button>

        </form>

    </div>

</div>

@endsection