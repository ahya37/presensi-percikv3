<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // die;

        //ambil data dari model
        $table = 'user';
        $where = array(
            'email' => $email,
        );
        $user = $this->Crud->get_where($table, $where)->row_array();
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        // die;
        if ($user) {
            //cek dulu member aktive atau tidak
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    //jika sukses
                    $data = array(
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'nik' => $user['nik'],
                        'name' => $user['name'],
                        'shift_id' => $user['shift_id'],
                        'image' => $user['image'],
                    );
                    //buat session
                    $this->session->set_userdata($data);
                    //cek role_id karyawan atau admin ?
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('karyawan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Password Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda membutuhkan aktivasi terlebih dahulu!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username salah</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email already take, please use another'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', true)), //menghindari xss
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            );
            //tulis ke table via model
            $this->Crud->insert('user', $data);
            // $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation your account has been created. Please login</div>');
            redirect('auth');
        }
    }

    public function notfound()
    {
        $this->load->view('404');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('shift_id');
        $this->session->unset_userdata('image');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logout.</div>');
        redirect('auth');
    }
}
