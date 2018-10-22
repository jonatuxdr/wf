<?php

function easterReverse($filePath) {
  $fileContent = "";
  $file = fopen($filePath, 'r+');
  
  while ($char=fgetc($file)) {
      $fileContent .= $char;
  }
  
  $middle = floor(strlen($fileContent)/2);
  var_dump($middle, ftell($file));
  
  $reverseContent = "";
  fseek($file, $middle ,SEEK_SET);
  
  while ($char = fgetc($file)) {
      $reverseContent.=$char;
  }
  
  $reverseContent = strrev($reverseContent);
  fseek($file, $middle ,SEEK_SET);
  fwrite($file, $reverseContent);
  
}