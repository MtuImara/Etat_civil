<?php
require_once 'connection.php';
require_once 'controler_mariage.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Mariage" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des Mariages</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le numero de l'Acte de Mariage..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom et Prénom du futur conjoint</th>
                                                <th>CNI du futur conjoint</th>
                                                <th>Nom et Prénom de la future conjointe</th>
                                                <th>CNI de la future conjointe</th>
                                                <th>Date de déclaration</th>
                                                <th>Zone</th>
                                                <th>Régime</th>
                                                <th>Date de Célebration</th>
                                                <th>Matricule du premier Personnel</th>
                                                <th>Matricule du deuxième Personnel</th>
                                                <th>Preuve de Payement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = affichageMariage();
                                                            if (isset($_POST['valider'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheMariage($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur.'    '.$data->prenom_demandeur ?></td>
                                                
                                                
                                                <td><?php echo $data->cni_futur_conjoint ?></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationMariageConjointe($data->cni_future_conjointe) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td><?php echo $data->cni_future_conjointe ?></td>
                                                <td><?php echo $data->date_declaration ?></td>
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province  ?></td>
                                                <td><?php echo $data->regime ?></td>
                                                <td><?php echo $data->date_celebration  ?></td>
                                                <td><?php echo $data->matricule_personnel1 ?></td></td>
                                                
                                                <td><?php echo $data->matricule_personnel2 ?></td>
                                                <td><?php echo $data->preuve_payement ?></td>


                                                <td>

                                                 <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-print text-inverse m-r-10"></i> </a> </button>
   
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous Imprimer un Extrait de Mariage?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="pdf_mariage.php?id_mariage=<?php echo $data->id_mariage ?>" method="POST">
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
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>