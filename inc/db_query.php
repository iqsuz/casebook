<?php
    class DBQuery{
        private $servername = "localhost";
        private $server_username = "root";
        private $server_password = "";
        private $database_name = "cb";

        private $conn = NULL;

        /*This function create database connection by using private class variables and return connection object.*/
        function __construct(){
            $this->conn = new mysqli($this->servername, $this->server_username, $this->server_password, $this->database_name);
            
            if($this->conn->connect_error){
                die("Server connection error:".$this->conn->connect_error.".");
            }

            return $this->conn;
        }
        
        /*This function checks if there is any match on database with given username and password*/
        function login($p_username, $p_password){
            //post validation for security.
            $p_username = $this->conn->real_escape_string($p_username);
            $p_password = $this->conn->real_escape_string($p_password);

            $sql_query = "SELECT ID, E_ID, NAME, DEP, P_PIC AUTH FROM people 
            WHERE E_ID = '$p_username' AND PASSWORD = '$p_password'";
        
            $result = $this->conn->query($sql_query); 

            return $result;
        }

        /*This function returns model list in model table.*/
        function model_list(){
            $sql_query = "SELECT * FROM model";
            $model = $this->conn->query($sql_query) or die("Model query result is null");

            return $model;
        }

        /*This function generates UID based on UID of last registration.
        UID is linked to pictures that belong to particular defect.*/
        function get_last_uid($house){
            $sql_query = 'SELECT UID FROM defect WHERE UID LIKE "'.$house.'%" ORDER BY UID DESC LIMIT 1';
            
            $uid = $this->conn->query($sql_query);
            $uid = $uid->fetch_assoc();

            if($uid == NULL){
                $uid = "N/A";
                return $uid;
            }

            return $uid;
        }

        /*This function creates new registration on database based on parameters that user posted. */
        function register_defect($uid, $model, $seq, $body_no, $part_name, $part_no, $o_place, $problem_des, $responsible, $user, $datetime, $shift, $house){
            $sql_query = "INSERT INTO defect (ID, UID, MODEL, SEQ, BODY_NO, PART_NAME, PART_NO, O_PLACE, PROBLEM_DES, RESPONSIBLE, WHO, DATE, SHIFT, HOUSE)
            VALUES (NULL, '$uid', '$model', '$seq', '$body_no', '$part_name', '$part_no', '$o_place', '$problem_des', '$responsible', '$user', '$datetime', '$shift', '$house')";

            if(!$this->conn->query($sql_query)){
                echo $this->conn->error;
                die("Database registeration could not be succeeded!");
                return FALSE;
            };
            
            return TRUE;
        }

        function save_files_to_db($uid, $path_N_names){
            for($i = 0; $i < count($path_N_names[0]); $i++){
                $path =  $path_N_names[0][$i];
                $file_name = $path_N_names[1][$i];
                
                $sql_query = "INSERT INTO defect_files (ID, UID, PATH, FILE_NAME) VALUES (NULL, '$uid', '$path', '$file_name')";

                if(!$this->conn->query($sql_query)){
                    echo $this->conn->error;
                    die("Database registration for defect pictures could not be succeeded.");
                    return FALSE;
                }
            }

            return TRUE;
        }

        function delete_files_from_db($uid){
            $sql_query = "DELETE FROM defect_files WHERE UID = '$uid'";

            if(!$this->conn->query($sql_query)){
                echo $this->conn->error;
                die("$uid registration couldn't be deleted.");
                return FALSE;
            }

            return TRUE;
        }

        function delete_defect($uid){
            $sql_query = "DELETE FROM defect WHERE UID = $uid";
            
            if(!$this->conn->query($sql_query)){
                echo $this->conn->error;
                die("$uid registration couldn't be deleted.");
                return FALSE;
            }

            return TRUE;
        }

        function get_who_info($e_id){
            $sql_who_info = "SELECT * FROM people WHERE E_ID = ".$e_id;
            $who_info = $this->conn->query($sql_who_info);
            $who_info = $who_info->fetch_assoc();

            return $who_info;
        }
    }

?>