<?php

include_once ("ServiceService.php");
include_once ("EmployeService.php");
include_once ("Employe.php");
include_once ("UserService.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$userServ = new EmployeService();


if(isset($_POST['action']) && $_POST['action'] == 'rechercher'){
    $data = $userServ->selectEmp($_POST);
    for($i=0; $i<sizeof($data);$i++){
        echo '<tr id="'.$data[$i]['noemp'].'">
            <td>'.$data[$i]['noemp'].'</td>
            <td>'.$data[$i]['nom'].'</td>
            <td>'.$data[$i]['prenom'].'</td>
            <td>'.$data[$i]['emploi'].'</td>
            <td>'.$data[$i]['sup'].'</td>
            <td>'.$data[$i]['embauche'].'</td>
            <td>'.$data[$i]['sal'].'</td>
            <td>'.$data[$i]['comm'].'</td>
            <td>'.$data[$i]['noserv'].'</td>
            <td><button type="button" data-toggle="modal" data-target="#myModal" onclick="modifier('.$data[$i]['noemp'].')" class="btn btn-success">Modifier</button></td>
            <td><button onclick="supprimer('.$data[$i]['noemp'].')"  class="btn btn-danger">Supprimer</button></td>
            </tr>';
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'rechercherEmp'){
    $data = $userServ->searchEmploye($_POST['id']);
    echo json_encode($data);
}

if(isset($_POST['action']) && ($_POST['action'] == 'ajouter' || $_POST['action'] == 'modifier')){
    $emp = new Employe();
    $emp->setNoemp($_POST['noemp']);
    $emp->setNom($_POST['nom']);
    $emp->setPrenom($_POST['prenom']);
    $emp->setEmploi($_POST['emploi']);
    $emp->setSup($_POST['sup']);
    $emp->setEmbauche($_POST['embauche']);
    $emp->setSal($_POST['sal']);
    $emp->setComm($_POST['comm']);
    $emp->setNoserv($_POST['noserv']);
    $userServ = new EmployeService();
    try{
    $userServ->insert($emp, $_POST['action']);
    }catch(mysqli_sql_exception $mse){
        echo json_encode(array("error" => array("code" => $mse ->getCode(),
        "message" => $mse -> getMessage()
        )), JSON_UNESCAPED_UNICODE);
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'supprimer'){
    try{
        $userServ->delete($_POST['id']);
    }catch(mysqli_sql_exception $mse){
        echo json_encode(array("error" => array("code" => $mse ->getCode(),
        "message" => $mse -> getMessage()
        )), JSON_UNESCAPED_UNICODE);
    }
}

if(isset($_POST['affichage']) && $_POST['affichage'] == 'services'){
    $servServ = new ServiceService();
    $data = $servServ->selectAll();
    for($i=0; $i<sizeof($data);$i++){
        echo '<tr id="'.$data[$i]['noserv'].'">
            <td>'.$data[$i]['noserv'].'</td>
            <td>'.$data[$i]['service'].'</td>
            <td>'.$data[$i]['ville'].'</td>
            <td><button type="button" data-toggle="modal" data-target="#myModal" onclick="modifier('.$data[$i]['noserv'].')" class="btn btn-success">Modifier</button></td>
            <td><button onclick="supprimer('.$data[$i]['noserv'].')"  class="btn btn-danger">Supprimer</button></td>
            </tr>';
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'inscrire'){
    $userServ = new UserService();
    $userServ->insert($_POST);
}

if(isset($_POST['action']) && $_POST['action'] == 'connecter'){
    $userServ = new UserService();
    $data = $userServ->insert($_POST);
    
}