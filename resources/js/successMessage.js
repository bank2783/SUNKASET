import Swal from 'sweetalert2'

export default function successMessage(msg) {
    Swal.fire(msg,'You clicked the button!', 'success')
}
