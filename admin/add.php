<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/function.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /Bank/admin/add.php');
}
if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
$password = $_POST['password'];
$insert = "INSERT INTO `sub_admin` VALUES(null,'$name','$email','$password',2)";
$i = mysqli_query($conn , $insert);
testMessage($i, "Insert Sub_Admins");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE from `sub_admin` where `id` = $id";
    $d= mysqli_query($conn , $delete);

}
$name = '';
$email = '';
$password = '';
$update = false; 
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `sub_admin` where id = $id";
    $ss = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $update= "UPDATE `sub_admin` SET `name` = $name,`email` = $email, `password` = $password where `id` = $id";
    $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') : ?>
<a href="/Bank/admin/add.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/admin/add.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
    <?php if($update):?>
    <h1 class="display-1 text-center text-info">Update Sub Admins</h1>
    <?php else :?>
    <h1 class="display-1 text-center text-info">Add Sub Admins</h1>
    <?php endif; ?>
  </div>
    <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			<div class="card" style="border-radius: 15px;">
			  <div class="card-body p-5">
				<h2 class="text-uppercase text-center mb-5">Create an account</h2>
				  <div class="form-outline mb-4">
            <form method="POST">
					<input type="text" id="form3Example1cg" value="<?php echo $name ?>" name="name"  class="form-control form-control-lg" placeholder="Your Name">
				  <div class="form-outline mb-4">
					<input type="email" id="form3Example4cg" value="<?php echo $email ?>" name="email" class="form-control form-control-lg" placeholder="email">
				  </div>
				  <div class="form-outline mb-4">
					<input type="password" id="form3Example4cg" value="<?php echo $password ?>" name="password" class="form-control form-control-lg" placeholder="password">
				  </div>
				  <div class="d-flex justify-content-center">
                      <?php if($update):?>
					<button type="submit" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update Data</button><br>
					<?php else :?>
                    <button type="submit" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send Data</button>
				 <?php endif; ?>
                </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
    <?php include '../shared/script.php'; ?>
