
<div class="form-body">
	
	  <table class="table">
	    <tr>
	      <th width="10%">S.No</th>
	      <th>Name</th>
	      <th>Amount</th>
	      <th>Credit</th>
	      <th>Payer ID</th>
	      <th>Payment Status</th>
	      <th>Date</th> 
	    </tr>

	    <?php
	    if(isset($this->_list_data['credit_hisotry']) AND array_filled($this->_list_data['credit_hisotry']))
	    {
	      $i=1;
	      foreach($this->_list_data['credit_hisotry'] as $value)
	      {
	      ?>
	        <tr>
	          <td><?=$i?></td>
	          <td><?=$value['uc_credit_name']?></td>
	          <td><?=price($value['uc_credit_amount'])?></td>
	          <td><?=number_format($value['uc_credits'],2)?></td>
	          <td style="font-size: 11px"><?=$value['uc_paypal_payer_id']?></td>
	          <td><?=ucfirst($value['uc_paypal_payment_status'])?></td>
	          <td><?=date("Y-m-d",strtotime($value['uc_paypal_date']))?></td>
	        </tr>
	      <?php
	        $i++;
	      }
	    }
	    ?>

	  </table>
	  
	
</div>