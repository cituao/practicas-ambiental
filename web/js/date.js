//
$(document).ready(function(){

	$(function() {
		$("#datepicker").datepicker({
			dateFormat: "dd-mm-yy",
			onSelect: function(dateText, inst) {
				var fecha_inicio = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
				
				//fecha para la primera asesoría tiempo estimado 7 días despues de iniciar el cronograma
				fecha_inicio.setDate(fecha_inicio.getDate() + 7);
				var fecha_asesoria1 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #2 tiempo estimado 21
				fecha_inicio.setDate(fecha_inicio.getDate() + 21);
				var fecha_asesoria2 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #3 tiempo estimado 30 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 30);
				var fecha_asesoria3 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #4 tiempo estimado 30 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 30);
				var fecha_asesoria4 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #5 tiempo estimado 30 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 30);
				var fecha_asesoria5 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #6 tiempo estimado 30 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 30);
				var fecha_asesoria6 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);
				//calcular la asesoría #7 tiempo estimado 30 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 30);
				var fecha_asesoria7 = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);

				//calcular la asesoría #7 tiempo estimado 5 días
				fecha_inicio.setDate(fecha_inicio.getDate() + 5);
				var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings);

				//colocar las fechas en la tabla
				$("#fecha_asesoria1").text(fecha_asesoria1);
				$("#fecha_asesoria2").text(fecha_asesoria2);
				$("#fecha_asesoria3").text(fecha_asesoria3);
				$("#fecha_asesoria4").text(fecha_asesoria4);
				$("#fecha_asesoria5").text(fecha_asesoria5);
				$("#fecha_asesoria6").text(fecha_asesoria6);
				$("#fecha_asesoria7").text(fecha_asesoria7);
				$("#fecha_finalizacion").val(fecha_finalizacion);
			}
		});
	});
	
});


