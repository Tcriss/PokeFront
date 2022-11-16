<?php

include('../db/main.php');
if ($_POST){
    $rs = singin($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['pw']);
    var_dump($rs); exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon - Registrate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="../style/normalize.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
    <main class="sigin_form">
        <form method="post">
            <img src="../style/multimedia/pokemon_title.png" alt="" width="300" height="150">
            <h1 class="h3 mb-3 fw-normal">Se uno de nuestros maestros!</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="nombre" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="apellido" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Apellido</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="correo" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="pw" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <br>
            <div class="checkbox mb-3">
                <!-- <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label> -->
            </div>
            <div class="buttons">
                <button class="w-100 btn btn-lg btn-secondary"><a href="../index.php">Regresar</a></button>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Registrate</button>
            </div>
        </form>
    </main>
</body>
</html>