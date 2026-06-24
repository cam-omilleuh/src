ca
<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors' , 1);

    include('../inc/functions.php');
    $departments = get_all_departments();

?>		
<html>
    <head>
        <title>Les news</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar">
    <h1>Liste des départements</h1>
    <p><a href="search.php">🔍 Rechercher un employé</a></p>
    <p><a href="stats.php">📊 Statistiques par emploi</a></p>
    <p><a href="dept_form.php">➕ Ajouter un département</a></p>
    <p><a href="emp_form.php">➕ Ajouter un employé</a></p>
    </nav>
    <div class="container">
 <table class="table">
    <tr>
        <th>Department Number</th>
        <th>Department Name</th>
        <th>Manager actuel</th>
        <th>Nombre d'employés</th>
        <th>Action</th>
    </tr>
    <?php foreach ($departments as $line) {?>
        <tr>
            <th><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></th>
            <th><?=$line['dept_name']?></th>
            <th><?= $line['manager_name'] ?? '—' ?></th>
            <th><?= $line['nb_employees'] ?></th>
            <th><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></th>
        </tr>
    <?php } ?>
    </table>
    </div>

    </body>
</html>
