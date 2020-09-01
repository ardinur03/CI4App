<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
  protected $table = 'pasien';
  protected $primaryKey = 'Id_Pasien';
  protected $allowedFields = ['Id_Pasien','Nama_Pasien','Gender','Alamat_Detail','Alamat_Kelurahan','Alamat_Kecamatan','Alamat_KotaKab','Tmp_Lahir','Tgl_Lahir'];
 
  
  // proses pengambilan data dari database
  public function getPasien($Id_Pasien = false)  
  {
    if ($Id_Pasien == false) {
      return $this->findAll();
    }
    return $this->where(['Id_Pasien' => $Id_Pasien])->first();
  }

  // proses penghapusan data dari database
  public function delete_pasien($Id_Pasien)
  {
    return $this->db->table($this->table)->delete(['Id_Pasien' => $Id_Pasien]);
  }

  // proses penyimpanan data ke database
  public function insert_pasien($data)
  {
    return $this->db->table($this->table)->insert($data);
  }

  // proses pengeditan data 
  public function update_pasien($data, $id)
  {
    return $this->db->table($this->table)->update($data, ['Id_Pasien' => $id]);
  }  

}