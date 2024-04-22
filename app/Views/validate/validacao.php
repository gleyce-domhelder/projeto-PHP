<?php
// Verifica se os campos de email e senha foram enviados
if(isset($_POST['email']) && isset($_POST['password'])) {
    // Verifica se o email e a senha estão corretos (aqui você faria a verificação com o seu banco de dados)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Exemplo de verificação simples
    if($email === 'usuario@example.com' && $password === 'senha123') {
        echo "Login bem-sucedido!";
    } else {
        echo "Email ou senha incorretos.";
    }
} else {
    // Se os campos não foram enviados, redireciona de volta para a página de login
    header("Location: index.php");
    exit();
}
?>
