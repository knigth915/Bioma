<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación</title>
    
    <!-- Bootstrap CSS (Opcional si usas Bootstrap) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos adicionales -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #layoutSidenav_nav {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 10px;
        }
        .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }
        .sb-nav-link-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Inicio -->
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                        Inicio
                    </a>

                    <div class="sb-sidenav-menu-heading">Contenido</div>

                    <!-- Animales -->
                    <a class="nav-link" href="{{ route('animales') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-horse"></i></div>
                        Animales                            
                    </a>

                    <!-- Continentes -->
                    <a class="nav-link" href="{{ route('continentes') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-globe"></i></div>
                        Continentes
                    </a>

                    <!-- Ecosistemas -->
                    <a class="nav-link" href="{{ route('ecosistemas') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-tree"></i></div>
                        Ecosistemas
                    </a>

                    <!-- Vegetación -->
                    <a class="nav-link" href="{{ route('vegetaciones') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-seedling"></i></div>
                        Vegetación
                    </a>
                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>

    <!-- Bootstrap JS (Opcional si usas Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
