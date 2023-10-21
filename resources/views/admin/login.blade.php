@extends('layouts.app')
@section('title', 'Login Admin')
@section('content')

    <div class="login-page">
        <h1 class="title-loginA">Hey Admin!</h1>
        <div class="form">
            <form id="admin_login__form" class="login-form" action="{{ route('admin.handleLogin') }}" method="POST">
                @csrf
                <input class="@error('email') invalid @enderror" type="email" placeholder="email" name="email" />

                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <input class="@error('password') invalid @enderror" type="password" placeholder="password"
                    name="password" />
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <input type="submit" class="button" value="login">
            </form>
        </div>
    </div>

@endsection
