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
        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga'       => $this->request->getVar('harga'),
            'stok'        => $this->request->getVar('stok')
        ]);

        session()->setFlashdata('pesan', 'Data barang berhasil ditambahkan.');

        return redirect()->to('/barang');
    }
    public function edit($id_barang)
    {
$data = [
            'title'  => 'Edit Data Barang',
            'barang' => $this->barangModel->find($id_barang) 
        ];

        return view('barang/edit', $data);
    }
    public function update($id_barang)
    {
$this->barangModel->save([
            'id_barang'   => $id_barang,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga'       => $this->request->getVar('harga'),
            'stok'        => $this->request->getVar('stok')
        ]);

        session()->setFlashdata('pesan', 'Data barang berhasil diubah.');

        return redirect()->to('/barang');
    }
    public function delete($id_barang)
    {
        // Menghapus data dari database berdasarkan ID
        $this->barangModel->delete($id_barang);

        // Menyiapkan pesan sukses
        session()->setFlashdata('pesan', 'Data barang berhasil dihapus.');

        // Mengembalikan user ke halaman utama
        return redirect()->to('/barang');
    }
}
