<?php

if($_SERVER['SERVER_NAME'] == "dev.nexladder.local")
 {
    defined('DOC_ROOT_BACKEND_CSS') || define('DOC_ROOT_BACKEND_CSS', '/Users/user/nexladderweb/public/backend/assets/css/');
    defined('DOC_ROOT_BACKEND_JS')  || define('DOC_ROOT_BACKEND_JS', '/Users/user/nexladderweb/public/backend/assets/js/');
 }
 else
  {
        defined('DOC_ROOT_BACKEND_CSS') || define('DOC_ROOT_BACKEND_CSS', '/var/www/html/nexladderweb/public/backend/assets/css/');
        defined('DOC_ROOT_BACKEND_JS')  || define('DOC_ROOT_BACKEND_JS', '/var/www/html/nexladderweb/public/backend/assets/js/');
  }

/* close */


define('PAGINATION_PER_PAGE') || define('PAGINATION_PER_PAGE', 15);


/* CONVERTER */
define('LENGTH_CONVERTER') || define('LENGTH_CONVERTER', ["angstrom","astronomical unit (au)","centimeter (cm)","chain","decimeter (dm)","fathom","foot (ft)","furlong","inch (in)","kilometer (km)","league","light year","meter (m)","mile (mi)","millimeter (mm)","micron (μ)","nanometer (nm)","nautical mile","parsec","rod","yard (yd)"]);


define('UNIT_CONVERTER_JS') || define('UNIT_CONVERTER_JS', "unitconverter.js");



define('WEIGHT_CONVERTER') || define('WEIGHT_CONVERTER', ["atomic mass unit (amu)","carat (metric)","cental","centigram","dekagram","dram (dr)","grain (gr)","gram (g)","hundredweight (UK)","kilogram (kg)","microgram (μg)","milligram (mg)","newton (Earth)","ounce (oz)","pennyweight (dwt)","pound (lb)","quarter","stone","ton (UK, long)","ton (US, short)","tonne (t)","troy ounce"]);


define('VOLUME_CONVERTER') || define('VOLUME_CONVERTER', ["barrel (petroleum) (bbl, bo)","bushel (UK) (bu)","bushel (US dry) (bu)","centiliter (cl)","cubic centimeter (cc, cm^3)","cubic decimeter (dm^3)","cubic foot (ft^3, cu ft)","cubic inch (in^3, cu in)","cubic meter (m^3)","cubic millimeter (mm^3)","cubic yard (yd^3)","dekaliter (dal)","fluid dram (fl dr)","fluid ounce (fl oz)","fluid ounce (UK) (fl oz)","gallon (fluid) (gal)","gallon (UK) (gal)","gill (gi)","hectoliter (hl)","liter (l)","microliter (μl)","milliliter (ml)","minim (min)","peck (US dry) (pk)","pint (fluid) (pt)","pint (UK) (pt)","pint (US dry) (pt)","quart (fluid) (qt)","quart (UK) (qt)","quart (US dry) (qt)"]);


define('AREA_CONVERTER') || define('AREA_CONVERTER', ["acre","are (a)","barn (b)","hectare (ha)","homestead","rood","square centimeter (cm^2)","square foot (ft^2)","square inch (in^2)","square kilometer (km^2)","square meter (m^2)","square mile","square millimeter (mm^2)","square rod","square yard (yd^2)","township (twp)"]);


define('SPEED_CONVERTER') || define('SPEED_CONVERTER', ["centimeters/minute","centimeters/second","feet/hour","feet/minute","feet/second","inches/minute","inches/second","kilometers/hour","kilometers/second","knots","Mach number (ISA/Sea level)","meters/hour","meters/minute","meters/second [m/s]","miles/hour","miles/minute","miles/second","nautical miles/hour","Nm/24hr (Volvo Ocean Race)","speed of light","yards/hour","yards/minute","yards/second"]);


define('ANGLE_CONVERTER') || define('ANGLE_CONVERTER', ["arcminute","arcsecond","circle","degree","gon","grad","mil (Nato)","mil (Soviet Union)","mil (Sweden)","octant","quadrant","radian","revolution","sextant","sign","turn"]);


define('BYTES_CONVERTER') || define('BYTES_CONVERTER', ["bits","bytes","kilobits (Kb)","kilobytes (KB)","megabits (Mb)","megabytes (MB)","gigabits (Gb)","gigabytes (GB)","terabits (Tb)","terabytes (TB)","petabits (Pb)","petabytes (PB)","exabits (Eb)","exabytes (EB)"]);


define('DENSITY_CONVERTER') || define('DENSITY_CONVERTER', ["grains/gallon (UK)","grains/gallon (US)","grains/cubic foot","grains/cubic inch","grains/cubic yard","grams/cubic centimeters","grams/liter","grams/milliliters","kilograms/cubic meters","kilograms/liter","megagrams/cubic meter","milligrams/milliliter","milligrams/liter","ounces/cubic inch","ounces/gallon (UK)","ounces/gallon (US)","pounds/cubic inch","pounds/cubic foot","pounds/gallon (UK)","pounds/gallon (US)","slugs/cubic foot","tonnes/cubic centimeter","tonnes/cubic decimeter","tonnes/cubic meter","tonnes/cubic liter","tonnes/cubic milliliter","tons (UK)/cubic yard","tons (US)/cubic yard"]);

