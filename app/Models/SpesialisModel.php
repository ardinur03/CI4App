<?php

namespace App\Models;

use CodeIgniter\Model;

class SpesialisModel extends Model
{
  protected $table          = 'spesialis';
  protected $primarykey     = 'Id_Spec';
  protected $allowedFields  = ['Id_Spec', 'Spec'];

  //mengambil data di database
  public function getSpesialis($Id_Spec = false)
  {
    if ($Id_Spec == false) {
      return $this->findAll();
    }
    return $this->where(['Id_Spec' => $Id_Spec])->first();
  }

  // mencari data di data base
  public function search($keyword)
  {
    return $this->table('spesialis')->like('Spec', $keyword);
  }

  // proses penyimpanan  data ke database
  public function insert_spesialis($data)
  {
    return $this->db->table($this->table)->insert($data);
  }

  //proses delete Spesialis
  public function delete_spesialis($Id_Spec)
  {
    return $this->db->table($this->table)->delete(['Id_Spec' => $Id_Spec]);
  }

  //proses update spesialis
  public function update_spesialis($data, $Id_Spec)
  {
    return $this->db->table($this->table)->update($data, ['Id_Spec' => $Id_Spec]);
  }
}
