<?php

namespace App\Models;

use CodeIgniter\Model;

class Action extends Model
{
  protected $table = 'actions';

  protected $primaryKey = 'action_id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'equipment_id',
    'area',
    'type',
    'site',
    'description',
    'details',
    'entry_date',
    'priority',
    'status',
    'created_on',
    'created_by',
    'last_modified_on',
    'last_modified_by',
  ];

  public function getAllActions()
  {
    $joiner = $this->builder();
    return $joiner->join('equipments', 'actions.equipment_id = equipments.equipment_id')->select('action_id, actions.equipment_id, tag_number, actions.area, actions.type, actions.site, actions.description, actions.details, actions.entry_date, actions.priority, actions.status, actions.created_on, actions.created_by, actions.last_modified_on, actions.last_modified_by')->orderBy('action_id DESC')->get()->getResultArray();
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }

  public function updateAction($action_id, $data)
  {
    $this->update($action_id, $data);
  }

  public function addAction($data)
  {
    $this->insert($data);
  }

  public function deleteAction($tag)
  {
    $this->delete($tag);
  }
}
