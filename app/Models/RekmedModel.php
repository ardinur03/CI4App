<?php

namespace App\Models;

use CodeIgniter\Model;

class RekmedModel extends Model
{
  protected $table          = 'rekmed';
  protected $primarykey     = 'Id_Rekmed';
  protected $allowedFields  = ['Id_Rekmed', 'Id_Dokter', 'Id_Pasien', 'Tgl_Periksa', 'Gejala', 'Diagnosa', 'Terapi'];

  public function getRekmed($Id_Rekmed = false)
  {
    if ($Id_Rekmed == false) {
      return $this->db->table('rekmed')
        ->join('dokter', 'dokter.Id_Dokter = rekmed.Id_dokter')
        ->join('pasien', 'Pasien.Id_Pasien = rekmed.Id_Pasien')
        ->get()->getResultArray();
    }
    return $this->where(['Id_Rekmed' => $Id_Rekmed])->first();
  }

  public function insert_rekmed($data)
  {
    return $this->db->table($this->table)->insert($data);
  }

  public function update_rekmed($data, $id_rekmed)
  {
    return $this->db->table($this->table)->update($data, ['Id_Rekmed' => $id_rekmed]);
  }

  public function delete_rekmed($id_rekmed)
  {
    return $this->db->table($this->table)->delete(['Id_Rekmed' => $id_rekmed]);
  }
}
