<?php
    include_once 'connect.php';
    include 'methods.php';
    $db = new connect();
    $conn = $db->getConn();
    $meth = new methods();
?>
<!DOCTYPE html>
    <head>
        <script src="script.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <div>
                <select id="tableSelect">
                    <?php $meth->getTabelas($conn) ?>
                </select>
            </div>
            <div>
                <?php $meth->getDados($conn) ?>
            </div>
            <form class="insert-form">

            </form>
            <form class="update-form">

            </form>
            <form class="delete-form">

            </form>
        </main>
    </body>
</html>