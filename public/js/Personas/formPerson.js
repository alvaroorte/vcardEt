$( document ).ready(function() {
    if ( $("#type").text() == 'edit' ) {
        let dataPerson = JSON.parse($("#dataPerson").text());
        console.log(dataPerson);
        $("#cargo").val(dataPerson.cargo);
        $("#celular").val(dataPerson.celular);
        $("#correo").val(dataPerson.correo);
        $("#id_empresa").val(dataPerson.id_empresa);
        $("#id").val(dataPerson.id);
        $("#primer_apellido").val(dataPerson.primer_apellido);
        $("#primer_nombre").val(dataPerson.primer_nombre);
        $("#segundo_apellido").val(dataPerson.segundo_apellido);
        $("#segundo_nombre").val(dataPerson.segundo_nombre);
        $("#telefono").val(dataPerson.telefono);
        $("#interno").val(dataPerson.interno);
        $("#fax").val(dataPerson.fax);
    }

    $("#formPerson").submit( function(e) {
        e.preventDefault();
        $("#submitButton").html(`
            <button class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Guardando...
            </button>
        `);
        this.submit();
    })

});

