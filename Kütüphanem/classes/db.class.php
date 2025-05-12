<?php 

    class DB{
       private $host = "127.0.0.1:3307";
       private $user =  "root";
       private $password = "";
       private $dbName = "kutuphanem";
        
        
       public function connect(){
            try{
                $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
                $baglanti = new PDO($dsn, $this->user, $this->password);
                $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $baglanti->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                
                return $baglanti;
            }
        
            catch(PDOException $e) {
                echo "bağlantı hatası: ".$e->getMessage();
            }
        }
    
    }



?>

