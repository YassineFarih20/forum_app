@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">

        <h1>Hello admin!</h1>
        {{ Auth::user()->name }}
        <br>
        <ul>
            <li><a href="{{ route('stagiaires.index') }}">Stagiaire</a></li>
            <li><a href="{{ route('admin.backup.index') }}">Stagiaire backup</a></li>
        </ul>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="btn btn-success">logout</button>
        </form>
    </div>
@endsection
