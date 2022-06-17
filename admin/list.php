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
    header('location: /Bank/admin/list.php');
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE from `sub_admin` where `id` = $id";
  $d= mysqli_query($conn , $delete);
}
$selectAddedAdmin = "SELECT sub_admin.id as docID, sub_admin.name as docName, sub_admin.email as docEmail FROM `sub_admin`";
$sAA = mysqli_query($conn , $selectAddedAdmin);
?>
<?php if($noc == '1') : ?>
<a href="/Bank/sub_admin/list.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/Bank/sub_admin/list.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">Sub_Admins List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($sAA as $row2){ ?>
      <tr>
        <td> <?php echo $row2['docID'] ?> </td>
        <td> <?php echo $row2['docName'] ?> </td>
        <td> <?php echo $row2['docEmail'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="/Bank/admin/list.php?delete=<?php echo $row2['docID']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="/Bank/admin/add.php?edit=<?php echo $row2['docID']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>
