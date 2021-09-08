<?php

namespace App\Models;
use CodeIgniter\Model;
 
class CountryModel extends Model
 {
    protected $table      =  'countries';

    protected $primaryKey = 'id';

    protected $allowedFields = ['code', 'title', 'status', 'alias', 'youtube_status', 'google_status'];

 }
