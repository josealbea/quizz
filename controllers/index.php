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
		$this->quizz      = new Quizz();
		
		// Check if the user already has a game running
		$userGame = new Game($this->facebook);
		$currentGame = $userGame->getUserCurrentGame();
		
		$question         = new Question();
		
		// If the user has a game running, we get questions left
		if($currentGame && $currentGame != 0){
			$this->question   = $question->getQuestion(1, $currentGame);
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
		$this->answer    = $answer->getAnswerById($_POST['answerId']);

		$game = new Game();
		$this->game = $game->setGame(true, $this->fbUser, $_POST['questionId'], $this->answer);


		// Rendering the page
		$this->render('answer');
	}
}