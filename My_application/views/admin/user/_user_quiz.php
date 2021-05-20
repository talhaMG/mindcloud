<style type="text/css">
	.portlet.green{
		background-color: #fff; 
	}
</style>
<div class="col-md-12 col-xs-12 center">
    <div class="custom_wrap">
<?php if (isset($enrolled_courses) && array_filled($enrolled_courses)){ ?>
	
      <table id="table_id" class="table">
        <thead>
          <tr>                  
            <?php if (isset($activity_headings) && array_filled($activity_headings)): ?>
            <?php foreach ($activity_headings as $key => $value): ?>
              <th style=""><?=$value?></th>
            <?php endforeach ?>
          <?php endif ?>

        </tr></thead>
        <tbody>
         <?php 
         $sno = 1;
         foreach ($enrolled_courses as $key => $value): ?>
           <tr>
             <td><?=$sno?></td>
             <td><img src="<?=get_image($value['tutorial_image'],$value['tutorial_image_path'])?>" style="height: 120px;"></td>
             <td><?=$value['item_product_name']?></td>
             <td><?=count($this->model_tutorial->get_lectures($value['item_product_id']))?></td>
             <td><?=$value['tutorial_identity']?></td>
             <td><?=$value['tutorial_duration']?></td>
             
               
             <td>
              <?php if (isset($value['quiz_status'])){ ?>
                <span>Taken</span>
              <span>(<?=($value['quiz_status'] == 1) ? 'PASS' : 'FAIL'?>)</span>
              <?php }else{?>
               -
                <?}?>
             </td>
             <td>
              <?php if (isset($value['quiz_status']) && $value['quiz_status']  == 1){?>
                <a href="<?=l('certificate/').md5($value['quiz_user_id'].$value['quiz_id']).'/'.$value['quiz_id']?>" class="btn btn-primary"><i class="fa fa-certificate" aria-hidden="true"></i></a>
              <?}else{

              } ?>
              
            </td> 
          </tr>
          <?php $sno++;
        endforeach ?>
      </tbody>
    </table>
<?php }else{?>
	<h1> No Activity</h1>
<?}?>

    
  </div>

</div>