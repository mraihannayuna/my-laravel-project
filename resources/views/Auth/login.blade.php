@extends('layouts.app')

@section('title', "OhayoBlog | Login")
@section('content')

    @if (session()->has('error_message'))
    <div class="position-relative">
            <div class="alert alert-warning alert-dismissible fade show js-alert position-absolute top-0 start-50 translate-middle" style="z-index: 6;" role="alert">
                {{ session()->get('error_message') }}
            </div>
    </div>
        @elseif(session()->has('logout_message'))
        <div class="position-relative">
            <div class="alert alert-danger alert-dismissible fade show js-alert position-absolute top-0 start-50 translate-middle" style="z-index: 6"; role="alert">
                {{ session()->get('logout_message') }}
            </div>
        </div>
    @endif


<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
  <h5 class="card-header text-center" style="font-family:fantasy; font-size: 25px;">Login</h5>
  <div class="card-body">

<form method="POST" action="{{ url('login') }}">
    @csrf


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" style="font-family:fantasy">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
    <div id="emailHelp" class="form-text" style="font-family:monospace"><i class="fa-brands fa-blogger px-3" style="scale: 1.5"></i>OhayoBlog will keep this as a secret</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"  style="font-family:fantasy">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3 form-check">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Submit</button>
  </div>
</form>

  </div>
</div>
    </div>
</div>



@endsection

