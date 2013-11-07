<?php
class Game extends Model
{
	protected $user;
	protected $currentGame;
	protected $questionId;
	protected $done;

	public function setGame($game = null, $fbUser, $questionId, $done)
	{
		$this->user        = $fbUser;
		$this->currentGame = $game;
		$this->questionId  = $questionId;
		$this->done      = $done;

		if($game == null || $game == 0){
			self::createGame();
		}else{
			self::updateGame();
		}
	}

	public function createGame()
	{
		// Create the game
		$fields = array('date' => date('Y-m-d H:i:s', time()), 'user_id' => $this->user['id'], 'done' => $this->done);
		$this->table = 'game';

		$gameInserted = $this->insert($fields);

		// Add the question to the asked_questions table.
		$fields = array('game' => $gameInserted, 'question' => $this->questionId);
		$this->table = 'asked_questions';
		$this->insert($fields);
	}

	public function updateGame()
	{
		// Add the question to the asked_questions table.
		$fields = array('game' => $this->currentGame, 'question' => $this->questionId);
		$this->table = 'asked_questions';
		$this->insert($fields);

		// Update the game
		$fields = array('done' => $this->done);
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