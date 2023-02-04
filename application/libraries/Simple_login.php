<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load daat model user
        $this->CI->load->model('user_model');
	}


	// Fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// Jika ada data user maka create session login
		// if($check->num_rows() > 0){ //jika login sebagai dosen
  //               $data=$check->row_array();
  //               $this->session->set_userdata('login',TRUE);
  //                if($data['level']=='1'){ //Akses admin
  //                   $this->session->set_userdata('akses','1');
  //                   $this->session->set_userdata('ses_id',$data['nip']);
  //                   $this->session->set_userdata('ses_nama',$data['nama']);
  //                   redirect('page');
 
  //                }else{ //akses dosen
  //                   $this->session->set_userdata('akses','2');
  //                   $this->session->set_userdata('ses_id',$data['nip']);
  //                   $this->session->set_userdata('ses_nama',$data['nama']);
  //                   redirect('page');
  //                }
 
  //       }else{ //jika login sebagai mahasiswa
  //                   $cek_mahasiswa=$this->login_model->auth_mahasiswa($username,$password);
  //                   if($cek_mahasiswa->num_rows() > 0){
  //                           $data=$cek_mahasiswa->row_array();
  //                   $this->session->set_userdata('masuk',TRUE);
  //                           $this->session->set_userdata('akses','3');
  //                           $this->session->set_userdata('ses_id',$data['nim']);
  //                           $this->session->set_userdata('ses_nama',$data['nama']);
  //                           redirect('page');
  //                   }else{  // jika username dan password tidak ditemukan atau salah
  //                           $url=base_url();
  //                           echo $this->session->set_flashdata('msg','Username Atau Password Salah');
  //                           redirect($url);
  //                   }
  //       }
		if($check){
			$id_user		= $check->id_user;
			$nama			= $check->nama;
			$akses_level	= $check->akses_level;
			$akses_level_name = $this->CI->user_model->getAccessRoleAuth($id_user)->nama;
			// Creattte session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('nama_akses_level', $akses_level_name);
			// level akses
            redirect(base_url('admin/dasbor'),'refresh');
			// redirect ke halaman admin yang diproteksi
		}else{
			// Kalau tidak ada (username password salah), maka suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Username atau password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	// function auth(){
 //        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
 //        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
 //        $cek_dosen=$this->login_model->auth_dosen($username,$password);
 
 //        if($cek_dosen->num_rows() > 0){ //jika login sebagai dosen
 //                        $data=$cek_dosen->row_array();
 //                $this->session->set_userdata('masuk',TRUE);
 //                 if($data['level']=='1'){ //Akses admin
 //                    $this->session->set_userdata('akses','1');
 //                    $this->session->set_userdata('ses_id',$data['nip']);
 //                    $this->session->set_userdata('ses_nama',$data['nama']);
 //                    redirect('page');
 
 //                 }else{ //akses dosen
 //                    $this->session->set_userdata('akses','2');
 //                                $this->session->set_userdata('ses_id',$data['nip']);
 //                    $this->session->set_userdata('ses_nama',$data['nama']);
 //                    redirect('page');
 //                 }
 
 //        }else{ //jika login sebagai mahasiswa
 //                    $cek_mahasiswa=$this->login_model->auth_mahasiswa($username,$password);
 //                    if($cek_mahasiswa->num_rows() > 0){
 //                            $data=$cek_mahasiswa->row_array();
 //                    $this->session->set_userdata('masuk',TRUE);
 //                            $this->session->set_userdata('akses','3');
 //                            $this->session->set_userdata('ses_id',$data['nim']);
 //                            $this->session->set_userdata('ses_nama',$data['nama']);
 //                            redirect('page');
 //                    }else{  // jika username dan password tidak ditemukan atau salah
 //                            $url=base_url();
 //                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
 //                            redirect($url);
 //                    }
 //        }
 
 //    }

	// Fungsi cek login
	public function cek_login()
	{
		// Memeriksa apakah session sudah atau belum, jika beum alihkan ke halaman login
		if ($this->CI->session->userdata('username') == "") 
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi logout
	public function logout()
	{
		// Membuang semua session yang telah dibuat pada saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		// Setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
