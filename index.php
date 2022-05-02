<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/page.php';
$page = new page();
?>

<head>
    <?php
    $page->favicons();
    ?>
</head>

<?php
header('Location: /login/');
?>