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
    header('location: /Bank/user/profile.php');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE from `user` where `id` = $id";
    $d= mysqli_query($conn , $delete);
}
$name = '';
$email = '';
$category_id = '';
$update = false; 
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `user` where id = $id";
    $ss = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $image = $row['image'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    $update= "UPDATE `user` SET `name` = $name,`email` = $email, `password` = $password,`image` = $image where `id` = $id";
    $u= mysqli_query($conn , $update);

}
}
$select= "SELECT * from `categories`";
$cat= mysqli_query($conn , $select);
?>
<?php if($noc == '1') : ?>
<a href="/Bank/user/add user.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/user/add user.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100 col-md-9">
				<h2 class="text-uppercase text-center mb-5">Your profile</h2>
            <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <img src="/Bank/user/Upload/<?php echo $row['image'] ?> " alt="">
			  <div class="card-body p-5">
                  Name:<?php echo $row['name'] ?> 
                  Email:<?php echo $row['email'] ?> 
                 <p disabled> Balance:<?php echo $row['balance'] ?> </p>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
    <?php include '../shared/script.php'; ?>
