<?php
require_once 'connection.php';
require_once 'controler_mariage.php';
?>

<!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Déclarer un Mariage</h3>
                            <p class="text-muted m-b-30 font-13"></p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du Futur Conjoint</label>
                                            <input type="text" name="cni_futur_conjoint" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI de la Future Conjointe</label>
                                            <input type="text" name="cni_future_conjointe" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du premier témoin</label>
                                            <input type="text" name="cni_temoin1" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du deuxième témoin</label>
                                            <input type="text" name="cni_temoin2" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date de déclaration</label>
                                            <input type="date" name="date_declaration" class="form-control" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">La Zone</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                <?php
                                                  foreach (getZoneMariage() as $data) 
                                                  {
                                                ?>
                                                <option value="<?php echo $data->id_zone ?>">
                                                    <?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?>
                                                        
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Regime</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="regime">
                                                <option value="Communauté des Biens">Communauté des Biens</option>
                                                <option value="Séparation des Biens">Séparation des Biens</option>
                                            </select>
                                        </div>
                                        
                                        
                                        
                                       
                                        <button type="submit" name="valider" class="btn btn-success waves-effect waves-light m-r-10">Enregistrer</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Annuler</button>
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
        if (ajouterDeclarationMariage($_POST['cni_futur_conjoint'],$_POST['cni_future_conjointe'],$_POST['cni_temoin1'],$_POST['cni_temoin2'],$_POST['date_declaration'],$_POST['id_zone'],$_POST['regime'])) 
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