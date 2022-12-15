@extends('layouts.app')
@section('title', 'Page de contact')


@section('content')
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body">
                    <form action="{{ route('contact') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Votre nom complet</label>
                            <input type="text" placeholder="ENtrer votre nom complet" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Votre email</label>
                            <input type="email" placeholder="ENtrer votre nom complet" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Votre sujet</label>
                            <select name="sujet" id="sujet" class="form-select @error('sujet') is-invalid @enderror">
                                <option value="Je n'arrive à me connecter">Je n'arrive à me connecter</option>
                                <option value="Parler à l'administrateur">Parler à l'administrateur</option>
                            </select>
                            @error('sujet')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Contenu de votre contact</label>
                            <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror" placeholder="Votre message ici.."></textarea>
                            @error('content')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button class="btn btn-dark">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
