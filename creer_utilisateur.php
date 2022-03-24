<!-- /.row -->

<?php
require_once 'connection.php';
require_once 'controler_User.php';
?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Creer Un Utilisateur</h3>
                            <p class="text-muted m-b-30 font-13"> Ajouter un utilisateur </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Numéro de la CNI</label>
                                            <input type="text" name="num_cni" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom d'utilisateur</label>
                                            <input type="text" name="login" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mot de Passe</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Numéro Matricule</label>
                                            <input type="text" name="matricule" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fonction
                                            </label>
                                            <select name="id_fonction" class="custom-select form-control required" id="wlocation2" name="location">
                                                <?php
                                                  foreach (getFonctionUser() as $data) 
                                                  {
                                                ?>
                                                <option value="<?php echo $data->id_fonction ?>">
                                                    <?php echo $data->nom_fonction ?>
                                                        
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Affectation
                                            </label>
                                            <select name="id_zone" class="custom-select form-control required" id="wlocation2" name="location">
                                                <?php
                                                  foreach (getZoneUser() as $data1) 
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
                                        
                                       
                                        <button type="submit" name="valider" class="btn btn-success waves-effect waves-light m-r-10">Valider</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Annuler</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Affichage des Utilisateur</h3>


                        <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>CNI</th>
                                                <th>Login</th>
                                                <th>Matricule</th>
                                                <th>Fonction</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                  foreach (afficherUser() as $data2) 
                                                  {
                                            ?>
                                            <tr>
                                                <td><?php echo $data2->num_cni ?></td>
                                                <td><?php echo $data2->login ?></td>
                                                <td><?php echo $data2->matricule ?></td>
                                                <td><?php echo $data2->nom_fonction ?></td>
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






<?php
    if (isset($_POST['valider'])) 
    {
        if (ajouterUser($_POST['num_cni'],$_POST['login'],$_POST['password'],$_POST['matricule'],$_POST['id_fonction'],$_POST['id_zone'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
            echo "non";
    }

?>





                </div>