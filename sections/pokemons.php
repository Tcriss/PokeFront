<?php


include('../db/main.php');

$usuario = getUsuario();

if($_POST){
    $_POST['token'] = $usuario->token;
    $rs = sendRequest('http://localhost/pokeAPI/actions/registro_pokemon.php', $_POST);
    if($rs->exito){
        echo "<div class='alert alert-sucess'>Pokemon registrado</div>";
    }else{
        echo "<div class='alert alert-danger'>{$rs->ms}</div>";
    }
    echo"
        <a class='alert' href='home.php' class='btn btn-success'>Mis Pokemon</a>
    ";

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon - registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="../style/normalize.css" rel="stylesheet">
    <link href="../style/home.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar bg-dark" style="width: 100%;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../style/multimedia/pokemon_title.png" alt="Bootstrap" width="110" height="40">
            </a>
        </div>
    </nav>
    <div class="form">
        <form method="post">
            <div class="row">
                <div class="form-floating col mb-3">
                    <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating col">
                    <input type="text" name="nivel" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Nivel</label>
                </div>
            </div>
            <div class="row">
                <div class="form-floating col">
                    <input type="text" name="tipo" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Tipo</label>
                </div>
                <div class="form-floating col">
                    <input type="text" name="comentario" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Comentario</label>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>