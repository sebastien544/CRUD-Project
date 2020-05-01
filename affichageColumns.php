<?php
include_once ("EmployeService.php");

$userServ = new EmployeService();
$data = $userServ->selectColumns();

for($i=0; $i<sizeof($data);$i++){
    echo ' 
        <th class="text-uppercase">'.$data[$i]['COLUMN_NAME'].'</th>';
}
echo '  <th colspan="2"><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary " onclick="ajouter()">Ajouter employe</button></th>';