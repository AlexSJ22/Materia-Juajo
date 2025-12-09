$(function () {
	console.log('Comenzamos');
	$('div.ejemplo button').click(function () {
		var url = $(this).closest('.ejemplo').
			find('span.url').html();
		console.log('url: ' + url);
		var dato = $(this).closest('.ejemplo').
			find('span.dato').html();
		console.log('dato: ' + dato);
		url = encodeURI(url + '?codigo=' + dato);
		console.log('url: ' + url);
		$(this).closest('.ejemplo').
			find('div.resultado').load(url);
	});
})