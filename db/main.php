<?php
session_start();

function login($user, $clave){

    $rs = sendRequest('http://localhost/pokeAPI/actions/iniciar_sesion.php', array('correo'=>$user,'clave'=>$clave));
    if($rs->exito){
        $_SESSION['user'] = $rs->datos;
    }
    return $rs;
}

function singin($name,$lastname,$email,$pw){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/pokeAPI/actions/registrar_maestro.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('correo' => $email,'clave' => $pw,'nombre' => $name,'apellido' => $lastname),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo"<script>alert('{$response}');</script>";
    header("location: ../index.php");
}

function sendRequest($url, $data=[]){
    $tmp = [];
    if(is_object($data)){
        
        foreach($data as $key => $value){
            $tmp[$key] =  $value;
        }

        $data = $tmp;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $response = json_decode($response);

    return $response;

}

function getUsuario(){
    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    }
}