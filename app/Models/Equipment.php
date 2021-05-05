<?php

namespace App\Models;

use CodeIgniter\Model;

class Equipment extends Model
{
  protected $table = 'equipments';
  protected $primaryKey = 'equipment_id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'tag_number',
    'site',
    'manufacturer',
    'model',
    'serial_number',
    'description',
    'service',
    'area',
    'location',
    'installation_date',
    'inspection_date',
    'ac_zone',
    'ac_epl',
    'ac_group',
    'ac_t_class',
    'ac_ip',
    'ac_amb_min',
    'ac_amb_max',
    'certificate',
    'xr_protection',
    'xr_epl',
    'xr_group',
    'xr_t_class',
    'xr_ip',
    'xr_amb_min',
    'xr_amb_max',
    'er_kw',
    'er_voltage',
    'er_amps',
    'er_hz',
    'er_rpm',
    'er_la',
    'er_te',
    'created_by',
    'created_on',
    'last_modified_by',
    'last_modified_on',
  ];

  public function getAllEquipments()
  {
    return $this->orderBy('equipment_id DESC')->findAll();
  }

  public function getPK() {
    return $this->primaryKey;
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getTags() {
    $tag_numbers =  $this->findColumn('tag_number');
    $equipment_ids =  $this->findColumn('equipment_id');
    return array_map(null, $equipment_ids, $tag_numbers);
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }
  
  public function updateEquipment($equipment_id, $equipment_data)
  {
    $this->update($equipment_id, $equipment_data);
  }

  public function addEquipment($data)
  {
    $this->insert($data);
  }

  public function deleteEquipment($tag)
  {
    $this->delete($tag);
  }
  public function equipment_add($equipment_data)
  {
    $this->insert($equipment_data);
  }
}
