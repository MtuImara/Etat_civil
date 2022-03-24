<?php
require_once 'connection.php';
require_once 'controler_naissance.php';
?>

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=afficher_Declaration_Naissance" method="POST">
                                            <h3 class="box-title m-b-0">Affichage des declaration de Naissance</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le nom de l'enfant..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="valider">Rechercher</button> 
                                        
                                    
                                </form>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Nom de l'enfant</th>
                                                <th>Prénom de l'enfant</th>
                                                <th>Né(e) à</th>
                                                <th>Jour de Naissance</th>
                                                <th>Mois de Naissance</th>
                                                <th>Année de Naissance</th>
                                                <th>CNI du Père</th>
                                                <th>CNI de la mère</th>
                                                <th>CNI du premier Témoin</th>
                                                <th>CNI du deuxième Témoin</th>
                                                <th>Certificat de l'Hopital</th>
                                                
                                                <th>Date de la Déclaration</th>

                                                <th>Etat de Naissance de l'Enfant</th>
                                                <th>Domicilié à</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $fonction = afficherDeclarationNaissance();
                                                            if (isset($_POST['valider'])) 
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
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationNaissanceTemoin1($data->cni_temoin1) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_temoin1;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationNaissanceTemoin2($data->cni_temoin2) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_temoin2;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td><?php echo $data->certificat ?></td>
                                                <td><?php echo $data->date_declaration ?></td>
                                                <td><?php echo $data->statut_enfant ?></td>
                                                <td><?php echo $data->province.' - '.$data->quartier.' - '.$data->avenue.' - '.$data->numero ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        
                        
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>