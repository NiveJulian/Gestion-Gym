<?php include('db_connect.php'); 
?>
<?php 
$student = $conn->query("SELECT * FROM student order by name asc "); 
$name = $row['name'];

?>

<style>
	input[type=checkbox] {
		/* Double-sized Checkboxes */
		-ms-transform: scale(1.3);
		/* IE */
		-moz-transform: scale(1.3);
		/* FF */
		-webkit-transform: scale(1.3);
		/* Safari and Chrome */
		-o-transform: scale(1.3);
		/* Opera */
		transform: scale(1.3);
		padding: 10px;
		cursor: pointer;
	}
	#vence{
		cursor: pointer;
		border: none;
	}
</style>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

		</div>
	</div>
	<div class="row">
		<!-- FORM Panel -->

		<!-- Table Panel -->
		<div class="" style="background: transparent;">
			<div class="card-head">
				<div class="card-header">
				<h3><b>Lista de Clientes </b></h3>
					<span class="float:right">
					<a class="btn btn-primary col-md-1 col-sm-6 float-right" href="javascript:void(0)" id="new_student">
						<i class="fa fa-plus"></i> Cliente
					</a>
				</span>
			</div>
		<div class="card-body-student">
			<div class="card-student">
				
					<?php
					$student = $conn->query("SELECT * FROM student order by name asc ");
					$fecha_hoy= date("d-m-Y");
					function calcular_dias($fecha_hoy, $vencimiento){ // esta función la puedes colocar en un archivo aparte

						$diferencia_dias=(strtotime($fecha_hoy)-strtotime($vencimiento))/86400; // transformación para poder restar las fechas sin tener problemas con años bisiestos y demás
						$diferencia_dias=abs($diferencia_dias); // Para garantizar que el número de dias de positivo (valor absoluto)
						$diferencia_dias=floor($diferencia_dias); // Redondeo hacia abajo para garantizar no contar 1 día de más      
						return $diferencia_dias; // retornamos el total de días que necesitabas
					}
					
					$i = 1;
					while ($row = $student->fetch_assoc()){
						$fecha_hasta=$row['vencimiento']; // fecha hasta proveniente de la bd
						$diferencia_dias= calcular_dias($fecha_hoy, $fecha_hasta); //implementamos la función
					?>
						<div id="card-body" class="card-body-content">
							<div class="tools">
								<div class="circle">
								<span class="red box"></span>
								</div>
								<div class="circle">
								<span class="yellow box"></span>
								</div>
								<div class="circle">
								<span class="green box"></span>
								</div>
							</div>
							<div class="card__content">
								<ul>
									<li>
										<p><b>id:</b></p>	
										<?php echo $i++ ?>
									</li>
									<li>
										<p><b>Nombre:</b></p>
										<p class="cliente"><?php echo ucwords($row['name']) ?></p>
									</li>
									<li>
										<p><b>Fecha de vencimiento:</b> </p>
										<?php echo $row['vencimiento'] ?>
										<p><span class="diferencia"><?php echo $diferencia_dias; ?></span> dias para que venza</p>
									</li>
									<li>
										<button class="btn btn-primary edit_student" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
										<button class="btn btn-outline-success" > <a href="https://walink.co/298b97" style="color: #28a745; border-color: #28a745;"><i class="fa-brands fa-whatsapp"></i></a></button>
										<button class="btn btn-danger delete_student align-center" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash-alt"></i></button>
									</li>
								</ul>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Table Panel -->
	</div>
</div>

</div>
<style>
	li {
		vertical-align: middle !important;
		margin: 3px;
	}

	li p {
		margin: unset;
	}

</style>

<script>
	$(document).ready(function() {
		$('table').dataTable()
	})
	$('#new_student').click(function() {
		uni_modal("Nuevo Cliente ", "manage_student.php", "mid-large")

	})
	$('.edit_student').click(function() {
		uni_modal("Gestionar Información de Cliente", "manage_student.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_student').click(function() {
		_conf("Deseas eliminar este Cliente? ", "delete_student", [$(this).attr('data-id')])
	})
	$(document).ready(function() {
        var _c = $('#report-list').clone();
        var ns = $('noscript').clone();
        ns.append(_c)
        var nw = window.open('', '_blank', 'width=900,height=600')
        nw.document.write('<p class="text-center"><b>Reporte de Pago de <?php echo date("m d,Y", strtotime($month)) ?></b></p>')
		Push.create("A COBRAR", {
        body: "Se está por vencer un pago de " + nombre,
        icon: 'assets/uploads/expirate.png',
        timeout: 4000,
			});
    })

	function delete_student($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_student',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Datos eliminados exitósamente", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
	var diferencias = document.querySelectorAll('.diferencia');
	for (i=0; i < diferencias.length; i++) {
		var value = diferencias[i].innerHTML; // o diferencias[i].value si utilizases un campo tipo hidden en lugar de span
		var tr    = diferencias[i].closest('li'); // la columna en la que está incluido el elemento
		
		
		if (value >= 1 && value < 3) {
			tr.style.backgroundColor = "#c3250d";
			tr.style.color = "#fff";
			notificacion(nombre)
			}
		if (value == 0) {
				tr.style.backgroundColor = "#c3250d";
				tr.style.color = "#fff";
				notificacion()
			}
		if (value < 0) {
				tr.style.backgroundColor = "#c3250d";
				tr.style.color = "#fff";
				notificacion()
			}
		if (value > 3 && value < 5) {
				tr.style.backgroundColor = "#e6ed18";
				tr.style.color = "#fff";
				notificacion()
			}
		}
		
	
	
	// function notificacion(nombre){
    //     Push.create("A COBRAR", {
    //     body: "Se está por vencer un pago de " + nombre,
    //     icon: 'assets/uploads/expirate.png',
    //     timeout: 4000,
	// 		});
    //     }
	
	
	
	

</script>