<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="container">		
<div class="row">
<div class="col-md-6">
<?php if(Flux::config('CMSNewsOnHomepage')): ?>
    <div class="container">
        <?php if($newstype == '1'): ?>
            <?php if($news): ?>
                <div class="row">
                    <?php foreach($news as $nrow): ?>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $nrow->title ?></h4>
                                    <p class="card-text"><?php echo $nrow->body ?></p>
                                    <p class="card-text"><small class="text-muted">by <?php echo $nrow->author ?> on <?php echo date(Flux::config('DateFormat'), strtotime($nrow->created))?></small></p>
                                    <?php if($nrow->created != $nrow->modified && Flux::config('CMSDisplayModifiedBy')): ?>
                                        <p class="card-text"><small><?php echo htmlspecialchars(Flux::message('CMSModifiedLabel')) ?> : <?php echo date(Flux::config('DateFormat'), strtotime($nrow->modified))?></small></p>
                                    <?php endif; ?>
                                    <?php if($nrow->link): ?>
                                        <a href="<?php echo $nrow->link ?>" class="btn btn-primary"><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>
            <?php else: ?>
                <p><?php echo htmlspecialchars(Flux::message('CMSNewsEmpty')) ?></p>
            <?php endif ?>
        <?php elseif($newstype == '2'): ?>
            <?php if(isset($xml) && isset($xml->channel)): ?>
                <div class="row">
                    <?php foreach($xml->channel->item as $rssItem): ?>
                        <?php $i++; if($i <= $newslimit): ?>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $rssItem->title ?></h4>
                                        <p class="card-text"><?php echo $rssItem->description ?></p>
                                        <p class="card-text"><small class="text-muted">Posted on <?php echo date(Flux::config('DateFormat'), strtotime($rssItem->pubDate))?></small></p>
                                        <a href="<?php echo $rssItem->link ?>" class="btn btn-primary"><?php echo htmlspecialchars(Flux::message('CMSNewsLink')) ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?> 
                </div>
            <?php else: ?>
                <p><?php echo htmlspecialchars(Flux::message('CMSNewsRSSNotFound')) ?><br/><br/></p>
            <?php endif ?>
        <?php endif ?>
    </div>
<?php else: ?>
    <div class="container">
        <h2><?php echo htmlspecialchars(Flux::message('MainPageHeading')) ?></h2>
        <p><strong><?php echo htmlspecialchars(Flux::message('MainPageInfo')) ?></strong></p>
        <p><?php echo htmlspecialchars(Flux::message('MainPageInfo2')) ?></p>
        <ol>
            <li><p class="green"><?php echo htmlspecialchars(sprintf(Flux::message('MainPageStep1'), __FILE__)) ?></p></li>
            <li><p class="green"><?php echo htmlspecialchars(Flux::message('MainPageStep2')) ?></p></li>
        </ol>
        <p style="text-align: right"><strong><em><?php echo htmlspecialchars(Flux::message('MainPageThanks')) ?></em></strong></p>
    </div>
<?php endif ?>
</div>
<div class="col-md-6">
	
</div>
</div>
</div>