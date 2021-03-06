<?php

namespace App\Models;
use CodeIgniter\Model;
 
class SectionModel extends Model
 {
    protected $table      =  'section';

    protected $primaryKey = 'id';

    protected $allowedFields = ['subject_id', 'section', 'sort', 'unix_timestamp', 'status', 'created_at', 'updated_at'];

 }
