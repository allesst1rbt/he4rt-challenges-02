<?php 
    class Connection {
        private $host = 'localhost';
        private $dbname = 'challenge-02';
        private $user = 'root';
        private $pass = '';
        public function Connect()
        {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );
                return $conexao;
            } catch (PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }
    }