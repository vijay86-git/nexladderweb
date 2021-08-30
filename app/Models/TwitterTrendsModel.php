<?php

namespace App\Models;
use CodeIgniter\Model;
 
class TwitterTrendsModel extends Model
 {
    protected $table      =  'twitter_trends';

    protected $primaryKey = 'id';

    protected $allowedFields = ['woeid', 'name', 'url', 'promoted_content', 'query', 'tweet_volume', 'create_time'];

 }