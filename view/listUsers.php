<div class="list listContainer">
  <h2 class="title">List of users</h2>

  <table class="table table-borderless" style="color: white;">
    <thead>
      <tr>
        <th scope="col">Pseudonym</th>
        <th scope="col">Date of registration</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['users'] as $user) { ?>
        <tr>
          <!-- créer la méthode pour afficher le profil de l'utilisateur -->
          <td><a href="?ctrl=user&method=#&id=<?= $user->getId(); ?>" style="color: white;"><?= $user->getPseudonym(); ?></a></td>
          <td><?= $user->getDateRegistration(); ?></td>
          <td><?= $user->getStatus(); ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>