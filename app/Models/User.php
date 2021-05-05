<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
  protected $table = 'users';

  protected $primaryKey = 'user_id';
  protected $returnType = 'array';

  public function checkPassword($userId, $passwd) {
    $user = $this->getUser($userId);
    return $user['password'] == $passwd;
  }

  public function getName($userId) {
    $user = $this->getUser($userId);

    return $user['first_name'] . ' ' . $user['last_name'];
  }

  public function getUser($userId)
  {
    return $this->where(['user_id' => $userId])
                -> first();
  }

  public function updateEquipment($tag, $data)
  {
    $this->update($tag, $data);
  }

  public function addEquipment($data)
  {
    $this->insert($data);
  }

  public function deleteEquipment($tag)
  {
    $this->delete($tag);
  }
}
