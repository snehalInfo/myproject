@extends('layouts.admin')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Company List</h3>
        <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            @if($data->count())
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->description }}</td>
                                <td>{{ $company->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <!-- <form action="{{ route('company.destroy', $company->id) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this company?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-3">
                    <p class="mb-0">No companies found.</p>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
