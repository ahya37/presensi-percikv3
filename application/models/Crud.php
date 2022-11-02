<?php

class Crud extends CI_Model
{
    public function get_where($table, $where)
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get_where($table, $where);
    }

    public function get_all($table)
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get($table);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function insert_clock_w_camera(string $table, array $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insert_clock($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_clock_in();
    }

    public function delete($table, $data)
    {
        $this->db->delete($table, $data);
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_clock_w_camera(string $table, array $data, array $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->insert_id();
    }

    function upload_user($name, $nik, $shift, $email, $image, $pass)
    {
        $data = array(
            'name' => $name,
            'nik' => $nik,
            'shift_id' => $shift,
            'email' => $email,
            'image' => $image,
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'role_id' => '2',
            'is_active' => '1'
        );

        $this->db->insert('user', $data);
    }

    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']    = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insert_multiple($data, $a, $filename)
    {
        $this->db->insert_batch('absensi', $data);

        //cek jumlah row yang diinsert
        $count =  $this->Crud->countUpload($filename);
        // $count =  $this->db->query("SELECT COUNT(*) FROM mst_rm WHERE batch ='$filename'");
        //jika tidak sama
        if ($count == $a) {
            //hapus file excel
            unlink('upload/' . $filename . '.xlsx');
            redirect("admin/dataabsensi"); // Redirect ke halaman awal
        } else if ($count <> $a) {
            $this->Crud->hapusGagalUploadrm($filename);
            //hapus file excel
            unlink('upload/' . $filename . '.xlsx');
            redirect("admin/notOkAbsensi"); // Redirect ke halaman awal
        }
    }

    public function countUpload($filename)
    {
        $this->db->where('batch', $filename);
        $this->db->from('absensi');
        return $this->db->count_all_results();
    }

    public function hapusGagalUploadrm($filename)
    {
        $this->db->where('batch', $filename);
        $this->db->delete('absensi');
    }

    public function simpan_upload($waktu, $jenis, $image, $tanggal, $time)
    {
        if ($jenis == 'masuk') {
            $r = 'clock_in';
            $b = 'lokasi_file_masuk';
        } else {
            $r = 'clock_out';
            $b = 'lokasi_file_pulang';
        }

        //ambil data dulu
        $where = array(
            'email' => $this->session->userdata('email')
        );
        $query = $this->db->get_where('user', $where)->row_array();
        //cek apakah masuk kategori ontime, terlambat, pulang cepat
        $id = array(
            'id' => $query['shift_id']
        );
        $s = $this->db->get_where('shift', $id)->row_array();

        if ($time > $s['awal'] && $jenis == 'masuk') {
            $status_masuk = 'terlambat';
            $status_pulang = '';
        } else if ($time <= $s['awal'] && $jenis == 'masuk') {
            $status_masuk = 'ontime';
            $status_pulang = '';
        } else if ($time < $s['akhir'] && $jenis == 'pulang') {
            $status_pulang = 'pulang cepat';
        } else if ($time >= $s['akhir'] && $jenis == 'pulang') {
            $status_pulang = 'ontime';
        }



        if ($jenis == 'pulang') {
            $where = array(
                'nik' => $this->session->userdata('nik'),
                'tanggal' => $tanggal
            );
            $this->db->get_where('absensi', $where);

            if ($this->db->affected_rows() == true) {

                $t = array(
                    'nik' => $query['nik']
                );
                $a = array(
                    'clock_out' => $waktu,
                    'status_pulang' => $status_pulang,
                    'lokasi_file_pulang' => $image
                );
                $this->db->where($t);
                $this->db->update('absensi', $a);
            } else {
                $data = array(
                    'nama' => $query['name'],
                    'nik' => $query['nik'],
                    'department' => $query['department'],
                    'jabatan' => $query['jabatan'],
                    'tanggal' => $tanggal,
                    'status_pulang' => $status_pulang,
                    $r => $waktu,
                    $b => $image
                );
                $this->db->insert('absensi', $data);
            }
        } else {
            $data = array(
                'nama' => $query['name'],
                'nik' => $query['nik'],
                'department' => $query['department'],
                'jabatan' => $query['jabatan'],
                'tanggal' => $tanggal,
                'status_masuk' => $status_masuk,
                $r => $waktu,
                $b => $image
            );
            $this->db->insert('absensi', $data);
        }
    }

    public function join_absensi($email)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.nik = user.nik');
        $this->db->where($email);
        $this->db->order_by("absensi.id", "DESC");
        return $this->db->get();
    }

    public function join_data($select, $table1, $table2, $on, $where)
    {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $on);
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_data_without_where($select, $table1, $table2, $like)
    {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $like);
        return $this->db->get();
    }

    function upload_profile($image)
    {
        $data = array(
            'image' => $image
        );
        $where = array(
            'nik' => $this->session->userdata('nik')
        );

        $this->db->where($where);
        $result = $this->db->update('user', $data);

        return $result;
    }

    function upload_cuti($image, $awal, $akhir, $jenis, $keperluan)
    {
        //AMBIL DATA DARI USER
        $where = array(
            'nik' => $this->session->userdata('nik')
        );
        $a = $this->db->get_where('user', $where)->row_array();
        $data = array(
            'lokasi_dokumen' => $image,
            'awal' => $awal,
            'akhir' => $akhir,
            'kategori' => $jenis,
            'alasan' => $keperluan,
            'nama' => $a['name'],
            'nik' => $a['nik'],
            'department' => $a['department'],
            'jabatan' => $a['jabatan'],
        );

        $this->db->insert('cuti', $data);
    }

    function upload_reimbursment($image, $billing, $nominal, $keperluan)
    {
        //AMBIL DATA DARI USER
        $where = array(
            'nik' => $this->session->userdata('nik')
        );
        $a = $this->db->get_where('user', $where)->row_array();
        $data = array(
            'lokasi_dokumen' => $image,
            'kuitansi' => $billing,
            'nominal' => $nominal,
            'keperluan' => $keperluan,
            'tanggal_pengajuan' => date('Y-m-d'),
            'nama' => $a['name'],
            'nik' => $a['nik'],
            'department' => $a['department'],
            'jabatan' => $a['jabatan'],
        );

        $this->db->insert('reimbursment', $data);
    }

    function count($table, $where)
    {
        $this->db->where($where);
        return $this->db->count_all_results($table);
    }

    function countall($table)
    {
        return $this->db->count_all_results($table);
    }

    function get_query($where)
    {
        return $this->db->query('select name, jabatan, image from user where nik = (select nik from department where department = "' . $where . '")');
    }
}
