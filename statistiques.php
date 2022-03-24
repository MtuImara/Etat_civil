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



 <div class="table-responsive">
<table class="table table-bordered" style="width:50px ">
<thead>
<tr>
    
    <th></th>
    <th>BUJUMBURA MAIRIE</th>
    <th>BUJUMBURA RURALE</th>
    <th>NGOZI</th>
    <th>KAYANZA</th>
    <th>KARUZI</th>
    <th>BUBANZA</th>
    <th>RUMONGE</th>
    <th>RUYIGI</th>
    <th>RUTANA</th>
    <th>CANKUZO</th>
    <th>MWARO</th>
    <th>MAKAMBA</th>
    <th>KIRUNDO</th>
    <th>GITEGA</th>
    <th>CIBITOKE</th>
    <th>MUYINGA</th>
    <th>BURURI</th>
    <th>MURAMVYA</th>
    <th>TOTAL</th>
</tr>
</thead>
<tbody>

<tr>
    <?php
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($dataTotNaiss = $dcni -> fetchObject()) {

         
     ?>
    <td>Naissance</td>
    <td><?php echo $data->total ?></td>
    <td><?php echo $data2->total ?></td>
    <td><?php echo $data3->total ?></td>
    <td><?php echo $data4->total ?></td>
    <td><?php echo $data5->total ?></td>
    <td><?php echo $data6->total ?></td>
    <td><?php echo $data7->total ?></td>
    <td><?php echo $data8->total ?></td>                        
    <td><?php echo $data9->total ?></td>
    <td><?php echo $data10->total ?></td>
    <td><?php echo $data11->total ?></td>
    <td><?php echo $data12->total ?></td>
    <td><?php echo $data13->total ?></td>
    <td><?php echo $data14->total ?></td>
    <td><?php echo $data15->total ?></td>
    <td><?php echo $data16->total ?></td>
    <td><?php echo $data17->total ?></td>
    <td><?php echo $data18->total ?></td>
    <td><?php echo $dataTotNaiss->total ?></td>
<?php }}}}}}}}}}}}}}}}}}} ?>
</tr>


<tr>
    <?php
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage n, declaration_mariage dn, zone z WHERE n.id_declaration_mariage=dn.id_declaration_mariage AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM mariage');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($dataTotMar = $dcni -> fetchObject()) {
         
     ?>
    <td>Mariage</td>
    <td><?php echo $data->total ?></td>
    <td><?php echo $data2->total ?></td>
    <td><?php echo $data3->total ?></td>
    <td><?php echo $data4->total ?></td>
    <td><?php echo $data5->total ?></td>
    <td><?php echo $data6->total ?></td>
    <td><?php echo $data7->total ?></td>
    <td><?php echo $data8->total ?></td>                        
    <td><?php echo $data9->total ?></td>
    <td><?php echo $data10->total ?></td>
    <td><?php echo $data11->total ?></td>
    <td><?php echo $data12->total ?></td>
    <td><?php echo $data13->total ?></td>
    <td><?php echo $data14->total ?></td>
    <td><?php echo $data15->total ?></td>
    <td><?php echo $data16->total ?></td>
    <td><?php echo $data17->total ?></td>
    <td><?php echo $data18->total ?></td>
    <td><?php echo $dataTotMar->total ?></td>
<?php }}}}}}}}}}}}}}}}}}} ?>
</tr>


<tr>
    <?php
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce n, zone z WHERE n.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM divorce');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($dataTotDiv = $dcni -> fetchObject()) {
         
     ?>
    <td>Divorce</td>
    <td><?php echo $data->total ?></td>
    <td><?php echo $data2->total ?></td>
    <td><?php echo $data3->total ?></td>
    <td><?php echo $data4->total ?></td>
    <td><?php echo $data5->total ?></td>
    <td><?php echo $data6->total ?></td>
    <td><?php echo $data7->total ?></td>
    <td><?php echo $data8->total ?></td>                        
    <td><?php echo $data9->total ?></td>
    <td><?php echo $data10->total ?></td>
    <td><?php echo $data11->total ?></td>
    <td><?php echo $data12->total ?></td>
    <td><?php echo $data13->total ?></td>
    <td><?php echo $data14->total ?></td>
    <td><?php echo $data15->total ?></td>
    <td><?php echo $data16->total ?></td>
    <td><?php echo $data17->total ?></td>
    <td><?php echo $data18->total ?></td>
    <td><?php echo $dataTotDiv->total ?></td>
<?php }}}}}}}}}}}}}}}}}}} ?>
</tr>


