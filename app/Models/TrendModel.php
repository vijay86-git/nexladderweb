<?php

namespace App\Models;
use CodeIgniter\Model;
 
class TrendModel extends Model
 {
    protected $table      =  'trends';

    protected $primaryKey = 'id';

    protected $allowedFields = ['code', 'date_format', 'title', 'image', 'news_url', 'source', 'create_time', 'formattedTraffic'];
 }