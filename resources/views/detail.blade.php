@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="rounded shadow mt-5">
                <img src="{{ asset($post->image) }}" alt="" class="rounded w-100">
            </div>
            <h3 class="mt-3">
                {{ $post->title }}
            </h3>
            <div class="d-flex justify-content-between">
                <div class="badge bg-primary">
                    {{ $post->category->name }}
                </div>
                <p class="font-italic">
                    Mise en ligne, {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
            <hr>
            <div class="mt-5">
                {!! $post->content !!}
            </div>

            <div class="my-5">
                <h5 class="mt-5">Laissez un commentaire</h5>
                <form action="">
                    <div class="form-group">
                        <textarea name="" id="" rows="6" placeholder="Votre commentaire ici.." class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-dark">Envoyer mon commentaire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
