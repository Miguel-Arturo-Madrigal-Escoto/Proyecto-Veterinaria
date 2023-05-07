

const formDelete = document.getElementById('form-delete');

formDelete.addEventListener('submit', (e) => {
    e.preventDefault();

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Este proceso no es reversible',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) formDelete.submit();
    })

})



