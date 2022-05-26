<?php include '../shared/head.php';
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
    header('location: /Bank/registration/login.php');
}
if(isset($_POST['send'])){
$email = $_POST['email'];
$password = $_POST['password'];
$select= "SELECT * from `admin` where `email` =$email,`password` = $password";
$cat= mysqli_query($conn , $select);
$nr = mysqli_num_rows($cat);
if ($nr > 0) {
	$row = mysqli_fetch_assoc($cat);
	$_SESSION['admin'] = $name;
	$_SESSION['role'] = $row['roleid'];
    header('location: /Bank/index.php');
}
}

?>
<?php if($noc == '1') : ?>
<a href="/Bank/registration/login.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/registration/login.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">

    <h1 class="display-1 text-center text-info">Log In to your account</h1>
  </div>
    <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			<div class="card" style="border-radius: 15px;">
			  <div class="card-body p-5">
				<h2 class="text-uppercase text-center mb-5">Log In</h2>
				  <div class="form-outline mb-4">
            <form method="POST" enctype="multipart/form-data">
					<input type="email" id="form3Example4cg" name="email" class="form-control form-control-lg" placeholder="email">
					<input type="password" id="form3Example1cg" name="password"  class="form-control form-control-lg" placeholder="Your password">
                    <a href="/Bank/index.php" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log In</a>
                </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
    <?php include '../shared/script.php'; ?>