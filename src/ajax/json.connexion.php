<?php

  $query = "SELECT count(*) as nb from users where email ='" . $_GET['user_mail'] . "'";
  $result = $connect->prepare($query);
  $result->execute();

  $data = $result->fetchAll(PDO::FETCH_ASSOC);
  echo (json_encode($data));

