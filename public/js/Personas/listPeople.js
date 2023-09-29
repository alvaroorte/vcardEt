$( document ).ready(function() {
    $('.formDeletePerson').submit(function(e){
        e.preventDefault();
        swal({
            title: "¿Estas seguro?",
            text: "Una vez borrado, ya no podras recuperar a la Persona.",
            icon: "warning",
            buttons: {
                cancel: {
                  text: "No",
                  visible: true,
                  className: "btn-secondary",
                  closeModal: true,
                },
                confirm: {
                  text: "Si",
                  visible: true,
                  className: "btn-danger",
                  closeModal: true
                }
              }
        })
        .then((result) => {
            if (result) {
                this.submit()
                swal("Se elimino a la Persona correctamente", {
                    icon: "success",
                    buttons: false
                });
            }
        });
    });
});

