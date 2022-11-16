<?php

include('db/main.php');
$ms = '';
if ($_POST){
    $rs = login($_POST['correo'],$_POST['clave']);
    if($rs->exito){
        header('Location:sections/home.php');
    }else{
        $ms = $rs->ms;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="style/normalize.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
</head>
<body>
    <main>
        <form method="post">
            <img src="style/multimedia/pokemon_title.png" alt="" width="300" height="150">
            <h1 class="h3 mb-3 fw-normal">Bienvenido</h1>
            <div class="form-floating">
                <input type="email" class="form-control" name="correo" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" name="clave" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
            </div>
            <br>
            <div class="text-danger"><?= $ms; ?></div>
            <div class="buttons">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>
                <button class="w-100 btn btn-lg btn-secondary"><a href="sections/singin.php">Registrarse</a></button>
            </div>
        </form>
    </main>
</body>
</html>