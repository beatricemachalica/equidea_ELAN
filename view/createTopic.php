<?php

?>

<!-- Create a new topic form -->

<div class="loginDiv form">
  <div class="backgroundForm">
    <form action="?ctrl=topic&method=addNewTopic" method="$_POST">
      <h2>Please enter this informations</h2>
      <div class="form-group">
        <label for="exampleTitle">Title</label>
        <input type="text" class="form-control" name="topicTitle" id="topic">
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Create</button>

    </form>
  </div>
</div>