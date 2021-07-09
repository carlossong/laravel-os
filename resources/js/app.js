require('./bootstrap');

require('alpinejs');

import Swal from 'sweetalert2';

window.deleteConfirm = function(formId)

{
    Swal.fire({
        title: 'Tem certeza?',
        text: "Essa ação não poderá ser revertida!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!'
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire(
                'Deleted!',
                'Registro deletado.',
                'success'
            )
        }
    })
}

