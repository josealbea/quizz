<h1>Bienvenue sur Super Quiz ESGI</h1>		
<h2>Testez votre connaissance sur votre école et comparez vos scores avec vos amis.</h2>
<img src="<?php echo $quizz->getImageUrl('qi_quiz.jpg'); ?>" alt="Quiz ESGI" />
<?php
/*
 * Check if the user likes our fan page or not.
 * If he doesn't, he can't access the game.
 */
if($user->getUserLikes($fbUser, APPID) == 0){
?>
	Vous devez aimer notre page pour pouvoir jouer. <br />
	<div class="fb-like" data-href="http://www.facebook.com/pages/ESGI-Quizz-Community/535494466533197?ref=hl" data-width="300" data-height="100" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
<?php
}else{
	echo '<a href="' . WEBROOT . 'index/question" id="start_quiz">Commencer le Quiz</a>';
}
?>