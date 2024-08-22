document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Obtén los datos del formulario
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Valida los datos
    if (name && email && message) {
        alert('Mensaje enviado exitosamente');
        // Aquí podrías enviar los datos a un servidor
        this.reset(); // Limpiar el formulario
    } else {
        alert('Por favor, completa todos los campos.');
    }
});
