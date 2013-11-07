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
			if (response.result == 1) 
			{
				jQuery('.reponse').removeClass('active');
				jQuery('#' + response.correctAnswer.id).addClass('response');
				setTimeout(function(){
					window.location.reload();
				}, 7000);
			}
			else 
			{	
				jQuery('#' + response.correctAnswer.id).addClass('response');
				setTimeout(function(){
					window.location.reload();
				}, 7000);

			}
		})
		.fail(function(response){
			console.log('Fail; response: ');
			console.log(response);
		});
	});
	jQuery('.no').click(function() {
		jQuery('#derniermot').hide();
	});
});
</script>

<h1>Bienvenue sur Super Quiz ESGI</h1>
<div id="question">
	<div id="derniermot">
		<img src="<?php echo $quizz->getImageUrl('derniermot.png'); ?>" alt="dernier mot" />
		<div class="button yes">OUI</div>
		<div class="button no" >NON</div>
	</div>
	<div class="number">
		Question <span>10</span>/50
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