
<?php
require_once 'connection.php';
require_once 'controler_demande_cni.php';
?>


<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Demande_CNI" method="POST">
                                            <h3 class="box-title m-b-0">Enregistrer une Carte nationale d'identité</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom du demandeur..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom du demandeur</th>
                                                
                                                <th>Prénom du demandeur</th>
                                                
                                                <th>CNI du Père </th>
                                                <th>CNI de la Mère</th>

                                                <th>Zone</th>
                                                <th>Etat-Civil</th>
                                                <th>Photo</th>
                                                <th>E-mail ou Téléphone</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $fonction = getDemandeCNI();
                                                            if (isset($_POST['valider'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDemandeCNI($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;

                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $data->nom_demandeur ?></td>
                                                <td><?php echo $data->prenom_demandeur ?></td>
                                                <td><?php echo $data->cni_pere ?></td>
                                                <td><?php echo $data->cni_mere ?></td>
                                                <td><?php echo $data->nom_zone ?></td>
                                                <td><?php echo $data->etat_civil ?></td>
                                                <td><?php echo $data->photo ?></td>
                                                <td><?php echo $data->phone_mail ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Valider"> <i class="fa fa-check text-inverse m-r-10"></i> </a> </button>

                                                    <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Enregistrer cette Carte</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" method="POST" action="">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="id_demande_cni" hidden="true" value="<?php echo $data->id_demande_cni ?>" class="form-control" > 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="num_cni" class="form-control" placeholder="Numéro NMIFP"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                                <?php
                                                                                    foreach (getZoneDemandeCni() as $data1) 
                                                                                    {
                                                                                ?>
                                                                                <option value="<?php echo $data1->id_zone ?>">
                                                                                    <?php echo $data1->nom_zone.' - '.$data1->commune.' - '.$data1->province; ?>
                                                                                </option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            
                                                                            <input type="date" class="form-control" name="date_delivrance"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nom_personnel" class="form-control" placeholder="Nom de l'Officier"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="prenom_personnel" class="form-control" placeholder="Prénom de l'Officier"> 
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


                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact2 <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Réfuser"> <i class="fa fa-times text-inverse m-r-10"></i> </a> </button>


                                                    <div id="add-contact2 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Réfus de délivrer la carte</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="id_demande_cni" hidden="true" value="" class="form-control" > 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="date" class="form-control" placeholder="Date d'Ennulation"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="textarea" class="form-control" placeholder="Motif"> 
                                                                        </div>
                                                                     
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                <button type="submit"  class="btn btn-info waves-effect">Réfus</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                            </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                                    
                                                </td>

                                                

                                            </tr>
                                            <?php
                                                }
                                            ?>
                                           
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
        if (ajouterCNI($_POST['num_cni'],$_POST['id_demande_cni'],$_POST['id_zone'],$_POST['date_delivrance'],$_POST['nom_personnel'],$_POST['prenom_personnel'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }

        if (updateSituationDemandeCNI($_POST['id_demande_cni'])) 
        {
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }
    }

?>



                    </div>