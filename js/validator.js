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