<?php
    class connect{
        private $conx;
        function __construct(){
            try {
                $this->conx = new PDO("mysql:host=172.16.48.204;port=3306;database=campusland;user=sputnik;password=Sp3tn1kC@");
                echo "ok";
            } catch (\Throwable $th) {
                echo "Error";
            }
        }
    }
    
    $obj = new Connect();


    /* interface environments{
        public function __get($name);
    }
    abstract class connect extends credentials implements environments{
        use getInstance;
        protected $conx;
        function __construct(private $driver = "mysql",  private $port = 3306){
            try {
                $this->conx = new PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";dbname=".$this->__get('dbname').";user=".$this->user.";password=".$this->password);
                $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                $this->conx = $e->getMessage();
            }
        }
    } */
?>