<style type="text/css">
	table tr,table,table tr td{
		border:1px solid;
	}
	table tr td{
		padding:5px 20px 5px 20px;
	}
	img{width:100px;}
</style>
<table>
<?php
	for($i=1;$i<25;$i++)
	{
	?>
		<tr style="background:<?=($i % 2 ? '#CADFF9' : '#7FC0F9');?>">
			<td><?=$i; //echo dirname(__FILE__)?></td>
			<td><img src="//home/checkouts/dev/tkd/arganix/assets/tkd_media/2014/11/17.jpg"></td>
			<td>abcd</td>
			<td>abcd</td>
			<td>abcd</td>
			<td>abcd</td>
			<td>abcd</td>
			<td>abcd</td>
			<td>abcd</td>
		</tr>
	<?php
	}
?>
</table>