<div class="listContainer">

  <!-- Theme Title -->

  <h2 class="title">List of topics for
    <?php foreach ($data['theme'] as $theme) {
      echo $title = $theme->getTitle();
    }; ?>
  </h2>

  <!-- Topics -->

  <div class="list">
    <ul class="list-unstyled">

      <?php foreach ($data['topics'] as $topic) { ?>
        <li><a href="#" style="color: white;"><?= $topic->getTitle(); ?></a></li>
        <li>Posted by <?= $topic->getUser(); ?></li>
        <li>On <?= $topic->getDateCreation(); ?></li>
        <li><br></li>
      <?php } ?>

    </ul>
  </div>
</div>