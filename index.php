<?php

include 'observer.php';

$observer1 = new ObserverOne();
$observer2 = new ObserverTwo();

$topic = new Topic();
$topic->attach($observer1);
$topic->attach($observer2);

$topic->doSomething();
echo "<br>";
$topic->doSomething();
echo "<br>";
$topic->doSomething();

echo 'Done';
