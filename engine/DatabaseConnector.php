<?php
require "config/database.php";     //get the database credentials from the config file

    /**
     * This class handles all the connections and communications between the server 
     * and the database. It uses the server name, username, password and database that the app
     * wants to connect to.
     */

    class DatabaseConnector {
        private $serverName;
        private $userName;
        private $password;
        private $databaseName;
        public $connection;
        private $connected;
        private $dataSourceName;

        function __construct() {
            $this->serverName = SERVER;  //Default server name is 'localhost', change it if necessary.
            $this->databaseName = DATABASE;
            $this->userName = USER;
            $this->password = PASSWORD;

            //create the connection right away
            $this->createConnection();
        }
        
        public function createConnection() {
            try {
                //MySQLi Connection
                $this->connection  = new mysqli($this->serverName, $this->userName, $this->password, $this->databaseName);
                $this->connected = true;

                //PDO Connection
                // $this->dataSourceName = "mysql:host=".$this->serverName.";dbname=".$this->databaseName.";";
                // $this->connection = new PDO($this->dataSourceName, $this->userName, $this->password);
                // $this->connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this->connected = true;
            } catch (Exception $e){
                //die("Error in creating connection: " . mysqli_connect_error() . mysql_errno);
                die("Error in creating connection: " . $e->getMessage());
            }
        }

        public function checkConnection() {
            if ($this->connected) {
                return true;
            }else {
                return false;
            }
        }

        public function getConnection() {
            return $this->connection;
        }

        public function closeConnection() {
            try {
                unset($this->connected);
                $this->connection->close();
            } catch (Exception $error) {
                die("Error in creating connection: " . mysqli_connect_error() . mysql_errno);
            }
        }

        //Auxiliary methods just in case they are needed
        public function setServerName($newServerName) {
            $this->serverName = $newServerName;
        }

        public function setUserName($newUserName) {
            $this-> userName = $newUserName;
        }

        public function setPassword($newPassword) {
            $this->serverName = $newPassword;
        }

        public function getServerName() {
            return $this->serverName;
        }

        public function getUserName() {
            return $this->userName;
        }

        public function getPassword() {
            return $this->password;
        }
    }
?>