<?php
class Answer extends Model
{
	public function getAnswers($questionId)
	{
		$fields = array('id', 'answer');
		$this->table = 'answer';
		$where = array('question_id' => (int)$questionId);
		$order = array('RAND()' => '');
		$limit = 10;

		$answers = $this->select($fields, $where, $order, $limit);
		return $answers;
	}

	public function getAnswerById($answerId)
	{
		$fields = array();
		$this->table = 'answer';
		$where = array('id' => $answerId);
		$order = array();
		$limit = 1; 
		$fetch = 'one';

		$answer = $this->select($fields, $where, $order, $limit, $fetch);

		return $answer;
	}
}