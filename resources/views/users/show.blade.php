@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Details</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <p>{{ $user->username }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At</label>
                    <p>{{ $user->created_at->format('d M Y H:i') }}</p>
                </div>
                <div class="form-group">
                    <label for="updated_at">Updated At</label>
                    <p>{{ $user->updated_at->format('d M Y H:i') }}</p>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
