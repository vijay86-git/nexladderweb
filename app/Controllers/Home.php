<?php

namespace App\Controllers;

use App\Models\SubjectModel;

class Home extends BaseController
{
	public function __construct()
        {
  			helper(['url', 'form', 'site']);

            $this->_subjectobj  = new SubjectModel();
        }

	public function index()
	   { 
		    $subjects = $this->_subjectobj->select(['name', 'slug', 'image'])->where(['status', 1])->get(); 
		    return view('Frontend/Home', compact('subjects'));
	   }
}