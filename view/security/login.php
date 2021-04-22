<?php

if (App\Session::getUser()) {
  echo "<p> You are already connected </p>" . App\Session::getUser();
}

?>

<!-- Log in Form -->

<div class="loginDiv form">
  <div class="backgroundForm">
    <form action="?ctrl=security&method=login" method="POST">
      <h2>Please enter your login details </h2>

      <div class="form-group">
        <label for="inputEmail1">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail1">
      </div>

      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Log in</button>

    </form>
  </div>
</div>