<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail de : {{ $bien->nom }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="mb-5">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
            <div class="container">
                <a class="navbar-brand" href="#">AgenceImmo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Biens</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ajout') }}">Ajouter un bien</a>
                    </li>
                    @endauth
                </ul>
                <div class="navbar-nav">
                    @auth
                    <div class="nav-item">
                        <span class="nav-link">{{ auth()->user()->nom }}</span>
                    </div>
                    <div class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-danger">Se déconnecter</button>
                        </form>
                    </div>
                    @endauth
                    @guest
                    <div class="nav-item">
                        <a class="nav-link btn btn-light text-primary" href="{{ route('login') }}">Je suis du personnel</a>
                    </div>
                    @endguest
                </div>
                
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <h1>Détails</h1>
    <div class="card">
        <div class="card-header">
            <h1>{{ $bien->nom }}</h1>
        </div>
        <div class="d-flex">
            
            <img src="{{ $bien->image }}" class="card-img-top w-50 mx-auto" alt="salon duplex">
            
            <div class="card-body">
                
                <div class="content">
                    <h2>Description</h2>
                    {{$bien->description}}
                </div>
                <hr>
                
                <p>Date de publication: {{ $bien->created_at->format('d/m/Y') }}</p>
                <p>Adresse de localisation : {{ $bien->adresse }}</p>
                <p>Catégorie : {{ $bien->categorie }}</p>
                
            </div>
        </div>
        
        <div class="card-footer text-right">
            <div>
                @if ($bien->statut == 1)
                <p class="btn btn-outline-danger">vendu</p>
                @else
                <p class="btn btn-outline-success">disponible</p>
                @endif
            </p>
            
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('accueil') }}" class="btn btn-primary">Retour à la liste des articles</a>
            @auth
            <a href="{{ route('modification', $bien->id) }}" class="btn btn-warning">Modifier</a>
            @endauth
            
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-comment"></i> Commentaires</h1>
            <div class="mt-4">
                @foreach($commentaires as $commentaire)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $commentaire->auteur }}</h5>
                        <p class="card-text">{{ $commentaire->contenu }}</p>
                        <p class="card-text"><small class="text-muted">{{ $commentaire->created_at->format('d/m/Y H:i') }}</small></p>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col">
                        {{ $commentaires->links() }}
                    </div>
                </div>
            </div>
        </div>
        <form class="col-6" action="{{ route('insertion', $bien->id)}}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="auteur" class="form-label">Présentez-vous</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value="{{ old('auteur') }}">
                    @if ($errors->has('auteur'))
                    <div class="error text-danger">{{ $errors->first('auteur') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="commentaire" class="form-label">Donner votre avis</label>
                    <textarea class="form-control" id="commentaire" name="contenu">{{ old('contenu') }}</textarea>
                    @if ($errors->has('contenu'))
                    <div class="error text-danger">{{ $errors->first('contenu') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>