<?php
    class DbContext{
        private function CreateConnection()
        {
            $servername = "127.0.0.1:3306";
            $username = "root";
            $password = "";
            $dbname = "jobzfind_pkdb";

            $conn = new mysqli($servername, $username, $password, $dbname);
            return $conn;
        }

        public function ExecuteQuery($sql, $mapping){
            $data = array();
            $conn = $this->CreateConnection();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($data, $mapping($row));
                }
            }
            $conn->close();

            return $data;
        }
        
        public function ExecuteRowCount($sql){
            $data = array();
            $conn = $this->CreateConnection();
            $result = $conn->query($sql);
            $conn->close();

            return $result->num_rows;
        }
        
        public function ExecuteNonQuery($sql){
            $conn = $this->CreateConnection();
            $result = $conn->query($sql);
            $conn->close();

            return $result;
        }
        
        public function ApplyPaging($sql, $request){
            if($request != null && 
                isset($request["page"]) && is_numeric($request["page"]) && $request["page"] > 0 &&
                isset($request["pageSize"]) && is_numeric($request["pageSize"]) && $request["pageSize"] > 0
                )
                $sql .= " LIMIT " . $request["pageSize"] . " OFFSET " . (($request["page"] - 1) * $request["pageSize"]);

            return $sql;
        }
    }
?>