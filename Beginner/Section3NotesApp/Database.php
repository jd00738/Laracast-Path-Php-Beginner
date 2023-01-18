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
    public function __construct($config, $username = 'root', $password = 'root')
    {
        // CONNECTION STRING
        // QUERY BUILDER CREATED QUERY PARAM FOR PATH THE SEPERATOR HELPS IN CREATING STRING FOR DSN 
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // CREATING CONNECTION 
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * TO EXECUATE QUERY FROM DATABASE
     * SET PARAM TO PREVENT SQL INJECTION
     */
    public function query($query, $params = [])
    {
        // PREPARING QUERY FOR EXECUTION
        $statement = $this->connection->prepare($query);
        // EXECUTING STATEMENTS
        $statement->execute($params);

        //RETURN STATMENTS SO FETCH OR FETCHALL CAN BE HANDLE ON THE USER CHOISE
        return $statement;
    }
}
