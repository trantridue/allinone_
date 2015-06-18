<marquee onmouseout="$('#abcmarquee').attr('scrollamount', 1 , 0);" direction="up" id="abcmarquee"
	onmouseover="$('#abcmarquee').prop('scrollamount', 0 , 0);" behavior="scroll"
	scrollamount="1" loop="0">
	<?php 
		$newsService->latestNews();
	?>
</marquee>