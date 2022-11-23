<?php

function string_to_blob($str){
  $bin = "";
  for($i = 0, $j = strlen($str); $i < $j; $i++) 
  $bin .= decbin(ord($str[$i])) . " ";
  echo $bin;
}