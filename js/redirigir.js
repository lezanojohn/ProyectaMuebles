function verIdeaProyecto(id_ideaproyecto, nombre_proyecto)
{
	var str = nombre_proyecto.replace('de',' ');
	var str = str.replace(/\s/g,'%');
	window.location.href='verProyectoDetallado.php?id_ideaproyecto='+id_ideaproyecto+'&nombre_proyecto='+str;
}

function Redirigir_Propuesta(id_ideaproyecto, nombre_proyecto, id_propuesta)
{
  window.location.href='verPropuestaDetallada.php?id_ideaproyecto='+id_ideaproyecto+'&nombre_proyecto='+nombre_proyecto+'&id_propuesta='+id_propuesta;
}

function Redirigir_formulario_Propuesta(id_ideaproyecto, nombre_proyecto)
{
  window.location.href='publicarPropuesta.php?id_ideaproyecto='+id_ideaproyecto+'&nombre_proyecto='+nombre_proyecto;
}

function aceptar_propuesta(id_ideaproyecto, id_propuesta)
{
  
  $.ajax({
            type: 'POST',
			url: 'aceptarPropuesta.php',
			data: {id_ideaproyecto: id_ideaproyecto, id_propuesta: id_propuesta},
			success: function(resp){
				$('#respuesta').html(resp);
			}
        });
}

function rechazar_propuesta(id_propuesta)
{  
  $.ajax({
            type: 'POST',
			url: 'rechazarPropuesta.php',
			data: {id_propuesta: id_propuesta},
			success: function(resp){
				$('#respuesta').html(resp);
			}
        });
}




function eliminarMueblista(id_usuario)
{
	window.location.href='eliminarMueblista.php?id_usuario='+id_usuario;
}
function eliminarProyecto(id_ideaproyecto)
{
	window.location.href='eliminarProyecto.php?id_ideaproyecto='+id_ideaproyecto;
}

function eliminarPropuesta(id_propuesta)
{
	window.location.href='eliminarPropuesta.php?id_propuesta='+id_propuesta;
}

function administrarCrearMueblista() {
		window.location.href='formularioCrearMueblista.php';
}

function modificarMueblista(id_usuario)
{

	window.location.href='administrarModificarUsuario.php?id_usuario='+id_usuario;
}




