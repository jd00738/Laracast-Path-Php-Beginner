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
    ];


    // SIMULATION FOR FILTERING OF THE BOOKS BY AUTHER
    function filterBooksByAuther($books, $auther)
    {
        // INIT ARRAY
        $filteredBooks = [];

        foreach ($books as $book) {

            // CONDITIONAL CHECK ON ARRAY TO '==' FOR EQUAL '===' FOR EXACT VALUE  
            if ($book['auther'] === $auther) {

                //APPEND IF FOUND ANY BOOK
                $filteredBooks[] = $book;
            }
        }
        return $filteredBooks;
    }

    // HOME WORK

    $movies = [
        [
            "name" => "Transporter",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => 2012
        ],
        [
            "name" => "JASON BORN ULTIMATE",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => 2000
        ],
        [
            "name" => "HOME ALONE 4",
            "purchaseUrl" => "www.example.com",
            "releaseYear" => 2004
        ],
    ];

    function filterMoviesByYear($movies, $year)
    {
        $filteredMovies = [];
        foreach ($movies as $movie) {
            if ($movie['releaseYear'] > $year) {
            $filteredMovies[] = $movie;
            }
        }
        return $filteredMovies;
    }
    ?>

    <h2> BOOKS </h2>
    <ul>
        <?php foreach (filterBooksByAuther($books, "Andy Weir") as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] . ', Published in ' . $book['releaseYear'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>


    <h2> MOVIES </h2>
    <ul>
        <?php foreach (filterMoviesByYear($movies, 1998) as $movie) : ?>
            <li>
                <a href="<?= $movie['purchaseUrl'] ?>">
                    <?= $movie['name'] . ' (' . $movie['releaseYear'] . ')' ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>


</body>

</html>