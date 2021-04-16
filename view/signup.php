<?php

?>
<!-- Sign up Form -->

<div class="signupDiv">
  <form action="#" method="$_POST">
    <h2>Please enter all this informations</h2>
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
      <small id="passwordHelp" class="form-text text-muted">INDICATION POUR LA CREATION DU MDP</small>
    </div>

    <div class="form-group">
      <label for="password2">Enter your password one more time</label>
      <input type="password" class="form-control" id="InputPassword2">
      <!-- ajouter une indication pour la création du mdp avec Regex -->
      <small id="passwordHelp" class="form-text text-muted">INDICATION POUR LA CREATION DU MDP</small>
    </div>

    <button type="submit" class="btn btn-warning">Sign up</button>

  </form>
</div>