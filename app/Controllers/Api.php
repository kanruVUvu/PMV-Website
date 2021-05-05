<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\DefectComment;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
  use ResponseTrait;

	public function index()
	{
		return view('welcome_message');
	}

  public function comments($action_id)
  {
    $model = new Comment();
    header('Content-Type: application/json');
    return $this->respond($model->getCommentsByAction($action_id));
  }

  public function defects_comments($defect_id)
  {
    $model = new DefectComment();
    header('Content-Type: application/json');
    return $this->respond($model->getCommentsByDefect($defect_id));
  }

  public function add_comment()
  {
    $request = service('request');

    $data['comment'] = $request->getVar('comment');
    $data['action_id'] = $request->getVar('action_id');
    $data['priority'] = $request->getVar('priority');
    $data['status'] = $request->getVar('status');
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");

    $model = new Comment();
    $model->addComment($data);
  }

  public function add_defect_comment()
  {
    $request = service('request');

    $data['comment'] = $request->getVar('comment');
    $data['defect_id'] = $request->getVar('defect_id');
    $data['priority'] = $request->getVar('priority');
    $data['status'] = $request->getVar('status');
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");

    $model = new DefectComment();
    $model->addComment($data);
  }
}
