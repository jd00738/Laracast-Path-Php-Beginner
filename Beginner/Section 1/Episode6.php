<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1> Recomnended Books</h1>
    <?php
    $books = ["Do Android Dream of Electric sheep", "The Langoliers", "Hail Mary"]
    ?>

    <!-- CASUAL WAY OF WRITING FOREACH WITH HTML -->
    <!-- <ul>
        <?php
        // foreach ($books as $book) {
        //     echo "<li>$book</li>";
        // }

        ?>
    </ul> -->

    <!--  SHORT HAND / ALTERNATIVE SYNTAX FOR INTEGRATING PHP -->
    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>