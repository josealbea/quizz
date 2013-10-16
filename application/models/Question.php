<?php
class Question
{	
	protected $db;

	public function getQuestion($level = 1){
		try{
			$this->db = new PDO(DB, USER, PASSWORD);
			$question = $this->db->query('SELECT id, question, level FROM question WHERE level = ' . $level . ' ORDER BY RAND() LIMIT 1');
			$question = $question->fetch();
		}catch(Exception $e){
			echo 'An error occurred while trying to get the question: ' . $e->getMessage();
		}
		return $question;
	}
}