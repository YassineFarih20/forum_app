@extends('layouts.master',['menu'=>'49'])
@section('title', 'Login Admin')
@section('content')

<div class="login-page" >
    <h1 class="title-loginA">Hey Admin</h1>
    <div class="form">
    <form class="login-form" action="{{ route('admin') }}" method="POST">
    @csrf
    <input type="email" placeholder="email" name="email" />
    <input type="password" placeholder="password" name="password" />
    <input type="submit" class="button" value="login">
   <!-- <p class="message">Not registered? <a
        href="#">Create an account</a></p> -->
</form>
</div>
</div>

@endsection