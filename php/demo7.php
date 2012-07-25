<?php
$name = 'Souri';

// if there is no language defined, switch to English
if( !isset($_GET['language']) ){
  $welcome = 'Oh, hello there, ';
}
if( $_GET['language'] == 'hindi' ){
  $welcome = 'Namaste, ';
}
switch($_GET['font']){
  case 'small':
    $size = 80;
  break;
  case 'medium':
    $size = 100;
  break;
  case 'large':
    $size = 120;
  break;
  default:
    $size = 100;
  break;
}
echo '<style>body{font-size:' . $size . '%;}</style>';
echo '<h1>'.$welcome.$name.'</h1>';
?>

