<?php
App\Session::getUser();
// var_dump($_SESSION['user']->getPseudonym());
?>

<div class="list listContainer">
  <h2 class="title">Account Informations</h2>

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
        <td><a href="" style="color:white;"><i class="fas fa-user-edit"></i></a></td>
      </tr>
    </tbody>
  </table>

  <!-- Topics & messages posted by this user -->
  <h3 class="text-center">Your Topics</h3>
  <div>
    <ul class="list-unstyled">
      <?php foreach ($data['topics'] as $topic) { ?>

        <li class="listTopicsPosted">

          <!-- Topic title & link -->
          <a href="?ctrl=topic&method=listMessagesByTopic&id=<?= $topic->getId(); ?>" class="topicsTitles">
            <?= $topic->getTitle() . " "; ?>
          </a>

          <!-- Creation date -->
          <?= "Posted on " . $topic->getDateCreation(); ?>

          <!-- Theme title & link -->
          <?= "<span> In <a href='?ctrl=theme&method=listTopicsByCategory&id=" . $topic->getTheme()->getId() . "' style='color:white;'>" .
            "<strong style=''>" . $topic->getTheme()->getTitle() . "</strong>" .
            "</a></span>"; ?>

          <!-- Messages count (work in progress) -->
          <span class="badge badge-info badge-pill">
            3
          </span>

          <!-- Edit button -->
          <span class="badge badge-secondary badge-pill">
            <a href="?ctrl=topic&method=editTopicById&id=<?= $topic->getId(); ?>" style='color:white;'>
              <i class="fas fa-pencil-alt"></i>
            </a>
          </span>

          <!-- Delete button -->
          <span class="badge badge-danger badge-pill">
            <a href="?ctrl=topic&method=deleteTopicById&idTopic=<?= $topic->getId(); ?>&userId=<?= $_SESSION['user']->getId(); ?>" onclick="return confirm('Are you sure you want to delete this topic?');" style='color:white;'>
              <i class="fas fa-trash-alt"></i>
            </a>
          </span>

        </li>

      <?php } ?>
    </ul>
  </div>
</div>