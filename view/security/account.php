<?php
App\Session::getUser();
// var_dump($_SESSION['user']->getPseudonym());
?>

<div class="list listContainer">
  <h2 class="text-center" style="margin-bottom: 40px;">Account Informations</h2>

  <!-- About me & profil picture -->
  <!-- <table class="table table-borderless" style="color: white;">
    <thead>
      <tr>
        <th scope="col">Profil picture</th>
        <th>About me</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <figure><img src="" alt="Profil picture goes here"></figure>
        </td>
        <td>
          <p class="backgroundForm">...</p>
        </td>
      </tr>
    </tbody>
  </table> -->

  <!-- Account Informations -->
  <table class="table table-borderless" style="color: white;">
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Date of registration</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $_SESSION['user']->getPseudonym(); ?></td>
        <td><?= $_SESSION['user']->getDateRegistration(); ?></td>
        <td><?= $_SESSION['user']->getEmail(); ?></td>
        <td><a href="" style="color:white;">Change my password</a></td>
      </tr>
    </tbody>
  </table>

  <!-- Topics & messages posted by this user -->
  <h3 class="text-center">Topics posted</h3>
  <div class="list">
    <ul class="list-unstyled">
      <?php foreach ($data['topics'] as $topic) { ?>
        <li style="padding: 10px;">
          <a href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId(); ?>" class="topicsTitles">
            <?= $topic->getTitle() . " "; ?>
          </a>
          <?= "Posted on " . $topic->getDateCreation(); ?>
          <?= "In <a href='?ctrl=theme&method=listTopicsByCategory&id=" . $topic->getTheme()->getId() . "' style='color:white;'>" .
            $topic->getTheme()->getTitle() .
            "</a>"; ?>
          <span class="badge badge-secondary badge-pill">
            3
            <!-- <= count($data['messages']); ?> -->
          </span>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>