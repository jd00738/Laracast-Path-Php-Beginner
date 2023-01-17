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

        // HOME WORK

        $books[] = [
            [
                "name" => "Do Android Dream of Electric sheep",
                "auther" => "Philpi k. Dick",
                "purchaseUrl" => "www.example.com",
                "releaseYear" => 1960
            ],
            [
                "name" => "Project Hail Mary",
                "auther" => "Andy Weir",
                "purchaseUrl" => "www.example.com",
                "releaseYear" => 2022
            ]
        ];

        // CALLING OF LAMBDA FUNCTION IN CUSTOM FILTER FUNCTION
        $filteredBooks = filter($books, function ($book) {
            return $book['releaseYear'] >= 1960 && $book['releaseYear'] < 2020;
        });

        require "Episode10.view.php";