    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Usuarios <?= $count ?></h1>
			<div class="col">
			<a style="color:white;font-weight:bold" href="<?= base_url() ?>index.php/Microprestamos/agregar_usuario" class="btn btn-success d-inline float-right" ><i class="fa fa-user-plus"></i> Agregar usuario</a>
			</div>
		</div>
		<table class="table table-sm">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Nombre</th>
			  <th scope="col">Correo</th>
			  <th scope="col">Tipo</th>
			  <th scope="col">Acciones</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			if($count>0){
			$i=1;
			foreach ($usr as $c) { 
			?>
			<tr>									
			  <th scope="row"><?= $i++?></th>
			  <td><?= $c->nombre_completo ?></td>
			  <td><?= $c->correo ?></td>
			  <td><?= $c->tipo ?></td>
			  <td>
				  <button onclick="ver(<?= $c->id_usuarios ?>)" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> </button>
				  <button onclick="editar(<?= $c->id_usuarios ?>)" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> </button>
				  <button onclick="eliminar(<?= $c->id_usuarios ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
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
		form.action = "<?= base_url() ?>index.php/Microprestamos/ver_usuario"
		form.submit()
    }
    function editar(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Microprestamos/editar_usuario"
		form.submit()
    }
    function eliminar(us) {
		var form = document.getElementById("act");
		var u = document.getElementById("us");
		u.value=us;
		form.action = "<?= base_url() ?>index.php/Microprestamos/eliminar_usuario"
		form.submit()
    }

  </script>
    <!-- container -->
</body>
</html>
