<?php
$log_file = ini_get('error_log'); // Récupère le chemin vers le fichier d'erreur
$log_lines = file($log_file); // Lit le contenu du fichier d'erreur dans un tableau

// Extrait les 100 dernières lignes du tableau
$log_tail = array_reverse(array_slice($log_lines, -100, 100, true));





?>
    <link rel="stylesheet" type="text/css" href="/css/AdminPage.css">
<div class="admin-apidebug">
<?php // Affiche les lignes dans une balise pre
echo "<p>";
foreach ($log_tail as $line) {
    $timestamp_pattern = '/^\[(.+)\]/'; // Expression régulière pour extraire le timestamp du début de la ligne
    if (preg_match($timestamp_pattern, $line, $matches)) {
        $timestamp = strtotime($matches[1]); // Convertit la chaîne de caractères en timestamp Unix
        
        $minute = date('Y-m-d H:i', $timestamp); // Formatte le timestamp en minute (ex: 2023-04-28 15:30)
        
        // Ajoute la ligne au tableau associatif pour la minute correspondante
        if (!isset($log_by_minute[$minute])) {
            $log_by_minute[$minute] = array();
        }
        $log_by_minute[$minute][] = $line;
    }
    echo $line . "<br><br>
    ---------------------------------------------------<br><br>
    ";
}
echo "<br><br><br><br><br><br></p>"; ?>
</div>