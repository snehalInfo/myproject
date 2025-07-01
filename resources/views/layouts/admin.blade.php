<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="#">AdminPanel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light sidebar py-3">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    @if(Auth::user()->role == 'SuperAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('company')}}">Company Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('superadmin.invitelist')}}">Admin Mangement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('superadmin.urllist')}}">URL Mangement</a>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.invitelist')}}">Admin/Member Mangement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.urllist')}}">URL Mangement</a>
                    </li>
                    @endif
                    @if(Auth::user()->role == 'Member')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</x-dropdown-link>
                        </form>
                    </li>

                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <h2 class="text-center">@yield('title')</h2>
                <hr>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
