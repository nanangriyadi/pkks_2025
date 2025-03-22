<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AboutModel;

class About extends Controller
{
    protected $aboutModel;

    public function __construct()
    {
        $this->aboutModel = new AboutModel();
    }

    // Halaman utama about (tampilan user)
    public function index() 
    {
        $data = [
            'title' => 'About Us',
            'abouts' => $this->aboutModel->getAllAbouts()
        ];

        return view('about/index', $data);
    }

    // Halaman admin about
    public function admin() 
    {
        $data = [
            'title' => 'Kelola About Us',
            'abouts' => $this->aboutModel->getAllAbouts()
        ];

        return view('about/admin', $data);
    }

    // Halaman create about
    public function create()
    {
        $data = [
            'title' => 'Tambah About Us'
        ];

        return view('about/create', $data);
    }

    // Halaman edit about
    public function edit($id)
    {
        $about = $this->aboutModel->getAbout($id);

        if (empty($about)) {
            return redirect()->to('/admin_about')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title' => 'Edit About Us',
            'about' => $about
        ];

        return view('about/edit', $data);
    }

    // Proses menyimpan data (create/update)
    public function save()
    {
        $id = $this->request->getPost('id');
        
        // Validasi input
        $rules = [
            'description' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Simpan data
        $data = [
            'description' => $this->request->getPost('description')
        ];
        
        // Jika ada ID, berarti update
        if ($id) {
            $data['id'] = $id;
        }
        
        $this->aboutModel->save($data);
        
        return redirect()->to('/admin_about')->with('success', 'Data berhasil disimpan');
    }

    // Proses delete
    public function delete($id)
    {
        // Cari berdasarkan id
        $about = $this->aboutModel->find($id);

        if (!$about) {
            return redirect()->to('/admin_about')->with('error', 'Data gagal dihapus');
        }

        // Hapus data
        $this->aboutModel->delete($id);

        return redirect()->to('/admin_about')->with('success', 'Data berhasil dihapus');
    }
}