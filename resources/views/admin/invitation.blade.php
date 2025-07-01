@extends('layouts.admin')

@section('title','Welcome to Admin dashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h4>Invitation send to admin or member</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.invite') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Email Id</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">User Type </label>
                            
                            <select name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                                <option value="Member">Member</option>
                                <option value="Admin">Admin</option>
                            </select>

                            @error('user_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Invited Company</label>
                            
                            <select name="company" class="form-control @error('company') is-invalid @enderror">
                                <option value="">-- Select --</option>
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            </select>

                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
