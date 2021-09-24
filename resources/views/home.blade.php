@extends('layout.app')
@section('content')
    

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>User Login</h4> <hr>
                    <a href="url('/githubCallback')" class="btn btn-primary text-white btn-block btn-social btn-microsoft">
                        <span class="fa fa-github"></span>Sign in with github
                    </a>
                    <a href="{{route('githublogin')}}" class="btn bg-dark text-white btn-block btn-social btn-microsoft">
                        <span class="fa fa-github"></span>Sign Up with github
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection