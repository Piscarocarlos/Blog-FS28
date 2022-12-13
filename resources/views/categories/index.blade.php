@extends('layouts.app')
@section('title', 'Liste des catégories')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <div class="card shadow rounded">
                <div class="card-header d-flex justify-content-between">
                    <h5>Liste des catégories</h5>
                    <a href="{{ route('category.create') }}" class="btn btn-dark btn-sm">Ajouter une catégorie</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date de création</th>
                            <th scope="col">Date de mise à jour</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('category.edit', encrypt($category->id)) }}" class="btn btn-success btn-sm">Modifier</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $category->id }}" >Supprimer</button>
                                    <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                              <h4 class="modal-title fs-5 text-white" id="exampleModalLabel">Confirmation de suppression</h4>
                                              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                                            </div>
                                            <div class="modal-body">
                                              Voulez-vous vraiment supprimer la catégorie : {{ $category->name }}
                                            </div>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
