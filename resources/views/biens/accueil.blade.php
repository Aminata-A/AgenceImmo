<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence Immo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px; /* Taille uniforme pour les images */
            object-fit: cover; /* Pour que les images remplissent l'espace de manière appropriée */
        }
        .card {
            height: 100%; /* Assurez-vous que toutes les cartes ont la même hauteur */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .status-button {
            margin-bottom: 10px; /* Pour séparer le bouton du lien */
        }
    </style>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light d-flex justify-content-around px-4">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">AgenceImmo</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link"href="{{ route('accueil') }}"">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Biens</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('ajout') }}">Ajouter un bien</a>
                  </li>
                  
                  
                </ul>
               
                    
                
              </div>


            </div>
             <div>
                    <button class="btn btn-outline-success" type="submit">Connexion</button>
                </div>
          </nav>
    </header>
    <div class="container mt-5">
        <h1>Accueil</h1>
        <div class="container mt-5">
            <div class="row">
                @foreach ($biens as $bien)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ $bien->image }}" class="card-img-top" alt="salon duplex">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bien->nom }}</h5>
                                <p class="card-text">{{ $bien->created_at->format('d/m/Y') }}</p>
                                <div class="status-button">
                                    @if ($bien->statut == 1)
                                        <p class="btn btn-outline-danger">Vendu</p>
                                    @else
                                        <p class="btn btn-outline-success">Disponible</p>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between">
                                <a href="{{ route('detail', $bien->id) }}" title="Voir détails">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            <a href="{{ route('suppression', $bien->id) }}" title="Supprimer"
                                class="delete text-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>