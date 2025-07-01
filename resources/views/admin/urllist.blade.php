@extends('layouts.admin')
@section('title','Welcome to Admin dashboard')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="me-3">URL List Created by admin or your inviter</h3>

        <form action="{{ route('admin.createurl') }}" method="POST" class="d-flex w-100" style="max-width: 600px;">
            @csrf
            <div class="mb-3">
            <input type="text" 
                   class="form-control me-2 @error('original_url') is-invalid @enderror" 
                   id="original_url" 
                   name="original_url" 
                   placeholder="https://example.com/" 
                   required>
            @error('original_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create URL</button>

        </form>
    </div>

    <div class="card">
        <div class="card-body p-0">
            @if($data->count())
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ShortUrl</th>
                            <th>Short Code</th>
                            <th>Created By</th>
                            <th>Company</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $val)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $val->original_url }}</td>
                                <td>{{ $val->short_code }}</td>
                                <td>{{ $val->user->name }}</td>
                                <td>{{ $val->company->name }}</td>
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
