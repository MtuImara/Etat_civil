<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Deces" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des Décès</h3>
                                            <input type="text" class="form-control" placeholder="Entrer CNI du Defunt..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom et Prénom du Défunt</th>
                                                
                                                <th>CNI du Défunt</th>
                                                <th>Date de Décès</th>
                                                <th>Certificat </th>
                                                <th>Nom et Prénom du premier déclarant</th>
                                                <th>Nom et Prénom du deuxième déclarant</th>
                                                <th>Date d'enregistrement</th>
                                                <th>Preuve de Payement</th>
                                                <th>Matricule du Personnel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                   $fonction = affichageDeces();
                                                            if (isset($_POST['valider'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDeces($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur.'    '.$data->prenom_demandeur  ?></td>
                                                 <td><?php echo $data->cni_defunt ?></td>
                                                <td><?php echo $data->date_deces ?></td>
                                                <td><img src="<?php echo 'img/'.$data->certificat_deces   ?>" width=40  ></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationDecesDeclarant1($data->cni_declarant1) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_declarant1;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach (afficherDeclarationDecesDeclarant2($data->cni_declarant2) as $data2) 
                                                    {
                                                        echo $data2->nom_demandeur.'    '.$data2->prenom_demandeur.'  - '.$data->cni_declarant2;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td><?php echo $data->date_enregistrement  ?></td>
                                                <td><?php echo $data->preuve_payement  ?></td>
                                                
                                                <td><?php echo $data->matricule_personnel ?></td>
                                                


                                                <td>

                                                 <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-print text-inverse m-r-10"></i> </a> </button>
   
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous Imprimer un Extrait de Décès?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="pdf_deces.php?id_deces=<?php echo $data->id_deces ?>" method="POST">
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