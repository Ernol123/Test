<?php
session_start();
$win = $_POST['nick'] ?? null;
if ($win != null) {
    require('./db_con.php');
?>
    <script>
        const time = localStorage.getItem("time")
    </script>
    <?php
    $score = 300 - (int)$_COOKIE['time'] - (int)$_SESSION['mistake'];
    echo $score;
    try {
        $stmt = $db->query("SELECT id FROM words WHERE word = '{$_SESSION['word']}';");
    } catch (PDOException $exc) {
        exit('Error: ' . $exc->getMessage());
    }
    foreach ($stmt->fetchAll() as $row) {
        $word_id = $row['id'];
    }

    try {
        $stmt = $db->query("INSERT INTO players VALUES(NULL,'{$win}','{$score}','{$word_id}');");
    } catch (PDOException $exc) {
        exit('Error: ' . $exc->getMessage());
    }
    ?>
    <script>
        window.location = "clean.php";
    </script>
<?php
} else {

    $userLetter = $_POST['userLetter'];
    $lenght = mb_strlen($userLetter);

    $userLetter = mb_str_split($userLetter);
    var_dump($userLetter);

    for ($i = 0; $i < $lenght; $i++) {
        if (str_contains($_SESSION['word'], mb_strtolower($userLetter[$i], 'UTF-8'))) {
            if (!in_array(mb_strtolower($userLetter[$i], 'UTF-8'), $_SESSION['word_letters'])) {
                array_push($_SESSION['word_letters'], mb_strtolower($userLetter[$i], 'UTF-8'));
            }
        } else {
            $_SESSION['mistake'] += 1;
        }
    }
    header('Location:./index.php');
}