<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Declaration_Deces" method="POST">
                                            <h3 class="box-title m-b-0">Modification des Déclarations de Decès</h3>
                                            <input type="text" class="form-control" placeholder="Entrer  CNI du Défunt..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
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
                                                <th>Zone </th>
                                                <th>Nom et Prénom du premier déclarant</th>
                                                <th>Nom et Prénom du deuxième déclarant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = afficherDeclarationDeces();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDeclaDeces($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;
                                                  
                                            ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur.'    '.$data->prenom_demandeur ?></td>
                                                
                                                <td><?php echo $data->cni_defunt ?></td>
                                                <td><?php echo $data->date_deces  ?></td>
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></td>
                                                
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
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modification d'une Déclaration de Décès</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" value="<?php echo $data->id_declaration_deces ?>" class="form-control" name="id_declaration_deces"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="CNI du Défunt" name="cni_defunt" value="<?php echo $data->cni_defunt ?>"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date de decès</label>
                                                                            <input type="date" class="form-control" placeholder="Date de decès" name="date_deces" value="<?php echo $data->date_deces ?>"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Certificat de decès</label>
                                                                            <input type="file" class="form-control" name="certificat_deces" value="<?php echo $data->certificat_deces ?>"> 
                                                                        </div>
                                                                        

                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                             <?php
                                                                                  foreach (getZoneDeces() as $data1) 
                                                                                  {
                                                                                ?>
                                                                                <option value="<?php echo $data->id_zone ?>">
                                                                                    <?php echo $data1->nom_zone.' - '.$data1->commune.' - '.$data1->province ?>
                                                                                        
                                                                                </option>
                                                                                <?php
                                                                                    }
                                                                                ?>


                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="CNI du premier déclarant" name="cni_declarant1" value="<?php echo $data->cni_declarant1 ?>"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="CNI du deuxième déclarant" name="cni_declarant2" value="<?php echo $data->cni_declarant2 ?>"> 
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
        if (modifierDeclarationDeces($_POST['cni_defunt'],$_POST['date_deces'],$_POST['certificat_deces'],$_POST['id_zone'],$_POST['cni_declarant1'],$_POST['cni_declarant2'],$_POST['id_declaration_deces']) > 0) 
        {
            echo "bien";
        }
        else echo "non";
    }

?>
                    </div>