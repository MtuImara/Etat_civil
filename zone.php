 <?php

                        try {

                              $con=new PDO('mysql:host=localhost;
                                    dbname=etat_civil;
                                    charset=utf8',
                                    'root',''
                                  );
                          
                            } 
                            catch (Exception $e) 
                            {
                              echo $e -> getMessage();
                            }
                    ?>








<div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Province - Commune - Zone</h3>
                            <div align="right">
                                
                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact3">Ajouter Zone
                                </button>



                            </div>

                            

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom de la Zone</th>
                                                <th>Nom de la commune</th>
                                                <th>Nom de la Province</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                                    $i=0;
                                                  $zo = $con->prepare('SELECT * FROM etat_civil.zone');

                                                  $zo -> execute() or die(print_r($zo->errorInfo()));

                                                  while ($data = $zo -> fetchObject()) {
                                                    
                                                    $i++;
                                                  

                                                ?>
                                            
                                            <tr>
                                                <td><?php echo $data->nom_zone  ?></td>  
                                                <td><?php echo $data->commune   ?></td>
                                                <td><?php echo $data->province   ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>



                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact2 <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="supprimer"> <i class="fa fa-times text-inverse m-r-10"></i> </a> </button>



                                                    
                                                </td>





                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">modifier une zone</h4> 
                                                            </div>
                                                            <form class="form-horizontal form-material" action="" method="POST">
                                                            <div class="modal-body">
                                                                
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" hidden="true" class="form-control" placeholder="id_zone" value="<?php echo $data->id_zone  ?>" name="id_zone"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Nom de la zone" value="<?php echo $data->nom_zone  ?>" name="nom_zone"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Nom de la commune" value="<?php echo $data->commune  ?>" name="commune"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Nom de la province" value="<?php echo $data->province  ?>" name="province"> 
                                                                        </div>


                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"  class="btn btn-info waves-effect" name="modifier">Modifier</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <div id="add-contact2 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment supprimer?</h4> 
                                                            </div>                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="CNI" hidden="true" value="<?=$data->id_zone?>" name="id_zone"> 
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"  class="btn btn-danger waves-effect" name="supprimer">Supprimer</button>
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
                                                                <h4 class="modal-title" id="myModalLabel">Ajout d'une nouvelle Zone</h4> </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomZ" class="form-control" placeholder="Nom de la zone"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomC" class="form-control" placeholder="Nom de la commune"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomP" class="form-control" placeholder="Nom de la province"> 
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <button type="submit" class="btn btn-info waves-effect" name="valider">Valider</button>
                                                                <button type="reset" class="btn btn-default waves-effect">Annuler</button>
                                                                </form>
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
                    </div>







<?php 

    if (isset($_POST['valider'])) 
    {


        $fonc=$con->prepare("INSERT INTO zone(nom_zone,commune,province) 
                  VALUES(?,?,?)");

        $res = $fonc -> execute(array($_POST['nomZ'],$_POST['nomC'],$_POST['nomP']))

        or die(print_r($fonc->errorInfo()));


        if ($res) {
          echo "bien Enregistré";
        }
        else echo "non Enregistré";


    }


    //modificationzone
    if (isset($_POST['modifier'])) 
    {


        $fonc=$con->prepare("UPDATE zone SET nom_zone=:nom_zone,commune=:commune,province=:province WHERE id_zone=:id_zone");

        $res = $fonc -> execute(array('nom_zone'=>$_POST['nom_zone'],'commune'=>$_POST['commune'],'province'=>$_POST['province'] ,'id_zone'=>$_POST['id_zone']))

        or die(print_r($fonc->errorInfo()));


        if ($res) {
          header('location:accueil_Admin.php?page=zone');
        }
        else echo "non ";


    }


    //supprimer zone
    if (isset($_POST['supprimer'])) 
    {


        $fonc=$con->prepare("DELETE FROM zone WHERE id_zone =?");

        $res = $fonc -> execute(array($_POST['id_zone']))

        or die(print_r($fonc->errorInfo()));


        if ($res) {
          echo "bien";
        }
        else echo "non ";


    }


?>