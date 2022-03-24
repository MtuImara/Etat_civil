<?php
require_once 'connection.php';
require_once 'controler_User.php';
//require_once 'controler_naissance.php';
require_once 'controler_mariage.php';
require_once 'controler_deces.php';
require_once 'controler_demande_cni.php';
//require_once 'controler_divorce.php';
?>
            <!-- ============================================================== -->
            

             <!-- This page CSS -->
             <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Tableau de Bord</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li>
                                <li class="breadcrumb-item active">Tableau de Bord</li>
                            </ol>
                         <!--   <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                         -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Declaration de Naissance</small>
                                        <?php
                                                  foreach (afficherEffectifDeclarationMariage() as $data4) 
                                                  {
                                            ?>
                                        <h2><i class="ti-arrow-up text-success"></i><?php echo $data4->effectif ?></h2>
                                        <div id="sparklinedash"></div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Declaration de Mariage</small>
                                        <?php
                                                  foreach (afficherEffectifDeclarationMariage() as $data5) 
                                                  {
                                            ?>
                                        <h2><i class="ti-arrow-up text-purple"></i> <?php echo $data5->effectif ?></h2>
                                        <div id="sparklinedash2"></div>
                                    <?php } ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Décès</small>
                                        <?php
                                                  foreach (afficherEffectifDeclarationDeces() as $data8) 
                                                  {
                                            ?>
                                        <h2><i class="ti-arrow-up text-info"></i><?php echo $data8->effectif ?> </h2>
                                        <div id="sparklinedash3"></div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Demande CNI</small>
                                        <?php
                                                  foreach (afficherEffectifDemandeCNI() as $data7) 
                                                  {
                                            ?>
                                        <h2><i class="ti-arrow-down text-danger"></i> <?php echo $data7->effectif ?></h2>
                                        <div id="sparklinedash4"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <ul class="list-inline font-12 text-center">
                                    <li><i class="fa fa-circle text-cyan"></i> Site A</li>
                                    <li><i class="fa fa-circle text-primary"></i> Site B</li>
                                    <li><i class="fa fa-circle text-purple"></i> Site C</li>
                                </ul>
                                <!-- <div id="morris-area-chart" style="height: 340px;"></div>  -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Campaign -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFFECTIF DES UTILISATEURS</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-info"><i class="icon-user"></i></span>
                                            <?php
                                                  foreach (afficherEffectifUser() as $data) 
                                                  {
                                            ?>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto"><?php echo $data->effectif ?></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFFECTIF DES NAISSANCES</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-purple"><i class="icon-folder"></i></span>
                                            <?php
                                                  foreach (afficherEffectifDeclarationMariage() as $data1) 
                                                  {
                                            ?>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto"><?php echo $data1->effectif ?></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFFECTIF DES MARIAGES</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-primary"><i class="icon-folder-alt"></i></span>
                                            <?php
                                                 foreach (afficherEffectifMariage() as $data2) 
                                                  {
                                            ?>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto"><?php echo $data2->effectif ?></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">EFFECTIF DES DECES</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-success"><i class="icon-wallet"></i></span>
                                            <?php
                                                  foreach (afficherEffectifDeces() as $data3) 
                                                  {
                                            ?>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto"><?php echo $data3->effectif ?></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="news-slide m-b-15">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active carousel-item">
                                        <div class="overlaybg"><img src="assets/images/news/slide1.jpg" class="img-fluid" /></div>
                                        <div class="news-content carousel-caption"><span class="label label-danger label-rounded"></span>
                                            <h4></h4> <a href="javascript:void(0)"></a></div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="overlaybg"><img src="assets/images/news/slide1.jpg" /></div>
                                        <div class="news-content carousel-caption"><span class="label label-primary label-rounded"></span>
                                            <h4></h4> <a href="javascript:void(0)"></a></div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="overlaybg"><img src="assets/images/news/slide1.jpg" /></div>
                                        <div class="news-content carousel-caption"><span class="label label-success label-rounded"></span>
                                            <h4></h4> <a href="javascript:void(0)"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Campaign -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Today's Schedule and sales overview -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    
                    <!-- Column -->
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <?php

                                $page = isset($_GET['page']) ? $_GET['page'] : 'statistiques';

                                include($page.'.php');

                            ?>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
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
                                    <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <!--sparkline JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Vector map JavaScript -->
    <!-- Chart JS -->
    <script src="dist/js/dashboard3.js"></script>
    