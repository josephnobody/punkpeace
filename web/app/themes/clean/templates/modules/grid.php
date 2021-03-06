<div class="grid-wrapper group <?php if($post->post_name == "punk"){ echo "alt"; } ?>">

	<?php
	$args = array(
	    "post_type" => "post",
	    "posts_per_page" => -1,
	    "orderby" => "post_date",
	    "order" => "DESC"
	);

	if($post->post_name == "punk"){
		$args["category_name"] = "punk";
	}

	if($post->post_name == "peace"){
		$args["category_name"] = "peace";
	}

	$posters = get_posts($args);
	/*===============*
	echo "<pre>";
	print_r($posters);
	echo "</pre><br>";
	/*===============*/
	foreach($posters as $key => $poster){
		$collaborators = get_field("collaborators", $poster->ID);
		$link = get_permalink($poster->ID);
	?>

	<?php if($key > 0){ ?>
	<article class="non-frame group">
		<?php echo $key; if($key == 1){ ?>

			<div class="content"><?php echo $post->post_content; ?></div>

		<?php } ?>
	</article>
	<?php } ?>
	
	<!-- Poster HTML -->
	<article class="poster-frame group" data-url="<?php echo $link; ?>?iframe=true" data-title="<?php echo $poster->post_title; ?>" data-contributors="<?php echo json_encode($collaborators); ?>">
		<div class="iframe group">
			<iframe rel="iframe_written_here"></iframe>
		</div>
		<div class="info-frame group">
			<h1><?php echo $poster->post_title; ?></h1>
			<h2>
			<?php if(isset($collaborators[0])){ foreach($collaborators as $index => $arr){ if($index !== 0){ ?> <?php } if($arr["link"] != ""){ ?><?php echo $arr["name"]; ?><?php } else { echo $arr["name"]; } } } ?>
			</h2>
			<p>
			<?php if(isset($collaborators[0])){ foreach($collaborators as $index => $arr){ if($index !== 0){ ?> <?php } if($arr["link"] != ""){ ?><a href="<?php echo $arr["link"]; ?>" target="_blank"><?php echo $arr["link"]; ?></a><?php } else { echo $arr["name"]; } } } ?>
			<div class="expand"></div>
		</p>
	</article>

	<?php } ?>
	
	
<article class="non-frame group hidden"></article></div>
	
	