@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Barang List</h3>
                    {{-- <div class="card-tools">
                        <a href="{{ route('listbarang.create') }}" class="btn btn-primary btn-sm">Create New List Barang</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listbarang as $listbarang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $listbarang->nama }}</td>
                                    <td>
                                        <a href="{{ route('listbarang.show', $listbarang->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('listbarang.edit', $listbarang->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('listbarang.destroy', $listbarang->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
