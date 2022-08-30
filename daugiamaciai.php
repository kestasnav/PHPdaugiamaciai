
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
                        if (isset($_POST['data'])) {
                            $dataS = $_POST['data'];
                            $dataSR = explode("\n", $dataS);
                            $data = [];
                            foreach ($dataSR as $t) {
                                $data[] = explode(" ", $t);
                            }


                            function magic($data)
                            {
                                $n = count($data);
                                $istrizaine1 = 0;
                                $istrizaine2 = 0;

                                for ($i = 0; $i < sizeof($data); $i++) {
                                    $istrizaine1 += $data[$i][$i];
                                    $istrizaine2 += $data[$i][sizeof($data) - $i - 1];
                                }

                                for ($k = 0; $k < $n; $k++) {
                                    $row = 0;
                                    $col = 0;
                                    for ($j = 0; $j < sizeof($data); $j++) {

                                        $row += (int)$data[$k][$j];
                                        $col += (int)$data[$j][$k];
                                    }
                                    if ($row == $col && $col == $istrizaine1 && $col == $istrizaine2 && $row == $istrizaine1 && $row == $istrizaine2 && $istrizaine1 == $istrizaine2) {
                                        
                                    } else {
                                        return false;
                                    } 
                                } return true;
                            }
                            if (magic($data)) {
                                echo "Kvadratas yra magiškas";
                            } else {
                                echo "Kvadratas nėra magiškas";
                            }
                        ?>

                            <table class="table">
                                <?php foreach ($data as $row) { ?>
                                    <tr>
                                        <?php foreach ($row as $d) { ?>
                                            <td><?= $d ?></td>
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
        <?php  $trikampis = '';
                $answer = null;
               
         ?>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Trikampio skaičiavimas</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <input type="text" name="a" id="trikampis">
                                <input type="text" name="b" id="trikampis">
                                <input type="text" name="c" id="trikampis">
                            </div>
                            <button class="btn btn-success">Išvesti</button>
                            <?php
                            
                        if (isset($_POST['a'], $_POST['b'], $_POST['c'])) {
                            $a = $_POST['a'];
                            $b = $_POST['b'];
                            $c = $_POST['c'];
                            $p = ($a + $b + $c) / 2;
                           $trikampis = sqrt($p*($p-$a)*($p-$b)*($p-$c));   
                           if (($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
                             $answer = 1;
                        } else {
                            $answer = 2;
                        }                     
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Trikampio Plotas</div>
                    <div class="card-body">
                        


                            <table class="table">
                            <tr>
                                        <td><?php 
                                        if ($answer === 1) {
                                            echo "Trikampio plotas: ";
                                            echo "<br>";
                                            echo round($trikampis, 2);
                                        } else if($answer === 2) {
                                          echo "Negalima sudaryti trikampio!";
                                        }
                                        ?></td>
                            </tr>
                               
                            </table>

                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Skelbimų sąrašas</div>
                    <div class="card-body">
                        <?php include "skelbimai.php"; ?>
                        <?php $d = $_GET['d']; ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <?php if ($d == "ASC") { ?>
                                            <a href="daugiamaciai.php?orderBy=id&d=DESC"> Skelbimo ID &uparrow;</a>
                                        <?php } else { ?>
                                            <a href="daugiamaciai.php?orderBy=id&d=ASC"> Skelbimo ID &downarrow;</a>
                                        <?php } ?>
                                    </th>
                                    <th><?php if ($d == "ASC") { ?>
                                            <a href="daugiamaciai.php?orderBy=text&d=DESC"> Skelbimas &uparrow;</a>
                                        <?php } else { ?>
                                            <a href="daugiamaciai.php?orderBy=text&d=ASC"> Skelbimas &downarrow;</a>
                                        <?php } ?>
                                    </th>
                                    <th><?php if ($d == "ASC") { ?>
                                            <a href="daugiamaciai.php?orderBy=cost&d=DESC"> Kaina &uparrow;</a>
                                        <?php } else { ?>
                                            <a href="daugiamaciai.php?orderBy=cost&d=ASC"> Kaina &downarrow;</a>
                                        <?php } ?>
                                    </th>
                                    <th><?php if ($d == "ASC") { ?>
                                            <a href="daugiamaciai.php?orderBy=onPay&d=DESC"> Apmokėjimo data &uparrow;</a>
                                        <?php } else { ?>
                                            <a href="daugiamaciai.php?orderBy=onPay&d=ASC"> Apmokėjimo data &downarrow;</a>
                                        <?php } ?>
                                        </th>

                                        <?php
                      if (isset( $_GET['d'],
                      $_GET['orderBy'])) {
                         $d = $_GET['d'];
                         $order = $_GET['orderBy'];
                      
                        usort($skelbimai, function ($a, $b) use ($order) {
                            global $d;
                            if ($d == 'DESC') {
                                return $b[$order] <=> $a[$order];
                            } else if ($d == 'ASC') {
                                return $a[$order] <=> $b[$order];
                            } 
                            
                        });
                    }
                        ?>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($skelbimai as $skelbimas) { ?>
                                    <tr>
                                        <td><?= $skelbimas['id'] ?></td>
                                        <td><?= $skelbimas['text'] ?></td>
                                        <td><?= $skelbimas['cost'] ?></td>
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
                        foreach ($skelbimai as $skelbimas) {
                            if ($skelbimas['onPay'] > 0) {
                                $kiekis++;
                                $gauta += $skelbimas['cost'];
                            } else {
                                $turetuButApmoketa += $skelbimas['cost'];
                            }
                        }
                        echo "Iš viso skelbimų kiekis: " . sizeof($skelbimai) . '<br>';
                        echo "Iš viso skelbimų apmokėta: " . $kiekis . '<br>';
                        echo "Iš viso apmokėtų skelbimų suma: " . $gauta . ' EUR <br>';
                        echo "Neapmokėta suma: " . $turetuButApmoketa . ' EUR <br>';

                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>