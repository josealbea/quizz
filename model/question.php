<?php
class Question extends Model
{
	public function getQuestion($level = 1, $game = null)
	{
		try {
			if($game != null){
				$sql = 'SELECT id, question, level
						FROM question
						WHERE level = ?
						AND id NOT IN (
										SELECT question
										FROM asked_questions
										WHERE game = ?
									  )
						ORDER BY RAND();';
				$query = $this->db->prepare($sql);
				$query->execute(array($level, $game));
			}else{
				$sql = 'SELECT id, question, level
						FROM question
						WHERE level = ?
						ORDER BY RAND()';
				$query = $this->db->prepare($sql);
				$query->execute(array($level));
			}
			$question = $query->fetch();
			return $question;
		} catch (Exception $e) {
			echo 'An error occurred while trying to get the question: ' . $e->getMessage();
		}
	}
}