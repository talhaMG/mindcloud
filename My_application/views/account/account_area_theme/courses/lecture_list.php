<div class="row">
	<ul>
		<?php if (isset($lecture) && array_filled($lecture)): ?>
			<?php foreach ($lecture as $key => $value): ?>
					<li><a href="<?=l('account-area/lecture').'?course-id='.$codeid.'&lecture='.urlencode(str_replace(' ','-',$value['lecture_name'])).'&lecture-id='.$value['lecture_id']?>"><?=$value['lecture_name']?></a></li>				
			<?php endforeach ?>
		<?php endif ?>
	</ul>
</div>