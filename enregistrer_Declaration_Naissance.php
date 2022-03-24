<!-- /.row -->

<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Déclarer une Naissance</h3>
                            <p class="text-muted m-b-30 font-13"></p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom de l'enfant</label>
                                            <input type="text" name="nom_enfant" required="" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prénom de l'enfant</label>
                                            <input type="text" name="prenom_enfant" required="" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lieu de Naissance </label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                <?php
                                                  foreach (getZoneNaissance() as $data) 
                                                  {
                                                    

                                                ?>
                                                <option value="<?php echo $data->id_zone ?>"><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jour de Naissance</label>
                                            <input type="number" name="jour" required="" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mois de Naissance
                                            </label>
                                            <select class="custom-select form-control required" id="wlocation2" name="mois">
                                                <option value="">Selectionner un mois...</option>
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Année de Naissance</label>
                                            <input type="number" name="annee" required="" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du Père</label>
                                            <input type="text" name="cni_pere" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI de la mère</label>
                                            <input type="text" name="cni_mere" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du premier Témoin</label>
                                            <input type="text" name="cni_temoin1" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du deuxième Témoin</label>
                                            <input type="text" name="cni_temoin2" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Certificat de l'Hopital</label>
                                            <input type="file" name="certificat" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date de la Déclaration</label>
                                            <input type="date" name="date_declaration" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Statut de de l'enfant </label>
                                            <select class="custom-select form-control required" id="wlocation2" name="statut_enfant">
                                                <option value="">Selectionner un statut...</option>
                                                <option value="Mariage">Mariage</option>
                                                <option value="Hors Mariage">Hors Mariage</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Domicilié à </label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_adresse">
                                                <?php
                                                  foreach (getAdresseNaissance() as $data1) 
                                                  {
                                                    

                                                ?>
                                                <option value="<?php echo $data1->id_adresse ?>"><?php echo $data1->province.' - '.$data1->commune.' - '.$data1->quartier.' - '.$data1->avenue.' - '.$data1->numero ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                       
                                        <button type="submit" name="valider" class="btn btn-success waves-effect waves-light m-r-10">Enregistrer</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Annuler</button>
                                    </form>
                                </div>
                            </div>
                        </div>

<?php
    if (isset($_POST['valider'])) 
    {
        if (ajouterDeclarationNaissance($_POST['nom_enfant'],$_POST['prenom_enfant'],$_POST['jour'],$_POST['mois'],$_POST['annee'],$_POST['id_zone'],$_POST['cni_pere'],$_POST['cni_mere'],$_POST['cni_temoin1'],$_POST['cni_temoin2'],$_POST['certificat'],$_POST['date_declaration'],$_POST['statut_enfant'],$_POST['id_adresse'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
        {
            echo "non";
        }
    }

?>
                    </div>




                    



                            
                        </div>
                    </div>
                </div>