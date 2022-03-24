<?php
require_once 'connection.php';
require_once 'controler_divorce.php';
?>



<div class="col-md-12">
                        <div class="card card-body">
                            
                            <div class="modal-body">

                                <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Divorce" method="POST">
                                            <h3 class="box-title m-b-0">Afficher Divorce</h3>
                                            <input type="text" class="form-control" placeholder="Recherche..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>
                            </div>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom et Prénom de l'Ex-conjoint</th>
                                                <th>CNI de l'Ex-conjoint</th>
                                                <th>Nom et Prénom de l'Ex-conjointe</th>
                                                <th>CNI de l'Ex-conjointe</th>
                                                <th>Nom et Prénom du premier Témoin</th>
                                                <th>Nom et Prénom du deuxième Témoin</th>
                                                <th>Date de divorse</th>
                                                <th>Zone</th>
                                                <th>Matricule du premier Personnel</th>
                                                <th>Matricule du deuxième Personnel</th>
                                                <th>Preuve de Payement</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            

                                            <?php
                                                $fonction = afficherDivorce();
                                                if (isset($_POST['valider'])) 
                                                {
                                                    if (!empty($_POST['recherche'])) 
                                                    {
                                                        $id = $_POST['recherche'];
                                                        $fonction = rechercheDivorce($id);
                                                    }
                                                }
                                                    $i=0;
                                                  foreach ($fonction as $data) 
                                                  {
                                                    $i++;
                                            ?>

                                            
                                            <tr>
                                                <td><?php
                                                    foreach(afficherFutur_conjoint($data->cni_futur_conjoint) as $data3) 
                                                    {
                                                        echo $data3->nom_demandeur.'    '.$data3->prenom_demandeur;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                
                                                
                                                <td><?php  echo $data->cni_futur_conjoint ?></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherFuture_conjointe($data->cni_future_conjointe) as $data4) 
                                                    {
                                                        echo $data4->nom_demandeur.'    '.$data4->prenom_demandeur;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php  echo $data->cni_future_conjointe ?></td>
                                                <td>
                                                     <?php
                                                    foreach(afficherTemoin1($data->cni_temoinD1) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherTemoin2($data->cni_temoinD2) as $data2) 
                                                    {
                                                        echo $data2->nom_demandeur.'    '.$data2->prenom_demandeur;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $data->date_divorce ?></td>
                                                <td><?php echo $data->province.' - '.$data->commune.' - '.$data->nom_zone ?></td>
                                                
                                                <td><?php echo $data->matricule_personnel1 ?></td>
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
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous Imprimer un Extrait de Divorce?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="pdf_divorce.php?id_divorce=<?php echo $data->id_divorce ?>" method="POST">
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
                                       <?php // }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>