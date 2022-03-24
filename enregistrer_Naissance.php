<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=enregistrer_Naissance" method="POST">
                                            <h3 class="box-title m-b-0">Enregistrer une Naissance</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom de l'enfant..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom de l'enfant</th>
                                                <th>Prénom de l'enfant</th>
                                                <th>Lieu de Naissance</th>
                                                <th>Jour de Naissance</th>
                                                <th>Mois de Naissance</th>
                                                <th>Année de Naissance</th>
                                                <th>CNI du Père</th>
                                                <th>CNI de la mère</th>
                                                <th>Date de la Déclaration</th>                                                
                                                <th>Etat de l'Enfant</th>
                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = afficherDeclarationNaissance();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDeclNaissance($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;

                                                ?>
                                            <tr>
                                                <td><?php echo $data->nom_enfant ?></td>
                                                <td><?php echo $data->prenom_enfant ?></td>
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></td>
                                                <td><?php echo $data->jour ?></td>
                                                <td><?php echo $data->mois ?></span> </td>
                                                <td><?php echo $data->annee ?></td>
                                                <td><?php echo $data->cni_pere ?></td>
                                                <td><?php echo $data->cni_mere ?></td>
                                                <td><?php echo $data->date_declaration ?></td>
                                                <td><?php echo $data->statut_enfant ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Valider"> <i class="fa fa-check text-inverse m-r-10"></i> </a> </button>

                                                    <!--

                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact2 <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Réfuser"> <i class="fa fa-times text-inverse m-r-10"></i> </a> </button>
                                                    -->


                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Enregistrer cette Naissance</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" name="id_declaration_naissance" value="<?php echo $data->id_declaration_naissance ?>" class="form-control" placeholder="Id_Declaration"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date d'Enregistrement</label>
                                                                            <input type="date" name="date_enregistrement" class="form-control" placeholder="Date Enregistrement"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" name="matricule_personnel" placeholder="Numéro Matricule du Personnel"> 
                                                                        </div>


                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="preuve_payement" class="form-control" placeholder="Preuve de Payement"> 
                                                                        </div>


                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="valider"  class="btn btn-info waves-effect">Valider</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>






                                                <div id="add-contact2 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Réfus d'Enregistrement de cette Naissance</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <from class="form-horizontal form-material">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" class="form-control" placeholder="Id_Declaration"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date d'Ennulation</label>
                                                                            <input type="date" class="form-control" placeholder="Date d'Ennulation"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="textarea" class="form-control" placeholder="Motif"> 
                                                                        </div>
                                                                     
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                </from>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"  class="btn btn-info waves-effect" data-dismiss="modal">Réfus</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>








                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>

<?php
    if (isset($_POST['valider'])) 
    {
        if (ajouterNaissance($_POST['id_declaration_naissance'],$_POST['date_enregistrement'],$_POST['matricule_personnel'],$_POST['preuve_payement'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }


        if (modifierSituationDeclarationNaissance($_POST['id_declaration_naissance'])) {
            # code...
        }
    }

?>
                    </div>