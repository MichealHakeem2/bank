<?php 
session_start();
if (isset($_GET['logout'])) {
 session_unset();
 session_destroy();
 header('location: /Bank/registration/login.php');
}
$host="localhost";
$user="root";
$password='';
$dbname="bank";
$conn = mysqli_connect($host,$user,$password,$dbname);
  $select= "SELECT * from `role`";
  $cat= mysqli_query($conn , $select);
  // $nr = mysqli_num_rows($cat);
    $row = mysqli_fetch_assoc($cat);
    // $_SESSION['admin'] = $name;
    $_SESSION['roles'] = $row['id'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Bank/index.php">Home</a>
      </li>
      <?php if($_SESSION['roles'] == 2) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Bank/employees/add doc.php">Employeess Add</a>
      <?php else if($_SESSION['roles'] == 1) : ?>

          <a class="dropdown-item" href="/Bank/employees/list doc.php">Employeess List</a>
        </div>
       </li> 
      <?php else if($_SESSION['roles'] == 1) : ?>

       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Roles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Bank/admin/role.php">Roles Add</a>
        </div>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Interest
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Bank/user/add.php">Interest Add</a>
        </div>
       </li> 
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Bank/admin/add.php">Sub_Admin Add</a>
          <a class="dropdown-item" href="/Bank/admin/list.php">Sub_Admin List</a>
          <a class="dropdown-item" href="/Bank/admin/list.php">Roles</a>
        </div>
       </li> 
       <?php else : ?>
        <li class="nav-item active">
        <a class="nav-link" href="/Bank/index.php">About us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Bank/index.php">Contact</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Bank/index.php">Profile</a>
      </li>
       <?php endif ; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <?php if($_SESSION['roles'] == 1) : ?>
      <form method="$_POST">
    <a href="/Bank/index.php" name="logout" class="btn btn-primary" type="submit">Logout</a>
    </form>
    <?php else :?>
    <a href="/Bank/registration/login.php" class="btn btn-primary" type="submit">Login</a>
    <a href="/Bank/registration/signup.php" class="btn btn-success" type="submit">Signup</a>
    <?php endif ; ?>

  </div>
</nav>