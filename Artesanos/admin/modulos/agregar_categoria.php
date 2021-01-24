<?php 

check_admin();
if(isset($enviarr)){
	$categoria = clear($categoria);
	$s=mysqli_query($obj_conexion,"SELECT * FROM categoria WHERE categoria ='$categoria'");
	if(mysqli_num_rows($s)>0){
		alert("Esta categoria ya esta agregada");
		redir("");
	}else{
		mysqli_query($obj_conexion,"INSERT INTO categoria(categoria) VALUES ('$categoria')");
		alert("Categoria Agregada");
		redir("");
	}
}
if(isset($eliminar)){
	mysqli_query($obj_conexion, "DELETE FROM categoria WHERE id ='$eliminar'");
	alert("Categoria eliminada");
	redir("?p=agregar_categoria");	
}
?>
<h1>Agregar Categoria</h1><br><br>
<form method="post" action="">
	<div class="form-group">
		<input type="text" class="form-control" name="categoria" placeholder="Categoria"/>
	</div>
	<div>
		<input type="submit" class="btn btn-primary" name="enviarr" value="Agregar categoria">
	</div>
</form>
<br>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Categoria</th>
		<th>Acciones</th>
	</tr>
	<?php 
	$q=mysqli_query($obj_conexion, "SELECT * FROM categoria ORDER BY categoria ASC");
	while($r=mysqli_fetch_array($q)){
		?>
		<tr>
			<td><?=$r['id']?></td>
			<td><?=$r['categoria']?></td>
			<td>
				<a style="color:#08f" href="?p=agregar_categoria&eliminar=<?=$r['id']?>"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		<?php  
	} 
	?>
</table>