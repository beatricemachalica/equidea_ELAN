<?php

?>
<!-- Sign up Form -->

<div class="signupDiv form">
  <div class="backgroundForm">
    <form action="?ctrl=security&method=register" method="POST">
      <h2>Please enter your informations below</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="userName" class="form-control" id="InputUsername">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="userEmail" class="form-control" id="InputEmail">
      </div>

      <div class="form-group">
        <label for="password1">Password</label>
        <input type="password" name="firstPassword" class="form-control" id="InputPassword1">
        <!-- ajouter une indication pour le Regex -->
        <small id="passwordHelp" style="color:gainsboro;">1 letter in Upper case, 8 characters length, 1 special character, 2 numerals</small>
      </div>

      <div class="form-group">
        <label for="password2">Enter your password one more time</label>
        <input type="password" name="secondPassword" class="form-control" id="InputPassword2">
        <!-- ajouter une indication pour le Regex -->
        <small id="passwordHelp" style="color:gainsboro;">1 letter in Upper case, 8 characters length, 1 special character, 2 numerals</small>
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Sign up</button>

    </form>
  </div>
</div>