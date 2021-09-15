<?php

namespace App\Models;
use CodeIgniter\Model;
 
class TopicModel extends Model
 {
    protected $table      =  'topics';

    protected $primaryKey = 'id';

    protected $allowedFields = ['subject_id', 'section_id', 'topic', 'slug', 'sort', 'detail', 'status', 'display', 'page_title', 'meta_keywords', 'meta_description', 'unix_timestamp'];

 }
