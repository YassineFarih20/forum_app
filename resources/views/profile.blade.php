@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="m-5">
        @auth('stagiaire')
            <p> Prenom : {{ auth('stagiaire')->user()->prenom }} </p>
            <p> Nom : {{ auth('stagiaire')->user()->nom }} </p>
            <p> CIN : {{ auth('stagiaire')->user()->CIN }} </p>
            <p> Filiere : {{ auth('stagiaire')->user()->filiere }} </p>
            <p> cv : {{ auth('stagiaire')->user()->cv }} </p>
        @endauth
    </div>
@endsection
