<?php
session_start();
unset($_SESSION['word']);
unset($_SESSION['word_letters']);
unset($_SESSION['mistake']);
?>

<script>
    localStorage.clear();
    window.location = "index.php";
</script>