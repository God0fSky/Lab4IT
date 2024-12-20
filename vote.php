<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Перевірка, чи вибрано мову програмування
    if (isset($_POST['language'])) {
        $vote = $_POST['language'];
        $file = 'votes.txt';

        // Читання поточних результатів з файлу
        $votes = file_exists($file) ? file_get_contents($file) : "C++: 0\nPHP: 0\nJava: 0\n";
        $voteArray = explode("\n", $votes);
        $voteCount = [];

        foreach ($voteArray as $line) {
            if (empty($line)) continue;
            list($lang, $count) = explode(': ', $line);
            $voteCount[$lang] = (int)$count;
        }

        // Збільшення лічильника відповідної мови
        if (isset($voteCount[$vote])) {
            $voteCount[$vote]++;
        }

        // Запис оновлених результатів
        $newVotes = '';
        foreach ($voteCount as $lang => $count) {
            $newVotes .= "$lang: $count\n";
        }

        file_put_contents($file, $newVotes);

        // Перенаправлення на сторінку результатів
        header('Location: results.php');
        exit();
    }
}
?>
