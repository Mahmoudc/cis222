<?php
/**
* qx.txt
*
* Have a great winter break!
*
* @category    Cumulative
* @package     Quiz 10
* @author      Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
* @version     2019.12.05
* @grade
*/

// 1. (4pts) Create a class below called DatabaseManager.
//              On construct this class should create a database connection.
//              It should also store this connection in a private property named connection.
class DatabaseManager {
    private $connection;
    private $sql;
    private $stmt;
   function _construct() {
      include('../credential.php');

       $this->connection=$pdo;
        return $this->connection;
}
    function query($sql) {
       $this->sql=$sql;
           try {
                $this->stmt=$this->connection->query($sql);
        }
            catch (Exception $e) {
                echo "Issue with query execution";
                die;
       }
       return $this->sql;
}
function results() {
       if(preg_match('/\bSELECT\b/', $this->sql)) {
            while($row=$this->stmt->fetch()) {
                var_dump($row);
            }
       }
        else if(preg_match('/\bUPDATE\b/', $this->sql) || preg_match('/\bDELETE\b/', $this->sql)) {
                echo $this->stmt->rowCount();
        }
        else if(preg_match('/\bINSERT\b/', $this->sql)) {
            $this->connection->lastInsertId();
        }
}

}

// 2. (3pts) Add a method to the DatabaseManager called query.
//              This method should accept a query string as a parameter.
//              This method should then use its connection to execute the query.


// 4. (3pts) Add a try/catch to the query method.
//              If caught, echo a simple error message and terminate the program.


// B. (3pts) Add a method to the DatabaseManager called results.
//              If the last query was a SELECT, this should return all returned rows.
//              If the last query was an UPDATE or DELETE, it should return the number of affected rows.
//              If the last query was an INSERT, it should return last inserted row id.
