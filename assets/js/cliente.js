
function calc() {
	var r = document.getElementById("rode").value
	var i1 = document.getElementById("interes")
	var i = document.getElementById("interest")
	var tt = document.getElementById("total")
	var tm = document.getElementById("time").value
	$.ajax({
		url:'<?= base_url() ?>index.php/Welcome/int',
		type : 'POST',
		data : { 'r' : r,'tm':tm },
		success: function(rres){
			var arr = rres.split(",");
			i1.value=arr[0];
			i.value=arr[0];
			tt.value=arr[1];
		}
	});
}
function municipios() {
	var p = document.getElementById("state_a").value
	var m = document.getElementById("m")
	$.ajax({
		url:'<?= base_url() ?>index.php/Welcome/municipios',
		type : 'POST',
		data : { 'es' : p },
		success: function(cities){
			$('#m').empty();
			$.each(cities,function(id,municipio)
			{
				m.append(new Option(municipio.mun, municipio.id));
			});
		}
	});
}

function editar() {
	var a = document.getElementById("benefits").value
	var b = document.getElementById("rode").value
	var c = document.getElementById("time").value
	var d = document.getElementById("cause").value
	var e = document.getElementById("use").value
	if(a=="" || b=="" || c=="" || d=="" || e==""){
		alert("Corrobore que todos los campos de la pestaña Solicitud  estén completos");
	}else{
		if(b>2000){
			alert("El monto no puede sobrepasar los 2000.00 MXN")
		}else{
			var form = document.getElementById("act");
			form.submit()
		}
	}
}
function CargarFoto(img){
	arriba=(screen.height)/2;
	string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+(screen.width)/2+",height="+(screen.height)/2+",left=10,top=10";
	var w = window.open(img,"DescriptiveWindowName",string);


}
function subir(tipo){
	derecha=(screen.width)/2;
	arriba=(screen.height)/2;
	string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+(screen.width)/2+",height="+(screen.height)/2+",left=10,top=10";
	var w = window.open("<?= base_url() ?>index.php/Archivos/"+tipo,"DescriptiveWindowName",string);
}
function calcular() {
	var y = document.getElementById("y").value
	var d = document.getElementById("d").value
	var m = document.getElementById("mt").value
	var a = document.getElementById("age").value
	date = new Date(`${y}-${m}-${d}`)
	var hoy=new Date();
	var ageDifMs = hoy - date.getTime();
	var ageDate = new Date(ageDifMs);
	var edad=Math.abs(ageDate.getUTCFullYear() - 1970);
	if(m<hoy.getMonth()){
		edad=edad+1;
	}
	document.getElementById("age").value=edad;
	document.getElementById("b").value=y+"/"+m+"/"+d;
}
function confirmar_c(){
	var c = document.getElementById("c").value
	$.ajax({
		url:'<?= base_url() ?>index.php/Welcome/confirmar_c',
		type : 'POST',
		data : { 'c' : c },
		success: function(comp){
			if(comp!='Aprobado'){
				alert(comp);
				document.getElementById("c").value='<?= strtoupper($curp) ?>'
			}
		}
	});
}
function confirmar_e(){
	var e = document.getElementById("e").value
	$.ajax({
		url:'<?= base_url() ?>index.php/Welcome/confirmar_e',
		type : 'POST',
		data : { 'e' : e },
		success: function(comp){
			if(comp!='Aprobado'){
				alert(comp);
				document.getElementById("e").value='<?= $email ?>'
			}
		}
	});
}
