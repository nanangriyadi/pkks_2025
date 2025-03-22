<?php

namespace App\Controllers;


use App\Models\PortfolioModel;
use App\Models\AboutModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $portfolioModel;
    protected $aboutModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->aboutModel = new AboutModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home Page',
        ];
        return view('home/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Page',
            'abouts' => $this->aboutModel->getAllAbouts()
        ];
        return view('home/about', $data);
    }

    public function team()
    {
        $data = [
            'title' => 'Team Page',
        ];
        return view('home/team', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Page',
        ];
        return view('home/contact', $data);
    }


    public function portfolio()
    {
        $data = [
            'title' => 'Portfolio Page',
            'portfolios' => $this->portfolioModel->getAllPortfolios()
        ];
        return view('home/portfolio', $data);
    }

    // Halaman form upload
    public function upload()
    {
        $data = [
            'title' => 'Upload Portfolio PDF Baru'
        ];

        return view('portfolio/upload', $data);
    }

    // Proses upload portfolio
    public function save()
    {
        // Validasi input
        $rules = [

            'userfile' => [
                'uploaded[userfile]',
                'mime_in[userfile,application/pdf]',
                'max_size[userfile,5120]', // 5MB max
            ],
            'description' => 'permit_empty|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('userfile');

        // Cek apakah file valid
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid');
        }

        // Pindahkan file ke direktori uploads
        $newName = $file->getRandomName();
        $file->move('uploads/portfolios', $newName);

        // Simpan info file ke database
        $filepath = 'uploads/portfolios/' . $newName;

        $this->portfolioModel->save([
            'description' => $this->request->getPost('description'),
            'file_name' => $newName,
            'file_path' => $filepath,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize()
        ]);

        return redirect()->to('/admin_portfolio')->with('message', 'Portfolio berhasil diupload');
    }

    // Halaman detail portfolio
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Portfolio',
            'portfolio' => $this->portfolioModel->getPortfolio($id)
        ];

        if (empty($data['portfolio'])) {
            return redirect()->to('/admin_portfolio');
        }

        return view('portfolio/detail', $data);
    }

    // Halaman form edit portfolio
    public function edit($id)
    {
        $portfolio = $this->portfolioModel->getPortfolio($id);

        if (empty($portfolio)) {
            return redirect()->to('/admin_portfolio')->with('error', 'Portfolio tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Portfolio',
            'portfolio' => $portfolio
        ];

        return view('portfolio/edit', $data);
    }

    // Proses update portfolio
    public function update($id)
    {
        // Cari portfolio berdasarkan ID
        $portfolio = $this->portfolioModel->find($id);

        if (!$portfolio) {
            return redirect()->to('/admin_portfolio')->with('error', 'Portfolio tidak ditemukan.');
        }

        // Validasi input
        $rules = [
            'userfile' => [
                'mime_in[userfile,application/pdf]',
                'max_size[userfile,5120]', // 5MB max
            ],
            'description' => 'permit_empty|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        // Proses upload file baru jika ada
        $file = $this->request->getFile('userfile');
        if ($file->isValid() && !$file->hasMoved()) {
            // Hapus file lama
            if (file_exists(FCPATH . $portfolio['file_path'])) {
                unlink(FCPATH . $portfolio['file_path']);
            }

            // Pindahkan file baru
            $newName = $file->getRandomName();
            $file->move('uploads/portfolios', $newName);
            $data['file_name'] = $newName;
            $data['file_path'] = 'uploads/portfolios/' . $newName;
            $data['file_type'] = $file->getClientMimeType();
            $data['file_size'] = $file->getSize();
        }

        $this->portfolioModel->update($id, $data);

        return redirect()->to('/admin_portfolio')->with('message', 'Portfolio berhasil diupdate.');
    }

    public function error()
    {
        return view('errors/html/error_400');
    }
}
