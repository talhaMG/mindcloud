	<html>
        <body>
        <div align="center">
             <div style="max-width: 680px; min-width: 500px; border: 2px solid #e3e3e3; border-radius:5px; margin-top: 20px">   
        	    <div style="background: #000">
        	        <img src="<?=get_image($this->layout_data['logo']['logo_image'],$this->layout_data['logo']['logo_image_path'])?>" width="250" alt="<?=g('site_name')?>" border="0" style='width: 17%; padding: 15px; margin: 0px auto; display: table;' />
        	    </div> 
        	    <div  style="background-color: #fbfcfd; border-top: thick double #cccccc; text-align: left;">
        	        <div style="margin: 30px;">
             	        <p>
                            <?php
                            if(isset($msg)) {
                                echo $msg;
                            }
                            else
                            {
                            ?>
                     	        Dear {CANDIDATE_NAME},<br> <br>
                     	        Welcome to <?=g('site_name')?>!<br> <br>
                     	        {YOUR MESSAGE HERE}<br><br>
                            <?php
                            }
                            ?>
             	        </p>


                        <? if(isset($form_input) && is_array($form_input)) {?>
                        <table style="text-align: left;">
                            <?if($title){?>
                            <tr>
                                <td colspan="2" <?=$body_att1?>>
                                    <h3 style="color: rgb(25, 98, 203); font-size: 25px; padding: 0px; margin: 0px;">
                                        <?=$title?>:
                                    </h3>
                                </td>
                            </tr>
                            <?}
                            else
                            {
                            ?>
                            <tr>
                                <td colspan="2" <?=$body_att1?>>
                                    <h3 style="color: rgb(25, 98, 203); font-size: 25px; padding: 0px; margin: 0px;">
                                        User Input:
                                    </h3>
                                </td>
                            </tr>
                            <? } ?>
                        <?php
                        
                            foreach ($form_input as $key => $value) {?>
                                <tr>
                                    <th><?=ucfirst(str_replace("_", " ", $key))?></th>
                                    <td> :
                                        <?
                                            if(is_array($value))
                                            {
                                                foreach ($value as $sub_value) 
                                                {
                                                    echo $sub_value."<br/>";
                                                }
                                            }
                                            else
                                                echo $value;
                                        ?>
                                    </td>
                                </tr>
                            <?}?>
                        </table>
             	        <br>  <br>
                        <? } ?>



             	       
             	            Please Contact <?=g('site_name')?> if you have any questions<br><br>
                            Once again, thank you!!!<br><br>
                        
             	        <div style="text-align: Right;">
             	            With warm regards,<br>
                            <?=g('site_name')?> Team
             	        </div>
             	    </div>
        	    </div>   
        	</div>   
    	</div>
  	    <center><?=date('Y')?> © <?=g('site_name')?>. ALL Rights Reserved.</center>
    	</body>
	</html>	
