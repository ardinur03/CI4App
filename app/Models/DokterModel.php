<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
  protected $table      = 'dokter';
  protected $primaryKey = 'Id_Dokter';
  protected $allowedFields = ['Id_Dokter', 'Id_Spec', 'Nama_Dokter', 'Gender', 'Kontak'];

  public function getDokter($Id_Dokter = false)
  {
    if ($Id_Dokter == false) {
      return $this->db->table('dokter')->join('spesialis', 'spesialis.Id_Spec=dokter.Id_Spec')->get()->getResultArray();
    }
    return $this->where(['Id_Dokter' => $Id_Dokter])->first();
  }

  // proses penyimpanan data ke database
  public function insert_dokter($data)
  {
    return $this->db->table($this->table)->insert($data);
  }

  public function delete_dokter($Id_Dokter)
  {
    return $this->db->table($this->table)->delete(['Id_Dokter' => $Id_Dokter]);
  }
  public function update_dokter($data, $Id_Dokter)
  {
    return $this->db->table($this->table)->update($data, ['Id_Dokter' => $Id_Dokter]);
  }
}
