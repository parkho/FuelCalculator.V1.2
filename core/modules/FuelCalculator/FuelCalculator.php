<?php
class FuelCalculator extends CodonModule
{
	public function index() 
		{
			$revision = trim(file_get_contents(CORE_PATH.'/version'));
			if($revision != 'simpilot 5.5.2')
				{
					echo '<center>phpVMS Version Installed Is Not Compatible With This Module!</center><br />';
					echo '<center>phpVMS Version Installed: '.$revision.'</center>';
				}
			else
			{
				$this->set('title','Fuel Calculator');
				$this->set('aircrafts', FCalculator::findaircraft());
				$this->show('/fc/fuelcalculator.php');
			}
		}
	
	public function result()
		{
			$ac = $this->post->ac;
			$nm = $this->post->nm;
			$ft = $this->post->ft;
			$param = FCalculator::getparamaircraft($ac);
			$fuelflow = $param->flow;
			$fuelhr = $param->hour;
			$avrg = $param->speed;
			$fldis = $nm / 100;
			$fuelnm = $fuelflow * $fldis;
			$fltaxi = 200;
			$flndg = $fuelhr * 3/4;
			$result = $fuelnm + $flndg + $fltaxi;
			
			$this->set('nm', $nm);
			$this->set('ft', $ft);
			$this->set('ac', $ac);
			$this->set('range', $param->frange);
			$this->set('alt', $param->alt);
			$this->set('fuelhr', $fuelhr);
			$this->set('fuelnm', $fuelnm);
			$this->set('fltaxi', $fltaxi);
			$this->set('flndg', $flndg);
			$this->set('avrg', $avrg);
			$this->set('result', $result);
			$this->set('fuelflow', $fuelflow);
			$this->set('title', 'Fuel Calculator');
			$this->render('/fc/results.php');
		}
	
	public function anotmail()
		{
			$ac = $this->post->ac;
			$nm = $this->post->nm;
			$ft = $this->post->ft;
			$param = FCalculator::getparamaircraft($ac);
			$fuelflow = $param->flow;
			$fuelhr = $param->hour;
			$avrg = $param->speed;
			$fldis = $nm / 100;
			$fuelnm = $fuelflow * $fldis;
			$fltaxi = 200;
			$flndg = $fuelhr * 3/4;
			$result = $fuelnm + $flndg + $fltaxi;
			
			$this->set('nm', $nm);
			$this->set('ft', $ft);
			$this->set('ac', $ac);
			$this->set('range', $param->frange);
			$this->set('alt', $param->alt);
			$this->set('fuelhr', $fuelhr);
			$this->set('fuelnm', $fuelnm);
			$this->set('fltaxi', $fltaxi);
			$this->set('flndg', $flndg);
			$this->set('avrg', $avrg);
			$this->set('result', $result);
			$this->set('fuelflow', $fuelflow);
			$this->set('title', 'Fuel Calculator');
			
			
			Template::Set('nm', $nm);
			Template::Set('ft', $ft);
			Template::Set('ac', $ac);
			Template::Set('range', $param->frange);
			Template::Set('alt', $param->alt);
			Template::Set('fuelhr', $fuelhr);
			Template::Set('fuelnm', $fuelnm);
			Template::Set('fltaxi', $fltaxi);
			Template::Set('flndg', $flndg);
			Template::Set('avrg', $avrg);
			Template::Set('result', $result);
			Template::Set('fuelflow', $fuelflow);
			Template::Set('title', 'Fuel Calculator');
			
			
			$email = $this->post->email;
			$subject = 'Fuel Calculation Results For '.$ac;
			$message = Template::Get('/fc/fc_mail.php', true);
			Util::SendEmail($email, $subject, $message);
			
			$this->set('message', 'Email Results For '.$ac.' Was Sent To '.$email);
			$this->render('/fc/core_success.tpl');
			$this->render('/fc/results.php');
		}
		
	
	public function sendmail()
		{
			$ac = $this->get->ac;
			$nm = $this->get->nm;
			$ft = $this->get->ft;
			$param = FCalculator::getparamaircraft($ac);
			$fuelflow = $param->flow;
			$fuelhr = $param->hour;
			$avrg = $param->speed;
			$fldis = $nm / 100;
			$fuelnm = $fuelflow * $fldis;
			$fltaxi = 200;
			$flndg = $fuelhr * 3/4;
			$result = $fuelnm + $flndg + $fltaxi;
			
			$this->set('nm', $nm);
			$this->set('ft', $ft);
			$this->set('ac', $ac);
			$this->set('range', $param->frange);
			$this->set('alt', $param->alt);
			$this->set('fuelhr', $fuelhr);
			$this->set('fuelnm', $fuelnm);
			$this->set('fltaxi', $fltaxi);
			$this->set('flndg', $flndg);
			$this->set('avrg', $avrg);
			$this->set('result', $result);
			$this->set('fuelflow', $fuelflow);
			$this->set('title', 'Fuel Calculator');
			
			
			Template::Set('nm', $nm);
			Template::Set('ft', $ft);
			Template::Set('ac', $ac);
			Template::Set('range', $param->frange);
			Template::Set('alt', $param->alt);
			Template::Set('fuelhr', $fuelhr);
			Template::Set('fuelnm', $fuelnm);
			Template::Set('fltaxi', $fltaxi);
			Template::Set('flndg', $flndg);
			Template::Set('avrg', $avrg);
			Template::Set('result', $result);
			Template::Set('fuelflow', $fuelflow);
			Template::Set('title', 'Fuel Calculator');
			
			
			$email = Auth::$userinfo->email;
			$subject = 'Fuel Calculation Results For '.$ac;
			$message = Template::Get('/fc/fc_mail.php', true);
			Util::SendEmail($email, $subject, $message);
			
			$this->set('message', 'Email Results For '.$ac.' Was Sent.');
			$this->render('/fc/core_success.tpl');
			$this->render('/fc/results.php');
		}
}
?>