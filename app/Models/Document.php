<?php

namespace App\Models;

use CodeIgniter\Model;

class Document extends Model
{
  protected $table = 'documents';

  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'document_number',
    'type',
    'issue',
    'description',
    'filename',
    'created_on',
    'created_by',
    'last_modified_on',
    'last_modified_by',
  ];

  public function getAllDocs()
  {
    return $this->findAll();
  }

  public function getFields()
  {
    return $this->allowedFields;
  }

  public function getAddFormFields()
  {
    return [
      "document_number" => "Document Number",
      "type" => "Type",
      "issue" => "Issue",
      "description" => "Description",
      "filename" => "File",
    ];
  }

  public function getAuditFields() {
    return ['last_modified_by', 'last_modified_on', 'created_by', 'created_on'];
  }

  public function updateDocument($id, $data)
  {
    $this->update($id, $data);
  }

  public function addDocument($data)
  {
    $this->insert($data);
  }
}