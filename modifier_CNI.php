<?php
require_once 'connection.php';
require_once 'controler_demande_cni.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_CNI" method="POST">
                                            <h3 class="box-title m-b-0">Modification des CNI</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Numéro CNI..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom </th>
                                                
                                                <th>Prénom </th>
                                                
                                                <th>CNI du Père </th>
                                                <th>CNI de la Mère</th>
                                                <th>Etat-Civil</th>
                                                <th>Photo</th>
                                                <th>E-mail ou Téléphone</th>
                                                <th>Numéro NMIFP</th>
                                                <th>Délivrée à</th>
                                                <th>Date de Délivrance</th>
                                                <th>Matricule Officier</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                            $fonction = affichageCNI();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheCNI($id);
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
                                                <td><?php echo $data->etat_civil   ?></td>
                                                <td><img src="<?php echo 'img/'.$data->photo   ?>" width=40  ></td>
                                                <td><?php echo $data->phone_mail   ?></td>
                                                <td><?php echo $data->num_cni   ?></td>
                                                <td><?php echo $data->nom_zone   ?></td>
                                                <td><?php echo $data->date_delivrance   ?></td>
                                                <td><?php echo $data->nom_personnel.'  '.$data->prenom_personnel ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modification d'une Carte Nationale d'Identité</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->num_cni?>" name="num_cni" class="form-control">
				 </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                            <?php
                                                                            foreach (getZoneDemandeCni() as $data1) 
                                                                            {
                                                                            ?>
                                                                                <option  value="<?= $data1->id_zone ?>"> <?php
                                                                                    echo $data1->nom_zone
                                                                                    ?>

                                                                                    </option>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="date" value="<?php echo $data->date_delivrance ?>" class="form-control" name="date_delivrance"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->nom_personnel ?>" class="form-control" name="nom_personnel"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->prenom_personnel ?>" class="form-control" name="prenom_personnel"> 
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="modifier"  class="btn btn-info waves-effect">Modifier</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>



<?php
    //modification
    if (isset($_POST['modifier'])) 
    {
        if (modifierCNI($_POST['num_cni'],$_POST['id_zone'],$_POST['date_delivrance'],$_POST['nom_personnel'],$_POST['prenom_personnel']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }

?>
                                                    <!-- /.modal-dialog -->
                                                </div>








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
                    </div>