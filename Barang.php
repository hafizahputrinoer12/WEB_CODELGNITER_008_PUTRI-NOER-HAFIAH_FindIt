<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Barang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->barangModel;

        if ($keyword) {
            $builder = $builder->like('nama_barang', $keyword);
        }

        $data = [
            'barang' => $builder->orderBy('id', 'DESC')->findAll(),
            'keyword' => $keyword
        ];

        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $rules = [
            'nama_barang' => 'required|min_length[2]|max_length[100]',
            'lokasi'      => 'required|max_length[150]',
            'tanggal'     => 'required|valid_date[Y-m-d]',
            'deskripsi'   => 'required',
            'status'      => 'required|in_list[Hilang,Ditemukan,Sudah Diambil]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'lokasi'      => $this->request->getPost('lokasi'),
            'tanggal'     => $this->request->getPost('tanggal'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/')
            ->with('success', 'Data barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('barang/edit', ['barang' => $barang]);
    }

    public function update($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'nama_barang' => 'required|min_length[2]|max_length[100]',
            'lokasi'      => 'required|max_length[150]',
            'tanggal'     => 'required|valid_date[Y-m-d]',
            'deskripsi'   => 'required',
            'status'      => 'required|in_list[Hilang,Ditemukan,Sudah Diambil]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'lokasi'      => $this->request->getPost('lokasi'),
            'tanggal'     => $this->request->getPost('tanggal'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/')
            ->with('success', 'Data barang berhasil diperbarui!');
    }

    public function delete($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->barangModel->delete($id);

        return redirect()->to('/')
            ->with('success', 'Data barang berhasil dihapus!');
    }
}
