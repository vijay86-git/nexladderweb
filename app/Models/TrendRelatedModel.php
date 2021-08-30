<?php

namespace App\Models;
use CodeIgniter\Model;
 
class TrendRelatedModel extends Model
 {
    protected $table      =  'trends_related';

    protected $primaryKey = 'id';

    protected $allowedFields = ['trend_id', 'title', 'time_ago', 'source', 'news_url', 'image_url', 'url', 'snipped',  'create_time'];
 }