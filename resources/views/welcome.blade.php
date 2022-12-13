@extends('layouts.app')
@section('title', 'Accueil')


@section('content')

<div class="album py-5">
<div class="container">

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($posts as $post)
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset($post->image) }}" alt="">
        <div class="card-body">
          <h5>{{ $post->title }}</h5>
          <p class="card-text">{!! limit_text($post->content, 20) !!}</p>
          <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('post.details', $post->slug) }}" class="btn btn-secondary btn-sm">Read More</a>
            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
@endsection
