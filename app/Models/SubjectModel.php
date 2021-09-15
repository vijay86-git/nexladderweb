<?php

namespace App\Models;
use CodeIgniter\Model;
 
class SubjectModel extends Model
 {
    protected $table      =  'subject';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'slug', 'logo', 'image', 'about', 'page_title', 'meta_keywords', 'meta_description', 'status', 'show_nav', 'sort', 'unix_timestamp', 'created_at', 'updated_at'];

 }
