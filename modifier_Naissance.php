<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Naissance" method="POST">
                                            <h3 class="box-title m-b-0">Modification d'une Naissance</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Numéro de l'Acte de Naissance..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
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
                                                
                                                
                                                

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <?php
                                                    $fonction = afficherNaissance();
                                                            if (isset($_POST['validerR'])) 
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
                                                <td class="text-nowrap">


                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>

                                                    
                                                </td>

                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modifier cette Naissance</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="id_naissance" value="<?php echo $data->id_naissance ?>" hidden="true" class="form-control" placeholder="Id_Declaration"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="date" name="date_enregistrement" value="<?php echo $data->date_enregistrement ?>" class="form-control" placeholder="Date Enregistrement"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="matricule_personnel" value="<?php echo $data->matricule_personnel ?>" class="form-control" placeholder="Numéro Matricule du Personnel"> 
                                                                        </div>


                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="preuve_payement" value="<?php echo $data->preuve_payement ?>" class="form-control" placeholder="Preuve de Payement"> 
                                                                        </div>


                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="modifier" class="btn btn-info waves-effect" >Modifier</button>
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
    if (isset($_POST['modifier'])) 
    {
        if (modifierNaissance($_POST['date_enregistrement'],$_POST['matricule_personnel'],$_POST['preuve_payement'],$_POST['id_naissance'])) 
        {
            # code...
            echo "bien";
        }
        else
            echo "non";
    }

?>
                    </div>