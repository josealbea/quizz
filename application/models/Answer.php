<?php
class Answer
{
	protected $db;

	public function getAnswers($questionId){
		try{
			$this->db = new PDO(DB, USER, PASSWORD);
			$answers = $this->db->prepare('SELECT * FROM answer WHERE question_id = ? ORDER BY RAND()');
			$answers->execute(array($questionId));
			$answers = $answers->fetchAll();
		}catch(PDOException $e){
			echo 'Connection has failed: ' . $e->getMessage();
		}
		return $answers;
	}

	public function getAnswerById($answerId){
		try{
			$this->db = new PDO(DB, USER, PASSWORD);
			$answer = $this->db->prepare('SELECT * FROM answer WHERE id = ?');
			$answer->execute(array($answerId));
			$answer = $answer->fetch();
		}catch(PDOException $e){
			echo 'Connection has failed: ' . $e->getMessage();
		}
		return $answer;
	}
}