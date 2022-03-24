<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Deces" method="POST">
                                            <h3 class="box-title m-b-0">Modification un Décès</h3>
                                            <input type="text" class="form-control" placeholder="Entrer..." name="recherche">
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
                                                <th>Certificat </th>
                                                <th>Nom et Prénom du premier déclarant</th>
                                                <th>Nom et Prénom du deuxième déclarant</th>
                                                <th>Date d'enregistrement</th>
                                                <th>Preuve de Payement</th>
                                                <th>Matricule du Personnel</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                    $fonction = affichageDeces();
                                                            if (isset($_POST['validerR'])) 
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
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-check text-inverse m-r-10"></i> </a> </button>




                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modifier ce Décès</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="id_deces" value="<?php echo $data->id_deces ?>" hidden="true" class="form-control" placeholder="Id"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="Date de Célebration" name="date_enregistrement" value="<?php echo $data->date_enregistrement ?>"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="matricule_personnel" class="form-control" value="<?php echo $data->matricule_personnel ?>" placeholder="Numéro Matricule du Personnel"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Preuve de Payement" name="preuve_payement" value="<?php echo $data->preuve_payement ?>"> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="modifier"  class="btn btn-info waves-effect" >Valider</button>
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
        if (modifierDeces($_POST['date_enregistrement'],$_POST['matricule_personnel'],$_POST['preuve_payement'],$_POST['id_deces']) > 0) 
        {
            echo "bien";
        }
        else echo "non";
        
    }

?>
                    </div>