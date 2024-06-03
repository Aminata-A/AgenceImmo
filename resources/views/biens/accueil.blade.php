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
        <nav class="navbar navbar-expand-lg bg-light d-flex justify-content-around px-4">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">AgenceImmo</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link"href="#">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Biens</a>
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
    <div class="card mt-5" style="width: 18rem;">

        @foreach ($biens as $bien)

        <img src="{{ $bien->image }}" class="card-img-top" alt="salon duplex">
        <div class="card-body">
          <h5 class="card-title">{{ $bien->nom }}</h5>
          <p class="card-text">{{ $bien->created_at }}</p>
         <div>
            @if ($bien->statut == 1)
            <p class="btn btn-outline-danger">vendu</p>
        @else
            <p class="btn btn-outline-success">disponible</p>
        @endif
         </div>
          <a href="#" class="btn btn-primary">Voir détails</a>
        </div>
            
        @endforeach
      </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>