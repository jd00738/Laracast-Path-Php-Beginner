<?php

/**
 * CREATE DATABASE CLASS TO HANDLE THE PDO INSTANCE AND DB RELATE WORKING
 */

class Database
{
    public $connection;

    /**
     * WHEN EVER INSTANCE IS CREATED CONNECT TO THE DATABASE
     */
    public function __construct()
    {
        // CONNECTION STRING
        $dsn = "mysql:host=mysql-dev;port=3306;dbname=myapp;charset=utf8mb4";

        // CREATING CONNECTION 
        $this->connection = new PDO($dsn, 'root', 'root');
    }

    /**
     * TO EXECUATE QUERY FROM DATABASE
     */
    public function query($query)
    {
        // PREPARING QUERY FOR EXECUTION
        $statement = $this->connection->prepare($query);

        // EXECUTING STATEMENTS
        $statement->execute();

        //RETURN STATMENTS SO FETCH OR FETCHALL CAN BE HANDLE ON THE USER CHOISE
        return $statement;
    }
}