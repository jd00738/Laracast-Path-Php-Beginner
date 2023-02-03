<?php

namespace core;

/**
 * TO ACCESS THE GLOBAL PHP  CLASSES CAN USE \PDO or 'use' after the name space 
 */
use PDO;

/**
 * CREATE DATABASE CLASS TO HANDLE THE PDO INSTANCE AND DB RELATE WORKING
 */
class Database
{
    // FOR CONNECTION STRING
    public $connection;

    // FOR DB STATEMENTS
    public $statement;

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
        $this->statement = $this->connection->prepare($query);
        // EXECUTING STATEMENTS
        $this->statement->execute($params);

        //RETURN STATMENTS SO FETCH OR FETCHALL CAN BE HANDLE ON THE USER CHOISE
        return $this;
    }

    /**
     * FUNCTION TO FETCH ALL RECORDS FROM DATABASE
     */
    public function findAll()
    {
        return $this->statement->fetchall();
    }

    /**
     * FUNCTION TO FETCH ALL EXTENDED WITH ABORT
     */

    public function findAllOrFail()
    {
        $result = $this->findAll();
        if (!$result) {
            abort();
        }
        return $result;
    }

    /**
     * FUNCTION TO FIND SINGLE RECORD
     */

    public function find()
    {
        return $this->statement->fetch();
    }

    /**
     * FUNCTION TO FIND SINGLE RECORD EXTENDED WIHT ABORT
     */
    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
}
