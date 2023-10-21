@extends('layouts.app')
@section('title', 'Upload cv')
@section('content')
    <div class="container-xxl bg-white p-0">
        <div class="centered-content">
            <p class="fs-4">Bonjour {{ auth('stagiaire')->user()->prenom }} {{ auth('stagiaire')->user()->nom }}</p>
            <form method="POST" action="{{ route('profile.cvUpload') }}" enctype="multipart/form-data" class="custom-input">
                @csrf
                <input class="form-control" type="file" name="cv" accept=".pdf, .doc, .docx">
                @error('cv')
                    {{ $message }}
                @enderror
                <button class="btn btn-primary mb-3 mx-5" type="submit" style="margin-top: 10px;">Envoyer CV</button>
            </form>
        </div>
    </div>
@endsection
