<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    public function index()
    {
        $data =[
            'title' => 'Daftar Barang',
            'barang' => $this->barangModel->findAll()
        ];
        return view('barang/index', $data);
    }
    public function create()
    {
        $data = ['title' => 'Tambah Barang'];
        return view('barang/create', $data);
    }
    public function store()
    {
        
    }
    public function edit($id_barang)
    {

    }
    public function update($id_barang)
    {

    }
    public function delete($id_barang)
    {

    }
}
