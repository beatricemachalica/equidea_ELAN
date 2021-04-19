<?php

?>
<!-- Sign up Form -->

<div class="signupDiv form">
  <div class="backgroundForm">
    <form action="#" method="$_POST">
      <h2>Please enter your informations below</h2>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="InputUername" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="InputEmail">
      </div>

      <div class="form-group">
        <label for="password1">Password</label>
        <input type="password" class="form-control" id="InputPassword1">
        <!-- ajouter une indication pour la création du mdp avec Regex -->
        <small id="passwordHelp" style="color:gainsboro;">1 letter in Upper case, 8 characters length, 1 special character, 2 numerals</small>
      </div>

      <div class="form-group">
        <label for="password2">Enter your password one more time</label>
        <input type="password" class="form-control" id="InputPassword2">
        <!-- ajouter une indication pour la création du mdp avec Regex -->
        <small id="passwordHelp" style="color:gainsboro;">1 letter in Upper case, 8 characters length, 1 special character, 2 numerals</small>
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Sign up</button>

    </form>
  </div>
</div>