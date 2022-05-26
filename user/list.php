<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /Bank/user/list user.php');
}
$select= "SELECT user.id as UserID, user.name as UserName, user.email as UserEmail,user.image as UserImage,user.balance as UserBalance FROM `user`";
$s= mysqli_query($conn , $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE from `` where `id` = $id";
  $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * from `user` where id = $id";
  $ss = mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'];
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $update= "UPDATE `user` SET `name` = $name where `id` = $id";
  $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') : ?>
<a href="/Bank/user/list user.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/user/list user.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">User List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th>Image</th>
        <th>Balance</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['UserID'] ?> </td>
        <td> <?php echo $data['UserName'] ?> </td>
        <td> <?php echo $data['UserEmail'] ?> </td>
        <td> <img src="/Bank/Upload/<?php echo $data['UserImage'] ?>" width="30px" alt="">  </td>
        <td> <?php echo $data['UserBalance'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="/list user.php?delete=<?php echo $data['UserID']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="/Bank/user/add doc.php?edit=<?php echo $data['UserID']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>
