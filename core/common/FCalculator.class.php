<?php
class FCalculator extends CodonData
{
	public function findaircraft() 
		{
			$sql = "SELECT * FROM".TABLE_PREFIX."aircraft";
			return DB::get_results($sql);
		}
	
	public function param($aircraft, $ff, $fh, $fr, $fs, $fa)
		{
			$sql = "INSERT INTO fuel_param (aircraft, flow, hour, frange, speed, alt, date) 
								  VALUES ('$aircraft', '$ff', '$fh', '$fr', '$fs', '$fa', NOW())";
			DB::query($sql);
		}
	
	public function editparam($ff, $fh, $fr, $fs, $fa, $id)
		{
			$sql = "UPDATE fuel_param SET flow='$ff', hour='$fh', frange='$fr', speed='$fs', alt='$fa', date=NOW() WHERE id='$id'";
			DB::query($sql);
		}
	
	public function getparam()
		{
			$sql = "SELECT * FROM fuel_param";
			return DB::get_results($sql);
		}
	
	public function getparamaircraft($aircraft)
		{
			$sql = "SELECT * FROM fuel_param WHERE aircraft='$aircraft'";
			return DB::get_row($sql);
		}
	
	public function remove($id)
		{
			$sql = "DELETE FROM fuel_param WHERE id='$id'";
			DB::query($sql);
		}
	
	public function getparambyid($id)
		{
			$sql = "SELECT * FROM fuel_param WHERE id='$id'";
			return DB::get_row($sql);
		}
	
	
}
?>
