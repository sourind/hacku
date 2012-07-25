<?php
function renderList($array){
  if( sizeof($array) > 0 ){
    echo '<ul>';
    foreach( $array as $key => $item ){
      echo '<li>' . $key . ':' . $item . '</li>';
    }
    echo '</ul>';
  }
}
$lampstack = array(
  'Operating System' => 'Linux',
  'Server' => 'Apache',
  'Database' => 'MySQL',
  'Language' => 'PHP'
);
renderList($lampstack);
?>
