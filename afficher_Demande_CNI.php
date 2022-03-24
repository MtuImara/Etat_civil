 <?php
 require_once 'connection.php';
require_once 'controler_demande_cni.php';
?>



<div class="col-md-12">
                        <div class="card card-body">
                            
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Demande_CNI" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des demande de CNI</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom du demandeur..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>
                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom du demandeur</th>
                                                
                                                <th>Prénom du demandeur</th>
                                                
                                                <th>CNI du Père </th>
                                                <th>CNI de la Mère</th>

                                                <th>Zone</th>
                                                <th>Adresse</th>
                                                <th>Lieu de Naissance</th>
                                                <th>Date de Naissance</th>
                                                <th>Etat-Civil</th>
                                                <th>Proffession</th>

                                                <th>Photo</th>
                                                <th>E-mail ou Téléphone</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                            $fonction = getDemandeCNI();
                                                            if (isset($_POST['valider'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDemandeCNI($id);
                                                                }
                                                            }
                                                                
                                                              foreach ($fonction as $data) 
                                                              {
                                                                
                                                  

                                                ?>
                                            
                                            <tr>
                                                <td><?php echo $data->nom_demandeur  ?></td>
                                                <td><?php echo $data->prenom_demandeur   ?></td>
                                                <td><?php echo $data->cni_pere   ?></td>
                                                <td><?php echo $data->cni_mere   ?></td>
                                                <td><?php echo $data->province.' - '.$data->commune.' - '.$data->nom_zone  ?></td>                                                
                                                <td><?php echo $data->quartier.' - '.$data->avenue.' - '.$data->numero  ?></td>
                                                <td><?php echo $data->lieu_naissance   ?></td>
                                                <td><?php echo $data->date_naissance   ?></td>
                                                <td><?php echo $data->etat_civil   ?></td>
                                                <td><?php echo $data->profession   ?></td>
                                                <td><img src="<?php echo 'img/'.$data->photo   ?>" width=40  ></td>
                                                <td><?php echo $data->phone_mail   ?></td>
                                                





                                                







                                            </tr>

                                            <?php
                                                }
                                              ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div>