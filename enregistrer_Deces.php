<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=enregistrer_Deces" method="POST">
                                            <h3 class="box-title m-b-0">Enregistrer un Décès</h3>
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
                                                <th>Certificat </th>
                                                <th>Nom et Prénom du premier déclarant</th>
                                                <th>Nom et Prénom du deuxième déclarant</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
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
                                                
                                                <td><?php echo $data->certificat_deces  ?></td>
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




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Valider"> <i class="fa fa-check text-inverse m-r-10"></i> </a> </button>





                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Enregistrer ce Décès</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" value="<?php echo $data->id_declaration_deces ?>"  name="id_declaration_deces" class="form-control" placeholder="Id_Declaration"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date</label>
                                                                            <input type="date" name="date_enregistrement" class="form-control" placeholder="Date de Célebration"> 
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="matricule_personnel" class="form-control" placeholder="Numéro Matricule du Personnel"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="preuve_payement" class="form-control" placeholder="Preuve de Payement"> 
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="valider" class="btn btn-info waves-effect">Valider</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </from>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>






                                                <div id="add-contact2 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Réfus d'Enregistrement de ce décès</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <from class="form-horizontal form-material">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" class="form-control" placeholder="Id_Declaration"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="Date d'Ennulation"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Motif"> 
                                                                        </div>
                                                                     
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                </from>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"  class="btn btn-info waves-effect" data-dismiss="modal">Réfus</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
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
    if (isset($_POST['valider'])) 
    {
        if (ajouterDeces($_POST['id_declaration_deces'],$_POST['date_enregistrement'],$_POST['matricule_personnel'],$_POST['preuve_payement'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }

        if (modifierSituationDeclarationDeces($_POST['id_declaration_deces']))
        {
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }
    }



?>
                    </div>