<?php
// /* Inicializamos la sesión y le añadimos 'data' en caso que no lo tenga ya */
// // session_start();
// if ( !isSet($_SESSION['data']) ) $_SESSION['data']=array();
 
// /* Leemos los parámetros enviados por post */
// $post = json_decode(file_get_contents('php://input'), true);
 
// /* Si de los parámetros enviados encontramos 'nombre' añadimos el registro a la sesión */
// // if ( isSet( $post["nombre"] ) ) {
// //     array_push( $_SESSION['data'], array( "nombre"=>$post["nombre"], "telefono"=>$post["telefono"] ) );
// //     }
 

// echo "Enviado";
// echo "Fail";
// /* Devolvemos el listado de datos de la sesión. */
// // echo json_encode( $_SESSION['data'] );

// header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
//     $response = array();
//     $response[0] = array(
//         'id' => '1',
//         'value1'=> 'value1',
//         'value2'=> 'value2'
//     );
//     http_response_code(201);


// echo json_encode($response); 



header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


// require("class.phpmailer.php");
// require("class.smtp.php");

$post = json_decode(file_get_contents('php://input'), true);

if(isset($post["nombre"]) && $post["nombre"] != ""){
    http_response_code(200);
    $response ="Nombre OK";
    echo json_encode($response);
    return;
}else{
    http_response_code(412);
    $response ="Nombre OK";
    echo json_encode($response);
    return;
}


echo "Fuera de if Else";
?>