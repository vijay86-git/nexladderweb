<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class ImageModel extends Model
 {
    protected $table      =  'images';

    protected $primaryKey = 'id';

    protected $allowedFields = ['image_url', 'data', 'unix_timestamp', 'created_at', 'updated_at'];
    
 }