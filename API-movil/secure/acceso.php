<?php

class acceso{

    var $host = null;
    var $user = null;
    var $pass = null;
    var $name = null;
    
    var $conn = null;
    var $result = null;

    function __construct($host, $user, $pass, $name) {

        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $name;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if (mysqli_connect_errno()) {
            echo 'No se puede construir';
            return;
        }

        $this->conn->set_charset('utf8');

    }

    public function conecta(){

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if (mysqli_connect_errno()){

            echo 'No se puede conectar';
            return;

        }

        $this->conn->set_charset('utf8');

    }

    public function desconecta(){

        if($this->conn != null){

           $this->conn->close();

        }

    }
    
        public function loadEvents(){

        $sql = "SELECT * FROM ccEvents";

        $resultado = $this->conn->query($sql);
        $returnArray = array();

        while($row = mysqli_fetch_assoc($resultado)) {
            $returnArray[] = $row;
        }

        echo json_encode($returnArray);

    }

    public function loadInterest(){

        $sql = "SELECT * FROM ccIntereses";

        $resultado = $this->conn->query($sql);
        $returnArray = array();

        while($row = mysqli_fetch_assoc($resultado)) {
            $returnArray[] = $row;
        }

        echo json_encode($returnArray);

    }

    public function seleccionaCC($user){

        $returnArray = array();

        $sql = "SELECT * FROM ccUsersAdmin WHERE cc_user='" . $user . "'";

        $result = $this->conn->query($sql);

        if($result != null &&(mysqli_num_rows($result)) >= 1){

            $row = $result->fetch_array(MYSQLI_ASSOC);

            if(!empty($row)){

                $returnArray = $row;

            }

        }

        return $returnArray;
    }
    
    public function findClientCC($client){
        
       $returnArray = array();

        $sql = "SELECT * FROM ccRecordsClients WHERE clientMail='" . $client . "'";

        $result = $this->conn->query($sql);

        if($result != null &&(mysqli_num_rows($result)) >= 1){

            $row = $result->fetch_array(MYSQLI_ASSOC);

            if(!empty($row)){

                $returnArray = $row;

            }

        }

        return $returnArray;
    }

    public function seleccionaCCID($ccID){

        $returnArray = array();

        $sql = "SELECT * FROM ccUsersAdmin WHERE cc_id='" . $ccID . "'";

        $result = $this->conn->query($sql);

        if($result != null &&(mysqli_num_rows($result)) >= 1){

            $row = $result->fetch_array(MYSQLI_ASSOC);

            if(!empty($row)){

                $returnArray = $row;

            }

        }

        return $returnArray;
    }

    public function registraCC($ccName, $ccUser, $encriptaPsswd){

        $sql = "INSERT INTO ccUsersAdmin SET cc_name=?, cc_user=?, cc_psswd=?";

        $statement = $this->conn->prepare($sql);

        if (!$statement) {

            throw new Exception($statement->error);

        }

        $statement->bind_param('sss', $ccName, $ccUser, $encriptaPsswd);

        $result = $statement->execute();

        return $result;

    }
    
    public function byeMail($mailUser){
        
        $sql = "DELETE FROM ccRecordsClients WHERE clientMail=?";
        $statement = $this->conn->prepare($sql);
        
        if(!$statement){

            throw new Exception($statement->error);

        }
        
        $statement->bind_param('s', $mailUser);
        $result = $statement->execute();

        return $result;

    }

    public function selectUser($mailUser){

        $returnArray = array();

        $sql = "SELECT * FROM ccRecordsClients WHERE clientMail='" . $mailUser . "'";

        $result = $this->conn->query($sql);

        if($result != null &&(mysqli_num_rows($result)) >= 1){

            $row = $result->fetch_array(MYSQLI_ASSOC);

            if(!empty($row)){

                $returnArray = $row;

            }

        }

        return $returnArray;
    }
    
    public function recordClient($name, $lastname, $suburb, $zip, $town, $cell, $city, $age, $genre, $event, $mail, $ccID){

        $sql = "INSERT INTO ccRecordsClients SET clientName=?, clientLastName=?, clientSuburb=?, 
        clientZipCode=?, clientTown=?, clientCell=?, clientCity=?, clientAge=?, clientGenre=?, cc_event=?, clientMail=?, ccID =?";

        $statement = $this->conn->prepare($sql);

        if(!$statement) {

            throw new Exception($statement->error);

        }

        $statement->bind_param('ssssssssssss', $name, $lastname, $suburb, $zip, $town, $cell, $city, $age, $genre, $event, $mail, $ccID);

        $result = $statement->execute();

        return $result;
        
    }

    public function recordInterest($idInterest, $idRecordClient){

        $sql = "INSERT INTO ccRecordsIntsClients SET idInteres=?, idRecordClient=?";

        $statement = $this->conn->prepare($sql);

        if(!$statement) {

            throw new Exception($statement->error);

        }

        $statement->bind_param('ii', $idInterest, $idRecordClient);

        $result = $statement->execute();

        return $result;

    }


    public function recordingLog($fechaActual, $user, $tipeActivity){

        $sql = "INSERT INTO logActivityConsole SET cc_date_activity=?, cc_user_console=?, cc_log_tipe=?";

        $statement = $this->conn->prepare($sql);

        if(!$statement) {

            throw new Exception($statement->error);

        }

        $statement->bind_param('sss', $fechaActual, $user, $tipeActivity);

        $result = $statement->execute();

        return $result;

    }

    
}
