<h3><?php echo $title ;?></h3>
<form name="fuelcalculator" method="post" action="<?php echo url('/FuelCalculator/Result') ;?>">
<table style="border:2px solid; border-radius:20px;" width="50%" align="center">
<tr><td colspan="2" align="center"><font size="3"><b>Enter Parameters</b></font></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td><b>Select Aircraft:</b></td>
<td align="left">
<select class="search" name="ac">
<option value="">-Select Aircraft-</option>
<?php
        foreach ($aircrafts as $aircraft)
         { 
          $check = FCalculator::getparamaircraft($aircraft->name);
          if(!$check)
           {
            echo '<option value="" disabled="disabled">'.$aircraft->name.' - Params Not Added!</option>';
           }
          else
           {
            echo '<option value="'.$check->aircraft.'">'.$check->aircraft.'</option>';
           }
         }  
?>
</select></td></tr>
<tr><td><b>Enter Distance in NM:</b></td><td align="left"><input type="text" value="" name="nm"></td></tr>
<tr><td><b>Enter Altitude In Feet:</b></td><td align="left"><input type="text" value="" name="ft"></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Calculate"></td></tr>
</table>
</form>


