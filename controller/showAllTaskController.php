<?php

require('model/database.php'); 

$getAllTask = $bdd->query('SELECT * FROM task ORDER BY id DESC');