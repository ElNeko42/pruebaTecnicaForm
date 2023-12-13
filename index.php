<html>

<head>
    <title>PHP form</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <form id="contactForm" action="procesar.php" method="post">
        <b>
            <h1>Contacta con nosotros</h1>
        </b>
        <div class="form-row">
            <div class="form-column">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre *" required>
            </div>
            <div class="form-column">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-column">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
            <div class="form-column">
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto">
            </div>
        </div>
        <div class="form-row">
            <div class="form-column full-width">
                <label for="comentarios">Comentarios *</label>
                <textarea id="comentarios" name="comentarios" required></textarea>
            </div>
        </div>
        <div class="form-row checkbox-row">
            <div class="form-column full-width checkbox-container">
                <input type="checkbox" id="politica" name="politica" required>
                <label for="politica">He leído y acepto la política de privacidad.</label>
                </input>
            </div>
        </div>
        <div class="form-row">
            <div class="form-column full-width">
                <button type="submit">Enviar</button>
            </div>
        </div>
    </form>

    <div id="formResponse" style="display: none;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault(); // Evitar el envío tradicional del formulario

                // Verificar si el formulario es válido
                if (this.checkValidity()) {
                    $.ajax({
                        type: 'POST',
                        url: 'procesar.php', // Archivo PHP que procesará los datos
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#formResponse').html(response); // Muestra la respuesta del servidor
                        }
                    });
                } else {
                    $('#formResponse').html('<p>Por favor, complete todos los campos requeridos.</p>');
                }
            });
        });
    </script>
</body>

</html>