    <!-- container -->
		<div style="margin-top:15px;margin-bottom:15px"  class="row">
			<h1 class="h2 ">Editar Usuario</h1>
			<div class="col">
			<a class="btn btn-light d-inline float-right" style="font-weight:bold"   href="<?= base_url() ?>index.php/Microprestamos/usuarios"><i class="fa fa-arrow-left"></i> Regresar al catálogo</a>
			</div>
		</div>
		<div>
		<form id="loginform" 
			action="<?= base_url() ?>index.php/Microprestamos/editar_u" method="post">
			<?php
			foreach ($usr as $u) { 
			$correo=$u->correo;
			?>
			<input type="hidden" id="us" name="us" value="<?= $u->id_usuarios ?>">
			<div class="row">
					<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span class="input-group-prepend">
							<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-user"></i>&nbspNombre&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
						</span>				
						<input value="<?= $u->nombre_completo ?>" id="n" type="text" class="form-control input-sm" name="n" required  placeholder="Nombre completo">             
					</div>
				</div>
				<div class="row">
					<div style="margin-bottom: 25px" class="input-group center col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<span class="input-group-prepend">
									<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-envelope"></i>&nbspCorreo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
								</span>										
								<input value="<?= $u->correo ?>" id="e" type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control input-sm" name="e" required  placeholder="Correo">                                        
					</div>
				</div>
				
				<div class="row">
				<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-key"></i>&nbspContraseña&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<input id="p" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="p" required  placeholder="Contraseña">
				</div>
						
				<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-key"></i>&nbspRepite contraseña</div>
							</span>										
							<input id="pc" pattern="^([A-Za-z0-9]{8,})$" type="password" class="form-control input-sm" name="pc" required  placeholder="Confirmar contraseña">
				</div>
				</div>
				
				<div class="row">
				<div style="margin-bottom: 25px" class="input-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<span class="input-group-prepend">
								<div style="font-weight:bold" class="input-group-text bg-white border-right-0"><i class="fa fa-users"></i>&nbspTipo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
							</span>										
							<select id="t" name="t" class="form-control input-sm" required >
								<?php if($u->tipo=="Administrador"){?>
								<option value="Administrador" selected>Administrador</option>
								<option value="Agente" >Agente</option>
								<?php
								}
								if($u->tipo=="Agente"){
								?>
								<option value="Administrador" >Administrador</option>
								<option value="Agente" selected>Agente</option>
								<?php
								}if($u->tipo=="Cliente"){
								?>
								<option value="Cliente">Cliente</option>
								<?php
								}?>
							</select>
				</div>
				<div style="margin-bottom: 25px" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<button  onclick="validar()" type="button" id="registrar" style="width:100%" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
				</div>
				</div>
			<?php }?>
			</form>
		</div>
    </div>
    <!-- container -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    function validar() {
        var p = document.getElementById("p").value
        var p2 = document.getElementById("pc").value
        var e = document.getElementById("e").value
		var form = document.getElementById("loginform")
        if (p != p2){
        alert("Las contraseñas son diferentes.")
        return false
        }else {
			var nMay = 0, nMin = 0, nNum = 0 
			var t1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ" 
			var t2 = "abcdefghijklmnopqrstuvwxyz" 
			var t3 = "0123456789" 
			for (i=0;i<p.length;i++) { 
				if ( t1.indexOf(p.charAt(i)) != -1 ) {nMay++} 
				if ( t2.indexOf(p.charAt(i)) != -1 ) {nMin++} 
				if ( t3.indexOf(p.charAt(i)) != -1 ) {nNum++} 
			} 
			if ( nMay>0 && nMin>0 && nNum>0 && p.length>7 || p=="") {
				$.ajax({
					url:'<?= base_url() ?>index.php/Microprestamos/verificare',
					type : 'POST',
					data : { 'e' : e },
					success: function(data) 
					{
						if(data=="" || e=="<?= $u->correo ?>"){
							form.submit();
						}else{
							alert(data);
						}
					}
				});
		    }else 
				{ alert("Su password debe contener minimo 8 caracteres con mayúsculas, minúscula y números."); form.p.focus(); return; }
        }
    }

  </script>
</body>
</html>
