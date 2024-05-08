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

    <title>Vérification</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifiez Votre Adresse E-Mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                        </div>
                    @endif

                    <p>Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. Si vous n'avez pas reçu l'e-mail,</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">cliquez ici pour en demander un autre</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
