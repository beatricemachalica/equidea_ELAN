<div class="homeMsg">

  <?php if (App\Session::getUser()) {

    echo "<h2>Welcome " . $_SESSION['user'] . "</h2>";
  } else { ?>
    <h2>Welcome riders</h2>

  <?php } ?>

</div>