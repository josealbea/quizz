<?php

$answer = Answer::getAnswerById($_POST['answer_id']);
var_dump($answer);

 header('Content-type: application/json');

 $status = array('status' => '1', 'answer_id' => $_POST['answer_id']);

 echo json_encode($status);
?>