<?php
check_user('carrito');
if(isset($eliminar)){
	mysqli_query($obj_conexion,"DELETE FROM carro WHERE id ='$eliminar'");
}

if(isset($id) && isset($modificar)){
	$id=clear($id);
	$modificar = clear($modificar);

	mysqli_query($obj_conexion,"UPDATE carro SET cant = '$modificar' WHERE id='$id'");
	alert("Cantidad modificada");
	redir("?p=carrito");
}

if(isset($finalizar)){
	$monto = clear($monto_total);
	$id_cliente = clear($_SESSION['id_cliente']);
	mysqli_query($obj_conexion,"INSERT INTO compra(id_cliente,fecha,monto,estado) VALUES('$id_cliente',NOW(),$monto,0 )");
	
	$sc = mysqli_query($obj_conexion,"SELECT * FROM compra WHERE id_cliente ='$id_cliente' ORDER BY id DESC LIMIT 1");
	$rc=mysqli_fetch_array($sc);
	$ultima_compra=$rc['id'];

	$q2=mysqli_query($obj_conexion,"SELECT * FROM carro WHERE id_cliente='$id_cliente'");
	while($r2=mysqli_fetch_Array($q2)){

		$sp=mysqli_query($obj_conexion,"SELECT * FROM productos WHERE id='".$r2['id_producto']."'");
		$rp=mysqli_fetch_Array($sp);

		$monto=$rp['price'];
		mysqli_query($obj_conexion,"INSERT INTO productos_compra(id_compra,id_producto,cantidad,monto) VALUES ('$ultima_compra','".$r2['id_producto']."','".$r2['cant']."','$monto')");
	}
	mysqli_query($obj_conexion,"DELETE FROM carro WHERE id_cliente='$id_cliente'");
	alert("Se ha finalizado la compra");
	redir("./");
} ?>

<h1><i class="fa fa-shopping-cart">	</i> Carro de Compras</h1>
<br><br>

<table class="table table-striped">
	<tr>
		<th><i class="fa fa-image"></i></th>
		<th>Nombre del producto</th>
		<th>Cantidad</th>
		<th>Precio por unidad</th>	
		<th>Oferta</th>
		<th>Precio Total</th>
		<th>Precio Neto</th>
		<th>Acciones</th>
	</tr>	
<?php 	
$id_cliente= clear($_SESSION['id_cliente']);
$q = mysqli_query($obj_conexion,"SELECT * FROM carro WHERE id_cliente = '$id_cliente'");
$monto_total=0;
while($r = mysqli_fetch_Array($q)){
	$q2= mysqli_query($obj_conexion, "SELECT * FROM productos WHERE id='".$r['id_producto']."'");
	$r2 = mysqli_fetch_array($q2);
	$preciototal=0;
		if($r2['oferta']>0){
				if(strlen($r2['oferta']==1)){
					$desc= "0.0".$r2['oferta'];
				}else{
					$desc= "0.".$r2['oferta'];
				}
				$preciototal=$r2['price']-($r2['price'] * $desc);
		}else{
			$preciototal=$r2['price'];
		}
	$nombre_producto =$r2['name'];
	$cantidad = $r['cant'];
	$precio_unidad= $r2['price'];
	$precio_total=$cantidad * $preciototal;
	$imagen_producto=$r2['imagen'];
	$monto_total=$monto_total+$precio_total;
	
?>
		<tr>
			<td><img src="productos/<?=$imagen_producto?>" class="img_carro"/> </td>
			<td><?=$nombre_producto?></td>
			<td><?=$cantidad?></td>
			<td><?=$precio_unidad?><?=$divisa?></td>
			
			<td>
				<?php
					if($r2['oferta']>0){
						echo $r2['oferta']."% de Descuento";
					}else{
						echo "Sin descuento";
					}
				?>
			 </td>	
			 <td><?=$precio_total?><?=$divisa?></td>
			 <td><?=$precio_total?> <?=$divisa?></td>	
			 <td>
			 	<a onclick="modificar('<?=$r['id']?>')" href="#"><i class="fa fa-edit" title="Modificar cantidad en carrito"></i></a>
			 	<a href="?p=carrito&eliminar=<?=$r['id']?>"><i class="fa fa-times" title="Eliminar"></i></a>
			 </td>
		</tr>
<?php
}
?>
</table> 
<br>
<h2>Monto Total: <b class="text-green"><?=$monto_total?> <?=$divisa?></b></h2>
<br><br>
<form action="" method="post">
	<input type="hidden" name="monto_total" value="<?=$monto_total?>"/>
	<button class="btn btn-primary" type="submit" name="finalizar"><i class="fa fa-check"></i> Finalizar Compra </button>
</form>
<script type="text/javascript">
	function modificar(idc){
		var new_cant = prompt("¿Cual es la nueva cantidad?");
		if(new_cant>0){
			window.location="?p=carrito&id="+idc+"&modificar="+new_cant;
		}
	}
</script>