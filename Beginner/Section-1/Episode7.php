<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1> Recomnended Books</h1>
    <?php
    $books = [
        [
            "name" => "Do Android Dream of Electric sheep",
            "auther" => "Philpi k. Dick",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => "2000"
        ],
        [
            "name" => "Project Hail Mary",
            "auther" => "Andy Weir",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => "2015"
        ]
    ]
    ?>
    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'].', Published in '.$book['releaseYear'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>


</body>

</html>