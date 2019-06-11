<?php
  $to      = $_POST["to"];
  $subject = 'Codice Locale';
  $message = 'Inserisci questo codice : 865943';
  $headers = 'From: BarlettaAppAdmin';

  mail($to, $subject, $message, $headers);
?> 
