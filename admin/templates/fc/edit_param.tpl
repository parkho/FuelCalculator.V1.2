<h3><?php echo $title ;?></h3>
<form method="post" action="<?php echo adminurl('/Fuelcal/paramedit');?>" onsubmit="doublecheck()" >
<table border="0" "width="100%">
<tr><td><b>Aircraft:</b></td><td align="left"><?php echo $aircraft ;?><input type="hidden" value="<?php echo $aircraft ;?>" name="aircraft"><input name="id" type="hidden" value="<?php echo $id ;?>"></td></tr>
<tr><td><b>Enter Fuel Flow:</b></td><td align="left"><input type="text" value="<?php echo $ff ;?>" name="ff"></td></tr>
<tr><td><b>Enter Fuel Per Hour In Feet:</b></td><td align="left"><input type="text" value="<?php echo $fh ;?>" name="fh"></td></tr>
<tr><td><b>Enter Aircraft Range:</b></td><td align="left"><input type="text" value="<?php echo $fr ;?>" name="fr"></td></tr>
<tr><td><b>Enter Maximum Altitude:</b></td><td align="left"><input type="text" value="<?php echo $fa ;?>" name="fa"></td></tr>
<tr><td><b>Enter Averege Speed in NM:</b></td><td align="left"><input type="text" value="<?php echo $fs ;?>" name="fs"></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value=" Edit Params" ></td></tr>
</table>
</form>
<script type="text/javascript">
function doublecheck()
{
	var answer = confirm("Are you sure you want to edit param for this Aircraft?")
	return answer;
}
</script>