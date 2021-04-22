<div class="list">
  <h3 class="title">List of Themes</h3>

  <section class="gallery flex">
    <?php foreach ($data['themes'] as $theme) { ?>

      <?php $theme->getTitle();
      $name = $theme->getTitle();
      ?>
      <!-- picture -->
      <div class="gallery-items">
        <figure class="picture" data-gallery="picture">
          <a style="color:white" href="?ctrl=theme&method=listTopicsByCategory&id=<?= $theme->getId(); ?>">
            <img src="<?= IMG_PATH . $theme->getImgPath(); ?>" alt="picture" />
          </a>


          <!-- title -->
          <figcaption>
            <a style="color:white" class="nounderline" href="?ctrl=theme&method=listTopicsByCategory&id=<?= $theme->getId(); ?>">
              <?= $name ?>
            </a>
          </figcaption>
        </figure>
      </div>

    <?php } ?>

    <!-- add a new theme button -->
    <span class="badge badge-secondary">
      <a href="?ctrl=theme&method=addNewTheme" class="nounderline" style="color: white;">
        <i class="fas fa-plus"></i>
      </a>
    </span>
  </section>
</div>