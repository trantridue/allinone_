<marquee onmouseout="this.setAttribute('scrollamount', 1 , 0);" direction="up"
	onmouseover="this.setAttribute('scrollamount', 0, 0);" behavior="scroll"
	scrollamount="1" loop="-1" style="font-size:16px;margin-top:5px;">
	<?php 
		$newsService->latestNews();
	?>
</marquee>