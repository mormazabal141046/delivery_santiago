<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

header('Content-type: application/json');


require("class.phpmailer.php");
require("class.smtp.php");

$post = json_decode(file_get_contents('php://input'), true);
$date = new DateTime();
$date->modify('-3 hours');
$date_format = $date->format("H:i:s d-m-Y");
$nombre = $post['nombre'];
$email = $post['email'];

// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "mail.delivery-santiago.cl";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "contacto@delivery-santiago.cl";  // Mi cuenta de correo
$smtpClave = "Ternerito2020";  // Mi contrase�a


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $smtpUsuario; // Email desde donde env�o el correo.
$mail->FromName = "Delivery Santiago";
$mail->AddAddress($email); // Esta es la direcci�n a donde enviamos los datos del formulario

$mail->Subject = "[Consulta Web] Delivery Santiago"; // Este es el titulo del email.
// $mensajeHtml = nl2br($mensaje);
$mail->Body = '

<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
      /* FONTS */
        @media screen {
          @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 400;
            src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
          }
          
          @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 700;
            src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
          }
          
          @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 400;
            src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
          }
          
          @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 700;
            src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
          }
        }
        
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* RESET STYLES */
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>
  </head>
  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#212121" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="480" >
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                            <a href="http://www.delivery-santiago.cl" target="_blank">
                                <img alt="Logo" src="http://www.delivery-santiago.cl/img/Logo_white_email.png"  style="height:125px; display: block; z-index: 400;" border="0">
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#212121" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="480" >
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px; border-radius: 25px 25px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                          <h1 style="font-size: 32px; font-weight: 400; margin: 0; text-align: center;">Consulta<br> Enviada</h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
          <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 20px 40px 10px 40px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px; text-align: justify;" >
                    <p style="margin: 0; text-align: center;">Hola <b>'.$nombre.'</b>,<br> Gracias por contactarte con nosotros. Pronto atenderemos todas tus consultas.</p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 20px 40px 30px 40px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 25px; text-align: justify;" >
                    <p style="margin: 0; text-align: center;">
                        Siguenos en nuestras redes sociales<br>
                        <a href="https://www.instagram.com/delivery.santiago_/" target="_blank"><img src="http://www.delivery-santiago.cl/img/icons/instagram.png" alt="Instagram" style="width: 35px;"></a>
                        <a href="https://www.facebook.com/Deliverysantiago_-111051483952543" target="_blank"><img src="http://www.delivery-santiago.cl/img/icons/facebook.png" alt="Instagram" style="width: 35px;"></a>
                    </p>
                    <p style="margin: 0; text-align: center;">
                        Comunicate directamente<br>
                        <a href="https://wa.me/56935164028?text=Hola *Delivery%20Santiago*,%20me%20interesa%20en%20realizar%20una%20encomienda%20por%20favor." target="_blank"><img src="http://www.delivery-santiago.cl/img/icons/whats.png" alt="Instagram" style="width: 35px;"></a>
                    </p>
                    </td>
                </tr>
            </table>
          </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 40px 10px 40px; ">
                <table border="0" cellpadding="0" cellspacing="0" width="480" >
                    <tr>
                      <td bgcolor="#b81025" align="left" style="padding: 0px 30px 20px 30px; border-radius: 0px 0px 25px 25px; color: #ffffff; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 25px; text-align: justify;" >
                        <p style="margin: 0; text-align: center;"><br>Todos los derechos reservados Delivery Santiago, Chile 2020-2021.</p>
                      </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

  </body>
</html>

<br />'; // Texto del email en formato HTML
// $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    http_response_code(200);
    $response ="Enviado";
    echo json_encode($response);
    return;
} else {
    http_response_code(400);
    $response ="Error";
    echo json_encode($response);
    return;
}
?>
