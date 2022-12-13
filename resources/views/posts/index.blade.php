@extends('layouts.app')
@section('title', 'Liste des posts')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card shadow rounded">
                <div class="card-header d-flex justify-content-between">
                    <h5>Liste des posts</h5>
                    <a href="{{ route('post.create') }}" class="btn btn-dark btn-sm">Ajouter un post</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <img src="{{ asset($post->image) }}" alt="" width="70">
                                    {{ \Str::limit($post->title, 10) }}
                                </td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('post.edit', encrypt($post->id)) }}" class="btn btn-success btn-sm">Modifier</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}" >Supprimer</button>
                                    <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                              <h4 class="modal-title fs-5 text-white" id="exampleModalLabel">Confirmation de suppression</h4>
                                              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                                            </div>
                                            <div class="modal-body">
                                              Voulez-vous vraiment supprimer le post : {{ $post->title }}
                                            </div>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                                  </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
