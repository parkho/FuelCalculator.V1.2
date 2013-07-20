<h3><?php echo $title ?></h3>
<form action="<?php echo url('/FuelCalculator/anotmail') ;?>" method="post">
<table width="100%" style="border:2px solid; border-radius:20px;">
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center"><font size="3"><b>Fuel Calculations For <?php echo $ac ;?></b></font></td></tr>
<tr><td colspan="2"><hr></td></tr>
	<?php 
	if($nm > $range)
		{ 
	?>
			<tr><td align="center" colspan="2"><b>No Aircraft Fuel Data Available!</b></td></tr>
	<?php 
		} 
	elseif($ft > $alt)
		{ 
	?>
	<tr><td align="center" colspan="2"><b>Aircraft can not reach that altitude!</b></td></tr>
	<?php 
		} 
	else 
		{ 
	?>
	<tr>
		<td align="left" width="50%">Range you entered:</td>
		<td align="left" ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nm ;?> nm - <?php echo Round($nm * 1.852,0) ;?> km</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Maximum range for this aircraft:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $range ;?> nm - <?php echo Round($range * 1.852,0) ;?> km</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Fuel per Hour:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fuelhr ;?> kg - <?php echo Round($fuelhr * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Fuel per 100 nm:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fuelflow ;?> kg - <?php echo Round($fuelflow * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Altitude you entered:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ft ;?> ft - <?php echo Round($ft * 0.3048,0) ;?> m</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Maximum altitude for this aircraft:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $alt ;?> ft - <?php echo Round($alt * 0.3048,0) ;?> m</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Estimated Ground Speed(GS) at <?php echo $ft ;?> ft:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $avrg ;?> kt - <?php echo round($avrg * 1.852,0) ;?> km/h</b></td>
	</tr>
	<tr><td align="center" colspan="2"><hr></td></tr>
	<tr>
		<td align="left" width="50%">Total crusing fuel:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Round ($fuelnm,0) ;?> kg - <?php echo Round($fuelnm * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">Plus taxi fuel:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Round ($fltaxi,0) ;?> kg - <?php echo Round($fltaxi * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr>
		<td align="left" width="50%">And 45 Min reserve at destination:</td>
		<td align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Round ($flndg,0) ;?> kg - <?php echo Round($flndg * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr><td align="center" colspan="2"><hr></td></tr>
	<tr>
		<td align="left" ><b>Estimated Fuel Requiered:</b></td>
		<td align="left"><font size="5" color="red"><b>&nbsp;&nbsp;&nbsp;<?php echo Round ($result,0) ;?> kg - <?php echo Round($result * 2.2,0) ;?> lbs</b></td>
	</tr>
	<tr><td align="center" colspan="2"><hr></td></tr>
	<tr><td colspan="2" align="center">
	<a href="<?php echo url('/FuelCalculator') ;?>"><input type="button" value="Back To Fuel Calculator"></a>
	<input onclick="$('#email').slideToggle()" type="button" value="Send To Another Email">
	<a href="<?php echo url('/FuelCalculator/sendmail?ac='.$ac.'&nm='.$nm.'&ft='.$ft) ;?>"><input type="button" value="Email Me The Results"></a>
	</td></tr>
	<tr style="display:none;" id="email">
		<td colspan="2"><div align="center">Enter your email address:
			
			<input type="email" name="email" value="">
			<input type="hidden" name="ac" value="<?php echo $ac ;?>">
			<input type="hidden" name="nm" value="<?php echo $nm ;?>">
			<input type="hidden" name="ft" value="<?php echo $ft ;?>">
			<input type="submit" value="Send"></div>
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	
	
<?php 
}
?>
</table>
</form>