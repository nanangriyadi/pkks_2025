<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use CodeIgniter\Files\File;

class Portfolio extends BaseController
{
    protected $portfolioModel;
    
    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Portfolio',
            'portfolios' => $this->portfolioModel->findAll()
        ];
        
        return view('portfolio/index', $data);
    }

    public function upload()
    {
        $data = [
            'title' => 'Upload Portfolio'
        ];
        
        return view('portfolio/upload', $data);
    }

    public function save()
    {
        // Validate the uploaded file
        $rules = [
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,1500]|mime_in[file,application/pdf,video/mp4]',
                'errors' => [
                    'uploaded' => 'Pilih file untuk diupload',
                    'max_size' => 'Ukuran file terlalu besar (maksimal 1.5 MB)',
                    'mime_in' => 'Format file tidak didukung (hanya PDF dan MP4)'
                ]
            ]
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->to('admin_portfolio/upload')->withInput();
        }
    
        // Get the uploaded file
        $file = $this->request->getFile('file');
        
        // Generate random name for the file
        $newName = $file->getRandomName();
        
        // Move the file to the uploads directory
        $file->move('uploads', $newName);
        
        // Save to database
        $this->portfolioModel->save([
            'file_name' => $newName,
            'file_path' => 'uploads/' . $newName,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSizeByUnit('kb'),
            'description' => $this->request->getVar('description')
        ]);
        
        session()->setFlashdata('success', 'File berhasil diupload');
        return redirect()->to('admin_portfolio'); // Ubah dari admin_portfolio ke portfolio
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Portfolio',
            'portfolio' => $this->portfolioModel->find($id)
        ];
        
        if (empty($data['portfolio'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Portfolio tidak ditemukan');
        }
        
        return view('portfolio/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Portfolio',
            'portfolio' => $this->portfolioModel->find($id)
        ];
        
        if (empty($data['portfolio'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Portfolio tidak ditemukan');
        }
        
        return view('portfolio/edit', $data);
    }

    public function update($id)
    {
        // Update portfolio data
        $this->portfolioModel->update($id, [
            'description' => $this->request->getVar('description')
        ]);
        
        session()->setFlashdata('message', 'Portfolio berhasil diupdate');
        return redirect()->to('admin_portfolio');
    }

    public function delete($id)
    {
        // Get the portfolio data
        $portfolio = $this->portfolioModel->find($id);
        
        if (empty($portfolio)) {
            session()->setFlashdata('error', 'Portfolio tidak ditemukan');
            return redirect()->to('admin_portfolio');
        }
        
        // Delete the file from server
        $filePath = 'uploads/' . $portfolio['file_name'];
        if (file_exists($filePath)) {
            try {
                unlink($filePath);
            } catch (\Exception $e) {
                log_message('error', 'Error deleting file: ' . $e->getMessage());
                // Continue with database deletion even if file deletion fails
            }
        }
        
        // Delete from database
        $result = $this->portfolioModel->delete($id);
        
        if ($result) {
            session()->setFlashdata('success', 'Portfolio berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus portfolio');
        }
        
        return redirect()->to('admin_portfolio');
    }
}