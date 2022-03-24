<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Naissance" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des Naissances</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Numéro de l'Acte de Naissance..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
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
                                                <th>Date Enregistrement</th>
                                                                                                
                                                <th>Numéro Matricule du Personnel</th>
                                                <th>Preuve de Payement</th>
                                                
                                                
                                                

                                                 </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                    $fonction = afficherNaissance();
                                                            if (isset($_POST['valider'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheNaissance($id);
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
                                                <td><?php echo $data->mois ?></td>
                                                <td><?php echo $data->annee ?></td>
                                                <td><?php echo $data->cni_pere ?></td>
                                                <td><?php echo $data->cni_mere ?></td>
                                                
                                                
                                                <td><?php echo $data->date_enregistrement ?></td>
                                                <td><?php echo $data->matricule_personnel ?></td>
                                                <td><?php echo $data->preuve_payement ?></td>



                                                <td>

                                                 <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-print text-inverse m-r-10"></i> </a> </button>
   
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous Imprimer un Extrait de Naissance?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="pdf_naissance.php?id_naissance=<?php echo $data->id_naissance ?>" method="POST">
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
