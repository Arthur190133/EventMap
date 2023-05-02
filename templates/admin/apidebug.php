<?php
$log_file = ini_get('error_log'); // Récupère le chemin vers le fichier d'erreur
$log_lines = file($log_file); // Lit le contenu du fichier d'erreur dans un tableau

// Extrait les 100 dernières lignes du tableau
$log_tail = array_reverse(array_slice($log_lines, -100, 100, true));





?>
    <link rel="stylesheet" type="text/css" href="/css/AdminPage.css">
<div class="admin-apidebug">
<?php // Affiche les lignes dans une balise pre
echo "<pre>";
foreach ($log_tail as $line) {
    echo $line;
}
echo "</pre>"; ?>
</div>