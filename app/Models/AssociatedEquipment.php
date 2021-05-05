<?php

namespace App\Models;

use CodeIgniter\Model;

class AssociatedEquipment extends Model
{
  protected $table = 'assoc_equipments';

  protected $primaryKey = 'assoc_id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'equipment_id',
    'manufacturer',
    'model',
    'description',
    'service',
    'location',
    'protection',
    'epl',
    'eq_group',
    't_class',
    'ip',
    'amb_min',
    'amb_max',
    'certificate',
    'created_on',
    'created_by',
    'last_modified_on',
    'last_modified_by',
  ];

  public function getAllAssociatedEquipments()
  {
    $joiner = $this->builder();
    return $joiner->join('equipments', 'assoc_equipments.equipment_id = equipments.equipment_id')->select('assoc_id, assoc_equipments.equipment_id, tag_number, assoc_equipments.manufacturer, assoc_equipments.model, assoc_equipments.description, assoc_equipments.service, assoc_equipments.location, assoc_equipments.protection, assoc_equipments.epl, assoc_equipments.eq_group, assoc_equipments.t_class, assoc_equipments.ip, assoc_equipments.amb_min, assoc_equipments.amb_max, assoc_equipments.certificate, assoc_equipments.created_on, assoc_equipments.created_by, assoc_equipments.last_modified_on, assoc_equipments.last_modified_by')->orderBy('assoc_id DESC')->get()->getResultArray();
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }

  public function updateAssociatedEquipment($id, $data)
  {
    $this->update($id, $data);
  }

  public function addAssociatedEquipment($data)
  {
    $this->insert($data);
  }

  public function deleteAssociatedEquipment($id)
  {
    $this->delete($id);
  }
}
