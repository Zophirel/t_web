<?php
    class Ombrellone{
        private $conn;
        private $table = 'prenotazione';
        public $id;
        public $bookedDates;

        public function __construct($db, $id){
            $this->conn = $db;
            $this->id = $id;
        }

        public function getBooked(){
            try {
                $query = "SELECT data_prenotazione FROM ".
                        $this->table.
                        " WHERE ombr_id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();
                if($stmt -> rowCount() > 0){ 
                    for($i = 0; $i < $stmt -> rowCount(); $i++){
                        $fetched_dates = $stmt->fetch(\PDO::FETCH_ASSOC);
                        $dates[$i] = $fetched_dates["data_prenotazione"];
                    }
                    return $dates;
                }else{
                    return [];
                }
            } catch (PDOException $e) {
                echo $e;
                throw $e;
            }
        }
        public function setReservation($user_id, $data_prenotazione){
            $query = "INSERT INTO " . $this -> table . 
                     "(user_id, ombr_id, data_prenotazione) 
                     VALUES (:user_id, :ombr_id, :data_prenotazione)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":ombr_id", $this->id);
            $stmt->bindParam(":data_prenotazione", $data_prenotazione);

            if($stmt->execute()){
                return true;
            }
            return false;
        }       
    }
?>