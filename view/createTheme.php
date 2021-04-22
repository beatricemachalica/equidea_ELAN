<?php

?>

<!-- Create a new theme form -->

<div class="loginDiv form">
  <div class="backgroundForm">
    <form action="?ctrl=theme&method=addNewTheme" method="POST">
      <h2>New Theme</h2>
      <div class="form-group">
        <label for="exampleTitle">Title</label>
        <input type="text" class="form-control" name="themeTitle" id="theme">
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Create</button>
    </form>
  </div>
</div>