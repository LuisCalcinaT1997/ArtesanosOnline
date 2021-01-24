<?php 
include "configs/config.php";
include "configs/funciones.php";
if(!isset($p)){
	$p="principal";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/">
	<title>Artesanos Online Go 2020</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.convform.css" >
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/jquery.convform.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="demo.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.convform.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</head>
<body>
	<div class="chat_icon">
		<i class="fa fa-comments" aria-hidden="true"></i>
	</div>
	<div class="chat_box">
		<section id="demo">
	    <div class="vertical-align">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
	                    <div class="card no-border">
	                        <div id="chat" class="conv-form-wrapper">
	                            <form action="" method="GET" class="hidden">
	                                <select data-conv-question="Hola que tal somos Artesanos Online y si tienes dudas preguntame por este medio!,¿necesitas ayuda?" name="first-question">
	                                    <option value="yes">Si</option>
	                                    <option value="sure">Seguro!</option>
	                                </select>
	                                <input type="text" name="name" data-conv-question="¡Bien! Primero, dígame su nombre completo, por favor. Por favor, dígame su nombre primero.">
	                                <input type="text" data-conv-question="Hola, {name}:0! Es un placer conocerte. (tenga en cuenta que esta pregunta no espera ninguna respuesta)" data-no-answer="true">
	                                <select name="programmer" data-callback="storeState" data-conv-question="¿Entonces que tipo de asesoria necesitas?">
	                                    <option value="Contactame">Contactos</option>
	                                    <option value="Ayuda">Ayuda</option>
	                                    <option value="Compra">Compra</option>
	                                </select>
	                                <div data-conv-fork="programmer">
	                                    <div data-conv-case="Contactame">
	                                        <input data-conv-question="Escribe tu correo para poder contactarte mas facilmente" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" type="email" name="email" required placeholder="What's your e-mail?">
	                                        <input type="text" data-conv-question="Listo en los siguientes dias se te enviara un correo personalizado de un asistente para que este se comunique y pueda ayudarte de mejor forma!." data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="Ayuda">
	                                    	<select name="Ayuda2" data-conv-question="Puedes revisar la pagina de ayuda que tenemos,tambien revisar el video de tutorial de compra,luego tenemos las preguntas frecuentes,si es algo mas personal escoga la opcion SI si quiere salir escoga la opcion NO">
	                                    	<option value="Si">Si</option>
	                                    	<option value="No">No</option>
		                                    </select>
		                                    <div data-conv-fork="Ayuda2">
	                                    		<div data-conv-case="Si">
		                                    		<input type="text" name="name" data-conv-question="por favor dejar su numero y nombre de cuenta en el siguiente formato (numero,nombre de cuenta)para escribirle y citar una llamada en los proximos dias">
		                                    		<input type="text" data-conv-question="Listo, {name}:0! Estos son los datos registrados, esperanos unos dias y nos podremos comunicar contigo!)" data-no-answer="true">
	                                    		</div>
	                                    		<div data-conv-case="No">
	                                    			 <input type="text" data-conv-question="Espero haberte ayudado!" data-no-answer="true">
	                                    		</div>
	                                    	</div>
	                                    </div>
	                                    <div data-conv-case="Compra">
		                                    <input type="text" data-conv-question="Tenemos un videoTutorial para que usted pueda comprar, si ese no es el caso escoga las siguientes opciones" data-no-answer="true">
		                                    <input type="text" data-conv-question="1:Error de compra" data-no-answer="true">
		                                    <input type="text" data-conv-question="2:Devolucion de pedido" data-no-answer="true">
		                                   	<input type="text" data-conv-question="3:No llega mi producto" data-no-answer="true">
		                                   	<select name="Compra2" data-conv-question="Escoja porfavor">
	                                    	<option value="1">1</option>
	                                    	<option value="2">2</option>
	                                    	<option value="3">3</option>
		                                    </select>
		                                    <div data-conv-fork="Compra2">
		                                    	<div data-conv-case="1">
		                                    		<input type="text" name="name" data-conv-question="por favor dejar su numero de pedido para escribirle y darle informacion los proximos dias">
		                                    		<input type="text" data-conv-question="Listo, {name}:0! en estos momentos estara siendo evaluado por el sistema y tan pronto veamos la situacion le llegara un mensaje a la cuenta y su correo electronico" data-no-answer="true">

		                                   		 </div>
		                                    	<div data-conv-case="2">
		                                    		<input type="text" name="name" data-conv-question="por favor dejar su numero de pedido para empezar con la solicitud">
		                                    		<input type="text" data-conv-question="Listo, {name}:0! esta siendo solicitado para su devolucion espere el correo sobre mas informacion." data-no-answer="true">
		                                    	</div>
		                                    	<div data-conv-case="3">
		                                    		<input type="text" name="name" data-conv-question="por favor dejar su numero de pedido para revisar el envio">
		                                    		<input type="text" data-conv-question="Listo, {name}:0! esta siendo verificado, se le mandara a su correo el lugar en donde se encuentra su pedido y cuanto tiempo demorara para llegar, disculpe las molestias." data-no-answer="true">
		                                    	</div>
		                                	</div>
	                                    </div>
	                                </div>
	                                <select name="callbackTest" data-conv-question="Bueno si necesitas mas ayuda puedes regresar al menu principal  o simplemente salir
	                                (Si)regresar (No) salir">
	                                    <option value="yes" data-callback="rollback">Si</option>
	                                    <option value="no" data-callback="restore">No</option>
	                                </select>
	                                <select data-conv-question="¡Eso es todo! Si te gusto, ¡considera hacer una donación! Si necesitas ayuda, contáctame. Cuando el formulario llega al final, el complemento lo envía normalmente, como si lo hubiera llenado." id="">
	                                    <option value="">Genial!</option>
	                                </select>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	</div>
	<div class="header">
		<img class="logo" src="Fondo/llama.png" alt="">
		Artesanos Online
	</div>
	<div class="menu">
		<a href="?p=productos">Productos</a>
		<a href="?p=ofertas">Ofertas</a>
		<?php

		if(isset($_SESSION['id_cliente'])){
			?>
			<a href="?p=carrito">Carrito</a>
			<a href="?p=miscompras">Mis Compras</a>
		<?php
		}else{
			?>
			<a href="?p=login">Iniciar Sesion </a>
			<a href="?p=registro">Registrate</a>
			<?php
		}

		?>
		<?php 

			if(isset($_SESSION['id_cliente'])){
		?>
				<a href="?p=salir" class="subir float-right">Salir</a>
				<a href="#" class="subir float-right"><?=nombre_cliente($_SESSION['id_cliente'])?></a>
		<?php 
			}
		?>
	</div>
	<div class="cuerpo">
		<?php 
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}
			else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		 ?>
	</div>
	<div class="footer">
		Copyright ArtesanosOnline &copy; <?=date("Y")?>
	</div>
	<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="dist/autosize.min.js"></script>
	<script type="text/javascript" src="dist/jquery.convform.js"></script>

	<script>
		function google(stateWrapper, ready) {
			window.open("https://google.com");
			ready();
		}
		function bing(stateWrapper, ready) {
			window.open("https://bing.com");
			ready();
		}
		var rollbackTo = false;
		var originalState = false;
		function storeState(stateWrapper, ready) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
			ready();
		}
		function rollback(stateWrapper, ready) {
			console.log("rollback called: ", rollbackTo, originalState);
			console.log("answers at the time of user input: ", stateWrapper.answers);
			if(rollbackTo!=false) {
				if(originalState==false) {
					originalState = stateWrapper.current.next;
						console.log('stored original state');
				}
				stateWrapper.current.next = rollbackTo;
				console.log('changed current.next to rollbackTo');
			}
			ready();
		}
		function restore(stateWrapper, ready) {
			if(originalState != false) {
				stateWrapper.current.next = originalState;
				console.log('changed current.next to originalState');
			}
			ready();
		}
	</script>
	<script>
		jQuery(function($){
			convForm = $('#chat').convform({selectInputStyle: 'disable'});
			console.log(convForm);
		});
	</script>
</body>
</html>