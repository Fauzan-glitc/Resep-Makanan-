<?php
class Admin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_admin');
		
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('login'));
		}
	}
	
	public function index(){
		$data['komen'] =  $this->Model_admin->semua('tbl_komen')->num_rows();
		$data['resep'] =  $this->Model_admin->semua('tbl_resep')->num_rows();
		$data['title'] = 'Dashboard';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
	} 

	public function resep(){
		$data['hasil']= $this->Model_admin->tampil('tbl_resep')->result();
		$data['title'] = 'Resep';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/resep');
    $this->load->view('admin/footer');
	}

	public function tambah(){
		$data['hasil']= $this->Model_admin->tampil('tbl_kategori')->result();
		$data['title'] = 'Resep';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/tambah');
    $this->load->view('admin/footer');
	}

	public function tambah_resep()
	{
		$config['upload_path']          = './assets/gambar';
		$config['allowed_types']        = 'img|png|jpeg|gif|jpg';
		$config['max_size']             = 10000000;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
					 $error = array('error' => $this->upload->display_errors());
					 $this->session->set_flashdata('pesan', 'Hanya Boleh foto dengan format gambar');
				 	redirect(base_url('admin/tambah'));
	 }else{
					 $data = array('foto' => $this->upload->data());
					 $uploadData = $this->upload->data();
					 $hasil = $uploadData['file_name'];
					 $data = array(
					 'nama' => $this->input->post('nama'),
					 'bahan' => $this->input->post('bahan'),
					 'bumbu' => $this->input->post('bumbu'),
					 'kesulitan' => $this->input->post('kesulitan'),
					 'waktu' => $this->input->post('waktu'),
					 'kategori' => $this->input->post('kategori'),
					 'asal' => $this->input->post('asal'),
					 'gambar' => $hasil,
					 'masak' => $this->input->post('cara'),
				 );

				 $this->db->insert('tbl_resep',$data);
				 $this->session->set_flashdata('msg',
				 '<div class="alert alert-success alert-dismissible" role="alert">
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <strong>Berhasil!</strong> menambahkan Resep
				 </div>'
				 );
				 redirect(base_url('admin/resep'));
		}
	}

	function hapus_resep($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_resep',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Berhasil!</strong> Menghapus resep
		</div>'
		);
		redirect(base_url('admin/resep'));
	}

	public function kategori(){
		$data['hasil']= $this->Model_admin->tampil('tbl_kategori')->result();
		$data['title'] = 'Kategori';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/kategori');
    $this->load->view('admin/footer');
	}

	public function tambah_kategori()
	{
		$nama = $_POST['nama'];
		$data = array(
			'nama'=>$nama,
			);
		$this->Model_admin->tambah('tbl_kategori',$data);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Berhasil!</strong> menambahkan Kategori
		</div>'
		);
		redirect(base_url('admin/kategori'));
	}

	function hapus_kategori($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_kategori',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Berhasil!</strong> Menghapus kategori
		</div>'
		);
		redirect(base_url('admin/kategori'));
	}


	public function Komentar(){
		$data['hasil']= $this->Model_admin->tampil('tbl_komen')->result();
		$data['title'] = 'Komentar';
		$this->load->view('admin/header', $data);
    $this->load->view('admin/komentar');
    $this->load->view('admin/footer');
	}

	function hapus_komen($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_komen',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Berhasil!</strong> Menghapus komentar
		</div>'
		);
		redirect(base_url('admin/komentar'));
	}



	function hapus_peminjam($id)
	{
		$where = array('id'=>$id);
		$this->Model_admin->hapus('tbl_peminjam',$where);
		$this->session->set_flashdata('msg',
		'<div class="alert alert-success alert-has-icon">
		<div class="alert-icon"><i class="fas fa-check"></i></div>
		<div class="alert-body">
			<div class="alert-title">Success</div>
			Cucian berhasil dicancel
		</div>
		</div>'
		);
		redirect(base_url('admin/peminjam'));
	}
	// application/controllers/Admin.php

public function edit_resep($id)
{
    $data['recipe'] = $this->Model_admin->get_resep_by_id($id);
    $data['title'] = 'Edit Resep';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_resep', $data);
    $this->load->view('admin/footer');
}

public function update_resep()
{
    $id = $this->input->post('id');
    $data = array(
        'nama' => $this->input->post('nama'),
        'bahan' => $this->input->post('bahan'),
        'bumbu' => $this->input->post('bumbu'),
        'kesulitan' => $this->input->post('kesulitan'),
        'waktu' => $this->input->post('waktu'),
        'kategori' => $this->input->post('kategori'),
        'asal' => $this->input->post('asal'),
        'masak' => $this->input->post('cara')
    );

    if (!empty($_FILES['foto']['name'])) {
        $config['upload_path'] = './assets/gambar';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = 10000;
        $config['max_width'] = 10240;
        $config['max_height'] = 7680;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $uploadData = $this->upload->data();
            $data['gambar'] = $uploadData['file_name'];
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> ' . $this->upload->display_errors() . '</div>');
            redirect('admin/edit_resep/' . $id);
        }
    }

    $this->Model_admin->update_resep($id, $data);
    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Berhasil!</strong> Resep berhasil diupdate!</div>');
    redirect('admin/resep');
}
public function edit_kategori($id)
{
    $data['kategori'] = $this->Model_admin->get_kategori_by_id($id);
    $data['title'] = 'Edit Kategori';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_kategori', $data);
    $this->load->view('admin/footer');
}

public function update_kategori()
{
    $id = $this->input->post('id');
    $data = array(
        'nama' => $this->input->post('nama')
    );
    $this->Model_admin->update_kategori($id, $data);
    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Berhasil!</strong> Mengedit kategori</div>');
    redirect(base_url('admin/kategori'));
}
public function edit_profile()
{
    $data['admin'] = $this->Model_admin->get_admin_by_id($this->session->userdata('admin_id'));
    $data['title'] = 'Edit Profile';
    $this->load->view('admin/header', $data);
    $this->load->view('admin/edit_profile', $data);
    $this->load->view('admin/footer');
}

public function update_profile()
{
    $id = $this->session->userdata('admin_id');
    if (!$id) {
        redirect('login');
    }

    $this->load->library('upload');
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->upload->initialize($config);

    if ($this->upload->do_upload('foto')) {
        $file_data = $this->upload->data();
        $foto = $file_data['file_name'];
    } else {
        $foto = null;
    }

    $nama = $this->input->post('nama');

    $data = array('nama' => $nama);
    if ($foto) {
        $data['foto'] = $foto;
    }

    $this->Model_admin->update_admin($id, $data);
    redirect('admin/edit_profile');
}
}