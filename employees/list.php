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
    header('location: /tryy/employees/list doc.php');
}
$select= "SELECT employees.id as docID, employees.name as docName, employees.email as docEmail, employees.password as docpassword FROM `employees`";
$s= mysqli_query($conn , $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE from `employees` where `id` = $id";
  $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * from `employees` where id = $id";
  $ss = mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'];
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $update= "UPDATE `employees` SET `name` = $name where `id` = $id";
  $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') : ?>
<a href="/tryy/employees/list doc.php?cha=2" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/tryy/employees/list doc.php?cha=1" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">employeess List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th>Password</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['docID'] ?> </td>
        <td> <?php echo $data['docName'] ?> </td>
        <td> <?php echo $data['docEmail'] ?> </td>
        <td> <?php echo $data['docpassword'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="/list doc.php?delete=<?php echo $data['docID']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="/tryy/employees/add doc.php?edit=<?php echo $data['docID']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>
