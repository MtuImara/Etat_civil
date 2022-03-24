<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>



<!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Déclarer un Decès</h3>
                            <p class="text-muted m-b-30 font-13"></p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du Defun</label>
                                            <input type="text" required="" class="form-control" name="cni_defunt" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date de decès</label>
                                            <input type="date" required="" class="form-control" name="date_deces" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Certificat de l'hopital</label>
                                            <input type="file" required="" class="form-control" name="certificat_deces" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">La Zone</label>
                                            <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                <?php
                                                  foreach (getZoneDeces() as $data) 
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
                                            <label for="exampleInputEmail1">CNI du premier déclarant</label>
                                            <input type="text" required="" class="form-control" name="cni_declarant1" id="exampleInputEmail1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CNI du deuxième déclarant</label>
                                            <input type="text" required="" class="form-control" name="cni_declarant2" id="exampleInputEmail1" >
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
        if (ajouterDeclarationDeces($_POST['cni_defunt'],$_POST['date_deces'],$_POST['certificat_deces'],$_POST['id_zone'],$_POST['cni_declarant1'],$_POST['cni_declarant2'])) 
        {
            # code...
            echo "bien Enregistré";
        }
        else
            echo "non";
    }

?>
                </div>