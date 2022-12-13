@extends('layouts.app')
@section('title', 'Ajouter un post')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <div class="card shadow rounded">
            <div class="card-header d-flex justify-content-between">
                <h5>Ajouter un post</h5>
            </div>
            <div class="card-body">
               <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group mb-3">
                        <label for="title">Titre du post</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Ajouter votre titre">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image du post</label>
                        <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" placeholder="Ajouter votre titre">
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="category_id">Choisissez la catégorie du post</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Contenu</label>
                        <textarea class="ckeditor form-control" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark w-100">Ajouter un post</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
