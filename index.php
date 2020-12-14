<?php 
include('TesteMonetizze.php');

$teste = new TesteMonetizze(6, 5);

?>

<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <?= $teste->getJogoHtml() ?>
</body>
</html>