<?php
    class areas extends connect{
        private $queryget = 'SELECT id AS "Identificador", name_area AS "Nombres_Areas" FROM areas';
        private $message;
        use getInstance;
        function __construct(private $id=1, public $name_area=1){
            parent::__construct();
        }
        public function getAreas(){
            try {
                $res = $this->conx->prepare($this->queryget);
                $res->execute();
                $this->message = ["code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
            } catch (\PDOException $e) {
                $this->message = ["code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            } finally {
                print_r($this->message);
            }
        }
    }
?>