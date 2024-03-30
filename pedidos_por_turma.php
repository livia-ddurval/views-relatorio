<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pedidos por Turma</title>
 
</head>
<body>
    <nav> <h1>Pedidos por turma</h1></nav>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transito_livia";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT * FROM pedidos_por_turma";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='view'>";
        echo "<div class='turma'>";
        echo "<h2>Nome da Turma: " . $row["nome_turma"] . "</h2>";
        echo "<p>Total de Pedidos: " . $row["total_pedidos"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nenhum resultado encontrado";
}

mysqli_close($conn);
?>

</body>
</html>
