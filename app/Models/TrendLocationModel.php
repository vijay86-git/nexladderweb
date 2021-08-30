<?php

namespace App\Models;
use CodeIgniter\Model;
 
class TrendLocationModel extends Model
 {
    protected $table      =  'twitter_location';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'place_type', 'url', 'parent_id', 'country', 'woeid', 'country_code', 'create_time'];

 }
