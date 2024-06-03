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
    <h1>Connexion</h1>
    <form action="{{ route('inserer') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div>
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
            @if ($errors->has('mot_de_passe'))
                <div class="error text-danger">{{ $errors->first('mot_de_passe') }}</div>
            @endif
        </div>
        {{-- <div>
            <label for="mot_de_passe_confirmation">Confirm mot_de_passe</label>
            <input type="mot_de_passe" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" required>
        </div> --}}
        <button type="submit">Se connecter</button>
        <button type="submit"><a href="{{ route('inscrire') }}">S'inscrire</a></button>
    </form>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>