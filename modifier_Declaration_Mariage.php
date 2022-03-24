<?php
require_once 'connection.php';
require_once 'controler_mariage.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Declaration_Mariage" method="POST">
                                            <h3 class="box-title m-b-0">Modification des Déclarations de Mariage</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le CNI du Conjoint..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom et Prénom du Futur Conjoint</th>
                                                
                                                <th>Nom et Prénom de la Future Conjointe</th>
                                                
                                                <th>Nom et Prénom du premier temoin </th>
                                                <th>Nom et Prénom du deuxième temoin</th>

                                                <th>Date de Déclaration</th>
                                                <th>Zone</th>
                                                <th>Regime</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                   $fonction = afficherDeclarationMariage();
                                                if (isset($_POST['validerR'])) 
                                                {
                                                    if (!empty($_POST['recherche'])) 
                                                    {
                                                        $id = $_POST['recherche'];
                                                        $fonction = rechercheDeclaMariage($id);
                                                    }
                                                }
                                                    $i=0;
                                                  foreach ($fonction as $data) 
                                                  {
                                                    $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur.'    '.$data->prenom_demandeur.'  - '.$data->cni_futur_conjoint ?></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationMariageConjointe($data->cni_future_conjointe) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_future_conjointe;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationMariageTemoin1($data->cni_temoin1) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_temoin1;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationMariageTemoin2($data->cni_temoin2) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_temoin2;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td><?php echo $data->date_declaration ?></td>
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></td>
                                                <td><?php echo $data->regime ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>

                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modification d'une Déclaration de Mariage</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" name="id_declaration_mariage" value="<?php echo $data->id_declaration_mariage ?>" class="form-control"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_futur_conjoint" value="<?php echo $data->cni_futur_conjoint ?>" class="form-control" placeholder="CNI du Futur Conjoint"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_future_conjointe" value="<?php echo $data->cni_future_conjointe ?>" class="form-control" placeholder="CNI de la Future Conjointe"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_temoin1" value="<?php echo $data->cni_temoin1 ?>" class="form-control" placeholder="CNI du premier témoin"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_temoin2" value="<?php echo $data->cni_temoin2 ?>" class="form-control" placeholder="CNI du deuxième témoin"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="date" name="date_declaration" value="<?php echo $data->date_declaration ?>" class="form-control" placeholder="Date de Déclaration"> 
                                                                        </div>

                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                             <?php
                                                                                  foreach (getZoneMariage() as $data1) 
                                                                                  {
                                                                                ?>
                                                                                <option value="<?php echo $data1->id_zone ?>">
                                                                                    <?php echo $data1->nom_zone.' - '.$data1->commune.' - '.$data1->province ?>
                                                                                        
                                                                                </option>
                                                                                <?php
                                                                                    }
                                                                                ?>


                                                                            </select>
                                                                        </div>

                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="regime">

                                                                                <option value="Communauté des Biens">Communauté des Biens</option>
                                                                                <option value="Séparation des Biens">Séparation des Biens</option>


                                                                            </select>
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
        if (modifierDeclarationMariage($_POST['cni_futur_conjoint'],$_POST['cni_future_conjointe'],$_POST['cni_temoin1'],$_POST['cni_temoin2'],$_POST['date_declaration'],$_POST['id_zone'],$_POST['regime'],$_POST['id_declaration_mariage']) > 0) 
        {
            echo "bien";
        }
        else echo "non";
    }

?>
                    </div>