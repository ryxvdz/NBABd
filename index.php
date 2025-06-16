<?php
    include_once 'connect.php';
    include 'methods.php';
    $db = new connect();
    $conn = $db->getConn();
    $meth = new methods();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Stats Central</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="nba-header">
        <div class="container">
            <h1><a href="#" class="site-title">NBA Stats Central</a></h1>
            <nav class="main-nav">
                <ul>
                    <li><a href="#data-display">Estatísticas</a></li>
                    <li><a href="#forms-section">Gerenciar Dados</a></li>
                    <li><a href="#">Times</a></li>
                    <li><a href="#">Jogadores</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="nba-main-content container">
        <section id="data-selection" class="card">
            <h2>Selecionar Dados da NBA</h2>
            <div class="select-wrapper">
                <label for="tableSelect">Escolha uma tabela:</label>
                <select id="tableSelect" class="nba-select">
                    <?php $meth->getTabelas($conn) ?>
                </select>
            </div>
        </section>

        <section id="data-display" class="card">
            <h2>Dados Atuais</h2>
            <div class="data-results">
                <?php $meth->getDados($conn) ?>
            </div>
        </section>
        
        <hr>

       
    </main>

    <footer class="nba-footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> NBA Stats Central. Todos os direitos reservados.</p>
            <p>Desenvolvido com paixão pelo basquete.</p>
        </div>
    </footer>
</body>
</html>