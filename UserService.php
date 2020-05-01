<?php
include_once ("UserDAO.php");

    class UserService{

        function insert($tab){
            $password = password_hash($tab['password'], PASSWORD_DEFAULT);
            $userDAO = new UserDAO();
            $userDAO->insert($tab['mail'],$password);
        }

        function select($tab){
            $userDAO = new UserDAO();
            $userDAO->insert($tab);
        }
    }