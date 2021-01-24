<?php
check_Admin();
if(isset($aceptar)){
	mysqli_query($obj_conexion,"UPDATE pagos SET estado =1 WHERE id='$aceptar'");
	alert("Pago verificado.");
	redir("?p=pagos");
}
//Estado:
//0 Sin Verificar
//1 Verificado
//2 Reembolso
?>
<h1>Pagos de los clientes</h1>
<table class="table  table-striped">
	<tr>
		<th>Cliente</th>
		<th>Fecha</th>
		<th>Comprobante</th>
		<th>Nombre de comprobante</th>
		<th>Estado</th>
		<th>Acciones</th>
	</tr>
	<?php
	$s = mysqli_query($obj_conexion,"SELECT * FROM pagos WHERE estado = 0  ORDER BY fecha DESC");
	while($r=mysqli_fetch_Array($s)){
		?>
		<tr>
			<td><?=nombre_cliente($r['id_cliente'])?></td>
			<td><?=fecha($r['fecha'])?></td>
			<td><a style="color:#333" target="_blank" href="../comprobantes/<?=$r['comprobante']?>">Ver Comprobante <i class="fa fa-eye"></i></a></td>
			<td><?=$r['nombre']?></td>
			<td><?=estado_pago($r['id'])?></td>
			<td>
				<?php  
				if($r['estado']==0){
					?>
					<a style="color:#333" href="?p=pagos&aceptar=<?=$r['id']?>" title="Verificar y aceptar pago"><i class="fa fa-check"></i></a>
					<?php  
				}
				?>

			</td>
		</tr>
		<?php
	}
	?>
</table>