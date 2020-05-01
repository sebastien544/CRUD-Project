<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
    <body>
        <div id='warning1'></div>
        <h1 class="text-center mt-5">Gestion employes</h1>
            <div class='row align-items-center bg-dark mb-5 mt-5' style="height: 100px;">
                <input class="offset-1 mr-2 selectEmp" type="text" placeholder="nom" name="nom" id="selectEmpNom">
                <input class="mr-2 selectEmp" type="text" placeholder="prenom" name="prenom" id="selectEmpPrenom">
                <select name="service" id="service">
                    <option value="">Sélectionner un service</option>
                    <option>DIRECTION</option>
                    <option>LOGISTIQUE</option>
                    <option>VENTES</option>
                    <option>FORMATION</option>
                    <option>INFORMATIQUE</option>
                    <option>COMPTABILITE</option>
                    <option>TECHNIQUE</option>
                </select>
                <button type="button" data-toggle="modal" data-target="#myModalConnexion" class="btn offset-3 mr-2 btn-primary " id='inscrire'>Insciption</button>
                <button type="button" data-toggle="modal" data-target="#myModalConnexion" class="btn mr-2 btn-primary " id='connecter'>Connexion</button>
                <button id='services' class='btn btn-primary'>Services</button>
            </div>
        <div id="test" class="container">
            <div class="container">
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="modal-content">
                            <form id='ajout' action="" class="text-center border border-light p-5" action="#!">
                                <div id="warning2"></div>
                                <p class="h4 mb-4">Ajout / Modification</p>
                                <input type="number" id='noemp' name="noemp" class="form-control mb-4" placeholder="Numéro employé" required>
                                <input type="text" id='nom' name="nom" class="form-control mb-4" placeholder="Nom">
                                <input type="text" id='prenom' name="prenom" class="form-control mb-4" placeholder="Prenom">
                                <input type="text" id='emploi' name="emploi" class="form-control mb-4" placeholder="Emploi">
                                <input type="text" id='sup' name="sup" class="form-control mb-4" placeholder="Numéro supérieur">
                                <input type="date" id='embauche' name="embauche" class="form-control mb-4" placeholder="Date embauche">
                                <input type="number" id='sal' name="sal" class="form-control mb-4" placeholder="Salaire">
                                <input type="number" id='comm' name="comm" class="form-control mb-4" placeholder="Commission">
                                <input type="number"id='noserv'  name="noserv" class="form-control mb-4" placeholder="Numéro service" required>
                                <input type='hidden' id='hidden' name='action'>
                                <button id="submit" class="btn btn-info btn-block my-4" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="modal fade" id="myModalConnexion" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <form  action="" class="text-center border border-light p-5" action="#!">
                                <div id="warning2"></div>
                                <p class="h4 mb-4">Inscription</p>
                                <input type="mail" id='mail' name="mail" class="form-control mb-4" placeholder="Email" required>
                                <input type="password" id='password' name="password" class="form-control mb-4" placeholder="Password">
                                <input type='hidden' id='hiddenInscription' name='action'>
                                <button  class="btn btn-info btn-block my-4" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead><tr id="columns"></tr></thead>
                <tbody></tbody>
            </table>
        </div>
        <script src="gestionEmployes.js" type="text/javascript"></script>
    </body>
</html>
