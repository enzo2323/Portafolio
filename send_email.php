<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Verifica que los datos no estén vacíos
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Por favor completa el formulario correctamente.";
        exit;
    }

    // Configuración del correo
    $recipient = "gonzalezenzo851@gmail.com"; // Reemplaza con tu dirección de Gmail
    $subject = "Nuevo mensaje de $name";
    
    // Contenido del correo
    $email_content = "Nombre: $name\n";
    $email_content .= "Correo electrónico: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Encabezados del correo
    $email_headers = "De: $name <$email>";

    // Enviar el correo
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Gracias! Tu mensaje ha sido enviado y me pondré en contacto enseguida.";
    } else {
        http_response_code(500);
        echo "Ups! Ocurrió un problema y no pude enviar tu mensaje. Contactame por Ig: @zh_enzoo";
    }

} else {
    http_response_code(403);
    echo "Hubo un problema con el envío de tu mensaje, intenta nuevamente.";
}
?>
