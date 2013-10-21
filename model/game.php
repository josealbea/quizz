<?php
class Game extends Model
{
	protected $user;
	protected $questionId;
	protected $answer;

	public function setGame($newGame = null, $fbUser, $questionId, $answer)
	{
		$this->user     = $fbUser;
		$this->questionId = $questionId;
		$this->answer   = $answer;
		var_dump($newGame); 
		if($newGame == true){
			self::createGame();
		}else{
			self::updateGame();
		}
	}

	public function createGame()
	{
		// Check if the user lost
		$done = ($this->answer['flag'] == 0) ? 1 : 0;

		// Create the game
		$fields = array('date' => date('Y-m-d H:i:s', time()), 'user_id' => $this->user['id'], 'done' => $done);
		$this->table = 'game';
		$gameInserted = $this->insert($fields);

		// Add the question to the asked_questions table.
		$fields = array('game' => $gameInserted, 'question' => $this->questionId);
		$this->table = 'asked_questions';
		$this->insert($fields);

		return $this;
	}

	public function updateGame()
	{
		echo 'updateGame()';
	}

	public function getUserCurrentGame()
	{
		$fbUser = $this->facebook->api('/me');
		
		$fields = array('*', 'COUNT(*) as total');
		$this->table = 'game';
		$where = array('user_id' => $fbUser['id'], 'done' => '0');

		$currentGame = $this->select($fields, $where, array(), array(), null);

		//echo '<pre>'; var_dump($currentGame); echo '</pre>';

		if($currentGame['total'] > 0){
			return $currentGame['id'];
		}else{
			return 0;
		}
	}
}