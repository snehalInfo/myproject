@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(isset($data) && $data != "")
            <div class="card">
                <div class="card-header">
                    <h4>Update Company</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('company.update',$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ $data->name }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Company Description</label>
                            
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5" cols="3" id="description" name="description">{{ $data->description }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </form>
                </div>
            </div>

            @else

            <div class="card">
                <div class="card-header">
                    <h4>Add New Company</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('company.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Company Description</label>
                            
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="5" cols="3" id="description" name="description"></textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Company</button>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
