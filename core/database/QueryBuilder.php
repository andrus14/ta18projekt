<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByID ($table, $id) {
        $sql = sprintf(
            'SELECT * FROM %s WHERE id=%s',
            $table,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Whoops!');
        }
    }

    public function selectUserByEmail ($table, $parameters) {
        $sql = sprintf(
            'SELECT * FROM %s WHERE email=:email',
            $table
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die('Whoops!');
        }
    }

    public function insert ($table, $parameters) {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops!');
        }

    }
    public function updateByID ($table, $id, $parameters) {
        // UPDATE country SET name="Soome", email="asdf", order=100 WHERE id=13
        $udpateCols = [];
        foreach( $parameters as $key => $value ) {
            $udpateCols[] = $key . '=:' . $key;
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE id=%s',
            $table,
            implode(', ', $udpateCols),
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops!');
        }

    }

    public function delete ($table, $id) {
        $sql = sprintf(
            'DELETE FROM %s WHERE id=%s',
            $table,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops!');
        }

    }


}