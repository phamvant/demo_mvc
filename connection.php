<?php
/*
    * PDO Database Class
    * Connect to database
    * Create prepared statements
    * Bind values
    * Return rows and results
*/
class Database {
<<<<<<< HEAD
    // private $host = 'localhost';
    // private $user = 'root';
    // private $pass = '1';
    // private $dbname = 'demo_mvc';

    private $host = 'ec2-100-26-39-41.compute-1.amazonaws.com';
    private $user = 'ciivviqcqmjhun';
    private $pass = '1937b5c3d8aa839b4dbf6bbf1303b64b8e602beb58cbafc5082e2d303d1307f5';
    private $dbname = 'd94p093ub1nn2g';
=======
//     private $host = 'localhost';
//     private $user = 'root';
//     private $pass = '1';
//     private $dbname = 'demo_mvc';
>>>>>>> 736f9becb5e1d22259b9bb03a48cf3d39b4eb727

    private $host = 'ec2-100-26-39-41.compute-1.amazonaws.com';
    private $user = 'ciivviqcqmjhun';
    private $pass = '1937b5c3d8aa839b4dbf6bbf1303b64b8e602beb58cbafc5082e2d303d1307f5';
    private $dbname = 'd94p093ub1nn2g';
   
    //Will be the PDO object
    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        //Set DSN
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
   
    //Prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Bind values, to prepared statement using named parameters
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    //Return multiple records
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Return a single record
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
