<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>K-Means</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/cover.css') }}" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0"> Clustering BIJI KOPI</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Contact</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Welcome To Clustering BIJI KOPI</h1>
            <p class="lead">Setelah Anda memiliki data biji kopi, Anda dapat menggunakan kode implementasi K-Means
                yang telah saya berikan sebelumnya untuk mengelompokkan biji kopi ke dalam cluster berdasarkan
                atribut-atribut tersebut.</p>
            <div class="row">
                <div class="col">
                    <p class="lead">
                        <a href="{{ route('login') }}"
                            class="btn btn-lg btn-secondary fw-bold border-white bg-white">{{ __('Login ') }}</a>
                    </p>
                </div>
                <div class="col">
                    <p class="lead">
                        <a href="{{ route('register') }}"
                            class="btn btn-lg btn-secondary fw-bold border-white bg-white">{{ __('Register ') }}</a>
                    </p>
                </div>
            </div>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Created By <a href="https://www.linkedin.com/in/fpurnahar/" class="text-white">Fadhil Purnahar</a>.
            </p>
        </footer>
    </div>
</body>

</html>
