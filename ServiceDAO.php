<?php

    class ServiceDAO{

        function selectAll(){
            $db = new mysqli( 'localhost', 'root', '', 'gestion_employes');
            $rs = mysqli_query($db, 'SELECT * FROM serv ');
            $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
            return $data;
            mysqli_close($db);
            }
    }