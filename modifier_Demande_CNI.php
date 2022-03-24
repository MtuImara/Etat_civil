<?php

require_once 'connection.php';
require_once 'controler_demande_cni.php';
?>



<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Demande_CNI" method="POST">
                                            <h3 class="box-title m-b-0">Modification des demandes de CNI</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom du demandeur..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom du demandeur</th>
                                                <th>Prenom du demandeur</th>
                                                <th>CNI du père</th>
                                                <th>CNI de la mère</th>
                                                <th>Zone</th>
                                                <th>Etat civil</th>
                                                <th>Photo</th>
                                                <th>Téléphone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = getDemandeCNI();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDemandeCNI($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;

                                            ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur ?></td>
                                                <td><?php echo $data->prenom_demandeur ?></td>
                                                <td><?php echo $data->cni_pere ?></td>
                                                <td><?php echo $data->cni_mere ?></td>
                                                <td><?php echo $data->nom_zone ?></td>
                                                <td><?php echo $data->etat_civil ?></td>
                                                <td><img src="<?php echo 'img/'.$data->photo   ?>" width=40  ></td>
                                                <td><?php echo $data->phone_mail ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>





        <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Modification</h4> 
                    </div>
                    
                    <div class="modal-body">
                        <form class="form-horizontal form-material" action="" method="POST">
                            <div class="form-group">
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Id_demande_cni" hidden="true" value="<?= $data->id_demande_cni ?>" name="id_demande_cni"> </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Nom du demandeur" value="<?= $data->nom_demandeur ?>" name="nom_demandeur"> </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Prénom du demande" value="<?= $data->prenom_demandeur ?>" name="prenom_demandeur"> </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="CNI du père" value="<?= $data->cni_pere ?>" name="cni_pere"> </div>
                                    <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="CNI de la mère" value="<?= $data->cni_mere ?>" name="cni_mere"> </div>
                                    <div class="col-md-12 m-b-20">
                                <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                <?php
                                foreach (getZoneDemandeCni() as $data1) 
                                {
                                ?>
                                    <option  value="<?= $data1->id_zone ?>"> <?php
                                        echo $data1->nom_zone
                                        ?>

                                        </option>
                                <?php
                                }
                                ?>

                                </select>
                            </div>
                                    <div class="col-md-12 m-b-20">
                                <select class="custom-select form-control required" id="wlocation2" name="id_adresse" value="<?= $data->id_adresse ?>">
                                <?php
                                foreach (getAdresseDemandeCni() as $data2) 
                                {
                                ?>
                                    <option value="<?= $data2->id_adresse?>">
                                         <?php echo
                                       $data2->quartier.' - '.$data2->avenue.' - '.$data2->numero 
                                       ?>
                                    </option>
                                <?php
                                }
                                ?>

                                </select>
                            </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Lieu de naissance" value="<?= $data->lieu_naissance ?>" name="lieu_naissance"> 
                                </div>
                                    <div class="col-md-12 m-b-20">
                                    <input type="date" class="form-control" placeholder="Date de naissance" value="<?= $data->date_naissance ?>" name="date_naissance"> 
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <select class="custom-select form-control required" id="wlocation2" value="<?= $data->etat_civil ?>" name="etat_civil">
                                        <option value="Célibataire">Célibataire</option>
                                        <option value="Marié(e)">Marié(e)</option>
                                        <option value="Divorcé(e)">Divorcé(e)</option>
                                        <option value="Veuf(ve)">Veuf(ve)</option>
                                    </select> 
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Profession" value="<?= $data->profession ?>" name="profession"> 
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="file" class="form-control" placeholder="Photo" value="<?= $data->photo ?>" name="photo"> 
                                </div>
                                <div class="col-md-12 m-b-20">
                                    <input type="text" class="form-control" placeholder="Téléphone" value="<?= $data->phone_mail ?>" name="phone_mail"> 
                                </div>

                                <button type="submit" class="btn btn-info waves-effect" name="modifier">Valider</button>

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

<?php
    //modification
    if (isset($_POST['modifier'])) 
    {
        if (updateDemandeCNI($_POST['id_demande_cni'],$_POST['nom_demandeur'],$_POST['prenom_demandeur'],$_POST['cni_pere'],$_POST['cni_mere'],$_POST['id_zone'],$_POST['id_adresse'],$_POST['lieu_naissance'],$_POST['date_naissance'],$_POST['etat_civil'],$_POST['profession'],$_POST['photo'],$_POST['phone_mail']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }

?>




                    </div>