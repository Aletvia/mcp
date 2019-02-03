
		<h1  style="margin-top:15px;margin-bottom:15px" class="h2">Solicitudes 1</h1>
		<table class="table table-sm">
		  <thead>
			<tr>
			  <th scope="col">No. solicitud</th>
			  <th scope="col">Cliente</th>
			  <th scope="col">Correo</th>
			  <th scope="col">Estatus</th>
			  <th scope="col">Monto</th>
			  <th scope="col">Acciones</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			if($count>0){
			$i=1;
			foreach ($solicitudes as $c) {
			?>
				<tr>
					<th scope="row"><?=$c->id_solicitud?></th>
					<td><?= $c->nombre_completo ?></td>
					<td><?= $c->correo ?></td>
					<td><?= $c->status ?></td>
					<td>$<?= $c->monto ?></td>
					<td>
						<button onclick="ver(<?= $c->id_solicitud ?>)" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> </button>
						<button onclick="procesar(<?= $c->id_solicitud?>)" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> </button>
						<!--button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button-->
					</td>
				</tr>
			<?php } }?>
		  </tbody>
		</table>
		<form id="act" method="post">
			<input type="hidden" id="us" name="us" value=""/>
		</form>
    </div>
<script>
    function ver(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Microprestamos/ver_solicitud"
		form.submit()
    }
    function procesar(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Microprestamos/procesar_solicitud"
		form.submit()
    }
</script>
    <!-- container -->
</body>
</html>
