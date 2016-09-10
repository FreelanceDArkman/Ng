$(function() {
$('.ckeditor').each(function(){
    CKEDITOR.replace( $(this).attr('id') ,{

    	language: 'th',
	toolbar: [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },

	

	{ name: 'styles', items: [ 'Styles', 'Format',  'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] }
	
	
	
	]
    } );
});
});

// CKEDITOR.replace( 'editor1', {
// 	// Load the German interface.
// 	language: 'th',
// 	toolbar: [
// 		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
// 	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },

// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
// 	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },


// 	'/',
// 	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
// 	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
// 	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
// 	{ name: 'others', items: [ '-' ] },
// 	{ name: 'about', items: [ 'About' ] }
// 	]
// });