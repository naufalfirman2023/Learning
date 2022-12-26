<?php
 
namespace App\Controllers;
 
use CodeIgniter\restful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Mahasiswa;
 
class mhs extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new Mahasiswa();
        $data['mahasiswa'] = $model->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new Mahasiswa();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'tgl_lahir'  => $this->request->getVar('tgl_lahir'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($id = null)
    {
        $model = new Mahasiswa();
        $data = $model->where('id_mhs', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new Mahasiswa();
        // $id = $this->request->getVar('id_mhs');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'alamat'  => $this->request->getVar('alamat'),
            'tgl_lahir'  => $this->request->getVar('tgl_lahir')
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.',
            'id'=>$id,
            'nama'=>$this->request->getVar('nama'),
            'alamat'=>$this->request->getVar('alamat'),
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new Mahasiswa();
        $data = $model->where('id_mhs', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ],
                'id'=>$id,
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}