@extends('layouts.admin')
@section('title','Welcome to Superadmin dashboard')

@section('content')
    <div class="alert alert-success">
        Welcome, {{ Auth::user()->name }}! You are logged in as <strong>{{ Auth::user()->role }}</strong>.
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Company</h5>
                    <p class="card-text">Manage system company</p>
                    <p><b>Count : </b>{{$companyCount}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Inviter</h5>
                    <p class="card-text">Manage system inviter</p>
                    <p><b>Count : </b>{{$adminCount}}</p>
                </div>
            </div>
        </div>
        <!-- Add more dashboard cards here -->
    </div>
@endsection
