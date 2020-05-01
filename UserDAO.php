<?php

    class UserDAO{

        function insert($var1,$var2){
            try{
                $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
                $stmt = $db->prepare('INSERT INTO user VALUES (null,?,?)');
                $stmt->bind_param('ss', $var1, $var2);
                $stmt->execute();
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
            finally{
                mysqli_close($db);
            }
        }

        function select($var){
            try{
                $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
                $stmt = $db->prepare('SELECT FROM user WHERE mail=?');
                $stmt->bind_param('s', $var);
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_array(MYSQLI_ASSOC);
                return $data;
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
            finally{
                $rs->free();
                mysqli_close($db);
            }
        }
    }