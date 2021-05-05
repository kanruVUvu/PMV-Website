<?php

namespace App\Controllers;

use App\Models\Equipment;
use App\Models\AssociatedEquipment;
use App\Models\Defect;
use App\Models\Action;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Inspection_report;
use App\Libraries\Csvimport;

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
    $model = new Equipment();

    $data = [
      'equipments' => $model->getAllEquipments(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/equipments/nav', $data);
    echo view('dash/equipments/table', $data);
    echo view('templates/footer');
  }

  public function assoc_equipments() {
    $model = new AssociatedEquipment();
    $eqModel = new Equipment();

    $data = [
      'equipments' => $model->getAllAssociatedEquipments(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
      'tags' => $eqModel->getTags()
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/assoc_equipments/nav', $data);
    echo view('dash/toolbar', $data);
    echo view('dash/assoc_equipments/table', $data);
    echo view('templates/footer');
  }

  public function docs() {
    $model = new Document();

    $data = [
      'docs' => $model->getAllDocs(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/documents/nav', $data);
    echo view('dash/toolbar', $data);
    echo view('dash/documents/table', $data);
    echo view('templates/footer');
  }

  public function addDoc() {
    $data = $this->getDocFormFields();

    $file = $data['filename'];
    $data['filename'] = $file->getClientName();

    $data['created_on'] = date("Y-m-d");
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['last_modified_by'] = $this->session->get('name');
    $data['entry_date'] = date("Y-m-d");

    $file->store('documents/', $data['filename']);


    $model = new Document();
    $model->insert($data);

    return redirect()->to('/dash/docs');
  }

  public function actions() {
    $model = new Action();
    $eqModel = new Equipment();

    $data = [
      'actions' => $model->getAllActions(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
      'tags' => $eqModel->getTags()
    ];

    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/actions/nav', $data);
    echo view('dash/toolbar', $data);
    echo view('dash/actions/table', $data);
    echo view('templates/footer');
  }

  public function defects() {
    $model = new Defect();
    $eqModel = new Equipment();

    $data = [
      'defects' => $model->getAllDefects(),
      'name' => $this->session->get('name'),
      'fields' => $model->getFields(),
      'read_only_fields' => $model->getAuditFields(),
      // 'tags' => $eqModel->getTags(),
    ];
    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/defects/nav', $data);
    echo view('dash/toolbar', $data);
    echo view('dash/defects/table', $data);
    echo view('templates/footer');
  }

  public function addDefect()
  {
    $data = $this->getDefectFormFields();

    $data['created_on'] = date("Y-m-d");
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['last_modified_by'] = $this->session->get('name');
    $data['entry_date'] = date("Y-m-d");

    $model = new Defect();
    $model->addDefect($data);

    return redirect()->to('/dash/defects');
  }

  public function updateDoc()
  {
    $request = service('request');

    $data = [
      'id' => $request->getPost('id'),
      'document_number' => $request->getPost('document_number'),
      'description' => $request->getPost('description'),
      'issue' => $request->getPost('issue'),
      'type' => $request->getPost('type')
    ];

    $data['last_modified_on'] = date("Y-m-d");
    $data['last_modified_by'] = $this->session->get('name');

    $model = new Document();
    $model->update($data['id'], $data);

    return redirect()->to('/dash/docs');
  }

  public function updateDocFile()
  {
    $request = service('request');
    $file = $request->getFile('filename');

    $data = [
      'id' => $request->getPost('id'),
      'filname' => $file->getClientName()
    ];
    

    $data['last_modified_on'] = date("Y-m-d");
    $data['last_modified_by'] = $this->session->get('name');

    $model = new Document();
    $model->update($data['id'], $data);

    return redirect()->to('/dash/docs');
  }

  public function updateEquipment()
  {
    $request = service('request');

    $data = $this->getEquipmentFormFields();
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $equipment_id = $request->getPost('equipment_id');

    $model = new Equipment();
    $model->updateEquipment($equipment_id, $data);

    return redirect()->to('/');
  }

  public function addAction() {
    $data = $this->getActionFormFields();

    $data['created_on'] = date("Y-m-d");
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['last_modified_by'] = $this->session->get('name');
    $data['entry_date'] = date("Y-m-d");

    $model = new Action();
    $model->addAction($data);

    return redirect()->to('/dash/actions');
  }
  
  public function addEquipment() {
    $data = $this->getEquipmentFormFields();

    $data['last_modified_by'] = $this->session->get('name');
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['created_on'] = date("Y-m-d");

    $model = new Equipment();
    $model->addEquipment($data);

    return redirect()->to('/');
  }

  public function addAssociatedEquipment() {
    $data = $this->getAssociatedEquipmentFormFields();

    $data['last_modified_by'] = $this->session->get('name');
    $data['created_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $data['created_on'] = date("Y-m-d");

    $model = new AssociatedEquipment();
    $model->addAssociatedEquipment($data);

    return redirect()->to('/dash/assoc_equipments');
  }

  public function updateAssociatedEquipment() {
    $request = service('request');

    $data = $this->getAssociatedEquipmentFormFields();
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $assoc_id = $request->getPost('assoc_id');

    $model = new AssociatedEquipment();
    $model->updateAssociatedEquipment($assoc_id, $data);

    return redirect()->to('/dash/assoc_equipments');
  }

  public function updateDefect() {
    $request = service('request');

    $data = $this->getDefectFormFields();
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $defect_id = $request->getPost('defect_id');

    $model = new Defect();
    $model->updateDefect($defect_id, $data);

    return redirect()->to('/dash/defects');
  }

  public function deleteDefect($defect_id) {
    $model = new Defect();
    $model->deleteDefect($defect_id);

    return redirect()->to('/dash/defects');
  }

  public function deleteAssociatedEquipment($assoc_id) {
    $model = new AssociatedEquipment();
    $model->deleteAssociatedEquipment($assoc_id);

    return redirect()->to('/dash/assoc_equipments');
  }

  public function updateAction() {
    $request = service('request');

    $data = $this->getActionFormFields();
    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");
    $action_id = $request->getPost('action_id');

    $model = new Action();
    $model->updateAction($action_id, $data);

    return redirect()->to('/dash/actions');
  }

  public function deleteAction($equipment_id) {
    $model = new Action();
    $model->deleteAction($equipment_id);

    return redirect()->to('/dash/actions');
  }
  
  public function deleteEquipment($equipment_id) {
    $model = new Equipment();
    $model->deleteEquipment($equipment_id);

    return redirect()->to('/');
  }

  public function deleteDoc($id) {
    $model = new Document();
    $model->delete($id);

    return redirect()->to('/dash/docs');
  }

  public function addComment() {
    $data = $this->getCommentFormFields();

    $data['last_modified_by'] = $this->session->get('name');
    $data['last_modified_on'] = date("Y-m-d");

    $model = new Comment();
    $model->addEquipment($data);

    return redirect()->to('/dash/actions');
  }

  function getCommentFormFields() {
    $request = service('request');
    $model = new Comment();
    $fields = [];

    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }

  function getEquipmentFormFields() {
    $request = service('request');
    $model = new Equipment();
    $fields = [];
    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }

  function getActionFormFields() {
    $request = service('request');
    $model = new Action();
    $fields = [];

    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }

  function getAssociatedEquipmentFormFields() {
    $request = service('request');
    $model = new AssociatedEquipment();
    $fields = [];

    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }

  function getDefectFormFields() {
    $request = service('request');
    $model = new Defect();
    $fields = [];

    foreach ($model->getFields() as $field) {
      $fields[$field] = $request->getPost($field);
    }

    return $fields;
  }

  function getDocFormFields() {
    $request = service('request');
    $model = new Document();
    $fields = ['id' => $request->getPost('id')];

    foreach ($model->getAddFormFields() as $field => $_) {
      $fields[$field] = $request->getPost($field);
    }

    $fields['filename'] = $request->getFile('filename');

    return $fields;
  }
  function inspection_report()
  {
    $model = new Inspection_report();
    $data = [
      'inspection_report' => $model->get_inspection_report(),
      'name' => $this->session->get('name'),
    ];
    echo view('templates/header');
    echo view('dash/header', $data);
    echo view('dash/inspection_report/nav', $data);
    echo view('dash/inspection_report/table', $data);
    echo view('templates/footer');
  }

  function add_inspection_report()
  { 
    $data = [
        'form_id' => $this->request->getPost('form_id'),
        'type' => $this->request->getPost('type'),
        'grade' => $this->request->getPost('grade'),
        'eq_tag' => $this->request->getPost('equipment_tag_no'),
        'facility_desc' => $this->request->getPost('facility_description'),
        'equipment_desc' => $this->request->getPost('Equipment_description'),
        'certificate_no' => $this->request->getPost('certificate_no'),
        'manufacturer' => $this->request->getPost('manufacturer'),
        'model' => $this->request->getPost('model'),
        'serial_no' => $this->request->getPost('serial_no'),
        'pe/id' => $this->request->getPost('pe_id'),
        'loop_drawing' => $this->request->getPost('loop_drawing'),
        'area_zone' => $this->request->getPost('zone_epl'),
        'area_group' => $this->request->getPost('area_group'),
        'area_temp_class' => $this->request->getPost('area_temp_class'),
        'area_ip' => $this->request->getPost('area_ip'),
        'amb_temp_min_c' => $this->request->getPost('amb_temp_min_c'),
        'amb_temp_max_c' => $this->request->getPost('amb_temp_max_c'),
        'ex_technique' => $this->request->getPost('ex_technique'),
        'ex_group' => $this->request->getPost('ex_group'),
        'ex_temp_class' => $this->request->getPost('ex_temp_class'),
        'ex_ip' => $this->request->getPost('ex_ip'),
        'ex_amb_temp_min_c' => $this->request->getPost('ex_amb_temp_min_c'),
        'ex_amb_temp_max_c' => $this->request->getPost('ex_amb_temp_max_c'),
        'er_kw' => $this->request->getPost('er_kw'),
        'er_voltage' => $this->request->getPost('er_voltage'),
        'er_amps' => $this->request->getPost('er_amps'),
        'er_hz' => $this->request->getPost('er_hz'),
        'er_rpm' => $this->request->getPost('er_rpm'),
        'er_la' => $this->request->getPost('er_la'),
        'er_te' => $this->request->getPost('er_te'),
        'ec1_desc' => $this->request->getPost('ec1_desc'),
        'Priority1' => $this->request->getPost('priority1'),
        'ec1_type' => $this->request->getPost('ec1_type'),
        'ec1_comment' => $this->request->getPost('ec1_comment'),
        'ec2_desc' => $this->request->getPost('ec2_desc'),
        'Priority2' => $this->request->getPost('priority2'),
        'ec2_type' => $this->request->getPost('ec2_type'),
        'ec2_comment' => $this->request->getPost('ec2_comment'),
        'ec3_desc' => $this->request->getPost('ec3_desc'),
        'Priority3' => $this->request->getPost('priority3'),
        'ec3_type' => $this->request->getPost('ec3_type'),
        'ec3_comment' => $this->request->getPost('ec3_comment'),
        'ec4_desc' => $this->request->getPost('ec4_desc'),
        'Priority4' => $this->request->getPost('priority4'),
        'ec4_type' => $this->request->getPost('ec4_type'),
        'ec4_comment' => $this->request->getPost('ec4_comment'),
        'ec5_desc' => $this->request->getPost('ec5_desc'),
        'Priority5' => $this->request->getPost('priority5'),
        'ec5_type' => $this->request->getPost('ec5_type'),
        'ec5_comment' => $this->request->getPost('ec5_comment'),
        'ec6_desc' => $this->request->getPost('ec6_desc'),
        'Priority6' => $this->request->getPost('priority6'),
        'ec6_type' => $this->request->getPost('ec6_type'),
        'ec6_comment' => $this->request->getPost('ec6_comment'),
        'ec7_desc' => $this->request->getPost('ec7_desc'),
        'Priority7' => $this->request->getPost('priority7'),
        'ec7_type' => $this->request->getPost('ec7_type'),
        'ec7_comment' => $this->request->getPost('ec7_comment'),
        'ec8_desc' => $this->request->getPost('ec8_desc'),
        'Priority8' => $this->request->getPost('priority8'),
        'ec8_type' => $this->request->getPost('ec8_type'),
        'ec8_comment' => $this->request->getPost('ec8_comment'),
        'ec9_desc' => $this->request->getPost('ec9_desc'),
        'Priority9' => $this->request->getPost('priority9'),
        'ec9_type' => $this->request->getPost('ec9_type'),
        'ec9_comment' => $this->request->getPost('ec9_comment'),
        'ec10_desc' => $this->request->getPost('ec10_desc'),
        'Priority10' => $this->request->getPost('priority10'),
        'ec10_type' => $this->request->getPost('ec10_type'),
        'ec10_comment' => $this->request->getPost('ec10_comment'),
        'ec11_desc' => $this->request->getPost('ec11_desc'),
        'Priority11' => $this->request->getPost('priority11'),
        'ec11_type' => $this->request->getPost('ec11_type'),
        'ec11_comment' => $this->request->getPost('ec11_comment'),
        'ec12_desc' => $this->request->getPost('ec12_desc'),
        'Priority12' => $this->request->getPost('priority12'),
        'ec12_type' => $this->request->getPost('ec12_type'),
        'ec12_comment' => $this->request->getPost('ec12_comment'),
        'ec13_desc' => $this->request->getPost('ec13_desc'),
        'Priority13' => $this->request->getPost('priority13'),
        'ec13_type' => $this->request->getPost('ec13_type'),
        'ec13_comment' => $this->request->getPost('ec13_comment'),
        'ec14_desc' => $this->request->getPost('ec14_desc'),
        'Priority14' => $this->request->getPost('priority14'),
        'ec14_type' => $this->request->getPost('ec14_type'),
        'ec14_comment' => $this->request->getPost('ec14_comment'),
        'ec15_desc' => $this->request->getPost('ec15_desc'),
        'Priority15' => $this->request->getPost('priority15'),
        'ec15_type' => $this->request->getPost('ec15_type'),
        'ec15_comment' => $this->request->getPost('ec15_comment'),
        'ec16_desc' => $this->request->getPost('ec16_desc'),
        'Priority16' => $this->request->getPost('priority16'),
        'ec16_type' => $this->request->getPost('ec16_type'),
        'ec16_comment' => $this->request->getPost('ec16_comment'),
        'ec17_desc' => $this->request->getPost('ec17_desc'),
        'Priority17' => $this->request->getPost('priority17'),
        'ec17_type' => $this->request->getPost('ec17_type'),
        'ec17_comment' => $this->request->getPost('ec17_comment'),
        'ec18_desc' => $this->request->getPost('ec18_desc'),
        'Priority18' => $this->request->getPost('priority18'),
        'ec18_type' => $this->request->getPost('ec18_type'),
        'ec18_comment' => $this->request->getPost('ec18_comment'),
        'ec19_desc' => $this->request->getPost('ec19_desc'),
        'Priority19' => $this->request->getPost('priority19'),
        'ec19_type' => $this->request->getPost('ec19_type'),
        'ec19_comment' => $this->request->getPost('ec19_comment'),
        'ec20_desc' => $this->request->getPost('ec20_desc'),
        'Priority20' => $this->request->getPost('priority20'),
        'ec20_type' => $this->request->getPost('ec20_type'),
        'ec20_comment' => $this->request->getPost('ec20_comment'),
        'ec21_desc' => $this->request->getPost('ec21_desc'),
        'Priority21' => $this->request->getPost('priority21'),
        'ec21_type' => $this->request->getPost('ec21_type'),
        'ec21_comment' => $this->request->getPost('ec21_comment'),
        'ec22_desc' => $this->request->getPost('ec22_desc'),
        'Priority22' => $this->request->getPost('priority22'),
        'ec22_type' => $this->request->getPost('ec22_type'),
        'ec22_comment' => $this->request->getPost('ec22_comment'),
        'ec23_desc' => $this->request->getPost('ec23_desc'),
        'Priority23' => $this->request->getPost('priority23'),
        'ec23_type' => $this->request->getPost('ec23_type'),
        'ec23_comment' => $this->request->getPost('ec23_comment'),
        'ec24_desc' => $this->request->getPost('ec24_desc'),
        'Priority24' => $this->request->getPost('priority24'),
        'ec24_type' => $this->request->getPost('ec24_type'),
        'ec24_comment' => $this->request->getPost('ec24_comment'),
        'ec25_desc' => $this->request->getPost('ec25_desc'),
        'Priority25' => $this->request->getPost('priority25'),
        'ec25_type' => $this->request->getPost('ec25_type'),
        'ec25_comment' => $this->request->getPost('ec25_comment'),
        'ec26_desc' => $this->request->getPost('ec26_desc'),
        'Priority26' => $this->request->getPost('priority26'),
        'ec26_type' => $this->request->getPost('ec26_type'),
        'ec26_comment' => $this->request->getPost('ec26_comment'),
        'ec27_desc' => $this->request->getPost('ec27_desc'),
        'Priority27' => $this->request->getPost('priority27'),
        'ec27_type' => $this->request->getPost('ec27_type'),
        'ec27_comment' => $this->request->getPost('ec27_comment'),
        'ec28_desc' => $this->request->getPost('ec28_desc'),
        'Priority28' => $this->request->getPost('priority28'),
        'ec28_type' => $this->request->getPost('ec28_type'),
        'ec28_comment' => $this->request->getPost('ec28_comment'),
        'ec29_desc' => $this->request->getPost('ec29_desc'),
        'Priority29' => $this->request->getPost('priority29'),
        'ec29_type' => $this->request->getPost('ec29_type'),
        'ec29_comment' => $this->request->getPost('ec29_comment'),
        'ec30_desc' => $this->request->getPost('ec30_desc'),
        'Priority30' => $this->request->getPost('priority30'),
        'ec30_type' => $this->request->getPost('ec30_type'),
        'ec30_comment' => $this->request->getPost('ec30_comment'),
        'ec31_desc' => $this->request->getPost('ec31_desc'),
        'Priority31' => $this->request->getPost('priority31'),
        'ec31_type' => $this->request->getPost('ec31_type'),
        'ec31_comment' => $this->request->getPost('ec31_comment'),
        'ec32_desc' => $this->request->getPost('ec32_desc'),
        'Priority32' => $this->request->getPost('priority32'),
        'ec32_type' => $this->request->getPost('ec32_type'),
        'ec32_comment' => $this->request->getPost('ec32_comment'),
        'ec33_desc' => $this->request->getPost('ec33_desc'),
        'Priority33' => $this->request->getPost('priority33'),
        'ec33_type' => $this->request->getPost('ec33_type'),
        'ec33_comment' => $this->request->getPost('ec33_comment'),
        'ec34_desc' => $this->request->getPost('ec34_desc'),
        'Priority34' => $this->request->getPost('priority34'),
        'ec34_type' => $this->request->getPost('ec34_type'),
        'ec34_comment' => $this->request->getPost('ec34_comment'),
        'ec35_desc' => $this->request->getPost('ec35_desc'),
        'Priority35' => $this->request->getPost('priority35'),
        'ec35_type' => $this->request->getPost('ec35_type'),
        'ec35_comment' => $this->request->getPost('ec35_comment'),
        'ec36_desc' => $this->request->getPost('ec36_desc'),
        'Priority36' => $this->request->getPost('priority36'),
        'ec36_type' => $this->request->getPost('ec36_type'),
        'ec36_comment' => $this->request->getPost('ec36_comment'),
        'ec37_desc' => $this->request->getPost('ec37_desc'),
        'Priority37' => $this->request->getPost('priority37'),
        'ec37_type' => $this->request->getPost('ec37_type'),
        'ec37_comment' => $this->request->getPost('ec37_comment'),
        'ec38_desc' => $this->request->getPost('ec38_desc'),
        'Priority38' => $this->request->getPost('priority38'),
        'ec38_type' => $this->request->getPost('ec38_type'),
        'ec38_comment' => $this->request->getPost('ec38_comment'),
        'ec39_desc' => $this->request->getPost('ec39_desc'),
        'Priority39' => $this->request->getPost('priority39'),
        'ec39_type' => $this->request->getPost('ec39_type'),
        'ec39_comment' => $this->request->getPost('ec39_comment'),
        'ec40_desc' => $this->request->getPost('ec40_desc'),
        'Priority40' => $this->request->getPost('priority40'),
        'ec40_type' => $this->request->getPost('ec40_type'),
        'ec40_comment' => $this->request->getPost('ec40_comment'),
        'ec41_desc' => $this->request->getPost('ec41_desc'),
        'Priority41' => $this->request->getPost('priority41'),
        'ec41_type' => $this->request->getPost('ec41_type'),
        'ec41_comment' => $this->request->getPost('ec41_comment'),
        'ec42_desc' => $this->request->getPost('ec42_desc'),
        'Priority42' => $this->request->getPost('priority42'),
        'ec42_type' => $this->request->getPost('ec42_type'),
        'ec42_comment' => $this->request->getPost('ec42_comment'),
        'ec43_desc' => $this->request->getPost('ec43_desc'),
        'Priority43' => $this->request->getPost('priority43'),
        'ec43_type' => $this->request->getPost('ec43_type'),
        'ec43_comment' => $this->request->getPost('ec43_comment'),
        'ec44_desc' => $this->request->getPost('ec44_desc'),
        'Priority44' => $this->request->getPost('priority44'),
        'ec44_type' => $this->request->getPost('ec44_type'),
        'ec44_comment' => $this->request->getPost('ec44_comment'),
        'ec45_desc' => $this->request->getPost('ec45_desc'),
        'Priority45' => $this->request->getPost('priority45'),
        'ec45_type' => $this->request->getPost('ec45_type'),
        'ec45_comment' => $this->request->getPost('ec45_comment'),
        'ec46_desc' => $this->request->getPost('ec46_desc'),
        'Priority46' => $this->request->getPost('priority46'),
        'ec46_type' => $this->request->getPost('ec46_type'),
        'ec46_comment' => $this->request->getPost('ec46_comment'),
        'ec47_desc' => $this->request->getPost('ec47_desc'),
        'Priority47' => $this->request->getPost('priority47'),
        'ec47_type' => $this->request->getPost('ec47_type'),
        'ec47_comment' => $this->request->getPost('ec47_comment'),
        'ec48_desc' => $this->request->getPost('ec48_desc'),
        'Priority48' => $this->request->getPost('priority48'),
        'ec48_type' => $this->request->getPost('ec48_type'),
        'ec48_comment' => $this->request->getPost('ec48_comment'),
        'ec49_desc' => $this->request->getPost('ec49_desc'),
        'Priority49' => $this->request->getPost('priority49'),
        'ec49_type' => $this->request->getPost('ec49_type'),
        'ec49_comment' => $this->request->getPost('ec49_comment'),
        'ec50_desc' => $this->request->getPost('ec50_desc'),
        'Priority50' => $this->request->getPost('priority50'),
        'ec50_type' => $this->request->getPost('ec50_type'),
        'ec50_comment' => $this->request->getPost('ec50_comment'),
        'ec51_desc' => $this->request->getPost('ec51_desc'),
        'Priority51' => $this->request->getPost('priority51'),
        'ec51_type' => $this->request->getPost('ec51_type'),
        'ec51_comment' => $this->request->getPost('ec51_comment'),
        'ec52_desc' => $this->request->getPost('ec52_desc'),
        'Priority52' => $this->request->getPost('priority52'),
        'ec52_type' => $this->request->getPost('ec52_type'),
        'ec52_comment' => $this->request->getPost('ec52_comment'),
        'ec53_desc' => $this->request->getPost('ec53_desc'),
        'Priority53' => $this->request->getPost('priority53'),
        'ec53_type' => $this->request->getPost('ec53_type'),
        'ec53_comment' => $this->request->getPost('ec53_comment'),
        'ec54_desc' => $this->request->getPost('ec54_desc'),
        'Priority54' => $this->request->getPost('priority54'),
        'ec54_type' => $this->request->getPost('ec54_type'),
        'ec54_comment' => $this->request->getPost('ec54_comment'),
        'ec55_desc' => $this->request->getPost('ec55_desc'),
        'Priority55' => $this->request->getPost('priority55'),
        'ec55_type' => $this->request->getPost('ec55_type'),
        'ec55_comment' => $this->request->getPost('ec55_comment'),
        'isb_model' => $this->request->getPost('ISB_model'),
        'isb_cert' => $this->request->getPost('ISB_cert'),
        'isb_loop' => $this->request->getPost('ISB_LOOP'),
        'simple_device' => $this->request->getPost('simple_device'),
        'created_on' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->get('name'),
        'Modified_on' => date('Y-m-d H:i:s'),
        'Modified_by' =>  $this->session->get('name'),
    ];
    $equipment_data = [
      'tag_number' => $this->request->getPost('equipment_tag_no'),
      'equipment_desc' => $this->request->getPost('Equipment_description'),
      'certificate' => $this->request->getPost('certificate_no'),
      'manufacturer' => $this->request->getPost('manufacturer'),
      'description' => $this->request->getPost('Equipment_description'),
      'model' => $this->request->getPost('model'),
      'serial_number' => $this->request->getPost('serial_no'),
      'ac_zone' => $this->request->getPost('zone_epl'),
      'ac_group' => $this->request->getPost('area_group'),
      'ac_t_class' => $this->request->getPost('area_temp_class'),
      'area_ip' => $this->request->getPost('area_ip'),
      'ac_amb_min' => $this->request->getPost('amb_temp_min_c'),
      'ac_amb_max' => $this->request->getPost('amb_temp_max_c'),
      'xr_group' => $this->request->getPost('ex_group'),
      'xr_t_class' => $this->request->getPost('ex_temp_class'),
      'xr_ip' => $this->request->getPost('ex_ip'),
      'xr_amb_min' => $this->request->getPost('ex_amb_temp_min_c'),
      'xr_amb_max' => $this->request->getPost('ex_amb_temp_max_c'),
      'er_kw' => $this->request->getPost('er_kw'),
      'er_voltage' => $this->request->getPost('er_voltage'),  
      'er_amps' => $this->request->getPost('er_amps'),
      'er_hz' => $this->request->getPost('er_hz'),
      'er_rpm' => $this->request->getPost('er_rpm'),
      'er_la' => $this->request->getPost('er_la'),
      'er_te' => $this->request->getPost('er_te'),
      'installation_date' => date('Y-m-d H:i:s'),
      'inspection_date' => date('Y-m-d H:i:s'),
      'created_on' => date('Y-m-d H:i:s'),
      'last_modified_on' => date('Y-m-d H:i:s'),
      'created_by' => $this->session->get('name'),
      'last_modified_by' => $this->session->get('name'),
    ];
    $model = new Inspection_report();
    $eq_model = new Equipment();
    $eq_model->equipment_add($equipment_data);
    $insert_id = $model->add_inspection_report($data);
    for($i=1;$i<=55;$i++)
    {
      $type = $this->request->getPost('ec'.$i.'_type');
      if($type == '2')
      {
        $defect = [
          'insert_id' => $insert_id,
          'tag_number' => $this->request->getPost('equipment_tag_no'),
          'description' => $this->request->getPost('Equipment_description'),
          'details' => $this->request->getPost('ec'.$i.'_desc'),
          'priority' => $this->request->getPost('priority'.$i.''),
          ];
          $defect_model = new Defect();
          $defect_model->addDefect($defect);
      }
    }
    return redirect()->to('/Dash/inspection_report');
  }

  function update_inspection_report()
  {
    $tag_number = $this->request->getPost('equipment_tag_no');
    $equipment_id = $this->request->getPost('ID');
    $model = new Inspection_report();
    $data= [
        'form_id' => $this->request->getPost('form_id'),
        'type' => $this->request->getPost('type'),
        'grade' => $this->request->getPost('grade'),
        'eq_tag' => $this->request->getPost('equipment_tag_no'),
        'facility_desc' => $this->request->getPost('facility_description'),
        'equipment_desc' => $this->request->getPost('Equipment_description'),
        'certificate_no' => $this->request->getPost('certificate_no'),
        'manufacturer' => $this->request->getPost('manufacturer'),
        'model' => $this->request->getPost('model'),
        'serial_no' => $this->request->getPost('serial_no'),
        'pe/id' => $this->request->getPost('pe_id'),
        'loop_drawing' => $this->request->getPost('loop_drawing'),
        'area_zone' => $this->request->getPost('zone_epl'),
        'area_group' => $this->request->getPost('area_group'),
        'area_temp_class' => $this->request->getPost('area_temp_class'),
        'area_ip' => $this->request->getPost('area_ip'),
        'amb_temp_min_c' => $this->request->getPost('amb_temp_min_c'),
        'amb_temp_max_c' => $this->request->getPost('amb_temp_max_c'),
        'ex_technique' => $this->request->getPost('ex_technique'),
        'ex_group' => $this->request->getPost('ex_group'),
        'ex_temp_class' => $this->request->getPost('ex_temp_class'),
        'ex_ip' => $this->request->getPost('ex_ip'),
        'ex_amb_temp_min_c' => $this->request->getPost('ex_amb_temp_min_c'),
        'ex_amb_temp_max_c' => $this->request->getPost('ex_amb_temp_max_c'),
        'er_kw' => $this->request->getPost('er_kw'),
        'er_voltage' => $this->request->getPost('er_voltage'),
        'er_amps' => $this->request->getPost('er_amps'),
        'er_hz' => $this->request->getPost('er_hz'),
        'er_rpm' => $this->request->getPost('er_rpm'),
        'er_la' => $this->request->getPost('er_la'),
        'er_te' => $this->request->getPost('er_te'),
        'ec1_type' => $this->request->getPost('ec1_type'),
        'ec1_comment' => $this->request->getPost('ec1_comment'),
        'ec2_type' => $this->request->getPost('ec2_type'),
        'ec2_comment' => $this->request->getPost('ec2_comment'),
        'ec3_type' => $this->request->getPost('ec3_type'),
        'ec3_comment' => $this->request->getPost('ec3_comment'),
        'ec4_type' => $this->request->getPost('ec4_type'),
        'ec4_comment' => $this->request->getPost('ec4_comment'),
        'ec5_type' => $this->request->getPost('ec5_type'),
        'ec5_comment' => $this->request->getPost('ec5_comment'),
        'ec6_type' => $this->request->getPost('ec6_type'),
        'ec6_comment' => $this->request->getPost('ec6_comment'),
        'ec7_type' => $this->request->getPost('ec7_type'),
        'ec7_comment' => $this->request->getPost('ec7_comment'),
        'ec8_type' => $this->request->getPost('ec8_type'),
        'ec8_comment' => $this->request->getPost('ec8_comment'),
        'ec9_type' => $this->request->getPost('ec9_type'),
        'ec9_comment' => $this->request->getPost('ec9_comment'),
        'ec10_type' => $this->request->getPost('ec10_type'),
        'ec10_comment' => $this->request->getPost('ec10_comment'),
        'ec11_type' => $this->request->getPost('ec11_type'),
        'ec11_comment' => $this->request->getPost('ec11_comment'),
        'ec12_type' => $this->request->getPost('ec12_type'),
        'ec12_comment' => $this->request->getPost('ec12_comment'),
        'ec13_type' => $this->request->getPost('ec13_type'),
        'ec13_comment' => $this->request->getPost('ec13_comment'),
        'ec14_type' => $this->request->getPost('ec14_type'),
        'ec14_comment' => $this->request->getPost('ec14_comment'),
        'ec15_type' => $this->request->getPost('ec15_type'),
        'ec15_comment' => $this->request->getPost('ec15_comment'),
        'ec16_type' => $this->request->getPost('ec16_type'),
        'ec16_comment' => $this->request->getPost('ec16_comment'),
        'ec17_type' => $this->request->getPost('ec17_type'),
        'ec17_comment' => $this->request->getPost('ec17_comment'),
        'ec18_type' => $this->request->getPost('ec18_type'),
        'ec18_comment' => $this->request->getPost('ec18_comment'),
        'ec19_type' => $this->request->getPost('ec19_type'),
        'ec19_comment' => $this->request->getPost('ec19_comment'),
        'ec20_type' => $this->request->getPost('ec20_type'),
        'ec20_comment' => $this->request->getPost('ec20_comment'),
        'ec21_type' => $this->request->getPost('ec21_type'),
        'ec21_comment' => $this->request->getPost('ec21_comment'),
        'ec22_type' => $this->request->getPost('ec22_type'),
        'ec22_comment' => $this->request->getPost('ec22_comment'),
        'ec23_type' => $this->request->getPost('ec23_type'),
        'ec23_comment' => $this->request->getPost('ec23_comment'),
        'ec24_type' => $this->request->getPost('ec24_type'),
        'ec24_comment' => $this->request->getPost('ec24_comment'),
        'ec25_type' => $this->request->getPost('ec25_type'),
        'ec25_comment' => $this->request->getPost('ec25_comment'),
        'ec26_type' => $this->request->getPost('ec26_type'),
        'ec26_comment' => $this->request->getPost('ec26_comment'),
        'ec27_type' => $this->request->getPost('ec27_type'),
        'ec27_comment' => $this->request->getPost('ec27_comment'),
        'ec28_type' => $this->request->getPost('ec28_type'),
        'ec28_comment' => $this->request->getPost('ec28_comment'),
        'ec29_type' => $this->request->getPost('ec29_type'),
        'ec29_comment' => $this->request->getPost('ec29_comment'),
        'ec30_type' => $this->request->getPost('ec30_type'),
        'ec30_comment' => $this->request->getPost('ec30_comment'),
        'ec31_type' => $this->request->getPost('ec31_type'),
        'ec31_comment' => $this->request->getPost('ec31_comment'),
        'ec32_type' => $this->request->getPost('ec32_type'),
        'ec32_comment' => $this->request->getPost('ec32_comment'),
        'ec33_type' => $this->request->getPost('ec33_type'),
        'ec33_comment' => $this->request->getPost('ec33_comment'),
        'ec34_type' => $this->request->getPost('ec34_type'),
        'ec34_comment' => $this->request->getPost('ec34_comment'),
        'ec35_type' => $this->request->getPost('ec35_type'),
        'ec35_comment' => $this->request->getPost('ec35_comment'),
        'ec36_type' => $this->request->getPost('ec36_type'),
        'ec36_comment' => $this->request->getPost('ec36_comment'),
        'ec37_type' => $this->request->getPost('ec37_type'),
        'ec37_comment' => $this->request->getPost('ec37_comment'),
        'ec38_type' => $this->request->getPost('ec38_type'),
        'ec38_comment' => $this->request->getPost('ec38_comment'),
        'ec39_type' => $this->request->getPost('ec39_type'),
        'ec39_comment' => $this->request->getPost('ec39_comment'),
        'ec40_type' => $this->request->getPost('ec40_type'),
        'ec40_comment' => $this->request->getPost('ec40_comment'),
        'ec41_type' => $this->request->getPost('ec41_type'),
        'ec41_comment' => $this->request->getPost('ec41_comment'),
        'ec42_type' => $this->request->getPost('ec42_type'),
        'ec42_comment' => $this->request->getPost('ec42_comment'),
        'ec43_type' => $this->request->getPost('ec43_type'),
        'ec43_comment' => $this->request->getPost('ec43_comment'),
        'ec44_type' => $this->request->getPost('ec44_type'),
        'ec44_comment' => $this->request->getPost('ec44_comment'),
        'ec45_type' => $this->request->getPost('ec45_type'),
        'ec45_comment' => $this->request->getPost('ec45_comment'),
        'ec46_type' => $this->request->getPost('ec46_type'),
        'ec46_comment' => $this->request->getPost('ec46_comment'),
        'ec47_type' => $this->request->getPost('ec47_type'),
        'ec47_comment' => $this->request->getPost('ec47_comment'),
        'ec48_type' => $this->request->getPost('ec48_type'),
        'ec48_comment' => $this->request->getPost('ec48_comment'),
        'ec49_type' => $this->request->getPost('ec49_type'),
        'ec49_comment' => $this->request->getPost('ec49_comment'),
        'ec50_type' => $this->request->getPost('ec50_type'),
        'ec50_comment' => $this->request->getPost('ec50_comment'),
        'ec51_type' => $this->request->getPost('ec51_type'),
        'ec51_comment' => $this->request->getPost('ec51_comment'),
        'ec52_type' => $this->request->getPost('ec52_type'),
        'ec52_comment' => $this->request->getPost('ec52_comment'),
        'ec53_type' => $this->request->getPost('ec53_type'),
        'ec53_comment' => $this->request->getPost('ec53_comment'),
        'ec54_type' => $this->request->getPost('ec54_type'),
        'ec54_comment' => $this->request->getPost('ec54_comment'),
        'ec55_type' => $this->request->getPost('ec55_type'),
        'ec55_comment' => $this->request->getPost('ec55_comment'),
        'isb_model' => $this->request->getPost('ISB_model'),
        'isb_cert' => $this->request->getPost('ISB_cert'),
        'isb_loop' => $this->request->getPost('ISB_LOOP'),
        'simple_device' => $this->request->getPost('simple_device'),
        'created_on' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->get('name'),
        'Modified_on' => date('Y-m-d H:i:s'),
        'Modified_by' =>  $this->session->get('name'),
        ];
    $equipment_data = [
      'tag_number' => $this->request->getPost('equipment_tag_no'),
      'equipment_desc' => $this->request->getPost('Equipment_description'),
      'certificate' => $this->request->getPost('certificate_no'),
      'manufacturer' => $this->request->getPost('manufacturer'),
      'description' => $this->request->getPost('Equipment_description'),
      'model' => $this->request->getPost('model'),
      'serial_number' => $this->request->getPost('serial_no'),
      'ac_zone' => $this->request->getPost('zone_epl'),
      'ac_group' => $this->request->getPost('area_group'),
      'ac_t_class' => $this->request->getPost('area_temp_class'),
      'area_ip' => $this->request->getPost('area_ip'),
      'ac_amb_min' => $this->request->getPost('amb_temp_min_c'),
      'ac_amb_max' => $this->request->getPost('amb_temp_max_c'),
      'xr_group' => $this->request->getPost('ex_group'),
      'xr_t_class' => $this->request->getPost('ex_temp_class'),
      'xr_ip' => $this->request->getPost('ex_ip'),
      'xr_amb_min' => $this->request->getPost('ex_amb_temp_min_c'),
      'xr_amb_max' => $this->request->getPost('ex_amb_temp_max_c'),
      'er_kw' => $this->request->getPost('er_kw'),
      'er_voltage' => $this->request->getPost('er_voltage'),  
      'er_amps' => $this->request->getPost('er_amps'),
      'er_hz' => $this->request->getPost('er_hz'),
      'er_rpm' => $this->request->getPost('er_rpm'),
      'er_la' => $this->request->getPost('er_la'),
      'er_te' => $this->request->getPost('er_te'),
      'installation_date' => date('Y-m-d H:i:s'),
      'inspection_date' => date('Y-m-d H:i:s'),
      'created_on' => date('Y-m-d H:i:s'),
      'last_modified_on' => date('Y-m-d H:i:s'),
      'created_by' => $this->session->get('name'),
      'last_modified_by' => $this->session->get('name'),
    ];
    
    $eq_model = new Equipment();
    $defect_model = new Defect();
    $model->update_inspection_report($equipment_id,$data);
    $eq_model->updateEquipment($equipment_id, $equipment_data);
    $description = [];
    for($a=1;$a<=55;$a++)
    {
     $type = $this->request->getPost('ec'.$a.'_type'); 
        if($type == '2')
        {
          $id = $this->request->getPost('equipment_tag_no');
          $data = $defect_model->find_detail($id);
          if($data)
          {  
            for($o=0;$o<count($data);$o++){   
              $description[$o] = $data[$o]['details'];
            }
            for($i=1;$i<=55;$i++)
            {
              for($k=0;$k<count($description);$k++)  
              {   
                $type1 = $this->request->getPost('ec'.$i.'_type');
                $l = 0;
                if($type1 == '2' && $description[$k] == $this->request->getPost('desc'.$i.''))
                {
                  $l++;
                  break;
                }
              }
              if($type1 == '2' && $l==0)
              {
                $defect = [
                'tag_number' => $this->request->getPost('equipment_tag_no'),
                'description' => $this->request->getPost('Equipment_description'),
                'priority' => $this->request->getPost('priority'.$i.''),
                'details' => $this->request->getPost('desc'.$i.''),
                ];
                $defect_model->addDefect($defect);
              }
            }
          }
          else
          {
            for($i=1;$i<=55;$i++)
            {
              $type3 = $this->request->getPost('ec'.$i.'_type');
              if($type3 == '2')
              {
                $defect = [
                  'tag_number' => $this->request->getPost('equipment_tag_no'),
                  'description' => $this->request->getPost('Equipment_description'),
                  'details' => $this->request->getPost('desc'.$i.''),
                  'priority' => $this->request->getPost('priority'.$i.''),
                  ];
                  $defect_model = new Defect();
                  $defect_model->addDefect($defect);
              }
            }
          }
        }
        else
        {
          $tag_no = $this->request->getPost('equipment_tag_no');
          $desc = $this->request->getPost('desc'.$a.'');  
            $defect_model = new Defect();
            $defect_model->delete_desc($tag_no,$desc);
        }
    }  
    return redirect()->to('/Dash/inspection_report');
  }

  public function delete_inspection_report($tag)
  {
      $insModel = new inspection_report();
      $data = $insModel->getinspection_report($tag);
      $inspection = $data['eq_tag'];
      $defect_model = new Defect();
      $defect_model->delete_defect($inspection);
      $insModel->delete_inspection_report($tag);
      $model = new Equipment();
      $model->deleteEquipment($tag);
      return redirect()->to('/Dash/inspection_report');
  }
} 