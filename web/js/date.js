//
$(document).ready(function(){



$(function() {
	$("#datepicker").datepicker({
		dateFormat: "dd-mm-yy",
		onSelect: function(dateText, inst) {
			var fecha_inicio = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
			var fecha_pivote = fecha_inicio;
			
			
			//fecha para la primera asesoría tiempo estimado 7 días despues de iniciar el cronograma
			fecha_pivote.setDate(fecha_pivote.getDate() + 7);
			var fecha_asesoria1 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #2 tiempo estimado 21
			fecha_pivote.setDate(fecha_pivote.getDate() + 21); //un mes 
			var fecha_asesoria2 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #3 tiempo estimado 30 días    
			fecha_pivote.setDate(fecha_pivote.getDate() + 30); //dos meses
			var fecha_asesoria3 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #4 tiempo estimado 30 días    
			fecha_pivote.setDate(fecha_pivote.getDate() + 30); //tres meses
			var fecha_asesoria4 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #5 tiempo estimado 30 días    
			fecha_pivote.setDate(fecha_pivote.getDate() + 30); //cuatro meses
			var fecha_asesoria5 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #6 tiempo estimado 30 días	 
			fecha_pivote.setDate(fecha_pivote.getDate() + 30); //cinco meses
			var fecha_asesoria6 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);
			//calcular la asesoría #7 tiempo estimado 30 días
			fecha_pivote.setDate(fecha_pivote.getDate() + 30); //seis meses
			var fecha_asesoria7 = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);

			//calcular la asesoría #7 tiempo estimado 5 días
			fecha_pivote.setDate(fecha_pivote.getDate() + 5); //fecha fin de proceso
			var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);

			//colocar las fechas de asesorias en la tabla
			$("#fecha_asesoria1").text(fecha_asesoria1);
			$("#fecha_asesoria2").text(fecha_asesoria2);
			$("#fecha_asesoria3").text(fecha_asesoria3);
			$("#fecha_asesoria4").text(fecha_asesoria4);
			$("#fecha_asesoria5").text(fecha_asesoria5);
			$("#fecha_asesoria6").text(fecha_asesoria6);
			$("#fecha_asesoria7").text(fecha_asesoria7);
			$("#fecha_finalizacion").val(fecha_finalizacion);


			//colocar las fechas de entrega para los informes de avance
			//informe de avance 1 : fecha limite para la fecha asesoria 3
			$("#fecha_avance1").text(fecha_asesoria3);
			//informe de avance 1 : fecha limite para la fecha asesoria 3
			$("#fecha_avance2").text(fecha_asesoria6);
			
			//colocar las fechas de visitas
			//visita de presentacion a los 7 dias de iniciar el cronograma
			$("#fecha_visitap").text(fecha_asesoria1);
			// al segundo mes 
			$("#fecha_visita1").text(fecha_asesoria3);
			// al cuarto mes
			$("#fecha_visita2").text(fecha_asesoria5);

			//alert($.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings));
			//iniciamos nuevamente a la fecha de inicio para calcular nuevas fechas				
			
			fecha_pivote.setDate(fecha_pivote.getDate() - 183); //fecha fin de proceso
			//alert($.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings));	
			//colocar fechas de informes cuali cuanti
			//fecha de entrega informe cuali cuanti #1 al mes 1/2 de iniciado el proceso
			fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
			var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
			$("#fecha_cuali1").text(fecha_finalizacion);
			//fecha de entrega informe cuali cuanti #2 a los 3 meses de iniciado el proceso
			fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
			var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
			$("#fecha_cuali2").text(fecha_finalizacion);
			//fecha de entrega informe cuali cuanti #2 a los 3 meses de iniciado el proceso
			fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
			var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
			$("#fecha_cuali3").text(fecha_finalizacion);
				
			//fecha de entrega del informe final
			$("#fecha_final").text(fecha_finalizacion);				
			

		}
	});
});
	
});


