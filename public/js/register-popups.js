console.log('dwadawdaw')
// get the register links
$('#registration-id').click(function(){
    RegistrationType()
})

function RegistrationType(){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Are you a?',
        text: "Click the type of registration!",
        // icon: 'success',
        showCancelButton: true,
        confirmButtonText: 'Driver',
        // iwant to add a text here
        cancelButtonText: 'Client',
        reverseButtons: true,
        customClass: {
            confirmButton: 'btn btn-primary mr-2',
            cancelButton: 'btn btn-secondary',
          },
      }).then((result) => {
        if (result.isConfirmed) {
         let url = window.location.href
         window.location.href = `${url}register-driver`
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
            let url = window.location.href
            window.location.href = `${url}register`
        }
      })
}