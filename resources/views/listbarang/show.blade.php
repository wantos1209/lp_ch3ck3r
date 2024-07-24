@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View List Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">View List Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Barang Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $listbarang->nama }}</p>
                        <a href="{{ route('listbarang.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
