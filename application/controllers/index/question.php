<?php 

$question = Question::getQuestion();

$questionId = $question['id'];
$answers = Answer::getAnswers($questionId);