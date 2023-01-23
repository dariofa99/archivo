
class Referencia {

	constructor(id = '', ref_nombre = '', categoria = '', tabla = '', duracion = '', descripcion = '',siguiente_estado='') {
		this.id = id;
		this.ref_nombre = ref_nombre;
		this.categoria = categoria;
		this.tabla = tabla;
		this.duracion = duracion;
		this.descripcion = descripcion;
		this.siguiente_estado = siguiente_estado;
	}

	store() {
		var url = '/referencias/tipo/store';
		$.ajax({
			url: url,
			type: 'POST',
			cache: false,
			data: this,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
				// showPreloader();
			},
			success: function (respu) {
				

				$("#myModal_nuevo_tipo_doc").modal('hide');
				$("#myModal_nuevo_tipo_estado").modal('hide');
				//	hidePreloader();            		


			},
			error: function (xhr, textStatus, thrownError) {
			}
		});
	}


	index_page(route, request = null) {
		//alert('')
		var route = route;
		$.ajax({
			url: route,
			type: 'GET',
			datatype: 'json',
			data: request,
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));

			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (res) {
			
				$(".contenedor_ajax_paginate").html(res);

			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	} 

	edit(id) {
		var route = '/referencias/gestion/' + id + '/edit';
		$.ajax({
			url: route,
			type: 'GET',
			datatype: 'json',
			data: {},
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (respu) {
				console.log(respu)
				abrirModalEditTipoDoc(respu);
				abrirModalEditTipoEstado(respu);
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}

	update(data) {
		referencia = this;
		var route = '/referencias/gestion/' + data.id ;
		$.ajax({
			url: route,
			type: 'PUT',
			datatype: 'json',
			data: data,
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (respu) {
				var url = window.location.href;
				referencia.index_page(url);
				$("#myModal_nuevo_tipo_estado").modal('hide');
				$("#myModal_nuevo_tipo_doc").modal('hide');
					
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}

	delete(id) {
		var route = '/referencias/gestion/' + id;
		$.ajax({
			url: route,
			type: 'DELETE',  
			datatype: 'json',
			data: {}, 
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
			},
			/*muestra div con mensaje de 'regristrado'*/
			success: function (respu) {
				Swal.fire(
					'Eliminado!',
					'El archivo ha sido eliminado con exito.',
					'success'
				);
				var url = window.location.href;
        		referencia.index_page(url);
					
			},
			error: function (xhr, textStatus, thrownError) {
				alert("Hubo un error con el servidor ERROR::" + thrownError, textStatus);
			}
		});
	}

}

(function(){


})();

function abrirModalEditTipoDoc(respu){
	$("#myformNuevoTipoDoc").attr('id', 'myformEditTipoDoc');
	$("#lbl_modal_title").text('Actualizando Estado');	
	$("#myformEditTipoDoc input[name='id']").val(respu.id);
	$("#myformEditTipoDoc input[name='ref_nombre']").val(respu.ref_nombre);
	$("#myformEditTipoDoc select[name='duracion']").val(respu.duracion);
	$("#myformEditTipoDoc select[name='siguiente_estado']").val(respu.siguiente_estado);
	$("#myformEditTipoDoc textarea[name='descripcion']").val(respu.descripcion);
	$("#myformEditTipoDoc input[type='submit']").val('Actualizar');
	$("#myformEditTipoDoc input[type='submit']").removeClass('btn-primary').addClass('btn-warning');
	$("#myModal_nuevo_tipo_doc").modal('show');
}
function abrirModalEditTipoEstado(respu){
	$("#myformNuevoTipoEstado").attr('id', 'myformEditTipoEstado');
	$("#lbl_modal_title").text('Actualizando Estado');	
	$("#myformEditTipoEstado input[name='id']").val(respu.id);
	$("#myformEditTipoEstado input[name='ref_nombre']").val(respu.ref_nombre);
	$("#myformEditTipoEstado select[name='duracion']").val(respu.duracion);
	$("#myformEditTipoEstado select[name='siguiente_estado']").val(respu.siguiente_estado);
	$("#myformEditTipoEstado textarea[name='descripcion']").val(respu.descripcion);
	$("#myformEditTipoEstado input[type='submit']").val('Actualizar');
	$("#myformEditTipoEstado input[type='submit']").removeClass('btn-primary').addClass('btn-warning');
	$("#myModal_nuevo_tipo_estado").modal('show'); 
}



function setFormToObject(form) {
    var dataArray = $("#" + form).serializeArray(),
        dataObj = {};
    $(dataArray).each(function (i, field) {
        dataObj[field.name] = field.value;
    });   
    return dataObj;
}

function validateForm(form){	
	var errors = [];
  	$("#"+form+" .required").each(function(index,obj){
  		if ($(this).val() =='') {
  			errors.push('El campo '+$(this).attr('data-name')+' es obligatorio');
  			$(this).css({'background':'#FDEDEC','border':'1px solid #EAEDED'});
  			$(this).attr('placeholder','Requerido');
  		}else if ($(this).val() !='') {
  			//errors.push('El campo '+$(this).attr('data-name')+' es obligatorio');
  			$(this).css({'background':'#fff','border':'1px solid #EAEDED'});
  			//$(this).attr('placeholder','Requerido');
  			//console.log($(this).getAttribute('class'));
  		}  			
  	});
  	return errors 	 
}

