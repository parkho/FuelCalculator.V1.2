<h3><?php echo $title ;?></h3>
<form method="post" action="<?php echo adminurl('/Fuelcal/param');?>">
<table class="balancesheet" border="0" width="100%">
<tr><td colspan="8" bgcolor="black" align="center"><font color="white" size="3"><b>Aircraft List</b></font></td></tr>
<tr><td colspan="8"><hr></td></tr>
<tr></tr><td align="center" colspan="8"><a id="dialog" class="jqModal" href="<?php echo SITE_URL?>/admin/action.php/Fuelcal/addparam"><input type="button" Value="Set Parameters"></a></td></tr>
<tr>
	<th align="center">id</th>
	<th align="center">Aircraft Name</th>
	<th align="center">Fuel Flow</th>
	<th align="center">Fuel / Hour</th>
	<th align="center">Range</th>
	<th align="center">Avereage Speed</th>
	<th align="center">Maximum Altitude</th>
	<th align="center">Option</th>
<tr>
<?php
if(!$params)
	{
?>
	<tr><td colspan="8" align="center"><strong>No Parameters Have Been Added Yet!</strong></td></tr>
<?php
	}
else
	{
	foreach($params as $param)
		{
?>
			<tr>
				<td align="center"><?php echo $param->id ;?></td>
				<td align="center"><?php echo $param->aircraft ;?></td>
				<td align="center"><?php echo $param->flow ;?></td>
				<td align="center"><?php echo $param->hour ;?></td>
				<td align="center"><?php echo $param->frange ;?></td>
				<td align="center"><?php echo $param->speed ;?></td>
				<td align="center"><?php echo $param->alt ;?></td>
				<td align="center"><a href="<?php echo adminurl('/Fuelcal/remove/'.$param->id) ;?>"><input type="button" value="Remove" onclick="doublecheck()"></a>
				<a id="dialog" class="jqModal" href="<?php echo SITE_URL?>/admin/action.php/Fuelcal/editparam/<?php echo $param->id ;?>"><input type="button" value="Edit"></a></td>
			</tr>
<?php
		}
	}
?>


</table>
</form>
<script type="text/javascript">
function doublecheck()
{
	var answer = confirm("Are you sure you want to remove parameters for this Aircraft?")
	if (answer==true) 
	{
		return true;
	}
	else
	{
		return false;
	}
	
	return false;
}
</script>
