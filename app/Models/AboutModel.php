<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table            = 'about';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['description'];
    
    // Timestamps
    protected $useTimestamps    = true;
    protected $createdField     = 'uploaded_at';
    protected $updatedField     = '';
    protected $deletedField     = '';

    // Fungsi untuk mendapatkan semua data about
    public function getAllAbouts()
    {
        return $this->orderBy('uploaded_at', 'DESC')->findAll();
    }
    
    // Fungsi untuk mendapatkan satu data about berdasarkan id
    public function getAbout($id)
    {
        return $this->find($id);
    }
}
