<?php

// Get Slug Count From Category
function categorySlugCount($col, $val) {
   global $pdo;
   $stm=$pdo->prepare("SELECT $col FROM categories WHERE $col=?");
   $stm->execute(array($val));
   $count = $stm->rowCount();
   return $count;
 }

// Get Admin Data
function admin($col,$val){
    global $pdo;
   $stm=$pdo->prepare("SELECT $col FROM admin WHERE id=?");
   $stm->execute(array($val));
   $result = $stm->fetchAll(PDO::FETCH_ASSOC);
   return $result[0][$col];
}