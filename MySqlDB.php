<?php

class DB{
    protected $servername = "localhost";
    protected $username = "eleva";
    protected $password = "eleva";
    protected $dbname = "eleva";
    protected $conn = null;
    
    function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            error_log("Connection failed: " . $this->conn->connect_error);
         //   die("Connection failed: " . $conn->connect_error);
        }
    }

    public function get_connection() {        
        return $this->conn;
    }
    public function close_connection(){
        mysqli_close($this->conn);
    }
    
    public function get_persone(){
        $query= "SELECT * FROM persone";
        $result = $this->conn->query($query);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        $result->close();
        return json_encode($rows);
    }
    
    public function insert_persone($data){
        //Insert persona
        $query = "INSERT INTO persone(nome,cognome,data_nascita,ruolo,email) "
                . " VALUES('" . $data['nome'] . "', '" . 
                $data['cognome'] . "', '" . $data['data_nascita'] . "', '" . 
                $data['ruolo'] . "', '" . $data['email'] . "' )";
        
        if ($this->conn->query($query) === TRUE) {
            $last_id = $this->conn->insert_id;
            
            //Insert persona/impianto link
            $impianti = explode(",", $data['impianti']);
            $result = true;
            foreach ($impianti as $value){
                $queryLink = "INSERT INTO legm_persone_impianti VALUES(" 
                    . $value . ", " . $last_id . ")";
                if ($this->conn->query($queryLink) !== TRUE){
                    $result = false;
                } 
            }
            if ($result){
                return "OK";
            } 
        } 
        return "KO";
    }
    
    public function insert_impianti($data){
        $query = "INSERT INTO impianti(nome,indirizzo,latitudine,longitudine) "
            . " VALUES('" . $data['nome'] . "', '" . 
            $data['indirizzo'] . "', '" . $data['latitudine'] . "', '" . 
            $data['longitudine'] . "')";
        if ($this->conn->query($query) === TRUE) {
            return "OK";
        }
        return "KO";
    }
    
    public function get_impianti(){
        $query= "SELECT * FROM impianti";
        $result = $this->conn->query($query);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        $result->close();
        return json_encode($rows);
    }
    
    public function get_persone_by_impianto($id){
        $query = "SELECT * FROM persone p, legm_persone_impianti lpi " .
            " WHERE p.persone_id = lpi.persone_id " . 
            " AND lpi.impianti_id = " . $id;
        
        $result = $this->conn->query($query);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        $result->close();
        return json_encode($rows);

    }
    
    public function get_persona_by_id($id){
        $query = "SELECT * FROM persone WHERE persone_id = " . $id;
        $result = $this->conn->query($query);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        $result->close();
        return json_encode($rows);
    }
    
    public function get_impianto_by_id($id){
        $query = "SELECT * FROM impianti WHERE impianti_id = " . $id;
        $result = $this->conn->query($query);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        $result->close();
        return json_encode($rows);
    }
    
    public function update_persone($data){
        $query = "UPDATE persone SET nome = '". $data['nome'] .
                "', cognome = '". $data['cognome'] .
                "', data_nascita = '". $data['data_nascita'] .
                "', ruolo = '". $data['ruolo'] .
                "', email = '". $data['email'] .
                "' WHERE persone_id = " . $data['id'];
        if ($this->conn->query($query) === TRUE) {
            return "OK";
        }
        return "KO";
    }
    
    public function update_impianti($data){
        $query = "update impianti set nome = '". $data['nome'] .
                "', indirizzo = '". $data['indirizzo'] .
                "', latitudine = '". $data['latitudine'] .
                "', longitudine = '". $data['longitudine'] .
                "' where impianti_id = " . $data['id'];
        if ($this->conn->query($query) === TRUE) {
            return "OK";
        }
        return "KO";
    }
}
