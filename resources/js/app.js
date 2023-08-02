import './bootstrap';
import Swal from 'sweetalert2'

window.addEventListener('swal:confirm', event => {
    Swal.fire({
        title: event.detail[0].message,
        text: event.detail[0].text,
        icon: event.detail[0].type,
        showCancelButton: true,
    })
        .then((prompt) => {
            if (prompt.isConfirmed) {
                console.log(Livewire.dispatch(`${event.detail[0].dispatch}`))
                Livewire.dispatch(`${event.detail[0].dispatch}`);
            }
        });
});


window.addEventListener('swal:alert', event => {
    Swal.fire({
        title: event.detail[0].message,
        text: event.detail[0].text,
        icon: event.detail[0].type,
    }).then(() => {
        Livewire.dispatch(event.detail[0].dispatch)
    });
})
