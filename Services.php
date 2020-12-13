<?php
    class Services
    {
        private $connection;
        private $feature;
        public function __construct(Connection $connection, Features $feature)
        {
            $this->connection = $connection->Connect();
            $this->feature= $feature;
            
           
        }
        public function Register()
        {
            $Query ='
             insert into feature(Feature,DevHours,TestHours)values(?,?,?)          
            ';
            $stmt = $this->connection->prepare($Query);
            $stmt->bindValue(1, $this->feature->__get('Feature'));
            $stmt->bindValue(2, $this->feature->__get('DevHours'),PDO::PARAM_INT);
            $stmt->bindValue(3, $this->feature->__get('TestHours'),PDO::PARAM_INT);
            $stmt->execute();
        }
        public function Read() { 
            $Query = '
                select
                    Id,Feature,DevHours,TestHours
                from
                    feature 
             ';
            $stmt = $this->connection->prepare($Query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function ReadToFile() { 
            $Query = '
                select
                    Feature,DevHours,TestHours
                from
                    feature 
             ';
            $stmt = $this->connection->prepare($Query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_CLASS,'features');
        }
        public function Delete()
        {
            $Query =' delete from feature  where  Id = :id';
            $stmt=$this->connection->prepare($Query);
            $stmt->bindValue(':id',  $this->feature->__get('Id'));
            $stmt->execute();
        }
         public function DeleteAll()
        {
            $Query =' TRUNCATE TABLE feature  ';
            $stmt=$this->connection->prepare($Query);
            $stmt->execute();
        
        }
    }
    