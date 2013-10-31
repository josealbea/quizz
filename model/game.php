<?php
class Game extends Model
{
	protected $user;
	protected $currentGame;
	protected $questionId;
	protected $answer;

	public function setGame($game = null, $fbUser, $questionId, $answer)
	{
		$this->user        = $fbUser;
		$this->currentGame = $game;
		$this->questionId  = $questionId;
		$this->answer      = $answer;
		
			// echo '<pre>';
			// 	echo '<br />$this->user: '; print_r($this->user);
			// 	echo '<br />$this->currentGame: '.$this->currentGame;
			// 	echo '<br />$this->questionId: '.$this->questionId;
			// 	echo '<br />$this->answer: '; print_r($this->answer);
			// echo '</pre>';

		if($game == null || $game == 0){
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

			// echo '<pre>';
			// 	echo '<br />$done: '.$done;
			// 	echo '<br />$fields: '; print_r($fields);
			// echo '</pre>';
		$gameInserted = $this->insert($fields);

		// Add the question to the asked_questions table.
		$fields = array('game' => $gameInserted, 'question' => $this->questionId);
		$this->table = 'asked_questions';
		$this->insert($fields);
	}

	public function updateGame()
	{
		// Check if the user lost
		$done = ($this->answer['flag'] == 0) ? 1 : 0;
		if($done == 0 && self::getTotalAskedQuestions($this->currentGame)+1 >= MAX_QUESTIONS){
			$done = 1;
		}

		// Add the question to the asked_questions table.
		$fields = array('game' => $this->currentGame, 'question' => $this->questionId);
		$this->table = 'asked_questions';
		$this->insert($fields);

		// Update the game
		$fields = array('done' => $done);
		$this->table = 'game';
		$where  = array('id' => $this->currentGame);
		$this->insert($fields, $where);
	}

	public function getUserCurrentGame()
	{
		$fbUser = $this->facebook->api('/me');
		
		$fields = array('*', 'COUNT(*) as total');
		$this->table = 'game';
		$where = array('user_id' => $fbUser['id'], 'done' => '0');

		$currentGame = $this->select($fields, $where, array(), array(), null);

		if($currentGame['total'] > 0){
			return $currentGame['id'];
		}else{
			return 0;
		}
	}

	public function getTotalAskedQuestions($gameId)
	{
		$fields = array();
		$this->table = 'asked_questions';
		$where = array('game' => $gameId);
		return count($this->select($fields, $where));
	}
}