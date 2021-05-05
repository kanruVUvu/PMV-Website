<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
  protected $table = 'comments';

  protected $primaryKey = 'comment_id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'action_id',
    'comment',
    'status',
    'priority',
    'created_by',
    'created_on',
    'last_modified_by',
    'last_modified_on',
  ];

  public function getAllComments()
  {
    return $this->findAll();
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }

  public function getComment($comment_id) {
    return $this->where(['comment_id' => $comment_id])
                ->first();
  }

  public function updateComment($comment_id, $data)
  {
    $this->update($comment_id, $data);
  }

  public function getCommentsByTag($tag)
  {
    return $this->where('tag_number', $tag)
                ->findAll();
  }

  public function getCommentsByAction($action_id)
  {
    return $this->where('action_id', $action_id)
                ->findAll();
  }

  public function addComment($data)
  {
    $this->insert($data);
  }

  public function deleteComment($comment_id)
  {
    $this->delete($comment_id);
  }
}