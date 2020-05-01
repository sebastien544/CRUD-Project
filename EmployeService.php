<?php
include_once ("EmployeDAO.php");
include_once ("Employe.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class EmployeService{

        private $dao;

        function __construct()
        {
            $this->dao = new EmployeDAO();
        }

        
         function  selectAll(){
            return $this->dao->selectAll();
        }

        function  selectColumns(){
            return $this->dao->selectColumns();
        }

        function selectEmp($tab){
            return $this->dao->selectEmp($tab);
        }

        function searchEmploye($var){
            return $this->dao->searchEmploye($var);
        }

        function insert($emp,$var){
            
            $nom= $emp->getNom()? $emp->getNom(): null;
            $prenom= $emp->getPrenom()? $emp->getPrenom() : null;
            $emploi= $emp->getEmploi()? $emp->getEmploi() : null;
            $sup= $emp->getSup()? $emp->getSup() : null;
            $embauche= $emp->getEmbauche()? "'".$emp->getEmbauche()."'" : null;
            $sal= $emp->getSal()? $emp->getSal() : null;
            $comm= $emp->getComm()? $emp->getComm() : null;
            if($var == 'ajouter'){
                try{
                $this->dao->insert($emp->getNoemp(), $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $emp->getNoserv());
                }catch(mysqli_sql_exception $mse){
                    throw $mse;
                }
            }else{
                try{
                    $this->dao->update($emp->getNoemp(), $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $emp->getNoserv());
                }catch(mysqli_sql_exception $mse){
                    throw $mse;
                }
            }
        }

        function delete($var){
            try{
            $this->dao->delete($var);
            }catch(mysqli_sql_exception $mse){
                throw $mse;
            }
        }
    }
?>