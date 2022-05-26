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
    header('location: /Bank/registration/signup.php');
}
if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $location = "Bank/user/Upload/";
  move_uploaded_file($image_tmp,$location.$image_name);
  $balance = $_POST['balance'];
  $insert = "INSERT INTO `user` VALUES(null,'$name','$email','$password','$image_name',$balance,4)";
$i = mysqli_query($conn , $insert);
testMessage($i, "Insert users");
}
?>
<?php if($noc == '1') : ?>
<a href="/Bank/registration/signup.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/registration/signup.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
<div class="home">
    <h1 class="display-1 text-center text-info">Add Account</h1>
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
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="text" id="form3Example1cg" value="<?php echo $name ?>" name="name"
                                        class="form-control form-control-lg" placeholder="Your Name">
                                    <input type="email" id="form3Example4cg" value="<?php echo $email ?>" name="email"
                                        class="form-control form-control-lg" placeholder="email">
                                    <input type="password" id="form3Example1cg" name="password"
                                        class="form-control form-control-lg" placeholder="Your password">
                                    <input type="file" id="form3Example1cg" name="image"
                                        class="form-control form-control-lg" placeholder="Your image">
                                    <input type="number" id="form3Example1cg" value="<?php echo $balance ?>"
                                        name="balance" class="form-control form-control-lg" placeholder="Your balance">
                                    <div class="d-flex justify-content-center">
                                            <button type="submit" name="send"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send
                                                Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<?php include '../shared/script.php'; ?>