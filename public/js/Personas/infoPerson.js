
$( document ).ready(function() {
    let rutaActual = window.location.href;
    new QRious({
        element: document.querySelector("#codigo"),
        value: rutaActual, 
        size: 150,
        backgroundAlpha: 0, // 0 para fondo transparente
        foreground: "#8bc34a", // Color del QR
        level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
    });


      // Genera y descarga el archivo vcard
	$(".downloadVcard").click( function(e) {
		GenerarVcard();
		let removecanvas = $("#vcardcanvas");
		removecanvas.remove();
	});
	
	$(".divLink").click( function(e) {
		const a = $(e.target).find('.alink')[0];
		if (a) {
			a.click();
		}
	});
	($('#fax').text().replace(/\s+/g, ' '))? console.log("siiiii: "+$('#fax').text().replace(/\s+/g, ' ')): console.log("nooooooo: "+$('#fax').text().replace(/\s/g, ' '));

	// Activa los tooltips
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	
});


function GenerarVcard(){
	//Base64 para imagen de FOTO
	var canvas = document.createElement("canvas");
	canvas.setAttribute("id", "canvas1");
	var ctx = canvas.getContext("2d");
	var imgFoto = document.getElementById("foto");
	ctx.drawImage(imgFoto, 0, 0);
	var dataURLFoto = canvas.toDataURL("image/png");
	var base64imgFoto = dataURLFoto.replace(/^data:image\/(png|jpg);base64,/, "");        
	var typeFoto = imgFoto.src.split('.').pop().split(/\#|\?/)[0];
	//Base64 para imagen de LOGO
	var canvas = document.createElement("canvas");
	canvas.setAttribute("id", "canvas2");
	var ctx = canvas.getContext("2d");
	var imgFondo = document.getElementById("fondo");
	ctx.drawImage(imgFondo, 0, 0);
	var dataURLLogo = canvas.toDataURL("image/png");
	var base64imgFondo = dataURLLogo.replace(/^data:image\/(png|jpg);base64,/, "");
	var typeFondo = imgFondo.src.split('.').pop().split(/\#|\?/)[0];

	// Genero la Tarjeta de la persona
	var person = vCard.create(vCard.Version.FOUR);
	person.add(vCard.Entry.FORMATTEDNAME, $('#nombre').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.NAME, $('#nombre').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.EMAIL, $('#correo').text().replace(/\s+/g, ' '), vCard.Type.WORK);
	person.add(vCard.Entry.PHOTO, base64imgFoto, ';ENCODING=b;TYPE='+ typeFoto);
	person.add(vCard.Entry.LOGO, base64imgFoto, ';ENCODING=b;TYPE='+ typeFoto );
	person.add(vCard.Entry.PHONE, $('#celular').text().replace(/\s+/g, ' '), vCard.Type.CELL);
	person.add(vCard.Entry.PHONE, $('#telefono').text().replace(/\s+/g, ' '), vCard.Type.WORK);
	person.add(vCard.Entry.PHONE, $('#interno').text().replace(/\s+/g, ' '), vCard.Type.INTERNO);
	person.add(vCard.Entry.FAX, $('#fax').text().replace(/\s+/g, ' '), vCard.Type.WORK);
	person.add(vCard.Entry.TITLE, $('#cargo').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.ROLE, $('#cargo').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.ORGANIZATION, $('#nombreEmpresa').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.URL, $('#paginaWeb').text().replace(/\s+/g, ' '));
	person.add(vCard.Entry.REVISION, new Date().toISOString());

	var link = vCard.export(person, $('#nombre').text().replace(/\s+/g, "_")) // use parameter true to force download
	$('#vcardcanvas')[0].appendChild(link);
}




