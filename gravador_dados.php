<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'nome_do_banco';
$user = 'seu_usuario';
$pass = 'sua_senha';

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados do formulário
    $nome_receita = $_POST['nome_receita'];
    $ingredientes = $_POST['ingredientes'];
    $modo_de_preparo = $_POST['modo_de_preparo'];
    $email = $_POST['email'];

    // Validação simples dos dados
    if(!empty($nome_receita) && !empty($ingredientes) && !empty($modo_de_preparo) && !empty($email)) {

        // Inserir os dados na tabela `receitas`
        $sql = "INSERT INTO receitas (nome_receita, ingredientes, modo_de_preparo, email) VALUES (:nome_receita, :ingredientes, :modo_de_preparo, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_receita', $nome_receita);
        $stmt->bindParam(':ingredientes', $ingredientes);
        $stmt->bindParam(':modo_de_preparo', $modo_de_preparo);
        $stmt->bindParam(':email', $email);

        // Executa a inserção e exibe uma mensagem de sucesso
        if ($stmt->execute()) 
            echo "Receita salva com sucesso!";
        } else {
            echo "Erro ao salvar a receita.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }

} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
