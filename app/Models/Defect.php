<?php

namespace App\Models;

use CodeIgniter\Model;

class Defect extends Model
{
  protected $table = 'defects';
  protected $primaryKey = 'defect_id';
  protected $allowedFields = [
    'insert_id',
    'tag_number',
    'item_number',
    'site',
    'area',
    'description',
    'inspection',
    'details',
    'priority',
    'status',
    'created_by',
    'created_on',
    'last_modified_by',
    'last_modified_on'
  ];

  public function getAllDefects()
  {
    return $this->orderBy('defect_id DESC')->findAll();
  }

  public function getPK()
  {
    return $this->primaryKey;
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }

  public function updateDefect($defect_id, $data)
  {
    $this->update($defect_id, $data);
  }

  public function update_tag($id,$Defect_detail)
  {
    $this->where('insert_id',$id)->update('defects',$Defect_detail);
  }

  public function addDefect($data)
  {
    $this->insert($data);
  }

  public function deleteDefect($tag)
  {
    $this->delete($tag);
  }

  public function delete_defect($tag)
  {
    $data = $this->where('tag_number',$tag)->delete();
  }

  public function delete_desc($tag_no,$desc)
  {
    $data = $this->where('tag_number',$tag_no)->where('details',$desc)->delete();
  }

  public function find_detail($id)
  {
    $data = $this->where('tag_number',$id)->find();
    return $data;
  }
}