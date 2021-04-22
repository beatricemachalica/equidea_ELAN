<?php

if (App\Session::getUser()) {
  echo "<p> You are already connected </p>" . App\Session::getUser();
}

?>

<!-- Log in Form -->

<div class="loginDiv form">
  <div class="backgroundForm">
    <form action="#" method="POST">
      <h2>Please enter your login details </h2>
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Log in</button>

    </form>
  </div>
</div>