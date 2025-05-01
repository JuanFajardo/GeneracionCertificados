<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="habock.com.bo">
        <meta name="author" content=" Juan Fajardo">
        <link rel="shortcut icon" type="image/x-icon" href="{{('assets/images/rueda.png'); }}">
        <title> HaBock </title>
        <link href="{{asset('assets/css/bootstrap.min.css'); }}" rel="stylesheet">
        <link href="{{asset('assets/css/bootstrap-icons.css'); }}" rel="stylesheet">
        <link href="{{asset('assets/css/templatemo-kind-heart-charity.css'); }}" rel="stylesheet">
        <link href="{{asset('assets/css/dataTables.bootstrap.css'); }}" rel="stylesheet">
        <link href="{{asset('assets/css/jquery.dataTables.min.css'); }}" rel="stylesheet">
    </head>
    <body id="section_1">
        <header class="site-header d-lg-block d-none" style="background-color:#38709b;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 ms-auto d-flex"></div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{('index.php'); }}">
                    <img src="{{asset('assets/images/logo.png'); }}" alt="Logo HaBock" width="70">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="{{('index.php'); }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Menu 1</a></li>
                                <li><a class="dropdown-item" href="#">Sub Menu1</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>        
            </div>
        </nav>

        <main>
        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-left mb-4 mt-5">
                        <h2>@yield('titulo')</h2>
                        <hr style="width:100px; height:2px; background:rgb(15, 38, 114)">
                    </div>
                </div>
                <div class="row">
                  @yield('cuerpo')
                </div>
            </div>
        </section>
        </main>
        
        <footer class="site-footer" style="background-color:#38709b;"> 
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <h6 class="mb-3">HaBock</h6>
                        <hr style="width:230px; height:3px; background:rgb(255, 255, 255)">
                        <p  class="text-white  texto-justificado mt-3" >
                            Comunidad de Hacking Etico Bolivia
                            <br>Con el apoyo de los mejores profesionales en seguridad
                        </p>
                    </div>
                    
                </div>
            </div>
        </footer>

        <script src="{{asset('assets/js/jquery.min.js'); }}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js'); }}"></script>
        <script src="{{asset('assets/js/popper.min.js'); }}"></script>
        <script src="{{asset('assets/js/jquery.sticky.js'); }}"></script>
        <script src="{{asset('assets/js/click-scroll.js'); }}"></script>
        <script src="{{asset('assets/js/counter.js'); }}"></script>
        <script src="{{asset('assets/js/custom.js'); }}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js'); }}"></script>
        @yield('js')
    </body>
</html>