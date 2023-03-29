@extends('layouts.app')

@section('title', "OhayoBlog | Register")
@section('content')

<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card">
  <h5 class="card-header text-center" style="font-family:fantasy; font-size: 25px;">Login</h5>
  <div class="card-body">

<form method="POST" action="{{ url('register') }}">
    @csrf
    @if (session()->has('error_message'))
    <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
    @endif

      <div class="mb-3">
    <label for="name" class="form-label" style="font-family:fantasy">Username</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >

    @if($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
    </div>

  <div class="mb-3">
    <label for="email" class="form-label" style="font-family:fantasy">Email</label>
    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" aria-describedby="emailHelp">
        @if($errors->has('email'))
        <small class="text-danger">{{ $errors->first('email') }}</small>
    @endif
    </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"  style="font-family:fantasy">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        <div id="emailHelp" class="form-text" style="font-family:monospace"><i class="fa-brands fa-blogger px-3" style="scale: 1.5"></i>OhayoBlog will keep this as a secret</div>
                @if($errors->has('password'))
        <small class="text-danger">{{ $errors->first('password') }}</small>
    @endif

  </div>

    <div class="mb-3">
    <label for="password_confirmation" class="form-label"  style="font-family:fantasy">Password  Confirmation</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

  </div>
  <div class="mb-3 form-check">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Register</button>
  </div>
</form>

  </div>
</div>
    </div>
</div>



@endsection

