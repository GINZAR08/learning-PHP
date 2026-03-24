<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Index of examples</title>
</head>

<body>
    <h2>Index of examples</h2>
    <?php
    $dir = opendir('.');
    while (false !== ($page = readdir($dir))) {
        if ($page != '.' && $page != '..' && $page != basename(__FILE__)) {
            echo "<p><a href='./$page'>$page</a></p>";
        }
    }
    closedir($dir);
    ?>
</body>

</html>