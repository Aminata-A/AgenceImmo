<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agence Immo - Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 20px;
            border-color: #ced4da;
        }
        .btn-primary {
            border-radius: 20px;
            padding: 10px 30px;
            font-weight: bold;
        }
        .error {
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Inscription</h1>
    <form action="{{ route('enregistrement') }}" method="POST">
        @csrf
        <div class="mb-3 col-md-6 offset-md-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom"  value="{{ old('nom') }}">
            @if ($errors->has('nom'))
                <div class="error text-danger">{{ $errors->first('nom') }}</div>
            @endif
        </div>
        <div class="mb-3 col-md-6 offset-md-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3 col-md-6 offset-md-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="mot_de_passe">
            @if ($errors->has('mot_de_passe'))
                <div class="error text-danger">{{ $errors->first('mot_de_passe') }}</div>
            @endif
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
            <a href="{{ route('login') }}" class="btn btn-link">Se connecter</a>

        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
