<?php
require_once 'connection.php';
require_once 'controler_demande_cni.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            
                            
                                <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_CNI" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des CNI</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Numéro CNI..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Valider</button> 
                                        </div>
                                    
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
                                                <th>Nom et Prenom de l'officier</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                    $fonction = affichageCNI();
                                                            if (isset($_POST['valider'])) 
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
                                                <td>
                                                     <?php
                                                    foreach(afficherDemandeCNIPere($data->cni_pere) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_pere;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDemandeCNIMere($data->cni_mere) as $data2) 
                                                    {
                                                        echo $data2->nom_demandeur.'    '.$data2->prenom_demandeur.'  - '.$data->cni_mere;
                                                    }
                                                    ?>
                                                </td> 
                                                <td><?php echo $data->etat_civil   ?></td>
                                                <td><img src="<?php echo 'img/'.$data->photo   ?>" width=40  ></td>
                                                <td><?php echo $data->phone_mail   ?></td>
                                                <td><?php echo $data->num_cni   ?></td>
                                                <td><?php echo $data->nom_zone   ?></td>
                                                <td><?php echo $data->date_delivrance   ?></td>
                                                <td><?php echo $data->nom_personnel.'   '.$data->prenom_personnel ?></td>
                                               





                                                <td>

                                                 <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-print text-inverse m-r-10"></i> </a> </button>
   
                                                </td>





        <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Voulez-vous Imprimer?</h4> 
                    </div>
                    
                    <div class="modal-body">
                        <form class="form-horizontal form-material" action="pdf_cni.php?num_cni=<?php echo $data->num_cni ?>" method="POST">
                            <div class="form-group">
                               

                                <button type="submit" class="btn btn-info waves-effect" name="impression">Imprimer</button>

                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
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