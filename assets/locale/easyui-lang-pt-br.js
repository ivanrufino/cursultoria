if ($.fn.pagination){
	$.fn.pagination.defaults.beforePageText = 'P&aacute;gina';
	$.fn.pagination.defaults.afterPageText = 'de {pages}';
	$.fn.pagination.defaults.displayMsg = 'Mostrando {from} a {to} de {total} registros';
}
if ($.fn.datagrid){
	$.fn.datagrid.defaults.loadMsg = 'Procesando, por favor aguarde ...';
}
if ($.fn.treegrid && $.fn.datagrid){
	$.fn.treegrid.defaults.loadMsg = $.fn.datagrid.defaults.loadMsg;
}
if ($.messager){
	$.messager.defaults.ok = 'OK';
	$.messager.defaults.cancel = 'Cancelar';
}
if ($.fn.validatebox){
	$.fn.validatebox.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
	$.fn.validatebox.defaults.rules.email.message = 'Por favor insira um email v&aacute;lido.';
	$.fn.validatebox.defaults.rules.url.message = 'Por favor insira uma URL v&aacute;lida.';
	$.fn.validatebox.defaults.rules.length.message = 'Por favor insira um valor entre {0} y {1}.';
	$.fn.validatebox.defaults.rules.remote.message = 'Por favor corrija este campo.';
}
if ($.fn.numberbox){
	$.fn.numberbox.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
}
if ($.fn.combobox){
	$.fn.combobox.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
}
if ($.fn.combotree){
	$.fn.combotree.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
}
if ($.fn.combogrid){
	$.fn.combogrid.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
}
if ($.fn.calendar){
	$.fn.calendar.defaults.weeks = ['Do','Se','Te','Qu','Qu','Se','Sa'];
	$.fn.calendar.defaults.months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
}
if ($.fn.datebox){
	$.fn.datebox.defaults.currentText = 'Ol&aacute;';
	$.fn.datebox.defaults.closeText = 'Fechar';
	$.fn.datebox.defaults.okText = 'OK';
	$.fn.datebox.defaults.missingMessage = 'Este campo &eacute; obrigat&oacute;rio.';
}
if ($.fn.datetimebox && $.fn.datebox){
	$.extend($.fn.datetimebox.defaults,{
		currentText: $.fn.datebox.defaults.currentText,
		closeText: $.fn.datebox.defaults.closeText,
		okText: $.fn.datebox.defaults.okText,
		missingMessage: $.fn.datebox.defaults.missingMessage
	});
}
