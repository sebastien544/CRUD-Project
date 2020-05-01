$('#columns').load('affichageColumns.php',{
});
$('tbody').load('affichage.php',{
});


$('.selectEmp').keyup(function(e){
    $('tbody').load('controller.php',{
       nom:$('#selectEmpNom').val(),
       prenom:$('#selectEmpPrenom').val(),
       service:$('#service  option:selected').val(),
       action:'rechercher'
    });
});

$('select').change(function(e){
    alert($('#service  option:selected').val())
    $('tbody').load('recherche.php',{
        nom:$('#nom').val(),
        prenom:$('#prenom').val(),
        service:$('#service  option:selected').val(),
        action:'rechercher'
    });
});

$('#services').click(function(){
    $('.table').load('controller.php',{
        affichage:'services'
    });
});


$("form").on( "submit", function( event ) {
    event.preventDefault();
    $.ajax({
        url:'controller.php',
        type:'POST',
        data:$( this ).serialize(),
        success : function(data){
            if(data){
                response = JSON.parse(data);
                if(response.error){
                    if(response.error.code == 1062){
                        $('#warning2').attr('class','alert alert-dismissible alert-danger')
                        h = $('<h4>');
                        h.attr('class', 'alert-heading');
                        h.text('Warning !');
                        $('#warning2').append(h);
                        p = $('<p>');
                        p.attr('class', 'mb-0')
                        p.text('Numéro employé déjà utilisé');
                        $('#warning2').append(p);
                    } 
                    else{
                      console.log(response.error.message);
                    }
                } 
            }
            else{
                $('.modal').modal('hide');
                $('tbody').load('affichage.php',{
                });
            }
        }, 
        error : function(xhr, message, status){
            alert("Erreur !!");
        }
    });
});


function supprimer(id){
    $.ajax({
        url:'controller.php',
        type:'POST',
        data:'action=supprimer&id='+id+'',
        success : function(data){
            if(data){
                response = JSON.parse(data);
                if(response.error){
                    if(response.error.code == 1451){
                        $('#warning1').attr('class','text-center alert alert-dismissible alert-danger')
                        h = $('<h4>');
                        h.attr('class', 'alert-heading');
                        h.text('Warning !');
                        $('#warning1').append(h);
                        p = $('<p>');
                        p.attr('class', 'mb-0')
                        p.text('Impossible de supprimer un supérieur');
                        $('#warning1').append(p);
                        b = $('<button>')
                        b.attr('type','button')
                        b.attr('class','close')
                        b.attr('data-dismiss','alert')
                        b.text('X')
                        $('#warning1').append(b);
                    }else{
                      console.log(response.error.message);
                    }
                } 
            }
            else{
                $('tbody').load('affichage.php',{
                });
            }
        }, 
        error : function(xhr, message, status){
            alert("Erreur !!");
        }
    });
}

//recupération des données employé
function modifier(id){
    $.ajax({
        url:'controller.php',
        type:'POST',
        data:'action=rechercherEmp&id='+id+'',
        success : function(data){
            if(data){
                response = JSON.parse(data);
                if(response.error){
                    if(response.error.code == 1451){
                      console.log(response.error.message)
                    } 
                    else if(response.error.code == 1011) {
                        console.log(response.error.message);
                    } 
                    else{
                      console.log(response.error.message);
                    }
                }else{
                    $('#noemp').attr('value',response[0].noemp)
                    $('#nom').attr('value',response[0].nom)
                    $('#prenom').attr('value',response[0].prenom)
                    $('#emploi').attr('value',response[0].emploi)
                    $('#sup').attr('value',response[0].sup)
                    $('#embauche').attr('value',response[0].embauche)
                    $('#sal').attr('value',response[0].sal)
                    $('#comm').attr('value',response[0].comm)
                    $('#noserv').attr('value',response[0].noserv)
                    $('#hidden').attr('value','modifier')
                }
            }
            else{
                    window.location.href="gestionEmployes.php";
            }
        }, 
        error : function(xhr, message, status){
            alert("Erreur !!");
        }
    });
}

function ajouter(){
    $('#hidden').attr('value', 'ajouter')
};

$('#inscrire').click(function(e){
    $('#hiddenInscription').attr('value', 'inscrire')
});

$('#connecter').click(function(e){
    $('#hiddenInscription').attr('value', 'connecter')
});


