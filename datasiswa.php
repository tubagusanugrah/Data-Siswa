<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa Kelas 10</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="datasiswa">
        <form method="post" action="" class="form-inline flex-column">
            <label for="siswa">Nama Siswa</label>
            <input type="text" name="siswa" id="siswa" class="form-control mb-2" placeholder="Input Nama">
            <label for="nis">NIS</label>
            <input type="number" name="nis" id="nis" class="form-control mb-2" placeholder="Input NIS">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" class="form-control mb-2" placeholder="Input Rayon">
            <button class="btn btn-primary mb-2" type="submit" name="kirim">Kirim</button>
            <button class="btn btn-secondary" type="submit" name="reset">Reset</button>
        </form>

        <?php
         session_start();
         if(isset($_POST['reset'])){
             session_unset();
             header('Location: '. $_SERVER['PHP_SELF']);
             exit;
         }
         // HAPUS SATU BUAH DATA
         if(isset($_GET['hapus'])){
             $index = $_GET['hapus'];
             unset($_SESSION['dataSiswa'][$index]);
         }
         // IF ARRAY MULTIDIMENSION NOT FOUND THEN MADE FIRST
        if(!isset($_SESSION['dataSiswa'])){
         $_SESSION['dataSiswa'] = array();
        }
     
         // IF ARRAY FOUND, THEN MADE ARRAY FROM USER INPUT DATA
         if(isset($_POST['kirim'])){
         if(@$_POST['siswa'] && @$_POST['nis'] && @$_POST['rayon']){
             $data = [
                 'siswa' => $_POST['siswa'],
                 'nis' => $_POST['nis'],
                 'rayon' => $_POST['rayon']
             ];
             array_push($_SESSION['dataSiswa'], $data);
             header('Location: '. $_SERVER['PHP_SELF']);
             exit;
         }else{
             echo "<p>Lengkapi Data</p>";
         }
     }
     if(!empty($_SESSION['dataSiswa'])){
     foreach($_SESSION['dataSiswa'] as $index=> $value){
         echo "<br>";
         echo "Nama Siswa :". $value['siswa'] . "<br>";
         echo "NIS : " . $value['nis']."<br>";
         echo "Rayon : " .  $value ['rayon']. "<br>";
         echo '<a href="?hapus=' . $index . '" class="hapus">HAPUS</a>' . "<br>";
     }
     }
        ?>
    </div>
</div>
</body>
</html>
