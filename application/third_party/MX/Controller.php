<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
	}
	
	public function __get($class) {
		return CI::$APP->$class;
	}

	public function send_email($email, $subject, $isi_email)
  {
    // $email = "abdulghanni2@gmail.com";
    $connected = @fsockopen("erlangga.co.id", 80);
    $testing = '';
    if($connected):
      // $config = Array(
      //               'protocol' => 'smtp',
      //               'smtp_host' => 'mail.erlangga.co.id',
      //               'smtp_port' => 587,
      //               'smtp_user' => 'ax.hrd@erlangga.co.id', 
      //               'smtp_pass' => 'erlangga', 
      //               'mailtype' => 'html',
      //               'charset' => 'iso-8859-1',
      //               'wordwrap' => TRUE
      //               );
      $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'localhost',
                    'smtp_port' => 25,
                    'smtp_user' => 'Admin', 
                    'smtp_pass' => '', 
                    'mailtype' => 'html',
                    // 'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                    );

       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");  
       $this->email->from('ax.hrd@erlangga.co.id', 'HRIS-Erlangga');
       $this->email->to($email);
       $this->email->subject('HRIS Erlangga - '.$subject);
       $this->email->message($isi_email);
     
         if($this->email->send())
         {
           return true;
           //return $this->email->print_debugger();
         }
         else
         {
          return false;
          //return '$this->email->print_debugger()';
         }
    else:
      return false;
    endif;
   }

  function get_user_atasan($id = null)
  {
      if($id != null)$id = $this->session->userdata('user_id');

      $pos_group = get_pos_group(get_nik($id));
      $url = get_api_key().'users/superior/EMPLID/'.get_nik($id).'/format/json';
      $url_grade = get_api_key().'users/superior_by_grade/EMPLID/'.get_nik($id).'/format/json';
      $url_atasan_satu_bu = get_api_key().'users/atasan_satu_bu/EMPLID/'.get_nik($id).'/format/json';
      $url_atasan_bypos = get_api_key().'users/atasan_by_posgroup/EMPLID/'.get_nik($id).'/format/json';
      $headers = get_headers($url);
      $headers_grade = get_headers($url_grade);
      $headers2 = get_headers($url_atasan_satu_bu);
      $headers3 = get_headers($url_atasan_bypos);
      $response = substr($headers[0], 9, 3);
      $response_grade = substr($headers_grade[0], 9, 3);
      $response2 = substr($headers2[0], 9, 3);
      $response3 = substr($headers3[0], 9, 3);
      //$url_atasan_satu_bu = get_api_key().'users/atasan_satu_bu/EMPLID/'.get_nik($id).'/format/json';
      if(get_nik($id) == "P1048" || "P0740"):
              $get_atasan_grade = file_get_contents($url_grade);
              $atasan_grade = json_decode($get_atasan_grade, true);
              return $this->data['user_atasan'] = $atasan_grade;
      elseif($pos_group == 'AMD' || $pos_group == 'DIR' || $pos_group == 'KACAB' || $pos_group == 'MGR' || $pos_group == 'ASM' || $pos_group == 'KADEP'):
          if ($response != "404") {
              $get_atasan = file_get_contents($url);
              $atasan = json_decode($get_atasan, true);
              $get_atasan2 = file_get_contents($url_atasan_satu_bu);
              $atasan2 = json_decode($get_atasan2, true);
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              $atasan4 = array_merge($atasan, $atasan2, $atasan3);
              return $this->data['user_atasan'] = $atasan4;
          }elseif($response == "404" && $response2 != "404" && $response3 != "404"){
               
              $get_atasan2 = file_get_contents($url_atasan_satu_bu);
              $atasan2 = json_decode($get_atasan2, true);
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              $atasan4 = array_merge($atasan2, $atasan3);
              return $this->data['user_atasan'] = $atasan4;
          }elseif($response == "404" && $response2 == "404" && $response3 != "404"){
              
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              return $this->data['user_atasan'] = $atasan3;
          }else{
              return false;
          }
      else:
          if($response != "404") {
            $get_atasan = file_get_contents($url);
            $atasan = json_decode($get_atasan, true);
             foreach ($atasan as $row)
                return $this->data['user_atasan'] = $atasan;
           }elseif($response == "404" && $response2 != "404") {
            $get_atasan = file_get_contents($url_atasan_satu_bu);
            $atasan = json_decode($get_atasan, true);
             return $this->data['user_atasan'] = $atasan;
           }else{
                $result['0']= '- Karyawan Tidak Memiliki Atasan -';
        }
      endif;
  }

  function get_user_atasan_test($id = null)
  {
      if($id != null)$id = $this->session->userdata('user_id');

      $pos_group = get_pos_group(get_nik($id));
      $url = get_api_key().'users/superior/EMPLID/'.get_nik($id).'/format/json';
      $url_grade = get_api_key().'users/superior_by_grade/EMPLID/'.get_nik($id).'/format/json';
      $url_atasan_satu_bu = get_api_key().'users/atasan_satu_bu/EMPLID/'.get_nik($id).'/format/json';
      $url_atasan_bypos = get_api_key().'users/atasan_by_posgroup/EMPLID/'.get_nik($id).'/format/json';
      $headers = get_headers($url);
      $headers_grade = get_headers($url_grade);
      $headers2 = get_headers($url_atasan_satu_bu);
      $headers3 = get_headers($url_atasan_bypos);
      $response = substr($headers[0], 9, 3);
      $response_grade = substr($headers_grade[0], 9, 3);
      $response2 = substr($headers2[0], 9, 3);
      $response3 = substr($headers3[0], 9, 3);
      //$url_atasan_satu_bu = get_api_key().'users/atasan_satu_bu/EMPLID/'.get_nik($id).'/format/json';
      if(get_nik($id) == "P1048" || "P0740"):
              $get_atasan_grade = file_get_contents($url_grade);
              $atasan_grade = json_decode($get_atasan_grade, true);
              return $this->data['user_atasan'] = $atasan_grade;
      elseif($pos_group == 'AMD' || $pos_group == 'DIR' || $pos_group == 'KACAB' || $pos_group == 'MGR' || $pos_group == 'ASM' || $pos_group == 'KADEP'):
          if ($response != "404") {
              $get_atasan = file_get_contents($url);
              $atasan = json_decode($get_atasan, true);
              $get_atasan2 = file_get_contents($url_atasan_satu_bu);
              $atasan2 = json_decode($get_atasan2, true);
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              $atasan4 = array_merge($atasan, $atasan2, $atasan3);
              return $this->data['user_atasan'] = $atasan4;
          }elseif($response == "404" && $response2 != "404" && $response3 != "404"){
               
              $get_atasan2 = file_get_contents($url_atasan_satu_bu);
              $atasan2 = json_decode($get_atasan2, true);
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              $atasan4 = array_merge($atasan2, $atasan3);
              return $this->data['user_atasan'] = $atasan4;
          }elseif($response == "404" && $response2 == "404" && $response3 != "404"){
              
              $get_atasan3 = file_get_contents($url_atasan_bypos);
              $atasan3 = json_decode($get_atasan3, true);
              return $this->data['user_atasan'] = $atasan3;
          }else{
              return false;
          }
      else:
          if($response != "404") {
            $get_atasan = file_get_contents($url);
            $atasan = json_decode($get_atasan, true);
             foreach ($atasan as $row)
                return $this->data['user_atasan'] = $atasan;
           }elseif($response == "404" && $response2 != "404") {
            $get_atasan = file_get_contents($url_atasan_satu_bu);
            $atasan = json_decode($get_atasan, true);
             return $this->data['user_atasan'] = $atasan;
           }else{
                $result['0']= '- Karyawan Tidak Memiliki Atasan -';
        }
      endif;
  }

  function get_user_bu($user_id)
  {
      if(empty($user_id)){
          return '-';
      }else{
          $url = get_api_key().'users/user_bu/EMPLID/'.$user_id.'/format/json';
          $headers = get_headers($url);
          $response = substr($headers[0], 9, 3);
          if ($response != "404") 
          {
              $getuser_info = file_get_contents($url);
              $user_info = json_decode($getuser_info, true);
              //if($user_info == '51')$user_info = '50';
              return $user_info;
          } else {
              return '';
          }
      }
  }

  function send_notif_tambahan($id, $form)
  {   
      if($form == "tidak_masuk"){
         $form_id = getValue('id', 'form_type', array('title'=>'like/tidak'));
      }elseif($form == "demotion"){
         $form_id = getValue('id', 'form_type', array('title'=>'like/demosi'));
      }elseif($form == "spd_luar_group"){
         $form_id = getValue('id', 'form_type', array('title'=>'like/dinas'));
      }elseif($form == "training_group"){
         $form_id = getValue('id', 'form_type', array('title'=>'like/training'));
      }else{
        $form_id = getValue('id', 'form_type', array('title'=>'like/'.$form));
      }

      if($form == 'spd_luar_group'){
        $url = base_url().'form_pjd/submit/'.$id;
      }else{
        $url = base_url().'form_'.$form.'/detail/'.$id;
      }

      if($form == 'spd_luar_group'){
        $user_id = getValue('task_creator', 'users_'.$form, array('id'=>'where/'.$id));
      }elseif($form == 'training_group'){
        $user_id = getValue('user_pengaju_id', 'users_'.$form, array('id'=>'where/'.$id));
      }else{
        $user_id = getValue('user_id', 'users_'.$form, array('id'=>'where/'.$id));
      }
      $user_nik = get_nik($user_id);
      $user_bu = $this->get_user_bu($user_nik);
      $f =  array('form_type_id'=>'where/'.$form_id, 'bu'=>'where/'.$user_bu);
      $receiver = getValue('user_nik', 'users_notif_tambahan',$f);
      switch ($form) {
        case 'absen':
          $subject_form = "Keterangan Tidak Absen";
          break;
        case 'tidak_masuk':
          $subject_form = "Izin Tidak Masuk";
          break;
        case 'recruitment':
          $subject_form = "SDM Baru";
          break;
        case 'pemutusan':
          $subject_form = "Pemutusan Kontrak";
          break;
        case 'kontrak':
          $subject_form = "Perpanjangan Kontrak";
          break;
        case 'demotion':
          $subject_form = "Demosi";
          break;
        case 'rolling':
          $subject_form = "Mutasi";
          break;
        case 'spd_luar_group':
          $subject_form = "Perjalanan Dinas";
          break;
        case 'training_group':
          $subject_form = "Pelatihan";
          break;
        case 'resignment':
          $subject_form = "Pengunduran Diri";
          break;
        case 'kenaikan_gaji':
          $subject_form = "Kenaikan Gaji";
        break;
        case 'Exit Clearance':
          $subject_form = "Rekomendasi Karyawan Keluar";
        break;
        
        default:
          $subject_form = $form;
          break;
      }

      $subject_email = 'Pengajuan '.ucfirst($subject_form);
      $isi_email = 'HRD telah menyetujui pengajuan '.$subject_form.' oleh '.get_name($user_id).', untuk melihat detail silakan <a class="klikmail" href='.$url.'>Klik Disini</a><br />';
      //Notif to karyawan
      if(!empty($receiver)){
          $data4 = array(
                  'sender_id' => get_nik(sessId()),
                  'receiver_id' => $receiver,
                  'sent_on' => date('Y-m-d-H-i-s',strtotime('now')),
                  'subject' => $subject_email,
                  'email_body' => $isi_email,
                  'is_read' => 0,
              );
          $this->db->insert('email', $data4);
          if(!empty(getEmail($receiver)))$this->send_email(getEmail($receiver), $subject_email, $isi_email);
      }
  }
}