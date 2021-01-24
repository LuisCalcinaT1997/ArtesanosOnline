<?php 
	$host_sql = "localhost";
	$user_sql = "root";
	$pass_sql = "";
	$db_sql = "tienda";
	$obj_conexion=mysqli_connect($host_sql,$user_sql,$pass_sql);
	mysqli_select_db($obj_conexion, $db_sql) or die ("Error conectando a la base de datos");

function clear($var){
	htmlspecialchars($var);
	return $var;
	}
function check_admin(){
	if(!isset($_SESSION['Id'])){
		redir("./");
	}
}
function redir($var){
	?>
	<script>
		window.location="<?=$var?>";
	</script>
	<?php 
	die(); 
}
function alert($var){
	?>
	<script type="text/javascript">
		alert("<?=$var?>")
	</script>
	<?php  
}
function check_user($url){
	
	if(!isset($_SESSION['id_cliente'])){
		redir("?p=login&return=$url");
	}
}
function nombre_cliente($id_cliente){
	
	$q=mysqli_query(connect(),"SELECT * FROM clientes WHERE id='$id_cliente'");
	$r=mysqli_fetch_array($q);
	return $r['name'];
}

function connect(){
	$host_sql = "localhost";
	$user_sql = "root";
	$pass_sql = "";
	$db_sql = "tienda";
	$obj_conexion=mysqli_connect($host_sql,$user_sql,$pass_sql,$db_sql);
	return $obj_conexion;
}
function fecha($fecha){
	$e=explode("-",$fecha);
	$year=$e[0];
	$month=$e[1];
	$e2=explode(" ",$e[2]);
	$day=$e2[0];
	$time =$e2[1];
	$e3=explode(":",$time);
	$hour=$e3[0];
	$mins=$e3[1];
	return $day."/".$month."/".$year." ".$hour.":".$mins;
}
function estado($id_estado){
		if($id_estado==0){
			$status = "Empezando";
		}elseif($id_estado==1){
			$status = "Preparando";
		}elseif($id_estado==2){
			$status = "Despachando";
		}elseif($id_estado==3){
			$status="Finalizado";
		}else{
			$status="Indefinido";
		}
		return $status;
}
function admin_name_connected(){
	include "config.php";
	$id=$_SESSION['Id'];
	$mysqli = connect();
	$q=$mysqli->query("SELECT * FROM admins WHERE Id='$id'");
	$r=mysqli_fetch_array($q);
	return $r['name'];
}
function estado_pago($estado){
	if($estado==0){
		$estado="Sin Verificar";
	}elseif($estado==1){
		$estado="Verificado y Aprobado";
	}elseif($estado==2){
		$estado="Reembolsado";
	}else{
		$estado= "Sin Verificar";
	}
	return $estado;
}
?>