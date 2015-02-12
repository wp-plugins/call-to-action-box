<div id="callToActionBox" style="background-color:<?php echo $background_color; ?>">
	<div id="callToActionHeadline"><?php echo $headline; ?></div>
	<?php
		if($image){
	?>
	<div id="callToActionImage"><img src="<?php echo $image ?>"/></div>
	<?php
		} //end if($image)
	?>
	<div id="callToActionMessage"><?php echo wpautop($message); ?></div>
	<div id="callToActionButton">
		<a class="btn" href="<?php echo $button_url; ?>" style="background:<?php echo $button_color; ?>"><?php echo $button_text; ?></a>
	</div>
</div>
