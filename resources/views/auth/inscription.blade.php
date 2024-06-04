<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
   
<div class="container mt-5">
    <h1>Inscription</h1>
    <form action="{{ route('enregistrement') }}" method="POST">
        @csrf
        <div class="mb-3 col-5">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required value="{{ old('nom') }}">
            @if ($errors->has('nom'))
                <div class="error text-danger">{{ $errors->first('nom') }}</div>
            @endif
        </div>
        <div class="mb-3 col-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3 col-5">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="mot_de_passe" required>
            @if ($errors->has('mot_de_passe'))
                <div class="error text-danger">{{ $errors->first('mot_de_passe') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
