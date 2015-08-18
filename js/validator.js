/*!
 * Funciones para la Validacion de Formularios.
 * @version     v0.0.1, inicio del desarrollado el 2015-07-30 14:23:18 PM
 * @author      https://twitter.com/luisgvillasenor
 * @copyright   (c) 2015 Luis Gabriel Villaseñor Alarcón
 *
 *
 *
 * Se utiuliza el BootstrapValidator (http://bootstrapvalidator.com)
 * The best jQuery plugin to validate form fields. Designed to use with Bootstrap 3
 *
 * @version     v0.5.3, built on 2014-11-05 9:14:18 PM
 * @author      https://twitter.com/nghuuphuoc
 * @copyright   (c) 2013 - 2014 Nguyen Huu Phuoc
 * @license     Commercial: http://bootstrapvalidator.com/license/
 *              Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
$(document).ready(function() {


$('#loginFormModalPermisosRol').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 componente: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre de componente es requerido'
				 }
			 }
		 },
		 recurso: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre de recurso es requerido'
				 }
			 }
		 },
		 permiso: {
			 validators: {
				 notEmpty: {
					 message: 'El permiso es requerido'
				 }
			 }
		 },
		 id_tipo: {
			 validators: {
				 notEmpty: {
					 message: 'El id_tipo es requerido'
				 }
			 }
		 }
	 }
});



$('#ModalNuevoUser').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 nombre: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre es requerido'
				 }
			 }
		 },
		 username: {
			 validators: {
				 notEmpty: {
					 message: 'El username es requerido'
				 }
			 }
		 },
		 password: {
			 validators: {
				 notEmpty: {
					 message: 'El password es requerido'
				 }
			 }
		 },
		  email: {
			 validators: {
				 notEmpty: {
					 message: 'El e-mail es requerido'
				 }
			 }
		 },
		  tel: {
			 validators: {
				 notEmpty: {
					 message: 'El telefono es requerido'
				 }
			 }
		 },
		  id_status: {
			 validators: {
				 notEmpty: {
					 message: 'El status es requerido'
				 }
			 }
		 }
	 }
});

$('#ModalEditarUser').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 nombre: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre es requerido'
				 }
			 }
		 },
		 username: {
			 validators: {
				 notEmpty: {
					 message: 'El username es requerido'
				 }
			 }
		 },
		 password: {
			 validators: {
				 notEmpty: {
					 message: 'El password es requerido'
				 }
			 }
		 },
		  email: {
			 validators: {
				 notEmpty: {
					 message: 'El e-mail es requerido'
				 }
			 }
		 },
		  tel: {
			 validators: {
				 notEmpty: {
					 message: 'El telefono es requerido'
				 }
			 }
		 },
		  id_status: {
			 validators: {
				 notEmpty: {
					 message: 'El status es requerido'
				 }
			 }
		 }
	 }
});


$('#ModalCPUNuevo').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 num_inventario: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de inventario es requerido'
				 }
			 }
		 },
		 categoria: {
			 validators: {
				 notEmpty: {
					 message: 'La categoria es requerida'
				 }
			 }
		 },
		 marca: {
			 validators: {
				 notEmpty: {
					 message: 'La marca es requerida'
				 }
			 }
		 },
		 modelo: {
			 validators: {
				 notEmpty: {
					 message: 'El modelo es requerido'
				 }
			 }
		 },
		  hostname: {
			 validators: {
				 notEmpty: {
					 message: 'El hostname es requerido'
				 }
			 }
		 },
		  num_serie: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de serie es requerido'
				 }
			 }
		 },
		  tipo: {
			 validators: {
				 notEmpty: {
					 message: 'El tipo es requerido'
				 }
			 }
		 },
		 ubicacion: {
			 validators: {
				 notEmpty: {
					 message: 'La ubicacion es requerida'
				 }
			 }
		 }
	 }
});



$('#ModalCPUEditar').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 num_inventario: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de inventario es requerido'
				 }
			 }
		 },
		 categoria: {
			 validators: {
				 notEmpty: {
					 message: 'La categoria es requerida'
				 }
			 }
		 },
		 marca: {
			 validators: {
				 notEmpty: {
					 message: 'La marca es requerida'
				 }
			 }
		 },
		 modelo: {
			 validators: {
				 notEmpty: {
					 message: 'El modelo es requerido'
				 }
			 }
		 },
		  hostname: {
			 validators: {
				 notEmpty: {
					 message: 'El host name es requerido'
				 }
			 }
		 },
		  num_serie: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de serie es requerido'
				 }
			 }
		 },
		  tipo: {
			 validators: {
				 notEmpty: {
					 message: 'El tipo es requerido'
				 }
			 }
		 },
		 ubicacion: {
			 validators: {
				 notEmpty: {
					 message: 'La ubicacion es requerida'
				 }
			 }
		 }
	 }
});


$('#ModalCPUReasignar').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 ubicacion: {
			 validators: {
				 notEmpty: {
					 message: 'La ubicacion es requerida'
				 }
			 }
		 }
	 }
});


$('#ModalEmpleadoNuevo').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 codigo_empleado: {
			 validators: {
				 notEmpty: {
					 message: 'El codigo de empleado no existente es requerido'
				 }
			 }
		 },
		 nombre_completo: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre completo es requerida'
				 }
			 }
		 },
		 unidad: {
			 validators: {
				 notEmpty: {
					 message: 'La unidad es requerida'
				 }
			 }
		 },
		 usuario_de_red: {
			 validators: {
				 notEmpty: {
					 message: 'El usuario de red es requerido'
				 }
			 }
		 },
		  contrasena: {
			 validators: {
				 notEmpty: {
					 message: 'La contraseña es requerido'
				 }
			 }
		 },
		  num_extension: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de extension es requerido'
				 }
			 }
		 },
		  correo_electonico: {
			 validators: {
				 notEmpty: {
					 message: 'El correo electronico es requerido'
				 }
			 }
		 },
		 area: {
			 validators: {
				 notEmpty: {
					 message: 'El area es requerida'
				 }
			 }
		 },
		 cargo: {
			 validators: {
				 notEmpty: {
					 message: 'El cargo es requerido'
				 }
			 }
		 }
	 }
});

$('#ModalEmpleadoEditar').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 codigo_empleado: {
			 validators: {
				 notEmpty: {
					 message: 'El codigo de empleado no existente es requerido'
				 }
			 }
		 },
		 nombre_completo: {
			 validators: {
				 notEmpty: {
					 message: 'El nombre completo es requerida'
				 }
			 }
		 },
		 unidad: {
			 validators: {
				 notEmpty: {
					 message: 'La unidad es requerida'
				 }
			 }
		 },
		 usuario_de_red: {
			 validators: {
				 notEmpty: {
					 message: 'El usuario de red es requerido'
				 }
			 }
		 },
		  contrasena: {
			 validators: {
				 notEmpty: {
					 message: 'La contraseña es requerido'
				 }
			 }
		 },
		  num_extension: {
			 validators: {
				 notEmpty: {
					 message: 'El numero de extension es requerido'
				 }
			 }
		 },
		  correo_electonico: {
			 validators: {
				 notEmpty: {
					 message: 'El correo electronico es requerido'
				 }
			 }
		 },
		 area: {
			 validators: {
				 notEmpty: {
					 message: 'El area es requerida'
				 }
			 }
		 },
		 cargo: {
			 validators: {
				 notEmpty: {
					 message: 'El cargo es requerido'
				 }
			 }
		 },
		 id_status: {
			 validators: {
				 notEmpty: {
					 message: 'El status es requerido'
				 }
			 }
		 }
	 }
});

$('#NuevoPermisosCarpeta').bootstrapValidator({
	 message: 'Este valor no es valido',
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {
		 capacidad_correo: {
			 validators: {
				 notEmpty: {
					 message: 'La capacidad es requerida'
				 }
			 }
		 },
		 otros_servicios: {
			 validators: {
				 notEmpty: {
					 message: 'La informacion es requerida'
				 }
			 }
		 }
	 }
});


});