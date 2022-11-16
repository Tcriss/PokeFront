<?php

include('../db/main.php');

$usuario = getUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="../style/normalize.css" rel="stylesheet">
    <link href="../style/home.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
</head>
<body>
    <nav class="navbar1">
        <div class="container-fluid bar">
            <img src="../style/multimedia/pokemon_title.png" alt="Bootstrap" width="80" height="40">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"><?php echo"{$usuario->nombre} {$usuario->apellido}";?></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><?php echo"{$usuario->nombre} {$usuario->apellido}";?></a></li>
                    <li><a class="dropdown-item" href="#"><?php echo"{$usuario->correo}";?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../index.php">Cerrar Sesion</a></li>
                </ul>
            </li>
            <br>
        </div>
    </nav>
    <br>
    <div class="events">
        <h3>Eventos</h3>
        <div class="event">
            <?php
                $rs = sendRequest('http://localhost/pokeAPI/actions/eventos.php');
                $eventos = $rs->datos;
                foreach($eventos as $event){
                    echo "
                    
                    <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$event->titulo}</h5>
                            <p class='card-text'>{$event->contenido}</p>
                            <h6>$event->fecha</h6>
                        </div>
                    </div>
                    
                    ";
                }
            
            ?>
        </div>
    </div>
    <br>
    <div class="pokemones">
        <div class="head"><h3>Tus Pokemones</h3><a href="pokemons.php"><i class="fi fi-sr-add"></i></a></div>
        <div class="pokemon_list">
            <?php
                $rs = sendRequest('http://localhost/pokeAPI/actions/mis_pokemones.php', ['token'=>$usuario->token]);
                $pokemons = $rs->datos;
                foreach($pokemons as $pokemon){
                    echo <<<POKEMON
                        <div class='card' style='width: 18rem;'>
                            <div class="card-body">
                            <h5 class="card-title">{$pokemon->nombre}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nv. {$pokemon->nivel}</h6>
                            <p class="card-text">{$pokemon->comentario}</p>
                            <h6 class="card-subtitle mb-2 text-muted">{$pokemon->tipo}</h6>
                            </div>
                        </div>
                    POKEMON;
                }
            ?>
        </div>
    </div>
</body>
</html>