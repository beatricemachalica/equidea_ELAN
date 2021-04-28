<?php
App\Session::getUser();

$topic = $data['topic'];
$user = $_SESSION['user']->getPseudonym();
?>

<div class="listContainer">

  <!-- Topic Title -->
  <h2 class="title"> Topic :
    <?php echo "<span style ='color:rgb(248, 156, 139);'>" . $data['topic']->getTitle() . "</span>"; ?>
  </h2>

  <!-- nb of topics -->
  <p class="text-center infoOfListTopics">
    There is <?= count($data['messages']); ?> message(s) in this topic.
  </p>

  <!-- Messages -->
  <div class="list">
    <ul class="list-unstyled">

      <?php foreach ($data['messages'] as $message) { ?>
        <div class="messageContainer">
          <li><?= $message->getText(); ?></li>
          <li>
            <span style='color:rgb(248, 156, 139);'>Posted by <?= $message->getUser()->getPseudonym(); ?>.</span>
            On <?= $message->getDateCreation(); ?>
            <!-- <span class="badge"><a href="#" class="nounderline" style="color: white;">Reply to this member</a></span> -->
          </li>
        </div>
      <?php } ?>

      <!-- <button type="button" class="myButton" style="margin: 10px;">
        <a href="?ctrl=message&method=addMessage&id=<.?= //$data['topic']->getId(); ?>" class="nounderline" style="color: white;">Reply</a>
      </button> -->

      <div class="dropdown">
        <button class="btn myButton dropdown-toggle" type="button" id="dropdownMessageButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reply
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <form action="?ctrl=message&method=addMessage" method="POST">
            <div class="form-group">
              <label for="exampleTitle">Write your answer below</label>
              <textarea name="textMessage" class="form-control" id="messageTextarea" rows="2"></textarea>
              <input name="topicId" type="hidden" id="topicId" value="<?= $data['topic']->getId(); ?>">
              <input name="username" type="hidden" id="username" value="<?= $user; ?>">
            </div>
            <button type="submit" class="btn myButton btnSubmit">Send</button>
          </form>
        </div>
      </div>

    </ul>
  </div>
</div>