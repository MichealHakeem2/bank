<?php include './shared/head.php';
include './genral/env.php';
include './shared/nav.php';
include './genral/function.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /Bank/index.php');
}
?>
<?php if($noc == '1') : ?>
<a href="/Bank/index.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/index.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
<div class="home">
        <h1 class="display-1 text-center text-info"> Welcome to Bank page</h1>
    </div>
    <?php include './shared/script.php'; ?>
