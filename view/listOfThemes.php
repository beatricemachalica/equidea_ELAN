<div class="list">
  <h3 class="margin-top">List of themes</h3>

  <section class="gallery flex">
    <?php foreach ($data['themes'] as $theme) { ?>
      <div class="margin-top" style="margin-right: 20px;">
        <?php $theme->getTitle();
        $name = $theme->getTitle();
        ?>
        <!-- title -->
        <h4>
          <a style="color:white" href="?ctrl=theme&method=listTopicsByCategory&id=<?= $theme->getId(); ?>">
            <?= $name ?>
          </a>
        </h4>
        <!-- picture -->
        <div class="gallery-items">
          <figure class="picture" data-gallery="picture">
            <img src="https://cdn.pixabay.com/photo/2014/08/15/22/48/cowgirl-419084_960_720.jpg" alt="picture" />
            <!-- <figcaption class="overlay">
              <a href="">Figcaption Test</a>
            </figcaption> -->
          </figure>
        </div>
      </div>
    <?php } ?>
  </section>

</div>