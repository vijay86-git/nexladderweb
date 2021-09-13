<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class AdminModel extends Model
 {
    protected $table      =  'administrators';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'password'];

    public function login($post_array = [])
    {
       $data = $this->db->table($this->table)->select(['id', 'name'])->getWhere($post_array)->getRowArray();
	   if (! empty($data))
             return ['name' => $data['name'], 'id' => $data['id']];
        else
             return FALSE;
    }

    public function forgot($post_array = [])
    {
        $data = $this->db->table($this->table)->getWhere($post_array)->getRowArray();
        if (! empty($data)):
             return TRUE; // send mail //     
        else:
             return FALSE;   
        endif;
    }

 }