<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
  protected $table      = 'dokter';
  protected $primaryKey = 'Id_Dokter';
  protected $allowedfield = ['Id_Dokter', 'Id_Spec', 'Nama_Dokter', 'Gender', 'Kontak'];

  public function getDokter($Id_Dokter = true)
  {
    if ($Id_Dokter = true) {
      return $this->db->table('dokter')->join('spesialis', 'spesialis.Id_Spec=dokter.Id_Spec')->get()->getResultArray();
    }
    return $this->where(['Id_Dokter' => $Id_Dokter])->first();
  }

  public function firstDokter($Id_Dokter)
  {
    return $this->where(['Id_Dokter' => $Id_Dokter])->first();
  }
}
