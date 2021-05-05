<?php

namespace App\Controllers;

use App\Models\Equipment;
use App\Models\AssociatedEquipment;
use App\Models\Defect;
use App\Models\Action;

class Dash extends BaseController
{
  public function index()
  {
    if (! $this->session->get('logged_in') === true) {
      return redirect()->to('/login');
    }

    return redirect()->to('/dash/equipments');
  }

  public function equipments() {
    $id = $this->input->post('id');
    $model = new Equipment();
    $data['equipment'] = $this->db->where('equipment_id',$id)->get('equipments')->result();
    print_r($data['equipment']);
    die;
    $data = [
      'rows' => $model->getAllEquipments(),
      'name' => $this->session->get('name'),
      'primary_key' => $model->getPK(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/equipments/table', $data);
    echo view('templates/footer');
  }

  public function assoc_equipments() {
    $model = new AssociatedEquipment();

    $data = [
      'equipments' => $model->getAllEquipments(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/assoc_equipments/table', $data);
    echo view('templates/footer');
  }

  public function actions() {
    $model = new Action();

    $data = [
      'actions' => $model->getAllActions(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/actions/table', $data);
    echo view('templates/footer');
  }

  public function defects() {
    $model = new Defect();

    $data = [
      'rows' => $model->getAllDefects(),
      'name' => $this->session->get('name'),
      'primary_key' => $model->getPK(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/equipments/table', $data);
    echo view('templates/footer');
  }

  public function updateEquipment()
  {
    $request = service('request');

    $data = $this->getFormFields();
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $equipment_id = $request->getPost('equipment_id');

    $model = new Equipment();
    $model->updateEquipment($equipment_id, $data);

    return redirect()->to('/');
  }

  public function addEquipment() {
    $data = $this->getFormFields();

    $data['last_modified_by'] = $this->session->get('name');
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['created_on'] = date("Y-m-d");

    $model = new Equipment();
    $model->addEquipment($data);

    return redirect()->to('/');
  }
  
  public function deleteEquipment($equipment_id) {
    $model = new Equipment();
    $model->deleteEquipment($equipment_id);

    return redirect()->to('/');
  }

  function getFormFields() {
    $request = service('request');
    $model = new Equipment();
    $fields = [];

    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }
}