@extends('layouts.master', ['menu' => '33'])
@section('title', 'Inscription')
@section('content')

    <!-- Debut Invitation  -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h2 class="display-3 text-white mb-3 animated slideInDown">Invitation</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Inscription</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Imprimer invitation</li>
                </ol>
            </nav>
        </div>
    </div>
    <BR><BR><BR><BR>

    <!-- Fin Invitation  -->

@endsection

<!-- Aller en haut -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
