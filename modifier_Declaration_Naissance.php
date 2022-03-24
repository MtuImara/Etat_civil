<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>

<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=modifier_Declaration_Naissance" method="POST">
                                            <h3 class="box-title m-b-0">Modification des Déclarations de Naissance</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom de l'enfant..." name="recherche">
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
                                                <th>Date de la Déclaration</th>                                                
                                                <th>Etat de l'Enfant</th>
                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = afficherDeclarationNaissance();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDeclNaissance($id);
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
                                                <td><?php echo $data->mois ?></span> </td>
                                                <td><?php echo $data->annee ?></td>
                                                <td><?php echo $data->cni_pere ?></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationNaissanceMere($data->cni_mere) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_mere;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td><?php echo $data->date_declaration ?></td>
                                                <td><?php echo $data->statut_enfant ?></td>
                                                <td class="text-nowrap">

                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>
                                                    
                                                </td>

                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modification d'une Déclaration de Naissance</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" method="POST" action="">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" name="id_declaration_naissance" value="<?php echo $data->id_declaration_naissance ?>" class="form-control" placeholder="Id"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nom_enfant" value="<?php echo $data->nom_enfant ?>" class="form-control" placeholder="Nom de l'enfant"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="prenom_enfant" value="<?php echo $data->prenom_enfant ?>" class="form-control" placeholder="Prénom de l'enfant"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                                <?php
                                                                                  foreach (getZoneNaissance() as $data1) 
                                                                                  {
                                                                                    

                                                                                ?>
                                                                                <option value="<?php echo $data1->id_zone ?>"><?php echo $data1->nom_zone.' - '.$data1->commune.' - '.$data1->province ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="number" name="jour" value="<?php echo $data->jour ?>" class="form-control" placeholder="Jour de Naissance"> 
                                                                        </div>


                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="mois">
                                                                                <option value="Janvier">Janvier</option>
                                                                                <option value="Février">Février</option>
                                                                                <option value="Mars">Mars</option>
                                                                                <option value="Avril">Avril</option>
                                                                                <option value="Mai">Mai</option>
                                                                                <option value="Juin">Juin</option>
                                                                                <option value="Juillet">Juillet</option>
                                                                                <option value="Aout">Aout</option>
                                                                                <option value="Septembre">Septembre</option>
                                                                                <option value="Octobre">Octobre</option>
                                                                                <option value="Novembre">Novembre</option>
                                                                                <option value="Décembre">Décembre</option>
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="number" name="annee" value="<?php echo $data->annee ?>" class="form-control" placeholder="Année de Naissance"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_pere" value="<?php echo $data->cni_pere ?>" class="form-control" placeholder="CNI du Père"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_mere" value="<?php echo $data->cni_mere ?>" class="form-control" placeholder="CNI de la mère"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_temoin1" value="<?php echo $data->cni_temoin1 ?>" class="form-control" placeholder="CNI du premier Témoin"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="cni_temoin2" value="<?php echo $data->cni_temoin2 ?>" class="form-control" placeholder="CNI du deuxième Témoin"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="file" name="certificat" value="<?php echo $data->certificat ?>" class="form-control" placeholder="Certificat de l'Hopital"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="date" name="date_declaration" value="<?php echo $data->date_declaration ?>" class="form-control" placeholder="Date de la Déclaration"> 
                                                                        </div>
                                                                        
                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="statut_enfant">
                                                                                <option value="Mariage">Mariage</option>
                                                                                <option value="Hors Mariage">Hors Mariage</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <select class="custom-select form-control required" id="wlocation2" name="id_adresse">
                                                                                <?php
                                                                                  foreach (getAdresseNaissance() as $data2) 
                                                                                  {
                                                                                    

                                                                                ?>
                                                                                <option value="<?php echo $data2->id_adresse ?>"><?php echo $data2->province.' - '.$data2->commune.' - '.$data2->quartier.' - '.$data2->avenue.' - '.$data2->numero ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="modifier" class="btn btn-info waves-effect">Modifier</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->

<?php
    //modification
    if (isset($_POST['modifier'])) 
    {
        if (modifierDeclarationNaissance($_POST['nom_enfant'],$_POST['prenom_enfant'],$_POST['id_zone'],$_POST['jour'],$_POST['mois'],$_POST['annee'],$_POST['cni_pere'],$_POST['cni_mere'],$_POST['cni_temoin1'],$_POST['cni_temoin2'],$_POST['certificat'],$_POST['date_declaration'],$_POST['statut_enfant'],$_POST['id_adresse'],$_POST['id_declaration_naissance']) > 0) 
        {
            echo "bien";
        }
        else echo "non";
    }

?>
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