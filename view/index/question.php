<script type="text/javascript">
jQuery(document).ready(function() {
	var user_id = <?php echo $fbUser['id']; ?>;
	var questionId = <?php echo $questionId; ?>;
	var currentGame = <?php echo $this->currentGame; ?>;
	var answerId;
	if(user_id && user_id != 0){
		jQuery.ajax({
			type: 'POST',
			url: '<?php echo WEBROOT; ?>index/user',
			dataType: 'html',
			data: { user_id: user_id }
		});
	}

	jQuery('.reponse').click(function() {
		answerId = jQuery(this).attr('id');
		if (jQuery('.reponse').hasClass("response")) {
			alert('Vous avez déja répondu a la question');
		}
		else {
			jQuery('.reponse').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('#derniermot').show();
		}
	});

	jQuery('.yes').click(function() {
		jQuery.ajax({
			type: 'POST',
			url: '<?php echo WEBROOT; ?>index/answer',
			dataType: 'json',
			data: { currentGame: currentGame, questionId: questionId, answerId: answerId }
		})
		.done(function(response) {
			console.log('response : '); console.log(response);
			console.log('result : ' + response.result);
			jQuery('#derniermot').hide();
			if (response.result == 1) 
			{
				jQuery('.reponse').removeClass('active');
				jQuery('#' + response.correctAnswer.id).addClass('response');
				setTimeout(function(){		
					jQuery('#question').hide();
					jQuery('#looser-party').show();
				}, 4000);
				// Shows the link to share in order to allow the user to share his result on FB.
				jQuery('.shareResult').show();
				jQuery('#share-result-link').on('click', function(){
					FB.ui({
					  method: 'feed',
					  link: 'http://www.facebook.com/pages/ESGI-Quizz-Community/535494466533197',
					  picture: 'http://totaly.fr/wp-content/uploads/2012/04/jaquette-qui-veut-gagner-des-millions-editions-speciales-xbox-360-cover-avant-g-1317926532.jpg',
					  caption: 'ESGI Quizz Community, le jeu qui vous met à l\'épreuve ! <br> Qui sera le premier à être millionaire ?',
					}, function(response){});
				})
			}
			else 
			{	
				jQuery('#' + response.correctAnswer.id).addClass('response');
				if (response.result == 15) {
					setTimeout(function(){
						jQuery('winner-party').show();
					}, 4000);
				}
				else {
					setTimeout(function(){
						window.location.reload();
					}, 4000);
				}

			}
		})
		.fail(function(response){
			console.log('Fail; response: ');
			console.log(response);
		});
	});
	jQuery('.no').click(function() {
		jQuery('.reponse').removeClass('active');
		jQuery('#derniermot').hide();
	});
});
</script>

<div id="question">
	<div id="derniermot">
		<img src="<?php echo $quizz->getImageUrl('derniermot.png'); ?>" alt="dernier mot" />
		<div class="button yes">OUI</div>
		<div class="button no" >NON</div>
	</div>
	<div class="number">
		Question <span><?php echo $totalAsked + 1; ?></span>/<?php echo MAX_QUESTIONS; ?>
	</div>
	<div class="earnings">
		<?php
		$currentEarning = $this->earnings[$totalAsked+1];
		$earnings = array_reverse($this->earnings);
		foreach ($earnings as $key => $value) {
			$isCurrentEarning = ($currentEarning == $value) ? 'current' : '';
			echo '<div class="earning earning-' . $key . ' ' . $isCurrentEarning . '">'. $value . ' €</div>';

		}
		?>
	</div>
	<div class="loader">
	</div>
	<div class="qi_question">
		<?php
		/*
		 * GET QUESTION FROM DATABASE
		 */
		if($question){
			echo $question['question'];
		}else{
			echo 'Aucune question n\'a pu être trouvée.';
		}
		?>
	</div>
	<div class="response_question">
		<?php
		/*
		 * GET ANSWERS FROM DATABASE
		 */
		if($questionId){
			// $answers comes from question controller
			if(count($answers) > 0){
				$i = 1;
				foreach ($answers as $answer) {
					echo '<div id="' . $answer['id'] . '" class="reponse reponse-'.$i.'">'.$answer['answer'].'</div>';
					$i++;
				}
			}else{
				echo 'Aucune réponse n\'a pu être trouvée.';
			}
		}
		?>
	</div>
</div>	
<div id="looser-party">
	<span class="result">Quel dommage, vous avez échoué, retentez votre chance</span>
	<a href="<?php echo WEBROOT; ?>index/question" class="modern socle">Rejouer maintenant</a>
	
	<div class="shareResult">
		<a href="#" id="share-result-link"><img id="img-share-result-link" src="<?php echo $quizz->getImageUrl('partager.png'); ?>" alt="partager" /></a>
	</div>
</div>
<div id="winner-party"> 
	<span class="result">Félicitation, vous venez de remporter le million !!!</span>
	<a href="<?php echo WEBROOT; ?>index/question" class="modern socle">Rejouer maintenant</a>
</div>