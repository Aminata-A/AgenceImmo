<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence Immo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         .carousel-caption h5 {
            font-size: 4rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .carousel-caption p {
            font-size: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
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
                        <a class="nav-link" href="{{ route('biens') }}">Biens</a>
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

<section >
    <div >
        <div>
        <img class="d-block w-100" style="height: 100vh" src="https://i.f1g.fr/media/eidos/805x453_crop/2022/02/25/XVMbb611c8c-9561-11ec-b001-059cef568df6.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h5>Bienvenue</h5>
            <p>Explorez nos magnifiques biens immobiler avec des espaces lumineux et modernes.</p>
        </div>
    </div>
    </div>
</section>

<div class="container mt-5">
    <div class="container mt-5">
        <div class="row">
            @foreach ($biens as $bien)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $bien->image }}" class="card-img-top" alt="salon duplex">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bien->nom }}</h5>
                        <p class="card-text">{{ $bien->created_at->format('d/m/Y') }}</p>
                        <div class="status-badge">
                            @if ($bien->statut == 1)
                            <span class="badge bg-danger">Occupé</span>
                            @else
                            <span class="badge bg-success">Disponible</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('detail', $bien->id) }}" class="btn btn-primary" title="Voir détails">
                                <i class="fas fa-home"></i> Détails
                            </a>
                            @auth
                            <a href="{{ route('suppression', $bien->id) }}" class="btn btn-danger" title="Supprimer"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $biens->links() }}
            </div>
        </div>
    </div>
    
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>