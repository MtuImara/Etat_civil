<?php

    require_once 'connection.php';
    require_once 'adresse_fonction.php';               
?>







<div class="col-md-12">
                        <div class="card card-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=fonction" method="POST">
                                            <h3 class="box-title m-b-0">Fonction des Personnels</h3>
                                            <input type="text" class="form-control" placeholder="Entrer le Nom de la Fonction..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>
                            <div align="right">
                                
                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact3">Ajouter Fonction</button>



                            </div>

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">



                                    
                                    <table class="table table-bordered">
                                        <thead>

                                                
                                            <tr>
                                                <th>Numéro de la Fonction</th>
                                                <th>Nom de la Fonction</th>
                                                

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                     $i=0;
                                                  $fonction = getFonction();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheFonction($id);
                                                                }
                                                            }
                                                              foreach ($fonction as $data) 
                                                              {
                                                    $i++;

                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $data->id_fonction ?></td>
                                                

                                                
                                                <td><?php echo $data->nom_fonction ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact  <?=$i?>" name="BoutonModification" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact2  <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Supprimer"> <i class="fa fa-times text-inverse m-r-10"></i> </a> </button>

                                                    
                                                </td>




                                                
                                                <div id="add-contact  <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">modifier une fonction</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                            
                                                                <form class="form-horizontal form-material" action="" method="POST">

                                                                    
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" class="form-control" placeholder="Id_Fonction" name="id_fonction" value="<?php echo $data->id_fonction ?>"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Fonction du personnel" name="nom_fonction" value="<?php echo $data->nom_fonction ?>"> 
                                                                        </div>


                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </div>


                                                                        <button type="submit" name="modifier"  class="btn btn-info waves-effect">Modifier</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler
                                                                        </button>                                                                    


                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>






                                                <div id="add-contact2  <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment supprimer?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" name="id_fonction" hidden="true"  value="<?php echo $data->id_fonction?>"> 
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                    

                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="supprimer" class="btn btn-danger waves-effect">Supprimer</button>
                                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>









                                            </tr>

                                            <?php 

                                                }

                                            ?>
                                           
                                        </tbody>
                                    </table>

                                    
                                    <tfoot>
                                            <tr>
                                                
                                                <div id="add-contact3" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Ajout d'une nouvelle fonction</h4> </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Nouvelle Fonction" name="nom_fonction"> 
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-info waves-effect" name="valider">Valider</button>
                                                                <button type="reset" class="btn btn-default waves-effect">Annuler</button>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>




                                </div>
                            </div>
                        </div>
                    </div>

                        </div>



                         <?php

                                


                                    if (isset($_POST['valider'])) 
                                    {


                                        if (ajouterFonction($_POST['nom_fonction'])) {
                                            # code...
                                            echo "bien Enregistré";
                                        }
                                        else
                                            echo "non";

                                    }

                                    //suppression
                                    if (isset($_POST['supprimer'])) 
                                    {
                                        if (supprimerFonction($_POST['id_fonction']) > 0) 
                                        {
                                            echo "bien";
                                        }
                                        else echo "non";

                                    }

                                    //modification
                                    if (isset($_POST['modifier'])) 
                                    {
                                        if (updateFonction($_POST['nom_fonction'],$_POST['id_fonction']) > 0) 
                                        {
                                            echo "bien";
                                        }
                                        else echo "non";

                                    }
                                      
                                   
                              ?>







                    </div>







                    