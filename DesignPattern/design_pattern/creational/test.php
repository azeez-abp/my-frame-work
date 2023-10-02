<?php

require "singleton.php";
function one(){
$ss = Singleton::getInstance();	
}

one();