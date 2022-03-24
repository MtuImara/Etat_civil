<?php
require_once 'connection.php';
require_once 'controler_mariage.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Mariage" method="POST">
                                            <h3 class="box-title m-b-0">Modification d'un Mariage</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le numero de l'Acte de Mariage..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
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
                                                <th>Date de Célebration</th>
                                                <th>Matricule du premier Personnel</th>
                                                <th>atricule du deuxième Personnel</th>
                                                <th>Preuve de Payement</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = affichageMariage();
                                                            if (isset($_POST['validerR'])) 
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
                                                <td><?php echo $data->date_celebration  ?></td>
                                                <td><?php echo $data->matricule_personnel1 ?></td>
                                                
                                                <td><?php echo $data->matricule_personnel2 ?></td>
                                                <td><?php echo $data->preuve_payement ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Valider"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>




                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modifier ce Mariage</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" value="<?php echo $data->id_mariage ?>" name="id_mariage" class="form-control"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date de Célebration</label>
                                                                            <input type="date" value="<?php echo $data->date_celebration ?>" name="date_celebration" class="form-control" placeholder="Date de Célebration"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->matricule_personnel1 ?>" name="matricule_personnel1" class="form-control" placeholder="Numéro Matricule du premier Personnel"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->matricule_personnel2 ?>" name="matricule_personnel2" class="form-control" placeholder="Numéro Matricule du deuxième Personnel"> 
                                                                        </div>


                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" value="<?php echo $data->preuve_payement ?>" name="preuve_payement" class="form-control" placeholder="Preuve de Payement"> 
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="modifier" class="btn btn-info waves-effect">Modifier</button>
                                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </form>
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
    //modification
    if (isset($_POST['modifier'])) 
    {
        if (modifierMariage($_POST['date_celebration'],$_POST['matricule_personnel1'],$_POST['matricule_personnel2'],$_POST['preuve_payement'],$_POST['id_mariage']) > 0) 
        {
            echo "bien";
        }
        else echo "non";
        
    }

?>
                    </div>