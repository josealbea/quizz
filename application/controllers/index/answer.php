<?php

$answer = Answer::getAnswerById($_POST['answer_id']);
$flag   = $answer['flag'];

echo $flag;
?>