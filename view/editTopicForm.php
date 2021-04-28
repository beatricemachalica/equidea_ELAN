<?php
App\Session::getUser();
$topicId = (isset($_GET['id'])) ? $_GET['id'] : null;
?>

<!-- Edit topic form -->

<div class="loginDiv form">
  <div class="backgroundForm" style="width: 70%;">
    <form action="?ctrl=topic&method=editTopicById&id=<?= $topicId; ?>" method="post">
      <h2 class="text-center">Edit your topic below</h2>

      <!-- new title -->
      <div class="form-group">
        <label for="exampleTitle">Title</label>
        <input type="text" class="form-control" name="topicTitle" value="<?= $data['topicTitle']; ?>">
      </div>

      <button type="submit" class="btn btn-warning btnSubmit">Send</button>

    </form>
  </div>
</div>