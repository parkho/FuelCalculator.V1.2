<h3><?php echo $title ;?></h3>
<form method="post" action="<?php echo adminurl('/Fuelcal/param');?>">
<table border="0" "width="100%">
<tr><td><b>Select Aircraft:</b></td><td align="left">
<select class="search" name="aircraft">
    <option value="">-Select Aircraft-</option>
    <?php
        foreach ($aircrafts as $aircraft)
         { 
			$check = FCalculator::getparamaircraft($aircraft->name);
			if($check)
				{
					continue;
				}
			echo '<option value="'.$aircraft->name.'">'.$aircraft->name.'</option>';
         }  
    ?>
</select></td></tr>
<tr><td><b>Enter Fuel Flow:</b></td><td align="left"><input type="text" value="" name="ff"></td></tr>
<tr><td><b>Enter Fuel Per Hour In Feet:</b></td><td align="left"><input type="text" value="" name="fh"></td></tr>
<tr><td><b>Enter Aircraft Range:</b></td><td align="left"><input type="text" value="" name="fr"></td></tr>
<tr><td><b>Enter Maximum Altitude:</b></td><td align="left"><input type="text" value="" name="fa"></td></tr>
<tr><td><b>Enter Averege Speed in NM:</b></td><td align="left"><input type="text" value="" name="fs"></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value=" Add Params"></td></tr>
</table>
</form>