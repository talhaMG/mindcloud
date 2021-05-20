<? 
$i=1;
if(isset($data) AND array_filled($data)) :
foreach ($data as $key => $value) {?>
<div class="row" style="border-bottom: 1px solid rgb(201, 201, 203);">
	<div class="col-md-12 col-sm-12 col-xs-12">
		
		<div class="privew">
		    <div class="questionsBox">
		        <div class="questions"><i>Q<?=$i?>: <?=$value['pq_question']?></i></div>
		        <ul class="answerList">
		            <? if(!empty($value['pq_option_1'])) :?>
		            <li>
		                <label>
		                    <input type="radio" disabled="disabled" name="answerGroup<?=$i?>" <?=($value['pq_correct_answer'] == 1) ? 'checked="checked"' : ''?> value="0" >
		                    <?=ucfirst($value['pq_option_1'])?>
		                    <? if($value['pq_correct_answer'] == 1):?>
		                    <span class="label label-success pull-right">Correct Answer</span>
		                	<? endif;?>
		                </label>
		            </li>
		        	<? endif;?>
		            <? if(!empty($value['pq_option_2'])) :?>
		            <li>
		                <label>
		                    <input type="radio" disabled="disabled" name="answerGroup<?=$i?>" value="1" <?=($value['pq_correct_answer'] == 2) ? 'checked="checked"' : ''?> >
		                    <?=ucfirst($value['pq_option_2'])?>
		                    <? if($value['pq_correct_answer'] == 2):?>
		                    <span class="label label-success pull-right">Correct Answer</span>
		                	<? endif;?>
		                </label>
		            </li>
		        	<? endif;?>
		            <? if(!empty($value['pq_option_3'])) :?>
		            <li>
		                <label>
		                    <input type="radio" disabled="disabled" name="answerGroup<?=$i?>" value="2" <?=($value['pq_correct_answer'] == 3) ? 'checked="checked"' : ''?> >
		                    <?=ucfirst($value['pq_option_3'])?>
		                    <? if($value['pq_correct_answer'] == 3):?>
		                    <span class="label label-success pull-right">Correct Answer</span>
		                	<? endif;?>
		                </label>
		            </li>
		        	<? endif;?>
		            <? if(!empty($value['pq_option_4'])) :?>
		            <li>
		                <label>
		                    <input type="radio" disabled="disabled" name="answerGroup<?=$i?>" value="3" <?=($value['pq_correct_answer'] == 4) ? 'checked="checked"' : ''?> >
		                    <?=ucfirst($value['pq_option_4'])?>
		                    <? if($value['pq_correct_answer'] == 4):?>
		                    <span class="label label-success pull-right">Correct Answer</span>
		                	<? endif;?>
		                </label>
		            </li>
		        	<? endif;?>
		        </ul>
		    </div>
		</div>

	</div>
</div>
<? 
$i++;
}
endif;
?>