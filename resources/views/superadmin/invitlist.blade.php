@extends('layouts.admin')
@section('title','Welcome to Superadmin dashboard')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Admin List invited by Superadmin</h3>
        <a href="{{ route('superadmin.invitation') }}" class="btn btn-primary">Invite new admin</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            @if($data->count())
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Invited Company</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $val)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->company->name }}</td>
                                <td>{{ $val->role }}</td>
                                <td>{{ $val->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-3">
                    <p class="mb-0">No admin found.</p>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
