$( document ).ready(function() {
    if ( $("#type").text() == 'edit' ) {
        let dataEmpresa = JSON.parse($("#dataEmpresa").text());
        $("#nombre").val(dataEmpresa.nombre);
        $("#pagina_web").val(dataEmpresa.pagina_web);
        $("#sigla").val(dataEmpresa.sigla);
        $("#id").val(dataEmpresa.id);
    }

    $("#formEmpresa").submit( function(e) {
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