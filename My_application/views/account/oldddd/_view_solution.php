<? 
$i=1;
foreach ($data as $key => $value) {?>
<div class="row" style="border-bottom: 1px solid rgb(201, 201, 203);">
<div class="col-md-12 col-sm-12 col-xs-12">
	<strong><i>Q<?=$i?>: <?=$value['cq_question']?></i></strong>
	<div class="checkboxBtn">
		<label for="c1">
			<span class="<?=$value['user_answer'] == 1 ? 'checked' : 'unchecked'?>"></span>
			<?=$value['cq_option_1']?>
			<span style="color: green; font-size: 12px;"><?=$value['cq_correct_answer'] == 1 ? ' (Correct Answer)' : ''?></span>
		</label>
	</div>
	<div class="checkboxBtn">
		<label>
			<span class="<?=$value['user_answer'] == 2 ? 'checked' : 'unchecked'?>"></span>
			<?=$value['cq_option_2']?>
			<span style="color: green; font-size: 12px;"><?=$value['cq_correct_answer'] == 2 ? ' (Correct Answer)' : ''?></span>
		</label>
	</div>
	<?php if(!empty($value['cq_option_3'])){?>
	<div class="checkboxBtn">
		<label>
			<span class="<?=$value['user_answer'] == 3 ? 'checked' : 'unchecked'?>"></span>
			<?=$value['cq_option_3']?>
			<span style="color: green; font-size: 12px;"><?=$value['cq_correct_answer'] == 3 ? ' (Correct Answer)' : ''?></span>
		</label>
	</div>
	<? } ?>
	<?php if(!empty($value['cq_option_4'])){?>
	<div class="checkboxBtn">
		<label>
			<span class="<?=$value['user_answer'] == 4 ? 'checked' : 'unchecked'?>"></span>
			<?=$value['cq_option_4']?>
			<span style="color: green; font-size: 12px;"><?=$value['cq_correct_answer'] == 4 ? ' (Correct Answer)' : ''?></span>
		</label>
	</div>
	<? } ?>
	<br>
</div>

</div>
<? 
$i++;
} ?>

