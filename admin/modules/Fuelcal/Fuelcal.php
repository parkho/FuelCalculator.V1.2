<?php
class fuelcal extends CodonModule
{
	public function NavBar()
        {
                echo '<li><a href="'.SITE_URL.'/admin/index.php/fuelcal">Fuel Calculator Params</a></li>';
				$this->set('sidebar', '/fc/fuel_help.php');
        }
		
	public function index() 
		{
			$this->set('title','Fuel Calculator Parameters Setting');
            $this->set('aircrafts', FCalculator::findaircraft());
            $this->set('params', FCalculator::getparam());
            $this->show('/fc/fuel_param.php');
		}
	
	public function addparam()
		{
			$this->set('aircrafts', FCalculator::findaircraft());
			$this->set('title', 'Add Aircraft Parameters');
			$this->set('action', 'paramadd');
			$this->render('/fc/aircraft_param.php');
		}
	
	public function editparam($id)
		{
			$this->set('aircrafts', FCalculator::findaircraft());
			$this->set('title', 'Edit Aircraft Parameters');
			$this->set('action', 'paramedit');
			$result = FCalculator::getparambyid($id);
			$this->set('aircraft', $result->aircraft);
			$this->set('ff', $result->flow);
			$this->set('fh', $result->hour);
			$this->set('fr', $result->frange);
			$this->set('fa', $result->alt);
			$this->set('fs', $result->speed);
			$this->set('id', $result->id);
			$this->render('/fc/edit_param.php');
		}
	
	public function param()
		{
			$aircraft = $this->post->aircraft;
			$ff = $this->post->ff;
			$fh = $this->post->fh;
			$fr = $this->post->fr;
			$fa = $this->post->fa;
			$fs = $this->post->fs;
			if($aircraft == '' || $ff == '' || $fh == '' || $fr == '' || $fa == '' || $fs == '')
				{
					$this->set('message', 'All Fields Are Required.');
					$this->render('/core_error.tpl');
					$this->set('aircrafts', FCalculator::findaircraft());
					$this->set('params', FCalculator::getparam());
					$this->render('/fc/fuel_param.php');
					return;
				}
			
			FCalculator::param($aircraft, $ff, $fh, $fr, $fs, $fa);
			
			
			$this->set('message', 'Parameters for '.$aircraft.' Were Added.');
			$this->render('/fc/core_success.php');
			$this->set('aircrafts', FCalculator::findaircraft());
			$this->set('params', FCalculator::getparam());
			$this->render('/fc/fuel_param.php');
		}
	
	public function paramedit()
		{
			$aircraft = $this->post->aircraft;
			$ff = $this->post->ff;
			$fh = $this->post->fh;
			$fr = $this->post->fr;
			$fa = $this->post->fa;
			$fs = $this->post->fs;
			$id = $this->post->id;
			if($aircraft == '' || $ff == '' || $fh == '' || $fr == '' || $fa == '' || $fs == '')
				{
					$this->set('message', 'All Fields Are Required.');
					$this->render('/core_error.tpl');
					$this->set('aircrafts', FCalculator::findaircraft());
					$this->set('params', FCalculator::getparam());
					$this->render('/fc/fuel_param.php');
					return;
				}
			
			FCalculator::editparam($ff, $fh, $fr, $fs, $fa, $id);
			
			
			$this->set('message', 'Parameters for '.$aircraft.' Were Updated.');
			$this->render('/fc/core_success.tpl');
			$this->set('aircrafts', FCalculator::findaircraft());
			$this->set('params', FCalculator::getparam());
			$this->render('/fc/fuel_param.php');
		}
	
	public function remove($id)
		{
						
			if($id == '')
				{
					$this->set('message', 'No Id Passed.');
					$this->render('/core_error.tpl');
					$this->set('aircrafts', FCalculator::findaircraft());
					$this->set('params', FCalculator::getparam());
					$this->render('/fc/fuel_param.php');
					return;
				}
			
			FCalculator::remove($id);
			
			
			$this->set('message', 'Parameters Were Removed Successfully.');
			$this->render('/fc/core_success.tpl');
			$this->set('aircrafts', FCalculator::findaircraft());
			$this->set('params', FCalculator::getparam());
			$this->render('/fc/fuel_param.php');
		}
			
	
}
?>