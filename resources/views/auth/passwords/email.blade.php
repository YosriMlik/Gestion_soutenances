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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Réinitialiser Le Mot de Passe</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer Un Lien De Réinitialisation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
