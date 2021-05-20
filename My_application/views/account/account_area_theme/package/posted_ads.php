<style type="text/css">
  .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: #f31919;
    color: #fff;
}
.btn-gr{
background-color: #4CAF50;
   cursor: default;
}
</style>
<div class="aboutForm">


  <div class="col-md-8 col-xs-8 center">
    <div class="custom_wrap">

      <h2> Advertiments History</h2>


      <table id="table_id" class="table">
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
     // debug($jobs);
           $sno = 1;
           foreach ($ads as $key => $value): ?>
           <tr>
             <td><?=$sno?></td>
             <td><?=$value['advertisment_title']?></td>
             <!-- <td><?=ucfirst($this->model_ads_country->get_country_name($value['advertisment_country']))?></td> -->
             <!-- <td><?=$value['advertisment_city']?></td> -->
             <td><?=$value['advertisment_address']?></td>
             <td><?=$value['advertisment_miles']?></td>
             <td><?=csl_date($value['advertisment_createdon'],'F d Y')?></td>
             <td>
              <?=($value['advertisment_status'] == 1) ? 'OPEN' : 'CLOSE'?>
            </td>
            <td>
              <?=$this->model_advertisment->get_payment_status($value['advertisment_payment_status'])?>
            </td>
            <td>
              <?php if ($value['advertisment_payment_status'] != 1){ ?>
            <a href="<?=$value['continue_url']?>" class="btn">Complete Request</a>
              <?php }else{?>
            <a href="javascript:void(0)" class="btn btn-gr">Completed</a>
              <?} ?>
            </td>
            <td><a target='_blank' href="<?=l('account/advertisment/add/'.$value['advertisment_id'])?>"><i class="fa fa-edit fa_dt"></i></a></td>
          </tr>
          <?php $sno++;
          endforeach ?>
        </tbody>
      </table>



    </div>

  </div>





</div>


<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>





