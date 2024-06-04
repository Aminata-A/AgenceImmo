<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
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
                            <a class="nav-link btn btn-success text-white" href="{{ route('login') }}">Je suis du personnel</a>
                        </div>
                        @endguest
                    </div>
                    
                </div>
            </div>
        </nav>
    </header>
   <div class="container mt-5">
    <h1>Mise à jour d'un bien</h1>
    <form action="{{ route('biens.traiter', $bien->id) }}" method="POST">
        @auth
        <input type="hidden" name="personnel_id" value="{{ auth()->user()->id }}"> 
        @endauth
        
        @csrf
        <div class="d-flex justify-content-between">
            <div class="mb-3 col-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ $bien->nom }}">
                @if ($errors->has('nom'))
                <div class="error text-danger">{{ $errors->first('nom') }}</div>
            @endif
              </div>
              <div class="mb-3 col-5">
                  <label for="categorie" class="form-label">Catégorie</label>
                  <input type="text" name="categorie" class="form-control" id="categorie" value="{{ $bien->categorie }}">
                  @if ($errors->has('categorie'))
                <div class="error text-danger">{{ $errors->first('categorie') }}</div>
            @endif
                </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="mb-3 col-6 ">
                <label for="image" class="form-label">Url de l'image</label>
                <input type="text" name="image" class="form-control" id="image" value="{{ $bien->image }}">
                @if ($errors->has('image'))
                <div class="error text-danger">{{ $errors->first('image') }}</div>
            @endif
              </div>
              <div class="mb-3 col-5">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" name="adresse" class="form-control" id="adresse" value="{{ $bien->adresse }}">
                  @if ($errors->has('adresse'))
                <div class="error text-danger">{{ $errors->first('adresse') }}</div>
            @endif
                </div>
        </div>
        
            <div class="mb-3 col-12 ">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $bien->description }}</textarea>
                @if ($errors->has('description'))
                <div class="error text-danger">{{ $errors->first('description') }}</div>
            @endif
              </div>
        
              <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="flexRadioDefault1" value="1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Vendu
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="flexRadioDefault2" value="0" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Disponible
                </label>
            </div>
        <button type="submit" class="btn btn-primary mt-2">Modifier</button>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>