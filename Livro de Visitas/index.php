<!DOCTYPE html>
<html>
<head>
    <title>Livro de Visitas</title>
</head>
<body>
    <h2>Livro de Visitas</h2>

    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="mensagem">Mensagem:</label><br>
        <textarea id="mensagem" name="mensagem" required></textarea><br><br>
        <button type="submit" name="enviar">Enviar</button>
    </form>

    <?php
    // Função para salvar uma nova entrada no livro de visitas
    function salvarEntrada($nome, $mensagem) {
        // Abre ou cria o arquivo de livro de visitas
        $arquivo = fopen('livro_de_visitas.txt', 'a');
        // Formata a entrada
        $entrada = "$nome: $mensagem\n";
        // Escreve a entrada no arquivo
        fwrite($arquivo, $entrada);
        // Fecha o arquivo
        fclose($arquivo);
    }

    // Função para exibir todas as entradas do livro de visitas
    function exibirEntradas() {
        // Verifica se o arquivo existe
        if (file_exists('livro_de_visitas.txt')) {
            // Lê o conteúdo do arquivo e exibe as entradas
            $conteudo = file_get_contents('livro_de_visitas.txt');
            echo "<h3>Comentários:</h3>";
            echo "<pre>$conteudo</pre>";
        } else {
            echo "<p>Nenhum comentário encontrado.</p>";
        }
    }

    // Verifica se o formulário foi enviado
    if (isset($_POST['enviar'])) {
        $nome = $_POST['nome'];
        $mensagem = $_POST['mensagem'];

        // Salva a entrada no livro de visitas
        salvarEntrada($nome, $mensagem);
        // Exibe todas as entradas atualizadas
        exibirEntradas();
    } else {
        // Se o formulário não foi enviado, apenas exibe as entradas existentes
        exibirEntradas();
    }
    ?>
</body>
</html>
