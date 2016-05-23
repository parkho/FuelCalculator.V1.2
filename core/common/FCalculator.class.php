<?php
class FCalculator extends CodonData
{
	public static function findaircraft() 
		{
			$sql = "SELECT DISTINCT name FROM".TABLE_PREFIX."aircraft";
			return DB::get_results($sql);
		}
	
	public static function param($aircraft, $ff, $fh, $fr, $fs, $fa)
		{
			$sql = "INSERT INTO fuel_param (aircraft, flow, hour, frange, speed, alt, date) 
								  VALUES ('$aircraft', '$ff', '$fh', '$fr', '$fs', '$fa', NOW())";
			DB::query($sql);
		}
	
	public static function editparam($ff, $fh, $fr, $fs, $fa, $id)
		{
			$sql = "UPDATE fuel_param SET flow='$ff', hour='$fh', frange='$fr', speed='$fs', alt='$fa', date=NOW() WHERE id='$id'";
			DB::query($sql);
		}
	
	public static function getparam()
		{
			$sql = "SELECT * FROM fuel_param";
			return DB::get_results($sql);
		}
	
	public static function getparamaircraft($aircraft)
		{
			$sql = "SELECT * FROM fuel_param WHERE aircraft='$aircraft'";
			return DB::get_row($sql);
		}
	
	public static function remove($id)
		{
			$sql = "DELETE FROM fuel_param WHERE id='$id'";
			DB::query($sql);
		}
	
	public static function getparambyid($id)
		{
			$sql = "SELECT * FROM fuel_param WHERE id='$id'";
			return DB::get_row($sql);
		}
	
	public static function calculatefuel($aircraft, $distance)
		{
			$sql = "SELECT * FROM fuel_param WHERE aircraft='$aircraft'";
			$fuel = DB::get_row($sql);
			$flow = $fuel->flow;
			$fuelhr = $fuel->hour;
			$speed = $fuel->speed;
			$fueldistance = $distance / 100 ;
			$fuelreserve = $fuelhr * 3/4;
			$fueltaxi = 200;
			$fuelnm = $flow * $fueldistance;
			
			$total = $fuelnm + $fueltaxi + $fuelreserve;
			
			
			return $total;
		}
	
	public static function pilot_pay($pilotid)
		{
			$ft = "SELECT flighttime FROM phpvms_pireps WHERE pilotid = '$pilotid' ORDER BY submitdate DESC";
			$flttme = DB::get_row($ft);
			$hr = intval($flttme->flighttime);
			$mn = ($flttme->flighttime - $hr) * 100;
			$min = ($hr * 60) + $mn;
						
			$fr = "SELECT pilotpay FROM phpvms_pireps WHERE pilotid = '$pilotid' ORDER BY submitdate DESC";
			$payrate = DB::get_row($fr);
			$pay = $payrate->pilotpay / 60;
			
			$pp = "SELECT totalpay FROM phpvms_pilots WHERE pilotid = '$pilotid'";
			$ppay = DB::get_row($pp);
			$pipay = $payrate->totalpay;			
			$ftupdt = $min * $pay;
			$ttalpay = $ftupdt + $pipay;
			$totalpay = ROUND($ttalpay, 2);
			
			$updt = "UPDATE phpvms_pilots SET totalpay = '$totalpay' + totalpay WHERE pilotid = '$pilotid'";
			
			DB::query($updt);		
	
		}
	
	
}
?>
