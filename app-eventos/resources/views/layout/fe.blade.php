<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <header>
        <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">HDC </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/events/create">Criar Eventos</a>
              </li>
            @auth
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">Meus Eventos</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                @csrf
                   <a class="nav-link"
                   href="/logout"
                   onclick="event.preventDefault();
                   this.closest('form').submit();">
                   Sair
                    </a>
                </form>
            </li>
            @endauth

              @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/register">Cadastrar</a>
                </li>
              @endguest

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">

                @if (session('msg'))

                <div class="alert alert-success mt-2 text-center">{{session('msg')}}</div>

                @endif
                @yield('content') <!--secção do conteudo, será encaixado o conteudo que quisermos. -->
            </div>
        </div>
    </main>






      <!-- FOOTER -->
    <footer>
             <section class="p-3 pt-0">
            <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-7 col-lg-8 text-center text-md-start">
                <!-- Copyright -->
                <p class="p-3">
                HCD Events
                </p>
                <!-- Copyright -->
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                <!-- Facebook -->
                <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="bi bi-linkedin"></i></i
                ></a>


                <!-- Twitter -->
                <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="bi bi-facebook"></i></a>

                <!-- Google -->
                <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="bi bi-google"></i></a>

                <!-- Instagram -->
                <a
                class="btn btn-outline-light btn-floating m-1"
                class="text-white"
                role="button"
                ><i class="bi bi-instagram"></i></a>
            </div>
            <!-- Grid column -->
            </div>
        </section>
        <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
<!-- End of .container -->
      <script src="./js/app.js"></script>
</body>
</html>
