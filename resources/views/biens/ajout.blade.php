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
    <h1>Ajout d'un nouveau bien</h1>
    <form action="{{ route('sauvegarde') }}" method="post">
        <input type="hidden" name="personnel_id" value="1">
        @csrf
        <div class="d-flex justify-content-between">
            <div class="mb-3 col-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom">
              </div>
              <div class="mb-3 col-5">
                  <label for="categorie" class="form-label">Catégorie</label>
                  <input type="text" name="categorie" class="form-control" id="categorie">
                </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="mb-3 col-6 ">
                <label for="image" class="form-label">Url de l'image</label>
                <input type="text" name="image" class="form-control" id="image">
              </div>
              <div class="mb-3 col-5">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" name="adresse" class="form-control" id="adresse">
                </div>
        </div>
        
            <div class="mb-3 col-12 ">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description"></textarea>
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
        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>