<!-- /.row -->
<?php
    require_once 'connection.php';
    require_once 'controler_demande_cni.php';
?>





                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Demande de la Carte Nationale d'identité</h3>
                            <p class="text-muted m-b-30 font-13"></p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="POST" >
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom du demandeur</label>
                                            <input type="text" name="nom_demandeur" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prénom du demandeur</label>
                                            <input type="text" name="prenom_demandeur" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du Père</label>
                                            <input type="text" name="cni_pere" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI de la Mère</label>
                                            <input type="text" name="cni_mere" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">La Zone</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">

                                                <?php

                                                    foreach (getZoneDemandeCNI() as $data) 
                                                    {

                                                ?>
                                                    
                                                <option value="<?php echo $data->id_zone ?>">

                                                    <?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province  ?>
                                                    
                                                </option>

                                                <?php

                                                  }
                                                ?>



                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Adresse</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_adresse">
                                                <?php

                                                  foreach (getAdresseDemandeCNI() as $data1) 
                                                    {
                                                      

                                                ?>
                                                <option value="<?php echo $data1->id_adresse ?>">

                                                    <?php echo $data1->quartier.' - '.$data1->avenue.' - '.$data1->numero  ?>
                                                    
                                                </option>

                                                <?php

                                                  }
                                                ?>


                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lieu de Naissance</label>
                                            <input type="text" name="lieu_naissance" class="form-control" id="exampleInputEmail1" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date de Naissance</label>
                                            <input type="date" name="date_naissance" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Etat-Civil</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="etat_civil">
                                                <option value="">Selectionner Etat-Civil...</option>
                                                <option value="Célibataire">Célibataire</option>
                                                <option value="Marié(e)">Marié(e)</option>
                                                <option value="Divorcé(e)">Divorcé(e)</option>
                                                <option value="Veuf(ve)">Veuf(ve)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Proffession</label>
                                            <input type="text" name="profession" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo</label>
                                            <input type="file" name="photo" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E-mail ou Téléphone</label>
                                            <input type="text" name="phone_mail" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <button type="submit" name="valider" class="btn btn-success waves-effect waves-light m-r-10">Enregistrer</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Annuler</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                        </div>
                    </div>






                    <?php



                        if (isset($_POST['valider'])) 
                        {
                            
                            if (ajouterDemandeCNI($_POST['nom_demandeur'],$_POST['prenom_demandeur'],$_POST['cni_pere'],$_POST['cni_mere'],$_POST['id_zone'],$_POST['id_adresse'],$_POST['lieu_naissance'],$_POST['date_naissance'],$_POST['etat_civil'],$_POST['profession'],$_POST['photo'],$_POST['phone_mail'])) 
                            {
                                echo "Bien";
                            }
                            else
                                echo "Non";
                            
                        }
          
       
                    ?>
                </div>