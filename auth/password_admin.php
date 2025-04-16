<?php 
require_once("../config.php");
include(".layouts/header.php"); 
?>
<!-- Register -->
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div>
      <img class="card-img-top" src="../assets/img/illustrations/gus-ex-logo-new.png" alt="Kamu sedang offline...">
    </div>
    <!-- /Logo -->
    
    <form class="mb-3" action="password_admin.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Enter admin password..</label>
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Password</label>
        </div>
        <div class="input-group input-group-merge">
          <input type="password" class="form-control" name="passwordAdmin"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-dark d-grid w-100" type="submit">Masuk</button>
      </div>
    </form>
  </div>
</div>
<!-- /Register -->
<?php include(".layouts/footer.php"); ?>

<?php
$enteredPassword = $_POST['passwordAdmin'];
$password = 123;
if ($enteredPassword == $password) {
    header('');

} else {
    header('');

}