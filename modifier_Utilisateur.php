<?php
require_once 'connection.php';
require_once 'controler_User.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Utilisateur" method="POST">
                                            <h3 class="box-title m-b-0">Modification de données des Utilisateurs</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Login..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>CNI</th>
                                                <th>Nom d'utilisateur</th>
                                                <th>Mot de Passe</th>
                                                <th>Matricule</th>
                                                <th>Fonction</th>
                                                <th>Affectation</th>
                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $i=0;
                                                  $fonction = afficherUser();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheUser($id);
                                                                }
                                                            }
                                                              foreach ($fonction as $data) 
                                                              {
                                                    $i++;
                                            ?>
                                            <tr>
                                                
                                                <td>
                                                    <?php
                                                    foreach(afficherNomUser($data->num_cni) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherNomUser($data->num_cni) as $data2) 
                                                    {
                                                        echo $data2->prenom_demandeur;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $data->num_cni ?></td>
                                                <td><?php echo $data->login ?></td>
                                                <td><?php echo $data->password ?></td>
                                                <td><?php echo $data->matricule ?></td>
                                                <td><?php echo $data->nom_fonction ?></td>
                                                
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></td>
                                                
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modification des Utilisateurs</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" method="POST" action="">
                                                                    <div class="form-group">
                                                                        
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="num_cni" value="<?php echo $data->num_cni ?>" class="form-control" placeholder="CNI"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="login" value="<?php echo $data->login ?>" class="form-control" placeholder="Nom d'Utilisateur"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="password" value="<?php echo $data->password ?>" class="form-control" placeholder="Mot de Passe"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" name="matricule" value="<?php echo $data->matricule ?>" class="form-control" placeholder="Matricule"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label for="exampleInputEmail1">Fonction
                                                                            </label>
                                                                            <select name="id_fonction" class="custom-select form-control required" id="wlocation2" name="location">
                                                                                <?php
                                                                                  foreach (getFonctionUser() as $data1) 
                                                                                  {
                                                                                ?>
                                                                                <option value="<?php echo $data1->id_fonction ?>">
                                                                                    <?php echo $data1->nom_fonction ?>
                                                                                        
                                                                                </option>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <label for="exampleInputEmail1">Affectation
                                                                            </label>
                                                                            <select name="id_zone" class="custom-select form-control required" id="wlocation2" name="location">
                                                                                <?php
                                                                                  foreach (getZoneUser() as $data2) 
                                                                                  {
                                                                                ?>
                                                                                <option value="<?php echo $data2->id_zone ?>">
                                                                                    <?php echo $data2->nom_zone.' - '.$data2->commune.' - '.$data2->province ?>
                                                                                        
                                                                                </option>
                                                                                <?php
                                                                                    }
                                                                                ?>
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
        if (modifierUser($_POST['num_cni'],$_POST['login'],$_POST['password'],$_POST['id_fonction'],$_POST['id_zone'],$_POST['matricule']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }

?>

                    </div>