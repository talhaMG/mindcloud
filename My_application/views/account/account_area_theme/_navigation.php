<? if(isset($this->navigation_data) AND array_filled($this->navigation_data)) :?>
<ul class="whatpeopleSayDiv scrollbar-inner">
    
    <li>
        <a href="<?=l('')?>"><i class="fa fa-dashboard" aria-hidden="true"></i> Back to Home </a>
    </li>
    
	<?php
	foreach($this->navigation_data as $key=>$value){
		if($value['is_dropdown']){
		?>
			<li>
				<div class="panel">
					<a data-toggle="collapse" data-parent="#accordion21" href="#collapseTwoOne<?=$key?>" class="collapsed" aria-expanded="false">
						<i class="<?=$value['icon']?>" aria-hidden="true"></i> <?=$value['name']?>
					</a>
					<div id="collapseTwoOne<?=$key?>" class="panel-collapse collapse" aria-expanded="false" >
						<div class="panel-body">
							<ul>
								<?php
								if(isset($value['navigation']) AND array_filled($value['navigation'])) {
									foreach($value['navigation'] as $sub_k=>$sub_v){ ?>
									<li class="<?=$sub_v['class']?>"> <a href="<?=$sub_v['href']?>">
										<i class="<?=$sub_v['icon']?>" aria-hidden="true"></i> <?=$sub_v['name']?> </a>
									</li>
								<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</li>
		<?php
		}
		else {
		?>
			<li class="<?=$value['class']?>"> <a href="<?=$value['href']?>">
				<i class="<?=$value['icon']?>" aria-hidden="true"></i> <?=$value['name']?> </a>
			</li>
		<?php 
		}
	}
	?>
</ul>
<? endif;?>