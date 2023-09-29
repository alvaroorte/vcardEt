$( document ).ready(function() {
    if ( $("#type").text() == 'edit' ) {
        let dataUser = JSON.parse($("#dataUser").text());
        console.log(dataUser);
        $("#name").val(dataUser.name);
        $("#email").val(dataUser.email);
        $("#id").val(dataUser.id);

        $("#changePassword").change( function(e) {
            if ($(this).prop('checked')) {
                $("#password").attr('disabled', false);
                $("#password_confirmation").attr('disabled', false);
            } else {
                $("#password").attr('disabled', true).val("");
                $("#password_confirmation").attr('disabled', true).val("");
            }
        })
    } else {
        $("#password").attr('disabled', false);
        $("#password_confirmation").attr('disabled', false);
    }

    $("#formUser").submit( function(e) {
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