@extends('layouts.master', ['menu' => '49'])
@section('title', 'Stagiaires backup')
@section('content')
    <h1>Hello admin!</h1>
    {{ Auth::user()->name }}
    <br>
    {{ Auth::user()->email }}
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="btn btn-success">logout</button>
    </form>
@endsection
