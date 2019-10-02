@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::guard('admin')->check())
                    <li>
                        <a href="{{ route('admin.logout') }}">Admin Logout

                        </a>


                    </li>
                    @endif
                    Hello ADMIN. You are logged in! As ADMIN.

                    @if (Auth::guard('writter')->check())
                    <li>
                        <a href="{{ route('writter.logout') }}">

                            Writter Logout
                        </a>


                    </li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
