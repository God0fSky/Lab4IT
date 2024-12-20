<?php
$file = 'votes.txt';
if (file_exists($file)) {
    $votes = file_get_contents($file);
} else {
    $votes = "C++: 0\nPHP: 0\nJava: 0\n";
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результати голосування</title>
</head>
<body>
    <h2>Результати голосування</h2>
    <pre><?php echo $votes; ?></pre>
    <a href="form.html">Назад до форми голосування</a>
</body>
</html>
