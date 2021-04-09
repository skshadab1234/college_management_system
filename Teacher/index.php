<?php

require 'session.php';
if (!isset($_SESSION['FAC_ID'])) {
  header("location:login");
}
?>
