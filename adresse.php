 <?php
    require_once 'connection.php';
    require_once 'adresse_fonction.php';
?>





<div class="col-md-12">
                        <div class="card card-body">
                            <div class="modal-body">
                            <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=adresse" method="POST">
                                <h3 class="box-title m-b-0">Les Adresses</h3>
                                <input type="text" class="form-control" placeholder="Entrer le Nom du Quartier..." name="recherche">
                                <button type="submit" class="btn btn-info waves-effect" name="valideR">Rechercher</button> 
                                        
                                    
                            </form>
                            </div>

                            <div align="right">
                                
                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact3">Ajouter Adresse</button>

                                <div id="add-contact3" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Ajout d'une nouvelle adresse</h4> </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                           <select class="custom-select form-control required" id="wlocation2" name="selectZ">
                                                                             <?php
                                                                        foreach (getZotes() as $data1) 
                                                                        {
                                                                        ?>
                                                                            <option value="<?=$data1->id_zone?>"><?=$data1->province.' - '.$data1->commune.' - '.$data1->nom_zone ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomQu" class="form-control" placeholder="Nom du Quartier"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomAv" class="form-control" placeholder="Nom de l'Avenue"> 
                                                                        </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="nomNu" class="form-control" placeholder="Numéro"> 
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

                            </div>
                            

                            <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                                  
                                <div class="table-responsive">


                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom de la Province - Commune - Zone</th>
                                                <th>Nom du Quartier</th>
                                                <th>Nom de l'Avenue</th>
                                                <th>Numéro</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $i=0;
                                                  $fonction = getAdresses();
                                                            if (isset($_POST['valideR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheAdresse($id);
                                                                }
                                                            }
                                                              foreach ($fonction as $data3) 
                                                              {
                                                    $i++;

                                            ?>
                                            
                                            <tr>
                                                
                                                <td ><?php echo $data3->province.' - '.$data3->commune.' - '.$data3->nom_zone  ?></td>
                                                                                                                                                
                                                <td><?php echo $data3->quartier  ?></td>  
                                                <td><?php echo $data3->avenue   ?></td>
                                                <td><?php echo $data3->numero   ?></td>
                                                <td class="text-nowrap">




                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="modifier"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> </button>


                                                    <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">modifier une Adresse</h4>
                                                            </div>
                                                            <form class="form-horizontal form-material" action="" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" hidden="true" class="form-control" placeholder="id_adresse" value="<?php echo $data3->id_adresse ?>" name="id_adresse">
                                                                        <select class="custom-select form-control required" id="wlocation2" name="id_zone">
                                                                        <?php
                                                                        foreach (getZotes() as $data1) 
                                                                        {
                                                                        ?>
                                                                            <option value="<?=$data1->id_zone?>"><?=$data1->province.' - '.$data1->commune.' - '.$data1->nom_zone ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Nom du Quartier" value="<?php echo $data3->quartier  ?>" name="quartier"> 
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" name="avenue" class="form-control" placeholder="Nom de l'Avenue" value="<?php echo $data3->avenue  ?>"> 
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Numéro" value="<?php echo $data3->numero  ?>" name="numero"> 
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="modifier"  class="btn btn-info waves-effect">Modifier</button>
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>



                                                    <button type="button" class="btn btn-secondary btn-circle" data-toggle="modal" data-target="#add-contact2 <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="supprimer"> <i class="fa fa-times text-inverse m-r-10"></i> </a> </button>

                                                    <div id="add-contact2 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment supprimer?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" name="id_adresse" hidden="true" class="form-control" placeholder="Id Adresse" value="<?=$data3->id_adresse?>"> 
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

                                                    
                                                </td>

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





<?php 

    if (isset($_POST['valider'])) 
    {
        if (ajouterAdresse($_POST['selectZ'],$_POST['nomQu'],$_POST['nomAv'],$_POST['nomNu'])) {
            # code...
            echo "bien Enregistré";
        }
        else
            echo "non";
    }


    //modification
    if (isset($_POST['modifier'])) 
    {
        if (updateAdresse($_POST['id_zone'],$_POST['quartier'],$_POST['avenue'] ,$_POST['numero'] ,$_POST['id_adresse']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }


    //suppression
    if (isset($_POST['supprimer'])) 
    {
        if (supprimerAdresse($_POST['id_adresse']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }


?>





                    </div>







