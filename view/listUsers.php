<div class="list">
  <h2>List of users</h2>

  <ul>
    <?php foreach ($data['users'] as $user) { ?>
      <li>
        <?= $user->getPseudonym() ?>
      </li>
    <?php } ?>
  </ul>
</div>