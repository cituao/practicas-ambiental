$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

$(function() {

		$(document).ready(function(){
			$("#cronograma_fechaIniciacion").datepicker({
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
					$("#cronograma_fechaAsesoria1").val(fecha_asesoria1);
					$("#cronograma_fechaAsesoria2").val(fecha_asesoria2);
					$("#cronograma_fechaAsesoria3").val(fecha_asesoria3);
					$("#cronograma_fechaAsesoria4").val(fecha_asesoria4);
					$("#cronograma_fechaAsesoria5").val(fecha_asesoria5);
					$("#cronograma_fechaAsesoria6").val(fecha_asesoria6);
					$("#cronograma_fechaAsesoria7").val(fecha_asesoria7);
					$("#cronograma_fechaInformeFinal").val(fecha_finalizacion);

					
					//colocar las fechas de visitas
					//visita de presentacion a los 7 dias de iniciar el cronograma
					$("#cronograma_fechaVisitaP").val(fecha_asesoria1);
					// al segundo mes 
					$("#cronograma_fechaVisita1").val(fecha_asesoria3);
					// al cuarto mes
					$("#cronograma_fechaVisita2").val(fecha_asesoria5);

					//alert($.datepicker.formatDate("dd-mm-yy", fecha_inicio, inst.settings));
					//iniciamos nuevamente a la fecha de inicio para calcular nuevas fechas				
					
					fecha_pivote.setDate(fecha_pivote.getDate() - 183); //fecha fin de proceso
					//alert($.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings));	
					//colocar fechas de informes cuali cuanti
					//fecha de entrega informe cuali cuanti #1 al mes 1/2 de iniciado el proceso
					fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
					var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
					$("#cronograma_fechaInformeGestion1").val(fecha_finalizacion);
					//fecha de entrega informe cuali cuanti #2 a los 3 meses de iniciado el proceso
					fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
					var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
					$("#cronograma_fechaInformeGestion2").val(fecha_finalizacion);
					//fecha de entrega informe cuali cuanti #2 a los 3 meses de iniciado el proceso
					fecha_pivote.setDate(fecha_pivote.getDate() + 45); //sumamos el mes y medio
					var fecha_finalizacion = $.datepicker.formatDate("dd-mm-yy", fecha_pivote, inst.settings);	
					$("#cronograma_fechaInformeGestion3").val(fecha_finalizacion);
						
					//fecha de entrega del informe final
								
					

				}
			}); //date picker


		$("#cronograma_centro").change(function(){
				var codigo = "";
	
				codigo = this.value;
				//alert(codigo);
				
				var ruta = $("#ruta").attr("data-path");
				//alert(ruta);
					$.ajax({url: ruta,
						type: "POST",
						data: { "cod_centro" : codigo },
						success:function(data){
							//alert(data);
							//console.log(data);

							var obj = eval ("(" + data + ")");
							//console.log(obj);

							var html = '';
							var html = '<option value selected="selected">Seleccione un asesor externo</option>'
							var len = obj.length;
							for (var i = 0; i< len; i++) {
								html += '<option value="' + obj[i].id + '">' + obj[i].nombres + ' ' + obj[i].apellidos + '</option>';
							}
							//alert(html);
							$('#cronograma_externo')
								.find('option')
								.remove()
								.end()
								.append(html);
							
					}});
		});

		}); // document.ready
}); 

