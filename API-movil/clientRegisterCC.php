<?php

if(empty($_REQUEST['name']) && empty($_REQUEST['lastname']) && empty($_REQUEST['zip']) && empty($_REQUEST['city']) && empty($_REQUEST['cell']) && empty($_REQUEST['genre']) && empty($_REQUEST['mail'])){

    $return['status'] = '400';
    $return['message'] = 'Falta información requerida';
    echo json_encode($return);
    return;

}else{
    
    $name = html_entity_decode($_REQUEST['name'], ENT_QUOTES, "UTF-8");
    $lastname = html_entity_decode($_REQUEST['lastname'], ENT_QUOTES, "UTF-8");
    $suburb = html_entity_decode($_REQUEST['suburb'], ENT_QUOTES, "UTF-8");
    $zip = htmlentities($_REQUEST['zip']);
    $town = html_entity_decode($_REQUEST['town'], ENT_QUOTES, "UTF-8");
    $city = html_entity_decode($_REQUEST['city'], ENT_QUOTES, "UTF-8");
    $cell = htmlentities($_REQUEST['cell']);
    $age = htmlentities($_REQUEST['age']);
    $genre = htmlentities($_REQUEST['genre']);
    $mail = htmlentities($_REQUEST['mail']);
    $event = html_entity_decode($_REQUEST['event'], ENT_QUOTES, "UTF-8");
    $ccID = htmlentities($_REQUEST['ccID']);

    require('secure/acceso.php');
    $access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
    //$access = new acceso('localhost', 'root', 'root', '65MappConcierge2020');

	$access->conecta();
    
    $recordClient = $access->recordClient($name, $lastname, $suburb, $zip, $town, $cell, $city, $age, $genre, $event, $mail, $ccID);

    if($recordClient){

        $seleccID = $access->seleccionaCCID($ccID);

        date_default_timezone_set('America/Mexico_City');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;

        $tipeActivity = "Registro nuevo de cliente";
        $user = $seleccID["cc_user"];

        require('secure/email.php');
        $correo = new sendEmail();
        $messageDetails = array();
        $messageDetails["name"] = $name;
        $messageDetails["message_subject"] = "Gracias por tu registro";
        $messageDetails["to_email"] = $mail;
        $messageDetails["from_name"] = "GSM - Centros Comerciales";
        $messageDetails["from_email"] = "hola@gsm.mallconcierge.mx";
        
        $mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="gb18030">

<title>Grupo Sordo Madaleno</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#70bbd9" style="padding: 0px 0 0px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							<img src="http://gsm.mallconcierge.mx/API-movil/secure/template/img/banner_gsm_mail.jpg" alt="Creating Email Magic" width="600" height="300"  />
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										<b>Hola '. $name . '!</b>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="260" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td>
																<img src="http://gsm.mallconcierge.mx/API-movil/secure/template/img/columna1.jpg" alt="" width="100%" height="140" style="display: block;" />
															</td>
														</tr>
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
															</td>
														</tr>
													</table>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">
													&nbsp;
												</td>
												<td width="260" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td>
																<img src="http://gsm.mallconcierge.mx/API-movil/secure/template/img/columna2.jpg" alt="" width="100%" height="140" style="display: block;" />
															</td>
														</tr>
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
																Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										&reg; Grupo Sordo Madaleno 2020<br/>
										<a href="http://gsm.mallconcierge.mx/unsubscribe/users.php?mailUser=' . $mail . '" style="color: #ffffff;"><font color="#ffffff">Darse de baja</font></a> a este newsletter.

										
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="https://www.twitter.com/" style="color: #ffffff;">
														<img src="http://gsm.mallconcierge.mx/API-movil/secure/template/img/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="https://www.twitter.com/" style="color: #ffffff;">
														<img src="http://gsm.mallconcierge.mx/API-movil/secure/template/img/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>';

        $messageDetails["message_body"] = $mensaje;

        //Guarda actividad de registro
        $recordLog = $access->recordingLog($fechaActual, $user, $tipeActivity);

        $correo->sendMail($messageDetails);
        
        if($correo){

		$mailUser = $mail;
		$selectUser = $access->selectUser($mailUser);
        $return['status'] = '200';	
        $return['message'] = 'Usuario registrado exitosamente';
		$return['IDUsuario'] = $selectUser["idCCRecordsClients"];
            
        }else{
            
            $return['status'] = '505';
            $return['message'] = 'Error al enviar correo';
            
        }
    }else{
        
        $return['status'] = '500';
        $return['message'] = 'Error al registrar usuario';
        
    }
   
    echo json_encode($return);
    $access->desconecta();
    return;

}

