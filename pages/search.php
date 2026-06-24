<?php
    include('../inc/functions.php');

    $departments = get_all_departments();

    // Récupération des critères (?? '' évite le warning si le champ est absent)
    $dept_no = $_GET['dept_no'] ?? '';
    $name    = $_GET['name']    ?? '';
    $age_min = $_GET['age_min'] ?? '';
    $age_max = $_GET['age_max'] ?? '';

    // On ne lance la recherche que si le formulaire a été soumis
    $submitted = isset($_GET['dept_no']);
    $results   = $submitted ? search_employees($dept_no, $name, $age_min, $age_max) : array();
?>
<html>
    <head>
        <title>Recherche d'employés</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar">
        

    <p><a href="index.php">&larr; Retour aux départements</a></p>
    </nav>
    <div class="container">
    <h1>Recherche d'employés</h1>
    <div class="card">

    <form method="get" action="search.php">
        <p>
        <div class="form-group">
            Département :
            <select name="dept_no">
                <option value="">— Tous —</option>
                <?php foreach ($departments as $d) { ?>
                    <option value="<?= $d['dept_no'] ?>" <?= $dept_no === $d['dept_no'] ? 'selected' : '' ?>>
                        <?= $d['dept_name'] ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p><div class="form-group">Nom de l'employé : <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"></div></p>
        <p><div class="form-group"></div>Âge min : <input type="number" name="age_min" value="<?= htmlspecialchars($age_min) ?>"></div></p>
        <p><div class="form-group">Âge max : <input type="number" name="age_max" value="<?= htmlspecialchars($age_max) ?>"></div></p>
        <p><div class="form"</div><input type="submit" value="Rechercher"></p>
    </form>

    <?php if ($submitted) { ?>
        <h2><?= count($results) ?> résultat(s)<?= count($results) === 200 ? ' (limité à 200)' : '' ?></h2>
        <table border="1">
            <tr>
                <th>N°</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Genre</th>
                <th>Âge</th>
                <th>Département</th>
            </tr>
            <?php foreach ($results as $emp) { ?>
                <tr>
                    <th><a href="fiche.php?emp_no=<?= urlencode($emp['emp_no']) ?>"><?= $emp['emp_no'] ?></a></th>
                    <th><?= $emp['first_name'] ?></th>
                    <th><?= $emp['last_name'] ?></th>
                    <th><?= $emp['gender'] ?></th>
                    <th><?= $emp['age'] ?></th>
                    <th><?= $emp['dept_name'] ?></th>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    </div>
    </div>
    </body>
</html>
