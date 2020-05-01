<?php
include_once("MysqliQueryException.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class EmployeDAO{
        
        function selectAll(){
        $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
        $rs = mysqli_query($db, 'SELECT * FROM emp ');
        $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
        return $data;
        mysqli_close($db);
        }

        function searchEmploye($var){
            $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
            $rs = mysqli_query($db, 'SELECT * FROM emp WHERE noemp='.$var.'');
            $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
            return $data;
            mysqli_close($db);
        }

        function selectEmp($tab){
            $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
            $rs = mysqli_query($db, 'SELECT * FROM emp INNER JOIN serv on emp.noserv = serv.noserv WHERE emp.nom LIKE "%'.$tab['nom'].'%" AND emp.prenom LIKE "%'.$tab['prenom'].'%" AND serv.service LIKE "%'.$tab['service'].'%"');
            $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
            return $data;
            mysqli_close($db);
        }

        function insert($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv){
            try{
                $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
                $stmt = $db->prepare('INSERT INTO emp VALUES (?,?,?,?,?,?,?,?,?)');
                $stmt->bind_param('isssisddi', $noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);
                $stmt->execute();
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
            finally{
                mysqli_close($db);
            }
        }

        function update($noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv){
            try{
                $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
                $stmt = $db->prepare('UPDATE emp SET nom= ?,prenom= ?,emploi= ?,sup= ?,embauche= ?,sal= ?,comm= ?,noserv= ? WHERE noemp= ?');
                $stmt->bind_param('sssisddii',$nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv,$noemp );
                $stmt->execute();
                mysqli_close($db);
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
        }

        function delete($var){
            try{
                $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
                $rs = mysqli_query($db, 'DELETE FROM emp WHERE noemp ='.$var.'');
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
            finally{
                mysqli_close($db);
            }
        }

        function selectColumns(){
            $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
            $rs = mysqli_query($db, 'SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "emp"');
            $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
            return $data;
            mysqli_close($db);
        }
    }