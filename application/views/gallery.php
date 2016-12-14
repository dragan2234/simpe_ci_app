

	</style>
</head>
<body>
<p>
	

This is gallery with pagination. I made this using image library, upload library and pagination library in CI.
</p>
<div id="gallery">
	<?php if (isset($images) && count($images)):
		foreach ($images as $image):
	  ?>

	<div class="thumb">
		
		<a href="<?php echo $image['url']; ?>">
			<img src="<?php echo $image['thumb_url']; ?>">
		</a>
	</div>
<?php endforeach;
echo $this->pagination->create_links();
 else: ?>

		<div id="blank_gallery">Please Upload an Image</div>
	<?php endif; ?>

	<?php  ?>

</div>


	<div id="upload">
		
		<?php

		echo form_open_multipart('gallery');
		echo form_upload('userfile');
		echo form_submit('upload','Upload');
		echo form_close();
		echo anchor('site/members_area','Back to site');

		?>

		</br>

		 <?php
		echo anchor('gallery/remove_all','Remove all pictures');
		?>
	</div>


