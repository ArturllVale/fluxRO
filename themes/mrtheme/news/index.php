<?php 
if (!defined('FLUX_ROOT')) exit;
?>
<div class="container center">
<h2>Anúncios</h2>
<widgetbot
  server="1067843290197667940"
  channel="1067877789442781234"
  width="auto"
  height="800"
></widgetbot>
<script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script>
<!-- <?php if($newstype == '1'):?>
	<?php if($news): ?>
	<div class="newsDiv">
		<?php foreach($news as $nrow):?>
			<h2><?php echo $nrow->title ?></h2>
			<div class="newsCont">
				<span class="newsDate"><small>por <?php echo $nrow->author ?> em <?php echo date(Flux::config('DateFormat'),strtotime($nrow->created))?></small></span>
				<p><?php echo $nrow->body ?></p>
				<?php if($nrow->created != $nrow->modified && Flux::config('CMSDisplayModifiedBy')):?>
					<small><?php echo htmlspecialchars(Flux::message('CMSModifiedLabel')) ?> : <?php echo date('d-m-y',strtotime($nrow->modified))?></small>
				<?php endif; ?>
				<?php if($nrow->link): ?>
					<a class="news_link" href="<?php echo $nrow->link ?>"><small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small></a>
					<div class="clear"></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?> 
	</div>
	<?php else: ?>
		<p>
			<?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?><br/><br/>
		</p>
	<?php endif ?> -->



<?php elseif($newstype == '2'):?>
	<?php if(isset($xml) && isset($xml->channel)): ?>
	<div class="newsDiv">
		<?php foreach($xml->channel->item as $rssItem): ?>
			<?php $i++; if($i <= $newslimit): ?>
				<h2><?php echo $rssItem->title ?></h2>
				<div class="newsCont">
					<span class="newsDate"><small>Posted on <?php echo date(Flux::config('DateFormat'),strtotime($rssItem->pubDate))?></small></span>
					<p><?php echo $rssItem->description ?></p>
					<a class="news_link" href="<?php echo $rssItem->link ?>"><small><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></small></a>
					<div class="clear"></div>
				</div>
			<?php endif ?>
		<?php endforeach; ?> 
	</div>
	<?php else: ?>
		<p>
			<?php echo htmlspecialchars(Flux::message('CMSNewsRSSNotFound')) ?><br/><br/>
		</p>
	<?php endif ?>

<?php else: ?>
		<p>Setting not properly configured.</p>

<?php endif ?>
</div>