<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daugiamaciai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Magiškasis kvadratas</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <textarea name="data" id="data" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Išvesti</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Išvestas kvadratas</div>
                    <div class="card-body">
<?php
if (isset($_POST['data'])){
    $dataS=$_POST['data'];
    $dataSR=explode("\n",$dataS);
    $data=[];
    foreach ($dataSR as $t){
        $data[]=explode(" ",$t);
    }

    $n = count($data);

    $istrizaine1 = 0;
    $istrizaine2 = 0;
    
    for($i=0; $i<sizeof($data); $i++){
        $istrizaine1 += $data[$i][$i];
        $istrizaine2 += $data[$i][sizeof($data)-$i-1];
    }  
    if( $istrizaine1 != $istrizaine2) {  return false;  }

    for ($k=0; $k<$n; $k++)  {
        $row = 0;
        $col = 0; 
     for ($j=0; $j<sizeof($data); $j++) {
        
        $row += (int)$data[$k][$j];
        $col += (int)$data[$j][$k];       
    }
 
} 

if ($row = $col || $col = $istrizaine1 || $col = $istrizaine2 || $row = $istrizaine1 || $row = $istrizaine2) {
    echo "Kvadratas yra magiškas";
} else {
 echo "Kvadratas nėra magiškas";
}
  
?>


<table class="table">
    <?php foreach ($data as $row){ ?>
    <tr>
        <?php foreach($row as $d){ ?> 
            <td><?=$d?></td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>

<?php
}
?>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Skelbimų sąrašas</div>
                    <div class="card-body">
    <?php include "skelbimai.php"; ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Skelbimo ID</th>
                                    <th>Skelbimas</th>
                                    <th>Kaina</th>
                                    <th>Apmokėjimo Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($skelbimai as $skelbimas){ ?>
                                <tr>
                                    <td><?=$skelbimas['id'] ?></td>
                                    <td><?=$skelbimas['text'] ?></td>
                                    <td><?=$skelbimas['cost'] ?></td>
                                    <td><?php 
                                    if ($skelbimas['onPay'] > 0) {
                                     echo date("j, n, Y", $skelbimas['onPay']);
                                    } else {
                                       echo "Neapmokėta";
                                    }
                                     ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

<?php
  $kiekis = 0;
  $gauta = 0;
  $turetuButApmoketa = 0;
   foreach ($skelbimai as $skelbimas){
    if ($skelbimas['onPay'] > 0){
       $kiekis++;
       $gauta += $skelbimas['cost'];
    }else{
        $turetuButApmoketa += $skelbimas['cost'];
    }
    
  }
  echo "Iš viso skelbimų kiekis: ".sizeof($skelbimai ).'<br>';   
  echo "Iš viso skelbimų apmokėta: ".$kiekis.'<br>';
  echo "Iš viso apmokėtų skelbimų suma: ".$gauta.' EUR <br>';  
  echo "Neapmokėta suma: ".$turetuButApmoketa.' EUR <br>';  

?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>