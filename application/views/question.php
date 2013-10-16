<html>
<head>
	<title>Quiz Facebook</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.reponse').click(function() {
			if ($('.reponse').hasClass("response")) {
				alert('vous avez déja répondu a la question');
			}
			else {
				$('.reponse').removeClass('active');
				$(this).addClass('active');
				$('#derniermot').show();
			}
		});
		$('.yes').click(function() {
			$.ajax();
			$('#derniermot').hide();
			$('.reponse').removeClass('active');
			$('.reponse-c').addClass('response');
		});
		$('.no').click(function() {
			$('#derniermot').hide();
		});
	});
	</script>
</head>
<body>
<div id="content">
	<h1>Bienvenue sur Super Quiz ESGI</h1>
	<div id="question">
		<div id="derniermot">
			<img src="images/derniermot.png" alt="dernier mot" />
			<div class="button yes">OUI</div>
			<div class="button no" >NON</div>
		</div>
		<div class="number">
			Question <span>10</span>/50
		</div>
		<div class="qi_question">
			De quelle couleur est le cheval blanc d'Alexandre le grand ?
		</div>
		<div class="response_question">
			<div class="reponse reponse-a">Bleu</div>
			<div class="reponse reponse-b">Blanc</div>
			<div class="reponse reponse-c">Rouge</div>
			<div class="reponse reponse-d">Vert</div>
		</div>
	</div>	
</div>
</body>
</html>