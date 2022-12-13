<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blog 3WA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('home_page') }}">Accueil</a>
                    <a class="nav-link" aria-current="page" href="{{ route('category.index') }}">Catégories</a>
                    <a class="nav-link" aria-current="page" href="{{ route('post.index') }}">Articles</a>
                    <a class="nav-link" aria-current="page" href="#">Contact</a>
                </div>
            </div>
        </div>
    </nav>
</header>
