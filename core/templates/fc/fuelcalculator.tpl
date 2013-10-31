<h3><?php echo $title ;?></h3>
<form name="fuelcalculator" method="post" action="<?php echo url('/FuelCalculator/Result') ;?>">
<table style="border:2px solid; border-radius:20px;" width="50%" align="center">
<tr><td colspan="2" align="center"><font size="3"><b>Enter Parameters</b></font></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td><b>Select Aircraft:</b></td>
<td align="left">
<select class="search" name="ac" required="required">
<option value="">-Select Aircraft-</option>
<?php
        foreach ($aircrafts as $aircraft)
         { 
          $check = FCalculator::getparamaircraft($aircraft->name);
          if(!$check)
           {
            echo '<option value="" disabled="disabled" title="Params have not been added yet!">'.$aircraft->name.'</option>';
           }
          else
           {
            echo '<option value="'.$check->aircraft.'">'.$check->aircraft.'</option>';
           }
         }  
?>
</select><img title="If aircraft is grayed out then parameters for that aircraft need be added in admin center before it becomes functional" src="<? echo fileurl('/lib/images/info.png') ?>"></td></tr>
<tr><td><b>Enter Distance in NM:</b></td><td align="left"><input required="required" type="text" value="" name="nm"><img title="This field is required to calculate trip fuel" src="<? echo fileurl('/lib/images/info.png') ?>"></td></tr>
<tr><td><b>Enter Altitude In Feet:</b></td><td align="left"><input required="required" type="text" value="" name="ft"><img title="This field is required to calculate trip fuel" src="<? echo fileurl('/lib/images/info.png') ?>"></td></tr>
<tr><td colspan="2"><hr></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Calculate"></td></tr>
</table>
</form>

