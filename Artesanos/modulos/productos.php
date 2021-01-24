<?php
check_user("productos");

if(isset($cat)){
	$sc = mysqli_query($obj_conexion,"SELECT * FROM categoria WHERE id='$cat'");
	$rc=mysqli_fetch_array($sc);
	?>
	<?php
	if(isset($rc)){
		?>
		<h1>Categoria Filtrada por: <?=$rc['categoria']?></h1>
		<?php
	}  
	else{
		?>
		<h1>La categoría filtrada por producto</h1>
	 <?php
	}
	?>
	<?php
}

if(isset($agregar)&& isset($cant)){
	$idp = clear($agregar);
	$cant= clear($cant);
	$id_cliente = clear($_SESSION['id_cliente']);
	$v=mysqli_query($obj_conexion, "SELECT * FROM carro WHERE id_cliente='$id_cliente' AND id_producto ='$idp'");
	if(mysqli_num_rows($v)>0){
		$q= mysqli_query($obj_conexion,"UPDATE carro SET cant= cant + $cant WHERE id_cliente='$id_cliente' AND id_producto='$idp'");
	}else{
		$q= mysqli_query($obj_conexion,"INSERT INTO carro (id_cliente,id_producto,cant) VALUES ($id_cliente,$idp,$cant)");
	}
	alert("Se ha agregado al carro de compras");
	redir("?p=productos");
}
if(Isset($busq) && ISSET($cat)){
	$q=mysqli_query($obj_conexion, "SELECT * FROM productos WHERE name like '%$busq%' AND id_categoria ='$cat'");

}elseif(isset($cat) && !isset($busq)){
	$q=mysqli_query($obj_conexion, " SELECT * FROM productos WHERE  id_categoria='$cat' ORDER BY id DESC");
}elseif(isset($busq)&& !isset($cat)){
	$q=mysqli_query($obj_conexion, " SELECT * FROM productos WHERE  name like '%$busq%'");
}elseif(!isset($busq) && !isset($cat)){
	$q= mysqli_query($obj_conexion, "SELECT * FROM productos ORDER BY id DESC");
}else{
	$q= mysqli_query($obj_conexion, "SELECT * FROM productos ORDER BY id DESC");
}


 
?>
<form method="post" action="">
	<div class="row">
		<div class="col">
			<div class="form-group">
				<input type="text" class="form-control" name="busq" placeholder="Coloca el nombre del producto">
			</div>
		</div>
		<div class="col">
			<select id="categoria" name="cat" class="form-control"> <!-- Este select es corrcto-->
				<option value="">Seleccione una categoria para filtrar</option>
				<?php
				$cats=mysqli_query($obj_conexion,"SELECT * FROM categoria ORDER BY categoria ASC");
				while($rcat = mysqli_fetch_array($cats)){
					?>
					<option value="<?=$rcat['id']?>"><?=$rcat['categoria']?></option>
					<?php

				}
				?>
			</select>
		</div>
		<div class="col">
			<button type="submit" class="btn btn-primary" name="buscar"><i class="fa fa-search"></i>Buscar</button>
		</div>
	</div>
</form>
<?php
while($r=mysqli_fetch_array($q)){
	$preciototal=0;
		if($r['oferta']>0){
				if(strlen($r['oferta']==1)){
					$desc= "0.0".$r['oferta'];
				}else{
					$desc= "0.".$r['oferta'];
				}
				$preciototal=$r['price']-($r['price'] * $desc);
		}else{
			$preciototal=$r['price'];
		}
	?>

		<div class="producto">
			<div class="name_producto"><?=$r['name']?></div>
			<div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div>
			<?php
			if($r['oferta']>0){
				?>
				<del><?=$r['price']?><?=$divisa?></del><span class="precio"><?=$preciototal?><?=$divisa?></span>
			<?php 
			}else{
				 ?>
				<span class="precio"><br><?=$r['price']?><?=$divisa?></span>
				<?php 
			}
			?>
			<button class= "btn btn-warning float-right" onclick="agregar_carro('<?=$r['id']?>');"><i class="fa fa-shopping-cart"></i></button>
		</div>
	<?php
} ?>
<script type="text/javascript">
	function agregar_carro(idp){
		var cant = prompt("¿Que cantidad desea agregar?",1);
		if(cant.length>0){
			window.location="?p=productos&agregar="+idp+"&cant="+cant;
		}
	}
	function redir_cat(){

		window.location="?p=productos&cat="+$("#categoria").val();
	}
</script>

