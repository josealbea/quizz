<div id="background">
	<?php
	/*
	 * Check if the user likes our fan page or not.
	 * If he doesn't, he can't access the game.
	 */
	if($user->getUserLikes($fbUser, APPID) == 0){
	?>
	<div id="aime-jouer">
		Vous devez aimer notre page pour pouvoir jouer. <br />
		<div class="fb-like" data-href="http://www.facebook.com/pages/ESGI-Quizz-Community/535494466533197?ref=hl" data-width="300" data-height="100" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="false" data-send="false"></div>
	</div>
	<?php
	}else{
		echo "<div id='liens'>";
			echo '<a href="' . WEBROOT . 'index/question" id="start_quiz" class="modern socle">Commencer le Quiz</a>';
			echo '<a href="#" id="send-invitation" class="modern socle">Inviter des amis</a>';
		echo "</div>";
	}
	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#send-invitation').on('click', function(){
			FB.ui({
				method: 'apprequests',
				message: 'Invitation à ESGI Quizz Community'
			});
		});
		setTimeout(function(){
			FB.Event.subscribe('edge.create', function(response) {
				window.location.reload();
			});
			FB.Event.unsubscribe('edge.create', function(response) {
				window.top.location = 'http://www.facebook.com/pages/ESGI-Quizz-Community/535494466533197?id=535494466533197&sk=app_194744407377894';
			});
		}, 3000);
	});
	</script>
</div>
