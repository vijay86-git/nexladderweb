<?php

namespace App\Models;
use CodeIgniter\Model;
 
class YoutubeModel extends Model
 {
    protected $table      =  'youtube_trends';

    protected $primaryKey = 'id';

    protected $allowedFields = ['yt_id', 'title', 'description', 'thumbnails', 'channel_title', 'category_id', 'published_at', 'stats', 'created_at'];

 }
