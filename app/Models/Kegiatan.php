<?php

namespace App\Models;

use CodeIgniter\Model;

class Kegiatan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kegiatans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','id_kegiatan','id_guru', 'jam', 'hari', 'kelas'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getGuru()
    {
        $query =  $this->db->table('kegiatans')->select('kegiatans.id as kegiatanID, id_kegiatan, id_guru, jam, hari,kelas,name, gurus.id')
            ->join('gurus', 'kegiatans.id_guru = gurus.id')->orderBy('kelas','ASC')
            ->get();
        return $query;
    }
    public function getGuruByID($id)
    {
        $query =  $this->db->table('kegiatans')->select('kegiatans.id as kegiatanID,id_kegiatan, id_guru, jam, hari,kelas,name, gurus.id as gurusID')
            ->join('gurus', 'kegiatans.id_guru = gurus.id')->where('kegiatans.id',$id)
            ->get();
        return $query;
    }
    public function updateKegiatan($id, $data=array())
    {
        $this->db->table('kegiatans')->update($data, array(
            "id" => $id,
        )
        );
        return $this->db->affectedRows();
    }
    public function getAll()
    {
        $builder = $this->db->table('gurus');
        return $builder->get();
    }
    public function getKegiatan($id)
    {
        $query =  $this->db->table('kegiatans')->select('*')->where('id',$id)
            ->get()->getResultArray();
        return $query;
    }
}
