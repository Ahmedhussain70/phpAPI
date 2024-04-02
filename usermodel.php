<?php 
require 'conn.php';
    class UserModel {
        private $conn;
    
        public function __construct() {
            $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function getuser(){
            $sql = "select * from users";
            $result = $this->conn->query($sql);
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        return $users;
        }

        public function insertuser($data) {
            $sql = $this->conn->prepare("INSERT INTO users (name, lname) VALUES (?, ?)");
            $sql->bind_param("ss", $data['name'], $data['lname']);
            $sql->execute();
            return $this->conn->insert_id;
        }

        public function deleteuser($id) {
            $sql = $this->conn->prepare("delete from users where id=?");
            $sql->bind_param("s", $id);
            $sql->execute();
            return $this->conn->affected_rows;
        }

        public function updateuser($id, $data) {
            $sql = $this->conn->prepare("update users set name = ?, lname= ? WHERE id=?");
            $sql->bind_param("sss", $data['name'], $data['lname'], $id);
            $sql->execute();
            return $this->conn->affected_rows;
        }
    }
?>