define('ELECRIC_CURRENT_CONVERTER') || define('ELECRIC_CURRENT_CONVERTER', ["abampere [abA]","ampere [A]","biot [Bi]","centiampere","coulomb/second","EMU of current","ESU of current","franklin/second","gaussian electric current","gigaampere","gilbert [Gi]","kiloampere [kA]","megaampere","microampere","milliampere [mA]","milliamp","nanoampere","picoampere","siemens volt","statampere [stA]","teraampere","volt/ohm","watt/volt","weber/henry"]);


define('ENERGY_CONVERTER') || define('ENERGY_CONVERTER', ["Btu (th)","Btu (mean)","calories (IT)","calories (th)","calories (mean)","calories (15C)","calories (20C)","calories (food)","centigrade heat units","electron volts [eV]","ergs","foot-pound force [ft lbf]","foot poundals","gigajoules [GJ]","horsepower hours","inch-pound force [in lbf]","joules [J]","kilocalories (IT)","kilocalories (th)","kilogram-force meters","kilojoules [kJ]","kilowatt hours [kWh]","megajoules [MJ]","newton meters [Nm]","therms","watt seconds [Ws]","watt hours [Wh]"]);


define('FORCE_CONVERTER') || define('FORCE_CONVERTER', ["attonewton","centinewton","decigram-force","decinewton","dekagram-force","dekanewton","dyne (dyn)","exanewton","femtonewton","giganewton (GN)","gram-force","hectonewton","joule / meter (J/m)","kilogram-force (kgf)","kilonewton (kN)","kilopond (kp)","kip (kip)","meganewton","megapond","micronewton (μN)","millinewton (mN)","nanonewton (nN)","newton (N)","ounce-force (ozf)","petanewton","piconewton","pond","pound-force (lbf)","poundal (pdl)","sthene (sn)","teranewton","ton-force (long)(tnf)","ton-force (metric)(tnf)","ton-force (short)(tnf)","yoctonewton","yottanewton","zeptonewton","zettanewton"]);

define('FUEL_CONVERTER') || define('FUEL_CONVERTER', ["gallons (UK)/100 miles","gallons (US)/100 miles","kilometer/liter (km/l)","liters/100 kilometer","liters/meter","miles/gallon (UK) (mpg)","miles/gallon (US) (mpg)"]);

define('MASS_CONVERTER') || define('MASS_CONVERTER', ["carats (metric)","cental","Earth masses","grains","grams","hundredweights","kilograms [kg]","ounces (US &amp; UK)","ounces (troy, precious metals)","pounds [lbs] (US &amp; UK)","pounds (troy, precious metals)","Solar masses","slugs (g-pounds)","stones","tons (UK or long)","tons (US or short)","tonnes"]);

define('POWER_CONVERTER') || define('POWER_CONVERTER', ["Btu/hour","Btu/minute","Btu/second","calories(th)/hour","calories(th)/minute","calories(th)/second","foot pounds-force/minute","foot pounds-force/second","gigawatts [GW]","horsepowers (electric)","horsepowers (international)","horsepowers (water)","horsepowers (metric)","watts [W]","joules/hour","joules/minute","joules/second","kilocalories(th)/hour","kilocalories(th)/minute","kilogram-force meters/hour","kilogram-force meters/minute","kilowatts [kW]","megawatts [MW]"]);

define('PRESSURE_CONVERTER') || define('PRESSURE_CONVERTER', ["atmospheres","bars","centimeters mercury","centimeters water","feet of water","hectopascals [hPa]","inches of water","inches of mercury","kilogram-forces/sq.centimeter","kilogram-forces/sq.meter","kilonewtons/sq.meter","kilonewtons/sq.millimeter","kilopascals [kPa]","kips/sq.inch","meganewtons/sq.meter","meganewtons/sq.millimeter","meters of water","millibars","millimeters of mercury","millimeters of water","newtons/sq.centimeter","newtons/sq.meter","newtons/sq.millimeter","pascals [Pa]","pounds-force/sq.foot","pounds-force/sq.inch [psi]","poundals/sq.foot","tons (UK)-force/sq.foot","tons (UK)-force/sq.inch","tons (US)-force/sq.foot","tons (US)-force/sq.inch","tonnes-force/sq.cm","tonnes-force/sq.meter","torr (mm Hg 0°C)"]);

define('TIME_CONVERTER') || define('TIME_CONVERTER', ["centuries","days [d]","decades","femtoseconds [fs]","fortnights","hours [h]","microseconds [μs]","millenia","milliseconds [ms]","minutes [min]","months (Common)","months (Synodic)","nanoseconds [ns]","picoseconds [ps]","quarters (Common)","seconds [s]","shakes","weeks","years (Common) [y]","years (Average Gregorian)","years (Julian)","years (Leap)","years (Tropical)"]);

define('ASTRONOMICAL_CONVERTER') || define('ASTRONOMICAL_CONVERTER', ["astronomical unit [1996]","kilometer","light second","light minute","light hour","light day","light year [Julian]","light year [tropical]","light year [traditional]","parsec","meter","mile"]);

define('FREQUENCY_CONVERTER') || define('FREQUENCY_CONVERTER', ["1/second","cycle/second","degree/hour","degree/minute","degree/second","gigahertz","hertz","kilohertz","megahertz","millihertz","radian/hour","radian/minute","radian/second","revolution/hour","revolution/minute","revolution/second","RPM","terrahertz"]);

define('TEMPERATURE_CONVERTER') || define('TEMPERATURE_CONVERTER', ["Celsius", "Fahrenheit", "Rankine", "Reaumur", "kelvin"]);








/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
