<?php
// session_start();
App\Session::getUser();
// var_dump($_SESSION);

$topic = $data['topic'];

// Call to a member function getId() on string
// $user_id = $_SESSION['user']->getId();
// var_dump($user_id);

$user = $_SESSION['user'];
// var_dump($user);
?>

<div class="listContainer">

  <!-- Topic Title -->
  <h2 class="title"> Topic :
    <?php echo "<span style ='color:rgb(248, 156, 139);'>" . $data['topic']->getTitle() . "</span>"; ?>
  </h2>

  <!-- nb of topics -->
  <p class="text-center infoOfListTopics">
    There is <?= count($data['messages']); ?> messages in this topic.
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
              <!-- <input name="userId" type="hidden" id="user" value="<.= $_SESSION['user']->getId(); ?>"> -->
              <input name="username" type="hidden" id="username" value="<?= $user; ?>">
            </div>
            <button type="submit" class="btn myButton btnSubmit">Send</button>
          </form>
        </div>
      </div>

    </ul>
  </div>
</div>