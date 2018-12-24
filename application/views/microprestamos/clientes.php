
<h1  style="margin-top:15px;margin-bottom:15px" class="h2">Clientes <?= $count ?></h1>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Correo</th>
      <th scope="col">Municipio</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
	<?php
	$i=1;
	foreach ($clientes as $c) { 
	$fecha = strtotime($c->fecha_nacimiento);
	$anios = $fecha / (60*60*24*365);
	$anios = floor($anios);
	?>	
		<tr>									
			<th scope="row"><?= $i++?></th>
			<td><?= $c->nombre_completo ?></td>
			<td><?= $anios ?></td>
			<td><?= $c->correo ?></td>
			<td><?= $c->municipio ?></td>
			<td><?= $c->estado ?></td>
			<td>
				<button class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> </button>
				<button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> </button>
				<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
			</td>
		</tr>
	<?php }?>
  </tbody>
</table>
    </div>
    <!-- container -->
</body>
</html>
