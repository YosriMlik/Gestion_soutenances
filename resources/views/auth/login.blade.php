<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Nunito+Sans:opsz,wght@6..12,500&family=Open+Sans:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/bootstrap-5.3.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/bootstrap-icons-1.10.5/font/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{ url('/sweetalert/cdn.jsdelivr.net_npm_sweetalert2@11.7.26_dist_sweetalert2.min.css') }}">

    <link rel="icon" href="{{ url('/images/IIT2.png') }}">

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">

    <title>Log In</title>
</head>
<body>
    <div class="">
        <form action="{{ route('login') }}" class="shadow-lg forme-authentification mx-auto" method="post">
            @csrf
            <h1 class="text-center" style="font-size: 2.7rem">Se connecter</h1>
            <br>
            <!--div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div-->
            <label for="username">Email</label>
            <input id="email" type="email" class="form-control input_ @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" class="form-control input_ @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Rappelle Moi') }}
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-100 btn btn-primary rounded-pill">
                {{ __('Connecter') }}
            </button>
            @if (Route::has('password.request'))
                <div class="mt-3 ms-1">
                    <a href="{{ route('password.request') }}">
                        {{ __('récupérer le mot de passe') }}
                    </a>
                </div>
            @endif
            <br> <br>
        </form>
    </div>
</body>

