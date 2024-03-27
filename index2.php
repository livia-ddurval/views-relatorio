<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "transito_livia";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if(isset($_GET['nome_turma'])) {
    $nome_turma = $_GET['nome_turma'];
    echo "Turma: $nome_turma"; // Depuração: Verifica se o nome da turma está correto
    
    $sql = "SELECT * FROM pedidos_utilizador_por_turma WHERE nome_turma = '$nome_turma'";
    echo "SQL: $sql"; // Depuração: Verifica a consulta SQL
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Alunos da Turma: $nome_turma</h1>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>Nome do Aluno: " . $row["nome_usuario"] . "</p>";
        }
    } else {
        echo "Nenhum aluno encontrado para esta turma";
    }
} else {
    echo "Turma não especificada";
}

mysqli_close($conn);
?>
