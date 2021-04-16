<div class="listContainer">

  <!-- ajouter le theme avec PHP -->
  <!-- Theme Title -->
  <h2>List of topics for
    <?php foreach ($data['theme'] as $theme) {
      echo $title = $theme->getTitle();
    }; ?>
  </h2>

  <!-- Topics -->
  <div class="list">
    <ul class="list-unstyled">

      <?php foreach ($data['topics'] as $topic) { ?>
        <li><a href="#" style="color: white;"><?= $topic->getTitle(); ?></a></li>
        <li>Posted by *php here*</li>
        <!-- ajouter l'auteur du post avec PHP -->
        <li>On <?= $topic->getDateCreation(); ?></li>
        <li><br></li>
      <?php } ?>

    </ul>
  </div>

</div>