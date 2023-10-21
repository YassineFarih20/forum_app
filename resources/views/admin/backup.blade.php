@extends('layouts.master', ['menu' => '49'])
@section('title', 'Stagiaires backup')
@section('content')

    <form action="{{ route('admin.backup.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Import</button>
    </form>

    @if (session()->has('success'))
        <div class="w-50 alert alert-success m-auto mt-5"> {{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.backup.export') }}">Export</a>
@endsection
