<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table            = 'portfolio';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'file_name', 'file_path', 'file_type', 
        'file_size', 'description'
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'uploaded_at';
    protected $updatedField     = '';
    protected $deletedField     = '';

    // Fungsi untuk mendapatkan semua portfolio
    public function getAllPortfolios()
    {
        return $this->orderBy('uploaded_at', 'ASCE')->findAll();
    }

    // Fungsi untuk mendapatkan satu portfolio berdasarkan ID
    public function getPortfolio($id)
    {
        return $this->find($id);
    }
}