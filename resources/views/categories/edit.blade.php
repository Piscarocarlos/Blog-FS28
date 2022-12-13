@extends('layouts.app')
@section('title', 'Modifier une catégorie')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <div class="card shadow rounded">
            <div class="card-header d-flex justify-content-between">
                <h5>Modifier une catégorie</h5>
            </div>
            <div class="card-body">
               <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Nom de la catégorie</label>
                        <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ajouter votre nom">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark w-100">Mofifier une catégorie</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
