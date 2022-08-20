<?php

// Get Slug Count From Category
function categorySlugCount($col, $val) {
   global $pdo;
   $stm=$pdo->prepare("SELECT $col FROM categories WHERE $col=?");
   $stm->execute(array($val));
   $count = $stm->rowCount();
   return $count;
 }