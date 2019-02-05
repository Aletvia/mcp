
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Solicitudes <?= $count ?></h1>
			<div class="col">
			<a style="color:white;font-weight:bold" href="<?= base_url() ?>index.php/Clientes/agregar_solicitud" class="btn btn-success d-inline float-right" ><i class="fa fa-plus"></i> Agregar solicitud</a>
			</div>
		</div>
		<table class="table table-sm">
		  <thead>
			<tr>
			  <th scope="col">No. </th>
			  <th scope="col">Fecha </th>
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
					<th scope="row"><?= $c->id_solicitud ?></th>
					<td><?= $c->fecha_solicitud ?></td>
					<td><?= $c->correo ?></td>
					<td><?= $c->status ?></td>
					<td>$<?= $c->monto ?></td>
					<td>
						<button onclick="ver(<?= $c->id_solicitud ?>)"
							<?php
							if($c->status=='Cancelada por cliente' || strpos($c->status, 'rechazada') !== false) {
							?> disabled <?php }?>
							class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> </button>
						<button onclick="procesar(<?= $c->id_solicitud?>)"
							<?php
							if($c->status=='Cancelada por cliente' ||
							$c->status=='Solicitud aprobada' ||
							$c->status=='Depósito realizado' ||
							$c->status=='Adeudo' ||
							$c->status=='Pagado' ||
							strpos($c->status, 'rechazada') !== false) {
							?> disabled <?php }?>
							class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> </button>
						<button onclick="cancelar(<?= $c->id_solicitud ?>)"
							<?php
							if($c->status=='Cancelada por cliente' ||
							$c->status=='Solicitud aprobada' ||
							$c->status=='Depósito realizado' ||
							$c->status=='Adeudo' ||
							$c->status=='Pagado' ||
							strpos($c->status, 'rechazada') !== false) {
							?> disabled <?php }?>
							class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button>
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
		form.action = "<?= base_url() ?>index.php/Clientes/ver_solicitud"
		form.submit()
    }
    function procesar(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Clientes/procesar_solicitud"
		form.submit()
    }
    function cancelar(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Clientes/cancelar_solicitud"
		form.submit()
    }
</script>
    <!-- container -->
</body>
</html>
