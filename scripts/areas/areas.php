<?php
    namespace App;
    class areas extends connect{
        private $queryGet = 'SELECT id AS "Identificador", name_area AS "Nombres_Areas" FROM areas';
        private $queryDelete = 'DELETE FROM areas WHERE id= :Identificador';
        private $queryUpdate = 'UPDATE areas SET id = :Identificador  WHERE id = :id_areas';
        private $queryPost = 'INSERT INTO areas(id) VALUES(:Identificador)';
        private $message;
        use getInstance;
        function __construct(private $id=1, public $name_area=1){
            parent::__construct();
        }
        public function getAreas(){
            try {
                $res = $this->conx->prepare($this->queryGet);
                $res->execute();
                $this->message = ["code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
            } catch (\PDOException $e) {
                $this->message = ["code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            } finally {
                print_r($this->message);
            }
        }
        public function deleteAreas(){
            try {
                $res = $this->conx->prepare($this->queryDelete);
                $res->bindValue("Identificador", $this->id);
                $res->execute();
                $this->message = ["Code" => 200, "Message" => "Data delete"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            } finally {
                print_r($this->message);
            }
        }
        public function updateAreas(){
            try {
                $res = $this->conx->prepare($this->queryUpdate);
                $res->bindValue("Identificador", $this->id);
                $res->execute();

                if ($res->rowCount() > 0) {
                    $this->message = ["Code" => 200, "Message" => "Data updated"];
                } else {
                    $this->message = ["Code" => 404, "Message" => "No matching record found"];
                }
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            } finally {
                print_r($this->message);
            }
        }
        public function postAreas(){
            try {
                $res = $this->conx->prepare($this->queryPost);
                $res->bindValue("Identificador", $this->id);
                $res->execute();
                $this->message = ["Code" => 200 + $res->rowCount(), "Message" => "inserted data"];
            } catch (\PDOException $e) {
                $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            } finally {
                print_r($this->message);
            }
        }
    }
?>