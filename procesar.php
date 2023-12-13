<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $asunto = $conn->real_escape_string($_POST['asunto']);
    $comentarios = $conn->real_escape_string($_POST['comentarios']);
  
    
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, tlf, asunto, comentario) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $email, $telefono, $asunto, $comentarios);
  
    
    if ($stmt->execute()) {
      echo "Nuevo registro creado.";
    } else {
      echo "Error: " . $stmt->error;
    }
  

    $stmt->close();
    $conn->close();
  } else {
    echo "Método de solicitud no permitido";
  }
  ?>