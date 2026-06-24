<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
?>
<html>
    <head>
        <title>Statistiques par emploi</title>
    </head>
    <body>
    <p><a href="index.php">&larr; Retour aux départements</a></p>
    <h1>Statistiques par emploi</h1>

    <table border="1">
        <tr>
            <th>Emploi</th>
            <th>Hommes</th>
            <th>Femmes</th>
            <th>Total</th>
            <th>Salaire moyen</th>
        </tr>
        <?php foreach ($stats as $row) { ?>
            <tr>
                <th><?= $row['title'] ?></th>
                <th><?= $row['nb_hommes'] ?></th>
                <th><?= $row['nb_femmes'] ?></th>
                <th><?= $row['nb_total'] ?></th>
                <th><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</th>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>
