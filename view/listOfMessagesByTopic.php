<?php
$topic = $data['topic'];
?>

<div class="listContainer">

  <!-- Topic Title -->
  <h2 class="title"> Topic :
    <?php echo "<span style ='color:rgb(248, 156, 139);'>" . $data['topic']->getTitle() . "</span>"; ?>
  </h2>

  <!-- le nombre de topics -->
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
      <button type="button" class="myButton" style="margin: 10px;">
        <a href="#" class="nounderline" style="color: white;">Reply</a>
      </button>
    </ul>
  </div>
</div>