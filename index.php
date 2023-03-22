<?php
session_start();
require('./db_con.php');

if (!isset($_SESSION['word_letters'])) {
    $_SESSION['word_letters'] = array();
}

if (!isset($_SESSION['mistake'])) {
    $_SESSION['mistake'] = 0;
}

if (!isset($_SESSION['word'])) {
    $random = rand(2, 100);
    try {
        $stmt = $db->query("SELECT * FROM words WHERE id = '{$random}';");
    } catch (PDOException $exc) {
        exit('Error: ' . $exc->getMessage());
    }

    foreach ($stmt->fetchAll() as $row) {
        $_SESSION['word'] = $row['word'];
    }
}

$lenght = mb_strlen($_SESSION['word']);
$mb_word = mb_str_split($_SESSION['word']);

try {
    $stmt = $db->query("SELECT id FROM words WHERE word = '{$_SESSION['word']}';");
} catch (PDOException $exc) {
    exit('Error: ' . $exc->getMessage());
}
foreach ($stmt->fetchAll() as $row) {
    $word_id = $row['id'];
}

try {
    $stmt = $db->query("SELECT * FROM players WHERE word_id = '{$word_id}' GROUP BY score;");
} catch (PDOException $exc) {
    exit('Error: ' . $exc->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisielec</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <script src="script/script.js"></script>
    <main>
        <div class="time">
            <p>Czas: <span id="t-2"></span></p>
        </div>

        <div class="ranking">
            <p class="winners">Najszybsze czasy graczy<br>dla tego słowa:</p>
            <?php
            $i = 0;
            foreach ($stmt->fetchAll() as $row) {
                if ($row['nickname'] != null) {
                    $i += 1;
                }
            ?>
                <p class="place_<?= $i ?>"><?= $i ?> . <?= $row['nickname'] ?></p>
            <?php

                if ($i == 3) {
                    break;
                }
            }
            ?>
        </div>

        <div class="hangman">
            <?php $img_url = "./images/hangman_$_SESSION[mistake].png"; ?>
            <img width="350px" height="350px" src="<?= $img_url ?>">
        </div>
        <div class="word">
            <?php
            $win = true;
            for ($i = 0; $i < $lenght; $i++) {
                if (in_array($mb_word[$i], $_SESSION['word_letters'])) {
                    echo $mb_word[$i] . ' ';
                } else {
                    $win = false;
                    echo '_ ';
                }
            }

            if ($win) {
            ?>
                <script>
                    timeStop = true
                </script>
                <div class="win">
                    <h2>Zwycięstwo</h2>
                    <p>Odgadnięty wyraz to</p>
                    <p class="word"><?= $_SESSION['word'] ?></p>
                    <p class="nick">Podaj swój nick</p>
                    <form action="config.php" method="post">
                        <input type="text" name="nick">
                        <br>
                        <button type="submit">Wyślij</button>
                    </form>
                </div>
            <?php
            }

            if ($_SESSION['mistake'] >= 11) {
            ?>
                <div class="win loss" id="loss">
                    <h2>Przegrana</h2>
                    <p>Wyraz to</p>
                    <p class="word"><?= $_SESSION['word'] ?></p>
                    <p class="nick">Powiesili Cię</p>
                    <form action="clean.php" method="post">
                        <button type="submit">Zagraj jeszcze raz</button>
                    </form>
                </div>
            <?php
            }

            $alphabet = array('A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'Ń', 'O', 'Ó', 'P', 'R', 'S', 'Ś', 'T', 'U', 'W', 'Y', 'Z', 'Ź', 'Ż');
            ?>
            <div class="win loss" id="loss" style="display:none">
                <h2>Przegrana</h2>
                <p>Wyraz to</p>
                <p class="word"><?= $_SESSION['word'] ?></p>
                <p class="nick">Koniec czasu</p>
                <form action="clean.php" method="post">
                    <button type="submit">Zagraj jeszcze raz</button>
                </form>
            </div>
        </div>
        <div class="letters">
            <form action="./config.php" method="post">
                <?php foreach ($alphabet as $a) : ?>
                    <button name="userLetter" value="<?= $a ?>"><?= $a ?></button>
                <?php endforeach; ?>
            </form>
        </div>
    </main>

</body>

</html>