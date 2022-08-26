<?php


// Get TimeStamp to Month Name And Year

function getMonthName($timeStamp){
   $date = $timeStamp;
   $dt = new DateTime($date);

   $newDate = $dt->format('d-m-Y');
   $yrdata= strtotime($newDate);
   $replace_dash = date('F-Y', $yrdata);
   return str_replace("-", " ", $replace_dash);
}

// Get Category Name

function getCategoryName($slug) {
   global $pdo;
   $stm=$pdo->prepare("SELECT name FROM categories WHERE slug=?");
   $stm->execute(array($slug));
   $result = $stm->fetchAll(PDO::FETCH_ASSOC);
   return $result[0]['name'];
 }