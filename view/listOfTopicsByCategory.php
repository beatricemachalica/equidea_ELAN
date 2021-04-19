<?php
$theme = $data['theme'];
?>

<div class="listContainer">

  <!-- Theme Title -->
  <h2 class="title"> Theme :
    <?php echo "<span style ='color:rgb(248, 156, 139);'>" . $data['theme']->getTitle() . "</span>"; ?>
  </h2>

  <!-- Topics -->
  <div class="list">
    <ul class="list-unstyled">

      <?php foreach ($data['topics'] as $topic) { ?>

        <li>
          <a class="topicsTitles" href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId(); ?>" style="color: white;">
            <?= $topic->getTitle(); ?>
          </a>
          Posted by <?= $topic->getUser()->getPseudonym(); ?>.
          On <?= $topic->getDateCreation(); ?>
        </li>
        <li><br></li>

      <?php } ?>
      <button type="button" class="myButton">
        <a href="?ctrl=topic&method=addNewTopic" class="nounderline" style="color: white;">New Topic</a>
      </button>
    </ul>
  </div>
</div>