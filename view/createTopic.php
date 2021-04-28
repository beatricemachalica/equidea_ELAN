<?php
App\Session::getUser();
$user = $_SESSION['user']->getPseudonym();
$themeId = (isset($_GET['id_theme'])) ? $_GET['id_theme'] : null;
$themeTitle = $data["themeTitle"];
?>

<!-- Create a new topic form -->

<div class="loginDiv form">
  <div class="backgroundForm" style="width: 70%;">
    <form action="?ctrl=topic&method=addNewTopic&id_theme=<?= $themeId; ?>&user=<?= $user; ?>&" method="post">
      <h2 class="text-center">Add a new topic in: <?= $themeTitle; ?> </h2>

      <!-- new topic title -->
      <div class="form-group">
        <label for="exampleTitle">Title</label>
        <input type="text" class="form-control" name="topicTitle" id="topic">
      </div>

      <!-- first message of this new topic -->
      <div class="form-group">
        <label for="message">Your message</label>
        <textarea name="message" class="form-control" id="message" rows="5"></textarea>
        <!-- inputs type hidden are not secure enough -->
        <!-- <input name="username" type="hidden" id="username" value="<= $user; ?>"> -->
        <!-- <input name="themeId" type="hidden" value="<= $themeId; ?>"> -->
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Create</button>

    </form>
  </div>
</div>