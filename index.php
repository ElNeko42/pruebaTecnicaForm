<html>

<head>
    <title>PHP form</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/modal.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <form id="contactForm" action="procesar.php" method="post">
        <b>
            <h1>Contacta con nosotros</h1>
        </b>
        <div class="form-row">
            <div class="form-column">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre *" required>
            </div>
            <div class="form-column">

                <input type="email" id="email" name="email" placeholder="Email *" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-column">
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono">
            </div>
            <div class="form-column">

                <input type="text" id="asunto" name="asunto" placeholder="Asunto">
            </div>
        </div>
        <div class="form-row">
            <div class="form-column full-width">
                <textarea id="comentarios" name="comentarios" placeholder="Comentarios" required></textarea>
            </div>
        </div>
        <div class="form-row checkbox-row">
            <div class="form-column full-width checkbox-container">
                <input type="checkbox" id="politica" name="politica" required>
                <label for="politica">He leído y acepto la <a style="color:#0a8eb3 ;">política de privacidad</a></label>
                </input>
            </div>
        </div>
        <div class="form-row">
            <div class="form-column full-width">
                <button type="submit">Enviar</button>
            </div>
        </div>
    </form>

    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Tu mensaje ha sido enviado correctamente.</p>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'procesar.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Aquí activas el modal en vez de mostrar la respuesta directamente
                        $('#successModal').show();
                    }
                });
            });

            // Cuando el usuario hace clic en <span> (x), cierra el modal
            $('.close').on('click', function() {
                $('#successModal').hide();
                $('#contactForm').trigger('reset');
            });

            // Cuando el usuario hace clic en cualquier lugar fuera del modal, ciérralo
            $(window).on('click', function(event) {
                if ($(event.target).is('#successModal')) {
                    $('#successModal').hide();
                }
            });
        });
    </script>
</body>

</html>