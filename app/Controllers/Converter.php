<?php

namespace App\Controllers;

class Converter extends BaseController
{
	protected $helpers = ['site'];

	public function __construct()
        {
            helper(['url', 'form', 'site']);
        }

    public function converter()
     {
     	$prefix        = "Nexladder Web Tutorials -";
     	$page_title    =  "$prefix Best online tool to provides all types of conversion units.";
		$page_keywords =  "length converter, weight converter, volume converter, area converter, temperture converter, speed converter, angle converter, bytes/bits converter, density converter, electric current converter, energy converter, force converter, fuel converter, mass converter, power converter, pressure converter, time converter, astronmical converter, frequency converter"; 
		$page_description = "Unit Conversion Tools - provides all types of conversion tools such as length converter, weight converter, volumen converter etc.";

     	return view('Frontend/Converter/Converter', compact('page_title', 'page_keywords', 'page_description'));
     }

	public function unit($converter = '')
	  {  
	  	 $prefix = "Nexladder Web Tutorials -";

	     switch($converter)
	       {
	       		case 'length-converter':
	       			$units = LENGTH_CONVERTER;
	       			$page_title    =  "$prefix Best Online tool to Convert Length and Supports all Units. i.e Km to Meter, Mile to centimeter ";
	  	 			$page_keywords =  "length converter uk, length unit converter, length measurement converter, length convert, converter length, unit converter length, length converter table, convert length, length converter download, length convertion, focal length converter, free length converter, metric length converter, metric converter length, length units converter, unit length converter, length converters, diameter to length converter, length converter chart, human length converter"; 
	  	 			$page_description = "Length Unit Conversion - converts meter, foot, inch, yard, kilometer, mile, nautical mile, light-year etc";
	       			
	       		break;

	       		case 'weight-converter':
	       			$units = WEIGHT_CONVERTER;
	       			$page_title    =  "$prefix Best Weight Conversion Online tool to Convert Weight and Supports all Units. i.e kilogram to pound, pound to ounce";
	  	 			$page_keywords =  "weight conversion, weight unit converter, unit converter weight, weight units converter, unit converter, units convert, convert weight units"; 
	  	 			$page_description = "Weight and Mass Unit Conversion - converts kilogram, pound, gram, tonne, ton, ounce, newton etc";
	       			
	       		break;

	       		case 'volume-converter':
	       			$units = VOLUME_CONVERTER;
	       			$page_title    =  "$prefix Best Online tool to Convert Volume and Supports all Units. i.e liter to gallon, pint to quart";
	  	 			$page_keywords =  "volume conversion, conversion of volume, volume conversion calculator, conversion calculator volume, conversion volume, conversion for volume, volume conversions, conversion unit of volume, volume to volume conversion, volume unit conversion calculator, conversion units of volume, conversion in volume, conversion of units of volume, weight to volume conversion, volume to mass conversion calculator, length to volume conversion calculator, air volume conversion calculator, volume conversion calculator free, conversions volume";
	  	 			$page_description =  "Volume Unit Conversion - converts liter, cubic meter, gallon, quart, pint, bushel, barrel etc";
	       			
	       		break;

	       		case 'area-converter':
	       			$units = AREA_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Area and Supports all Units. i.e area to hectare, rood to homestead";
	  	 			$page_keywords =  "converts square meter, square foot, square mile, acre, hectare";
	  	 			$page_description =  "Area Unit Conversion - converts square meter, square foot, square mile, acre, hectare etc";
	       		break;


	       		case 'temperature-converter':
	       			$units = TEMPERATURE_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Temperature and Supports all Units. i.e celsius to fahrenheit, fahrenheit to kelvin";
	  	 			$page_keywords =  "temperature, temperture, celsius, celcious, fahrenheit, haranheit, kelvin";
	  	 			$page_description =  "Convert temperatures to and from celsius, fahrenheit, and kelvin.";

	       			
	       		break;

	       		case 'speed-converter':
	       			$units = SPEED_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Speed and Supports all Units. i.e kilometers/hour to kilometers/second, miles/minute to miles/second";
	  	 			$page_keywords =  "speed, kilometer/hour, kilometer/minute, mile/hour, feet/hour, yard, light year";
	  	 			$page_description =  "Convert speed to and from kilometer, centimeter,feet per hours/minutes etc.";

	       			
	       		break;

	       		case 'angle-converter':
	       			$units = ANGLE_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Angle and Supports all Units. i.e degree to mil, mil to circle";
	  	 			$page_keywords =  "degree, mil, circle, radian, sign, turn";
	  	 			$page_description =  "Convert angle to and from degreen, mil, circle, turn etc.";
	       			
	       		break;

	       		case 'bytes-converter':
	       			$units = BYTES_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Bytes/Bits and Supports all Units. i.e bits to bytes, megabytes to gigabytes, gigabytes to petabytes";
	  	 			$page_keywords =  "bits, bytes, kilobytes, megabytes, gigabytes, petabytes";
	  	 			$page_description =  "Convert bits/bytes to and from kb, mb, gb, tb, pd etc.";

	       		
	       		break;

	       		case 'density-converter':
	       			$units = DENSITY_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Density and Supports all Units. i.e converts to gram, gram to cubic, cubic to meter";
	  	 			$page_keywords =  "converts, gram, per, cubic ,meter, kilogram/liter";
	  	 			$page_description =  "Convert bits/bytes to and from kb,mb,gb,tb,pd etc.";

	       			
	       		break;

	       		case 'electric-current-converter':
	       			$units = ELECRIC_CURRENT_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Electric Current Converter and Supports all Units. i.e abampere to franklin, franklin to gilbert, gilbert to milliampere";
	  	 			$page_keywords =  "converts,abampere, franklin,gilbert, milliampere, teraampere";
	  	 			$page_description =  "Electric Current Conversion - converts abampere, franklin,gilbert, milliampere, teraampere...";	
	       			
	       		break;

	       		case 'energy-converter':
	       			$units = ENERGY_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Energy Converter and Supports all Units. i.e calories to Btu, Btu to gigajoules, gigajoules to joules";
	  	 			$page_keywords =  "converts calories ,Btu ,gigajoules , joules ,therms";
	  	 			$page_description =  "Energy Unit Conversion - converts calories ,Btu ,gigajoules , joules ,therms ...";	
	       			
	       		break;

	       		case 'force-converter':
	       			$units = FORCE_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Force Converter and Supports all Units. i.e dyne to newton, newton to pond, pond to gram-force";
	  	 			$page_keywords =  "converts dyne, gram-force, newton, pond";
	  	 			$page_description =  "Force Unit Conversion - converts dyne, gram-force, newton, pond...";	
	       			
	       		break;

	       		case 'fuel-converter':
	       			$units = FUEL_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Fuel Converter and Supports all Units. i.e gallons to miles, miles to liters, liters to kilometer";
	  	 			$page_keywords =  "converts gallons ,miles, liters, kilometer";
	  	 			$page_description =  "Fuel Unit Conversion - converts gallons ,miles, liters, kilometer...";

	       			
	       		break;

	       		case 'mass-converter':
	       			$units = MASS_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Mass Converter and Supports all Units. i.e carats to cental, cental to kilograms, kilograms to Earth masses";
	  	 			$page_keywords =  "converts carats ,cental, Earth masses, kilograms";
	  	 			$page_description =  "Mass Unit Conversion - converts carats ,cental, Earth masses, kilograms ...";
	       			
	       		break;

	       		case 'power-converter':
	       			$units = POWER_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Power Converter and Supports all Units. i.e watt to kilowatt, kilowatt to BTU per hour, BTU per hour to calories per second";
	  	 			$page_keywords =  "converts watt, kilowatt, BTU per hour, calories per second, horsepower";
	  	 			$page_description =  "Power Unit Conversion - converts watt, kilowatt, BTU per hour, calories per second, horsepower...";

	       		break;

	       		case 'pressure-converter':
	       			$units = PRESSURE_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Pressure Converter and Supports all Units. i.e pascal to bar, bar to millibar, millibar to torr, torr to pounds per square inch";
	  	 			$page_keywords =  "converts pascal, bar, millibar, torr, pounds per square inch";
	  	 			$page_description =  "Pressure Unit Conversion - converts pascal, bar, millibar, torr, pounds per square inch...";
	       			
	       		break;

	       		case 'time-converter':
	       			$units = TIME_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Time Converter and Supports all Units. i.e second to minute, minute to hour, hour to day, day to tropical year";
	  	 			$page_keywords =  "converts second, minute, hour, day, millisecond, tropical year";
	  	 			$page_description =  "Time Unit Conversion - converts second, minute, hour, day, millisecond, tropical year...";
	       			
	       		break;

	       		case 'astronomical-converter':
	       			$units = ASTRONOMICAL_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Time Astronomical and Supports all Units. i.e astronmical unit to A.U., A.U. to au, au to light-year";
	  	 			$page_keywords =  "astronmical unit, A.U., au, light-year, light years, parsec";
	  	 			$page_description =  "Convert between several astronomical units.";

	       			
	       		break;

	       		case 'frequency-converter':
	       			$units = FREQUENCY_CONVERTER;

	       			$page_title    =  "$prefix Best Online tool to Convert Time Astronomical and Supports all Units. i.e hertz to cycles, cycles to second, second to circular frequency, circular frequency to angular velocity, angular velocity to velocity, kilohertz to megahertz";
	  	 			$page_keywords =  "frequency, hertz, cycles, second, circular frequency, angular velocity, revolutions, RPM, Hz, kilohertz, megahertz";
	  	 			$page_description =  "Convert between many different frequency standards";

	       			
	       		break;
	       }

	     $js    = UNIT_CONVERTER_JS;
		 return view('Frontend/Converter/Unit', compact('units', 'js', 'converter', 'page_title', 'page_keywords', 'page_description'));
	  }	

}