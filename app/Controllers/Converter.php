<?php

namespace App\Controllers;

class Converter extends BaseController
{
	protected $helpers = ['site'];

	public function __construct()
        {
            helper(['url', 'form', 'site']);
        }

	public function unit($converter = '')
	  {  
	     switch($converter)
	       {
	       		case 'length-converter':
	       			$units = LENGTH_CONVERTER;
	       			
	       		break;

	       		case 'weight-converter':
	       			$units = WEIGHT_CONVERTER;
	       			
	       		break;

	       		case 'volume-converter':
	       			$units = VOLUME_CONVERTER;
	       			
	       		break;

	       		case 'area-converter':
	       			$units = AREA_CONVERTER;
	       			
	       		break;


	       		case 'temperature-converter':
	       			$units = TEMPERATURE_CONVERTER;
	       			
	       		break;

	       		case 'speed-converter':
	       			$units = SPEED_CONVERTER;
	       			
	       		break;

	       		case 'angle-converter':
	       			$units = ANGLE_CONVERTER;
	       			
	       		break;

	       		case 'bytes-converter':
	       			$units = BYTES_CONVERTER;
	       			
	       		break;

	       		case 'density-converter':
	       			$units = DENSITY_CONVERTER;
	       			
	       		break;

	       		case 'electric-current-converter':
	       			$units = ELECRIC_CURRENT_CONVERTER;
	       			
	       		break;

	       		case 'energy-converter':
	       			$units = ENERGY_CONVERTER;
	       			
	       		break;

	       		case 'force-converter':
	       			$units = FORCE_CONVERTER;
	       			
	       		break;

	       		case 'fuel-converter':
	       			$units = FUEL_CONVERTER;
	       			
	       		break;

	       		case 'mass-converter':
	       			$units = MASS_CONVERTER;
	       			
	       		break;

	       		case 'power-converter':
	       			$units = POWER_CONVERTER;
	       		break;

	       		case 'pressure-converter':
	       			$units = PRESSURE_CONVERTER;
	       			
	       		break;

	       		case 'time-converter':
	       			$units = TIME_CONVERTER;
	       			
	       		break;

	       		case 'astronomical-converter':
	       			$units = ASTRONOMICAL_CONVERTER;
	       			
	       		break;

	       		case 'frequency-converter':
	       			$units = FREQUENCY_CONVERTER;
	       			
	       		break;
	       }

	     $js    = UNIT_CONVERTER_JS;
		 return view('Frontend/Converter/Unit', compact('units', 'js', 'converter'));
	  }	

}