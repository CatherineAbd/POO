<?php

function bddConnect(){
  return new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');

}

?>