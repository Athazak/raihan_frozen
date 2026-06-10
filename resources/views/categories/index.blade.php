@extends('layouts.app')

@section('title','Kategori')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">

            <h4>Daftar Kategori</h4>

            <a href="{{ route('categories.create') }}"
                class="btn btn-success">

                <i class="bi bi-plus-circle"></i>
                Tambah Kategori

            </a>

        </div>

        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $category->name }}
                    </td>

                    <td>
                        {{ $category->description }}
                    </td>

                    <td>

                        <a href="{{ route('categories.edit',$category->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('categories.destroy',$category->id) }}"
                            method="POST"
                            class="d-inline delete-category-form">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm">

                                <i class="bi bi-trash"></i>

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4"
                        class="text-center">

                        Belum ada kategori

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection