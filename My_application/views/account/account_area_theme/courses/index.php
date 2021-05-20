
    <div class="custom_wrap">
      
    <div class="col-md-12">
        
        <h2> ENROLLED COURSES</h2>
        
      <table id="table_id" class="table table-default">
        <thead>
          <tr>                  
            <?php if (isset($headings) && array_filled($headings)): ?>
            <?php foreach ($headings as $key => $value): ?>
              <th style=""><?=$value?></th>
            <?php endforeach ?>
          <?php endif ?>

        </tr></thead>
        <tbody>
         <?php 
         $sno = 1;
         foreach ($course as $key => $value): ?>
           <tr>
             <td><?=$sno?></td>
             <td><img src="<?=get_image($value['tutorial_image'],$value['tutorial_image_path'])?>" style="height:100px"></td>
             <td><?=$value['item_product_name']?></td>
             <td><?=count($this->model_tutorial->get_lectures($value['item_product_id']))?></td>
             <td><?=$value['tutorial_identity']?></td>
             <td><?=$value['tutorial_duration']?></td>
             <td>
               <a href="javascript:void(0)" class="btn btn-success course_lecture" data-id="<?=$value['item_product_id']?>"><i class="fa fa-book" aria-hidden="true"></i></a>
             </td>
                
             <td>
              <?php if (isset($value['quiz_status'])){ ?>
                <span>Taken</span>
              <span>(<?=($value['quiz_status'] == 1) ? 'PASS' : 'FAIL'?>)</span>
              <?php }else{?>
               <a href="<?=l('quiz-instruction/').md5($value['item_product_id'].$value['item_id']).'/'.$value['item_product_id'].'/'.$value['item_id']?>" class="btn btn-primary" data-id="<?=$value['item_product_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <?}?>
             </td>
             <td>
              <?php if (isset($value['quiz_status']) && $value['quiz_status']  == 1){?>
                <a href="<?=l('certificate/').md5($this->userid.$value['quiz_id']).'/'.$value['quiz_id']?>" class="btn btn-primary"><i class="fa fa-certificate" aria-hidden="true"></i></a>
              <?}else{

              } ?>
              
            </td> 
          </tr>
          <?php $sno++;
        endforeach ?>
      </tbody>
    </table>
    
  </div>
    </div>

<div id="modal_lecture" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lectures</h4>
      </div>
      <div class="modal-body" id="listing">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>





