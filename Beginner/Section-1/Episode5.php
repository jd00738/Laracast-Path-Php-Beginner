<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Episode 5</title>
    <style>
        body {
            display: grid;
            height: 100vh;
            place-items: center;
            margin: 0;
            font-family: 'Circular-Loom';

        }
    </style>
</head>

<body>

    <?php
    $bookName = "Dark Matter";
    $read = true;
    if ($read) {
        $message = "You have read $bookName";
    } else {
        $message = "You have not read $bookName";
    }
    ?>

    <h1>
        <!-- ?= is same like init php tag it's to echo variable -->
        <?= $message ?>
    </h1>
</body>

</html>