<?php

namespace App\Controllers;

use App\Models\AboutModel;
use CodeIgniter\Controller;
use App\Models\PortfolioModel;

class Admin extends Controller
{
    protected $aboutModel;
    protected $portfolioModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->aboutModel = new AboutModel();
    }

    public function index() 
    {
        $data = [
            'title' => 'Admin Dashboard',
            'abouts' => $this->aboutModel->getAllAbouts(),
            'portfolios' => $this->portfolioModel->getAllPortfolios()
        ];

        return view('admin/index', $data);
    }

  
};
