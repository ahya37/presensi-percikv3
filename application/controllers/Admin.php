<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Data Karyawan';
        $data['shift'] = $this->Crud->get_all('office_shift')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('admin');
        $this->load->view('template/footer');
    }

    public function lokasi()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Set Lokasi';
        $data['api'] = $this->Crud->get_all('license')->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('lokasi');
        $this->load->view('template/footer');
    }

    public function absensi()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Data Absensi';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('absensi');
        $this->load->view('template/footer');
    }

    public function shift()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Data Shift';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('shift');
        $this->load->view('template/footer');
    }

    public function user()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Data User';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user');
        $this->load->view('template/footer');
    }

    public function zona()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Zona Waktu';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('zona');
        $this->load->view('template/footer');
    }

    public function lisensi()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Lisensi';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('lisensi');
        $this->load->view('template/footer');
    }

    public function laporan()
    {
        $data['jd'] = '1';
        $data['title'] = 'Absensi | Laporan';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('laporan');
        $this->load->view('template/footer');
    }

    public function getDataCount()
    {
        $data = [];

        $where = array(
            'role_id' => '2'
        );
        $jika = array(
            'default_zone' => '1',
        );
        $karyawan = $this->Crud->count('user', $where);
        $zonad = $this->Crud->get_where('indonesia_timezone', $jika)->row_array();
        $shift = $this->Crud->countall('office_shift');
        $absensi = $this->Crud->countall('time_attendance');


        $d['karyawan'] = $karyawan;
        $d['zona'] = $zonad['lokasi'];
        $d['shift'] = $shift;
        $d['absensi'] = $absensi;

        $data[] = $d;

        echo json_encode($data);
    }

    public function getserial()
    {
        $result = $this->Crud->get_all('license')->row_array();

        echo json_encode($result);
    }

    public function getkaryawan()
    {
        $data = [];
        $no = 1;

        $where = array(
            'user.role_id' => '2',
        );

        $select = 'user.id, user.name, user.nik, user.email, user.image,user.is_active, office_shift.shift_name';
        $table1 = 'user';
        $table2 = 'office_shift';
        $like = 'office_shift.id = user.shift_id';
        $a = $this->Crud->join_data($select, $table1, $table2, $like, $where)->result_array();

        foreach ($a as $v) {
            $d['data']['no'] = $no;
            $d['data']['id'] = $v['id'];
            $d['data']['name'] = $v['name'];
            $d['data']['nik'] = $v['nik'];
            $d['data']['email'] = $v['email'];
            // $d['data']['image'] = $v['image'];
            $d['data']['is_active'] = $v['is_active'];
            $d['data']['shift'] = $v['shift_name'];

            $image = '';
            $this->db->from('user');
            $this->db->where("id", $v['id']);
            $dt = $this->db->get()->result();
            $img = '';
            foreach ($dt as $a) {
                $img = $a->image;
            }
            $files = 'assets/bsb/images/' . $img;

            if (file_exists($files)) {
                $image = $img;
            }
            $d['data']['image'] = $image;

            $data[] = $d;
            $no++;
        }
        echo json_encode($data);
    }

    public function hapusid()
    {
        $where = array(
            'id' => $this->input->post('id')
        );

        $table = $this->input->post('table');

        $this->Crud->delete($table, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }
    public function hapus_data()
    {
        $where = array(
            'id' => $this->input->post('id')
        );

        $image = $this->input->post('image');
        if ($image != '' && $image != 'null') {
            $files = 'assets/bsb/images/' . $image;
            if (file_exists($files)) :
                if ($image != 'null') :
                    if ($image != '') :
                        $temp = "assets/bsb/images/";
                        unlink($temp . $image);
                    endif;
                endif;
            endif;
        }

        $table = $this->input->post('table');

        $this->Crud->delete($table, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }
    public function updateid()
    {
        $where = array(
            'id' => $this->input->post('id')
        );

        $data = array(
            'is_active' => '2'
        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function updateapi()
    {
        $where = array(
            'id' => '1'
        );

        $data = array(
            'serial' => $this->input->post('sn'),
            'url' => $this->input->post('url'),
            'api' => $this->input->post('api'),
            'status_apps' => 'M@lang5098!'
        );

        $this->Crud->update('license', $data, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function updateaktifid()
    {
        $where = array(
            'id' => $this->input->post('id')
        );

        $data = array(
            'is_active' => '1'
        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    function do_upload()
    {

        //cek dulu apakah pilihan shift sudah dipilih
        if ($this->input->post('shift') == '') {
            $result = 600;
            echo json_encode($result);
            die;
        }
        //cek dulu apakah nik sudah terdaftar
        $a = array(
            'nik' => $this->input->post('nik')
        );
        $this->Crud->get_where('user', $a);
        if ($this->db->affected_rows() == true) {
            $result = 100;
            echo json_encode($result);
            die;
        } else {
            $b = array(
                'email' => $this->input->post('email')
            );
            $this->Crud->get_where('user', $b);
            if ($this->db->affected_rows() == true) {
                $result = 400;
                echo json_encode($result);
                die;
            }
        }
        if ($this->input->get('fileupload') == 'undefined') {
            $data = array();
            $data = array(
                'name' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'shift_id' => $this->input->post('shift'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'role_id' => '2',
                'is_active' => '1'
            );

            $this->db->insert('user', $data);
            if ($this->db->affected_rows() == true) {
                $result = 200;
            } else {
                $result = 500;
            }
        } else {
            $config['upload_path'] = "./assets/bsb/images";
            $config['allowed_types'] = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());

                $name = $this->input->post('nama');
                $nik = $this->input->post('nik');
                $shift = $this->input->post('shift');
                $pass = $this->input->post('pass');
                $email = $this->input->post('email');
                $image = $data['upload_data']['file_name'];

                $result = $this->Crud->upload_user($name, $nik, $shift, $email, $image, $pass);
                if ($this->db->affected_rows() == true) {
                    $result = 200;
                } else {
                    $result = 500;
                }
            }
        }
        echo json_encode($result);
    }

    public function getshift()
    {
        $result = $this->Crud->get_all('office_shift')->result_array();

        echo json_encode($result);
    }

    public function getadmin()
    {
        $data = [];
        $no = 1;

        $where = array(
            'role_id' => '1',
        );


        $a = $this->Crud->get_where('user', $where)->result_array();

        foreach ($a as $v) {
            $d['data']['no'] = $no;
            $d['data']['id'] = $v['id'];
            $d['data']['name'] = $v['name'];
            $d['data']['email'] = $v['email'];

            $data[] = $d;
            $no++;
        }
        echo json_encode($data);
    }

    public function getdetilserial()
    {
        $data = [];

        $a = $this->Crud->get_all('license')->result_array();

        foreach ($a as $v) {
            $d['data']['id'] = $v['id'];
            $d['data']['serial'] = $v['serial'];
            $d['data']['url'] = $v['url'];
            $d['data']['created_date'] = $v['created_date'];

            $data[] = $d;
        }
        echo json_encode($data);
    }

    public function updatepass()
    {
        $where = array(
            'id' => $this->input->post('id')
        );

        $data = array(
            'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function tambahadmin()
    {
        //cek dulu apakah email sudah terdaftar
        $where = array(
            'email' => $this->input->post('email')
        );
        $this->Crud->get_where('user', $where);

        if ($this->db->affected_rows() == true) {
            $result = 500;
            echo json_encode($result);
        } else {
            $data = array(
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nik' => uniqid(),
                'role_id' => '1',
                'is_active' => '1'
            );

            $table = $this->input->post('table');

            $this->Crud->insert($table, $data);

            if ($this->db->affected_rows() == true) {
                $result = 200;
            } else {
                $result = 400;
            }

            echo json_encode($result);
        }
    }

    public function getzona()
    {
        $data = [];
        $no = 1;


        $a = $this->Crud->get_all('indonesia_timezone')->result_array();

        // echo $this->db->last_query();
        // die;

        foreach ($a as $v) {
            $d['data']['no'] = $no;

            $d['data']['id'] = $v['id'];
            $d['data']['lokasi'] = $v['lokasi'];
            $d['data']['kode'] = $v['kode'];

            if ($v['default_zone'] == '1') {
                $d['data']['default_zone'] = 'Aktif';
            } else {
                $d['data']['default_zone'] = 'Non-Aktif';
            }

            $data[] = $d;
            $no++;
        }
        echo json_encode($data);
    }

    public function updateaktif()
    {
        //aktifkan
        $where = array(
            'id' => $this->input->post('id') //3
        );

        $data = array(
            'default_zone' => '1'
        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);


        //nonaktifkan sisanya
        $jika = array(
            'id !=' => $this->input->post('id') //3
        );
        $data = array(
            'default_zone' => '0'
        );
        $table = $this->input->post('table');
        $this->Crud->update($table, $data, $jika);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function updatenonaktif()
    {
        //aktifkan
        $where = array(
            'id' => '1'
        );

        $data = array(
            'default_zone' => '1'
        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);


        //nonaktifkan sisanya
        $jika = array(
            'id !=' => '1'
        );
        $data = array(
            'default_zone' => '0'
        );
        $table = $this->input->post('table');
        $this->Crud->update($table, $data, $jika);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function getdatashift()
    {
        $data = [];
        $no = 1;

        $a = $this->Crud->get_all('office_shift')->result_array();

        foreach ($a as $v) {
            $d['data']['no'] = $no;
            $d['data']['id'] = $v['id'];
            $d['data']['shift_name'] = $v['shift_name'];
            $d['data']['senin_in'] = $v['senin_in'];
            $d['data']['senin_out'] = $v['senin_out'];
            $d['data']['selasa_in'] = $v['selasa_in'];
            $d['data']['selasa_out'] = $v['selasa_out'];
            $d['data']['rabu_in'] = $v['rabu_in'];
            $d['data']['rabu_out'] = $v['rabu_out'];
            $d['data']['kamis_in'] = $v['kamis_in'];
            $d['data']['kamis_out'] = $v['kamis_out'];
            $d['data']['jumat_in'] = $v['jumat_in'];
            $d['data']['jumat_out'] = $v['jumat_out'];
            $d['data']['sabtu_in'] = $v['sabtu_in'];
            $d['data']['sabtu_out'] = $v['sabtu_out'];
            $d['data']['minggu_in'] = $v['minggu_in'];
            $d['data']['minggu_out'] = $v['minggu_out'];

            $data[] = $d;
            $no++;
        }
        echo json_encode($data);
    }

    public function tambahshift()
    {
        $data = array(
            'shift_name' => $this->input->post('nama'),
            'senin_in' => $this->input->post('senin_in'),
            'senin_out' => $this->input->post('senin_out'),
            'selasa_in' => $this->input->post('selasa_in'),
            'selasa_out' => $this->input->post('selasa_out'),
            'rabu_in' => $this->input->post('rabu_in'),
            'rabu_out' => $this->input->post('rabu_out'),
            'kamis_in' => $this->input->post('kamis_in'),
            'kamis_out' => $this->input->post('kamis_out'),
            'jumat_in' => $this->input->post('jumat_in'),
            'jumat_out' => $this->input->post('jumat_out'),
            'sabtu_in' => $this->input->post('sabtu_in'),
            'sabtu_out' => $this->input->post('sabtu_out'),
            'minggu_in' => $this->input->post('minggu_in'),
            'minggu_out' => $this->input->post('minggu_out'),

        );

        $table = $this->input->post('table');

        $this->Crud->insert($table, $data);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function editshift()
    {
        $where = array(
            'id' => $this->input->post('id')
        );
        $data = array(
            'shift_name' => $this->input->post('nama'),
            'senin_in' => $this->input->post('senin_in'),
            'senin_out' => $this->input->post('senin_out'),
            'selasa_in' => $this->input->post('selasa_in'),
            'selasa_out' => $this->input->post('selasa_out'),
            'rabu_in' => $this->input->post('rabu_in'),
            'rabu_out' => $this->input->post('rabu_out'),
            'kamis_in' => $this->input->post('kamis_in'),
            'kamis_out' => $this->input->post('kamis_out'),
            'jumat_in' => $this->input->post('jumat_in'),
            'jumat_out' => $this->input->post('jumat_out'),
            'sabtu_in' => $this->input->post('sabtu_in'),
            'sabtu_out' => $this->input->post('sabtu_out'),
            'minggu_in' => $this->input->post('minggu_in'),
            'minggu_out' => $this->input->post('minggu_out'),

        );

        $table = $this->input->post('table');

        $this->Crud->update($table, $data, $where);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 400;
        }

        echo json_encode($result);
    }

    public function tes()
    {
        $this->load->view('default');
    }

    public function getshiftedit()
    {
        $where = array(
            'id' => $this->input->post('id')
        );
        $table = $this->input->post('table');
        $result = $this->Crud->get_where($table, $where)->result_array();

        echo json_encode($result);
    }

    public function getabsensi()
    {

        $search_date_from = date("Y-m-d");
        $search_date_end = date("Y-m-d");

        if ($this->input->post("search_date_from") !== "" || $this->input->post("search_date_end") !== "") {
            $search_date_from = $this->input->post("search_date_from");
            $search_date_end = $this->input->post("search_date_end");
        }

        $data = [];
        $no = 1;


        $select = 'user.name,user.image, time_attendance.nik, time_attendance.attendance_date, time_attendance.clock_in, time_attendance.clock_out, time_attendance.clock_in_latitude, time_attendance.clock_in_longitude, time_attendance.clock_out_latitude, time_attendance.clock_out_longitude, time_attendance.time_late, time_attendance.early_leaving, time_attendance.overtime, time_attendance.total_work,time_attendance.image_in,time_attendance.image_out';
        $table1 = 'user';
        $table2 = 'time_attendance';
        $on = 'time_attendance.nik = user.nik';
        $where = ['time_attendance.attendance_date >=' => $search_date_from, 'time_attendance.attendance_date <=' => $search_date_end];

        $a = $this->Crud->join_data($select, $table1, $table2, $on, $where)->result_array();

        // echo $this->db->last_query();
        // die;

        foreach ($a as $v) {
            $attendance_date = date("d-M-Y", strtotime($v['attendance_date']));
            $clock_in = '0000-00-00 00:00:00';
            $clock_out = '0000-00-00 00:00:00';
            if ($v['clock_in'] == '0000-00-00 00:00:00') {
                $clock_in = '0000-00-00 00:00:00';
            } else {
                $clock_in = date("d-M-Y H:i:s", strtotime($v['clock_in']));
            }
            if ($v['clock_out'] == '0000-00-00 00:00:00') {
                $clock_out = '0000-00-00 00:00:00';
            } else {
                $clock_out = date("d-M-Y H:i:s", strtotime($v['clock_out']));
            }
            $d['data']['no'] = $no;
            $d['data']['name'] = $v['name'];
            $d['data']['nik'] = $v['nik'];
            $d['data']['attendance_date'] = $attendance_date;
            $d['data']['clock_in'] = $clock_in;
            $d['data']['clock_out'] = $clock_out;
            $d['data']['clock_in_latitude'] = $v['clock_in_latitude'];
            $d['data']['clock_in_longitude'] = $v['clock_in_longitude'];
            $d['data']['clock_out_latitude'] = $v['clock_out_latitude'];
            $d['data']['clock_out_longitude'] = $v['clock_out_longitude'];
            $d['data']['time_late'] = $v['time_late'];
            $d['data']['early_leaving'] = $v['early_leaving'];
            $d['data']['overtime'] = $v['overtime'];
            $d['data']['total_work'] = $v['total_work'];
            $d['data']['image'] = $v['image'];
            $d['data']['image_in'] = $v['image_in'];
            $d['data']['image_out'] = $v['image_out'];

            $data[] = $d;
            $no++;
        }
        // $data = array(
        //     "data" => $data,
        //     "query" => $this->db->last_query(),
        //     'clock_out' => $clock_out
        // );
        echo json_encode($data);
    }

    public function getDataLocation()
    {
        $this->db->from('location');
        $dt = $this->db->get()->result();
        echo json_encode($dt);
    }
	
	public function getDataTime()
    {
        $nik = $this->input->post('nik');

        $this->db->select('office_shift.time_limit','office_shift.senin_in');
        $this->db->from('office_shift');
        $this->db->join('user', 'office_shift.id = user.shift_id');
        $this->db->limit(1);
        $this->db->where('user.nik', $nik);
        $query = $this->db->get();
        $query->result();
        
        // $this->db->from('office_shift');
        // $dt = $this->db->get()->limit();
        echo json_encode($query);
    }

    public function addLocation()
    {
        // $dt = $this->input->post();
        // var_dump($dt);
        // die();
        $data = array(
            'name' => $this->input->post('nama'),
            'latitude' => $this->input->post('lat'),
            'longitude' => $this->input->post('lng'),
            'radius' => $this->input->post('radius')
        );
        $this->db->from('location');
        $dt = $this->db->get()->result();
        $count = count($dt);
        // echo $count;
        if ($count > 0) {
            // echo 'ada data';
            $id = '';
            foreach ($dt as $a) {
                $id = $a->id;
            }
            $this->Crud->update('location', $data, ['id' => $id]);

            if ($this->db->affected_rows() == true) {
                $result = 200;
            } else
                $result = 400;

            echo json_encode($result);
        } else {
            // echo 'tidak ada data';
            $this->Crud->insert('location', $data);

            if ($this->db->affected_rows() == true) {
                $result = 200;
            } else
                $result = 400;

            echo json_encode($result);
        }
        // die();


    }
}
