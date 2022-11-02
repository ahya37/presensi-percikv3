<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
            redirect('auth');
        }
        //set zona waktu
        $where = array(
            'default_zone' => 1
        );
        $z = $this->Crud->get_where('indonesia_timezone', $where)->row_array();
        if ($this->db->affected_rows() == true) {
            date_default_timezone_set($z['lokasi']);
        }
        //end set zona
    }

    public function index()
    {

        $data['tanggal'] = $this->konversi->hariIndo(date('l, d-F-Y'));
        $this->load->view('karyawan', $data);
    }
    // public function get_all_limit($table)
    // {
    //     $this->db->order_by("id_attendance", "DESC");
    //     $this->db->limit(1);
    //     return $this->db->get($table);
    // }
    public function camera()
    {
        $this->load->view('camera');
    }
    // function newIdAttendance()
    // {
    //     $tgl = date('Y-m-d');
    //     $data = str_ireplace("-", ' ', $tgl);
    //     $data = preg_replace("/\s+/", "", $data);
    //     $a = $this->get_all_limit('time_attendance')->row_array();
    //     $no = 1;
    //     if ($a) :
    //         $b = explode('-', $a['id_attendance']);
    //         $val = isset($b[1]) ? $b[1] : null;
    //         $no = $val + 1;
    //     endif;

    //     $data = 'ATD' . $data . '-' . $no;
    //     return $data;
    // }
    public function addIn()
    {
        // $id_attendance = $this->newIdAttendance();
        $current_time = date('Y-m-d H:i:s');
        $cr = explode(' ', $current_time);

        //set zona waktu
        $where = array(
            'default_zone' => 1
        );
        $zona = $this->Crud->get_where('indonesia_timezone', $where)->row_array();
        //end set zona

        $temp = [];

        //cek dulu apakah sudah pernah absen dihari yang sama
        $where = array(
            'attendance_date' => $this->input->post('attendance_date'),
            'nik' => $this->input->post('nik'),
        );

        $this->Crud->get_where('time_attendance', $where);
        if ($this->db->affected_rows() == true) {
            $d['result'] = 400;

            $temp[] = $d;
            echo json_encode($temp);
            //end cek 

        } else {
            //hitung terlambat berapa lama
            //ambil data dari shift
            $jika = array(
                'id' => $this->session->userdata('shift_id')
            );
            $r = $this->Crud->get_where('office_shift', $jika)->row_array();
            //tentukan ini hari apa
            if (date('l') == 'Monday') {
                $time_db = strtotime($r['senin_in']);
            } else if (date('l') == 'Tuesday') {
                $time_db = strtotime($r['selasa_in']);
            } else if (date('l') == 'Wednesday') {
                $time_db = strtotime($r['rabu_in']);
            } else if (date('l') == 'Thursday') {
                $time_db = strtotime($r['kamis_in']);
            } else if (date('l') == 'Friday') {
                $time_db = strtotime($r['jumat_in']);
            } else if (date('l') == 'Saturday') {
                $time_db = strtotime($r['sabtu_in']);
            } else if (date('l') == 'Sunday') {
                $time_db = strtotime($r['Minggu_in']);
            }
            //selesai tentukan hari

            //ambil waktu actual
            $i = explode(' ', $current_time);
            $time_act = strtotime($i[1]);
            //hitung selisih dalam detik
            $selisih = $time_act - $time_db;
            if ($selisih > 0) {
                $telat = gmdate("H:i:s", $selisih);
            } else {
                $telat = '00:00:00';
            }
            //selesai hitung telat
            $nik = $this->input->post('nik');
            $data = array(
                // 'id_attendance' => $id_attendance,
                'nik' => $this->input->post('nik'),
                'attendance_date' => $this->input->post('attendance_date'),
                'clock_in' => $current_time,
                'status_clock' => '1',
                'clock_in_latitude' => $this->input->post('clock_in_latitude'),
                'clock_in_longitude' => $this->input->post('clock_in_longitude'),
                'time_late' => $telat,
                'zona' => $zona['kode']
            );
            // var_dump($data);
            // die();
            // $dt_id_attendance = $data['id_attendance'];
            $this->Crud->insert_clock_w_camera('time_attendance', $data);
            $id = '';
            $id = $this->input->post("img");
            if ($this->db->affected_rows() == true) {

                define('UPLOAD_DIR', 'assets/bsb/images/absensi/');
                $data = explode(',', $this->input->post("img"));
                $image = base64_decode($data[1]);
                $file = UPLOAD_DIR . md5($id) . '.png';
                $success = file_put_contents($file, $image);
                // echo $id;
                // die();
                if ($success) {
                    $dt_image = array(
                        'image_in' => md5($id) . ".png"
                    );
                    $b = array(
                        'attendance_date' => $this->input->post('attendance_date'),
                        'nik' => $this->input->post('nik'),
                    );
                    $this->Crud->update('time_attendance', $dt_image, $b);
                    // $this->db->where(['image' => md5($id) . ".png"]);
                    // $this->db->update('time_attendance', [
                    //     "nik" => $nik
                    // ]);
                    // $this->db->update_where('time_attendance', ['image' => md5($id) . ".png"], [
                    //     "nik" => $nik
                    // ]);
                    // $this->res->json200("success");
                    $d['result'] = 200;
                    $d['clock'] = $cr[1];
                    $d['zona'] = $zona['kode'];
					$d['late']  = $telat;
                    $temp[] = $d;
                    echo json_encode($temp);
                } else {
                    // $this->res->json(500, "file corrupted!");
                    $d['result'] = 500;
                    $temp[] = $d;
                    echo json_encode($temp);
                }
            } else {
                $d['result'] = 500;
                $temp[] = $d;
                echo json_encode($temp);
            }
            // echo json_encode($temp);
        }
    }

    public function addOut()
    {
        $current_time = date('Y-m-d H:i:s');
        $cr = explode(' ', $current_time);

        $temp = [];

        //cek dulu apakah sudah selesai absen dihari yang sama
        $where = array(
            'attendance_date' => $this->input->post('attendance_date'),
            'nik' => $this->input->post('nik'),
            'status_clock' => '0',
        );
        $this->Crud->get_where('time_attendance', $where);

        if ($this->db->affected_rows() == true) {
            $d['result'] = 400;

            $temp[] = $d;
            echo json_encode($temp);
            //end cek 

        } else {
            //hitung early_leaving berapa lama
            //ambil data dari shift
            $jika = array(
                'id' => $this->session->userdata('shift_id')
            );
            $r = $this->Crud->get_where('office_shift', $jika)->row_array();
            //tentukan ini hari apa
            if (date('l') == 'Monday') {
                $time_db = strtotime($r['senin_out']);
            } else if (date('l') == 'Tuesday') {
                $time_db = strtotime($r['selasa_out']);
            } else if (date('l') == 'Wednesday') {
                $time_db = strtotime($r['rabu_out']);
            } else if (date('l') == 'Thursday') {
                $time_db = strtotime($r['kamis_out']);
            } else if (date('l') == 'Friday') {
                $time_db = strtotime($r['jumat_out']);
            } else if (date('l') == 'Saturday') {
                $time_db = strtotime($r['sabtu_out']);
            } else if (date('l') == 'Sunday') {
                $time_db = strtotime($r['Minggu_out']);
            }
            //selesai tentukan hari

            //ambil waktu actual
            $i = explode(' ', $current_time);
            $time_act = strtotime($i[1]);
            //hitung selisih dalam detik
            $selisih = $time_db - $time_act;
            if ($selisih > 0) {
                $early = gmdate("H:i:s", $selisih);
            } else {
                $early = '00:00:00';
            }
            //selesai hitung early

            //hitung overtime (kelebihan waktu setelah jam pulang)
            $ov = $time_act - $time_db;
            if ($ov > 0) {
                $overtime = gmdate("H:i:s", $ov);
            } else {
                $overtime = '00:00:00';
            }
            //selesai hitung overtime

            //hitung time work
            $jk = array(
                'nik' => $this->session->userdata('nik'),
                'status_clock' => '1'
            );
            $yu = $this->Crud->get_where('time_attendance', $jk)->row_array();
            if ($this->db->affected_rows() == true) {
                $h = explode(' ', $yu['clock_in']);
                $total_work =  strtotime($current_time) - strtotime($h[1]);
            } else {
                $total_work = '00:00:00';
            }
            //selesai hitung total work

            $b = array(
                'attendance_date' => $this->input->post('attendance_date'),
                'nik' => $this->input->post('nik'),
            );
            $data = array(
                'nik' => $this->input->post('nik'),
                'attendance_date' => $this->input->post('attendance_date'),
                'clock_out' => $current_time,
                'status_clock' => '0',
                'clock_out_latitude' => $this->input->post('clock_out_latitude'),
                'clock_out_longitude' => $this->input->post('clock_out_longitude'),
                'early_leaving' => $early,
                'overtime' => $overtime,
                'total_work' => $total_work
            );
            $this->Crud->update_clock_w_camera('time_attendance', $data, $b);
            $id = '';
            $id = $this->input->post("img");
            if ($this->db->affected_rows() == true) {
                define('UPLOAD_DIR', 'assets/bsb/images/absensi/');
                $data = explode(',', $this->input->post("img"));
                $image = base64_decode($data[1]);
                $file = UPLOAD_DIR . md5($id) . '.png';
                $success = file_put_contents($file, $image);
                // echo $id;
                // die();
                if ($success) {
                    $dt_image = array(
                        'image_out' => md5($id) . ".png"
                    );
                    $b = array(
                        'attendance_date' => $this->input->post('attendance_date'),
                        'nik' => $this->input->post('nik'),
                    );
                    $this->Crud->update('time_attendance', $dt_image, $b);

                    $d['result'] = 200;
                    $d['clock'] = $cr[1];
                    $d['zona'] = $yu['zona'];

                    $temp[] = $d;
                } else {
                    $d['result'] = 500;
                    $temp[] = $d;
                }
            } else {
                $d['result'] = 500;
                $temp[] = $d;
            }
            echo json_encode($temp);
        }
    }

    public function getClock()
    {
        $where = array(
            'nik' => $this->input->post('nik'),
            'attendance_date' => $this->input->post('attendance_date'),
        );

        $result = $this->Crud->get_where('time_attendance', $where)->row_array();
        if ($this->db->affected_rows() == true) {
            echo json_encode($result);
        } else {
            $result = '500';
            echo json_encode($result);
        }
    }
}
