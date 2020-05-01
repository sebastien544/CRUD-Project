<?php
include_once ("EmployeService.php");

$userServ = new EmployeService();
$data = $userServ->selectAll();

for($i=0; $i<sizeof($data);$i++){
    echo '
        <tr id="'.$data[$i]['noemp'].'">
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
        </tr>
        ';
}