<tr>
    <?php
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($dataTotDec = $dcni -> fetchObject()) {
         
     ?>
    <td>Décès</td>
    <td><?php echo $data->total ?></td>
    <td><?php echo $data2->total ?></td>
    <td><?php echo $data3->total ?></td>
    <td><?php echo $data4->total ?></td>
    <td><?php echo $data5->total ?></td>
    <td><?php echo $data6->total ?></td>
    <td><?php echo $data7->total ?></td>
    <td><?php echo $data8->total ?></td>                        
    <td><?php echo $data9->total ?></td>
    <td><?php echo $data10->total ?></td>
    <td><?php echo $data11->total ?></td>
    <td><?php echo $data12->total ?></td>
    <td><?php echo $data13->total ?></td>
    <td><?php echo $data14->total ?></td>
    <td><?php echo $data15->total ?></td>
    <td><?php echo $data16->total ?></td>
    <td><?php echo $data17->total ?></td>
    <td><?php echo $data18->total ?></td>
    <td><?php echo $dataTotDec->total ?></td>
<?php }}}}}}}}}}}}}}}}}}} ?>
</tr>


<tr>
    <?php
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {

        
        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni n, demande_cni dn, zone z WHERE n.id_demande_cni=dn.id_demande_cni AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM cni');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($dataTotCni = $dcni -> fetchObject()) {
         
     ?>
    <td>CNI</td>
    <td><?php echo $data->total ?></td>
    <td><?php echo $data2->total ?></td>
    <td><?php echo $data3->total ?></td>
    <td><?php echo $data4->total ?></td>
    <td><?php echo $data5->total ?></td>
    <td><?php echo $data6->total ?></td>
    <td><?php echo $data7->total ?></td>
    <td><?php echo $data8->total ?></td>                        
    <td><?php echo $data9->total ?></td>
    <td><?php echo $data10->total ?></td>
    <td><?php echo $data11->total ?></td>
    <td><?php echo $data12->total ?></td>
    <td><?php echo $data13->total ?></td>
    <td><?php echo $data14->total ?></td>
    <td><?php echo $data15->total ?></td>
    <td><?php echo $data16->total ?></td>
    <td><?php echo $data17->total ?></td>
    <td><?php echo $data18->total ?></td>
    <td><?php echo $dataTotCni->total ?></td>
<?php }}}}}}}}}}}}}}}}}}} ?>
</tr>



<tr>
    <?php
    //POPULATION ACTUELLE 
       $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data1 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bujumbura Mairie"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data2 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data3 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bujumbura Rurale"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data4 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data5 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Ngozi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data6 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data7 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Kayanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data8 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data9 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Karuzi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data10 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data11 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bubanza"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data12 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data13 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Rumonge"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data14 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data15 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Ruyigi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data16 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data17 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Rutana"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data18 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data19 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Cankuzo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data20 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data21 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Mwaro"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data22 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data23 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Makamba"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data24 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data25 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Kirundo"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data26 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data27 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Gitega"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data28 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data29 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Cibitoke"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data30 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data31 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Muyinga"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data32 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data33 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Bururi"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data34 = $dcni -> fetchObject()) {


        $dcni = $con->prepare('SELECT COUNT(*) AS total FROM naissance n, declaration_naissance dn, zone z WHERE n.id_declaration_naissance=dn.id_declaration_naissance AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data35 = $dcni -> fetchObject()) {

            $dcni = $con->prepare('SELECT COUNT(*) AS total FROM deces n, declaration_deces dn, zone z WHERE n.id_declaration_deces=dn.id_declaration_deces AND dn.id_zone=z.id_zone AND z.province="Muramvya"');
        $dcni->execute() or die(print_r($dcni->errorInfo()));
        while ($data36 = $dcni -> fetchObject()) {



     ?>
    <td>Population actuelle</td>
    <td><?php echo $data1->total-$data2->total ?></td>
    <td><?php echo $data3->total-$data4->total ?></td>
    <td><?php echo $data5->total-$data6->total ?></td>
    <td><?php echo $data7->total-$data8->total ?></td>
    <td><?php echo $data9->total-$data10->total ?></td>
    <td><?php echo $data11->total-$data12->total ?></td>
    <td><?php echo $data13->total-$data14->total ?></td>
    <td><?php echo $data15->total-$data16->total ?></td>                        
    <td><?php echo $data17->total-$data18->total ?></td>
    <td><?php echo $data19->total-$data20->total ?></td>
    <td><?php echo $data21->total-$data22->total ?></td>
    <td><?php echo $data23->total-$data24->total ?></td>
    <td><?php echo $data25->total-$data26->total ?></td>
    <td><?php echo $data27->total-$data28->total ?></td>
    <td><?php echo $data29->total-$data30->total ?></td>
    <td><?php echo $data31->total-$data32->total ?></td>
    <td><?php echo $data33->total-$data34->total ?></td>
    <td><?php echo $data35->total-$data36->total ?></td>

<?php }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}} ?>
</tr>
</tbody>

</div>