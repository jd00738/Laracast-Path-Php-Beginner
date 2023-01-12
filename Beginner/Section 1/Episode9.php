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
            "releaseYear" => 2000
        ],
        [
            "name" => "Project Hail Mary",
            "auther" => "Andy Weir",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => 2015
        ]
    ];


    // LAMBDA FUCNTIONS ARE THE ANONYMOUS FUNCTION
    // THESE FUNCTION CAN ALSO BE ASSIGN TO THE VARIABLE
    // CAN BE UTILIZED INSIDE A FUNCTION 
    function filter($items, $fn)
    {
        // INIT ARRAY
        $filtereditems = [];

        foreach ($items as $item) {

            // CONDITIONAL CHECK ON LAMBDA FUNCTION  
            if ($fn($item)) {
                //APPEND IF FOUND ANY ITEM
                $filtereditems[] = $item;
            }
        }
        return $filtereditems;
    }

    // CALLING OF LAMBDA FUNCTION IN CUSTOM FILTER FUNCTION
    $filteredBooks = filter($books, function ($book) {
        return $book['releaseYear'] > 2000;
    });

    ?>

    <h2> BOOKS </h2>
    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] . ', Published in ' . $book['releaseYear'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>