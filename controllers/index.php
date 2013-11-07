<?php
class Index extends Controller
{
	public function indexAction()
	{
		$this->title   = 'Test magic setter for title';

		// Loading layout containing html and Facebook API instance
		$this->loadLayout();

		// Setting parameters with magical setters	
		$this->quizz   = new Quizz();		
		$this->user    = new User($this->facebook);
		
		// Rendering the page
		$this->render('index');
	}

	public function questionAction()
	{
		// Loading layout containing html and Facebook API instance
		$this->loadLayout();

		// Setting parameters with magical setters
		$this->quizz = new Quizz();
		
		// Check if the user already has a game running
		$userGame    = new Game($this->facebook);
		$this->currentGame = $userGame->getUserCurrentGame();
		$this->totalAsked  = $userGame->getTotalAskedQuestions($this->currentGame);

		if($this->totalAsked < 5){
			$level = 1;
		}elseif($this->totalAsked < 10){
			$level = 2;
		}else{
			$level = 3;
		}
		
		$question = new Question();
		// If the user has a game running, we get questions left
		if($this->currentGame && $this->currentGame != 0){
			$this->question   = $question->getQuestion($level, $this->currentGame);
		}else{
			$this->question   = $question->getQuestion();
		}
		$this->questionId = $this->question['id'];			
		
		// Get the answers
		$answer           = new Answer();
		$this->answers    = $answer->getAnswers($this->questionId);
		
		// Rendering the page
		$this->render('question');
	}

	public function userAction()
	{
		// Loading layout containing html and Facebook API instance
		$this->loadLayout('json');
		
		// Setting parameters with magical setters
		$user = new User($this->facebook);
		$this->user = $user->insertUser($this->fbUser);
	}

	public function answerAction()
	{
		// Loading layout containing html and Facebook API instance
		$this->loadLayout('json');

		// Setting parameters with magical setters
		$answer           = new Answer();
		$this->answer     = $answer->getAnswerById($_POST['answerId']);
		
		$game             = new Game();
		$this->totalAsked = $game->getTotalAskedQuestions($_POST['currentGame']);

		if( (($this->totalAsked + 1) == MAX_QUESTIONS) || ($this->answer['flag'] == 0) ){
			$done = 1;
		}else{
			$done = 0;
		}
		
		$this->game   = $game->setGame($_POST['currentGame'], $this->fbUser, $_POST['questionId'], $done);
		$response = array('result' => $done);
		echo json_encode($response);
		// Rendering the page
		$this->render('answer');
	}
}