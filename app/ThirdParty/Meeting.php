<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller
{
	public function index()
	{
        date_default_timezone_set('Asia/Kolkata'); 
		$this->require_login();
        $data['user_id'] = $this->session->userdata('user_name');
        $user=$this->session->userdata('user_name');
        $data['user_details'] = $this->Admin_model->admin_details($user);
        $meetingID = $this->uri->segment(2);
        if(!empty($meetingID)){
            $data['meetingdetails'] = $this->db->where('meeting_id',$meetingID)->get('meeting')->result();
        }
        $this->load->view('header',$data);
        $this->load->view('addMeeting',$data);
        $this->load->view('footer',$data);
	}

    public function addMeeting()
	{
        $valid = array(
            "IndustryName" => array(
                "field" => "IndustryName",
                "label" => "Industry Name",
                "rules" => "trim"
            ),
            "contact" => array(
                "field" => "contact",
                "label" => "Contact",
                "rules" => "trim"
            ),
            "contactPerson" => array(
                "field" => "contactPerson",
                "label" => "Contact Person",
                "rules" => "trim"
            ),
            "date" => array(
                "field" => "date",
                "label" => "Date",
                "rules" => "trim"
            ),
            "meetingDate" => array(
                "field" => "meetingDate",
                "label" => "Meeting Date",
                "rules" => "trim"
            ),
            "meetingTime" => array(
                "field" => "meetingTime",
                "label" => "Meeting Time",
                "rules" => "trim"
            ),
            "address" => array(
                "field" => "address",
                "label" => "Address",
                "rules" => "trim"
            ),
            "remark" => array(
                "field" => "remark",
                "rules" => "trim"
            ),
            "status" => array(
                "field" => "status",
                "label" => "Status",
                "rules" => "trim"
            ),
        );
        // set the rules
        $this->form_validation->set_rules($valid);

        // Override the message
        $this->form_validation->set_message('required', 'The %s field is empty!');


        if ($this->form_validation->run() == FALSE)  // didn't validate
        { 
            redirect("Meeting");
        } else {
            $meeting_id = $this->input->post('meeting_id');
            if(!empty($meeting_id)){                
                $datasss = array(
                    'contactPerson' => $this->input->post('contactPerson'),
                    'IndustryName' => $this->input->post('IndustryName'),
                    'empId' => $this->session->userdata('emp_id'),
                    'contact' => $this->input->post('contact'),
                    'date' => $this->input->post('date'),
                    'meetingDate' => $this->input->post('meetingDate'),
                    'meetingTime' => $this->input->post('meetingTime'),
                    'address' => $this->input->post('address'),
                    //'meeting_assign' => $this->input->post('meeting_assign'),
                    'status' => $this->input->post('status'),
                    'remark' => $this->input->post('remark'),
                    'modified_at' => date('Y-m-d H:i:s'),
                );
                $query = $this->db->where('meeting_id ',$meeting_id)->update('meeting', $datasss);
            }else{
                
                $datasss = array(
                    'contactPerson' => $this->input->post('contactPerson'),
                    'IndustryName' => $this->input->post('IndustryName'),
                    'empId' => $this->session->userdata('emp_id'),
                    'contact' => $this->input->post('contact'),
                    'date' => $this->input->post('date'),
                    'meetingDate' => $this->input->post('meetingDate'),
                    'meetingTime' => $this->input->post('meetingTime'),
                    'address' => $this->input->post('address'),
                    //'meeting_assign' => $this->input->post('meeting_assign'),
                    'status' => $this->input->post('status'),
                    'remark' => $this->input->post('remark'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'modified_at' => date('Y-m-d H:i:s'),
                );
                $query = $this->db->insert('meeting', $datasss);
            }            
            if ($query) {
                $this->session->set_flashdata('message', 'Meeting Added Successfully');
                redirect("meetingList");
            } else {
                $this->session->set_flashdata('message', 'Meeting Addition Failed');
                redirect("meetingList");
            }
        }
    }

    public function statusUpdate(){
        
        $datasss = array(
            'status' => $this->input->post('status'),
            'modified_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('meeting_id ',$this->input->post('meeting_id'))->update('meeting', $datasss);
        if ($query) {
            $this->session->set_flashdata('message', 'Meeting Added Successfully');
            redirect("meetingList");
        } else {
            $this->session->set_flashdata('message', 'Meeting Addition Failed');
            redirect("meetingList");
        }
    }
    public function meetingList()
	{
        date_default_timezone_set('Asia/Kolkata'); 
		$this->require_login();
        $data['user_id'] = $this->session->userdata('user_name');
        $user=$this->session->userdata('user_name');
        $data['user_details'] = $this->Admin_model->admin_details($user);
        $data['meetingList'] = $this->db->get('meeting')->result();
     
        $this->load->view('header',$data);
        $this->load->view('meetingList',$data);
        $this->load->view('footer',$data);
	}

  protected function require_login(){
      date_default_timezone_set('Asia/Kolkata');
      $user=$this->session->userdata('user_name');
      $data['user_details'] = $this->Admin_model->admin_details($user);
      if(!empty( $data['user_details'])){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true){
          redirect('Login');
        }
        else{

        }
      }else{
          redirect('Login');
        } 
  }

  public function Excelupload(){
    date_default_timezone_set('Asia/Kolkata'); 
    $this->require_login();
    $data['user_id'] = $this->session->userdata('user_name');
    $user=$this->session->userdata('user_name');
    $data['user_details'] = $this->Admin_model->admin_details($user);
    //$data['meetingList'] = $this->db->get('meeting')->result();
 
    $this->load->view('header',$data);
    $this->load->view('Excelupload',$data);
    $this->load->view('footer',$data);
  }

  public function upload_excel()
  {
    $uploadedStatus = 0;

        if ( isset($_POST["submit"]) ) {
        if ( isset($_FILES["file"])) {
                  
        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
         if (file_exists($_FILES["file"]["name"])) {
         unlink($_FILES["file"]["name"]);
         }
        $storagename = "./Samle_Excel1.xlsx";

        move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
        $uploadedStatus = 1;

        }
        } else {
        echo "No file selected <br />";
        }
        set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');
        include 'PHPExcel/IOFactory.php';
        // This is the file path to be uploaded.
        $inputFileName = './Samle_Excel1.xlsx'; 
        
        try {
          $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
          
        } catch(Exception $e) {
          die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        

        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        
        $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet     
      

        for($i=2;$i<=$arrayCount;$i++){
            $IndustryName = $allDataInSheet[$i]["A"];
            $contact = $allDataInSheet[$i]["B"];
            $contactPerson = $allDataInSheet[$i]["C"];
            $date = $allDataInSheet[$i]["D"];
            $meetingDate = $allDataInSheet[$i]["E"];
            $meetingTime = $allDataInSheet[$i]["F"];
            $address = $allDataInSheet[$i]["G"];
            $status = $allDataInSheet[$i]["H"];
            $remark = $allDataInSheet[$i]["I"];

            $data = array(
                        'empId'=> $this->session->userdata('emp_id'),
                        'IndustryName'=> $IndustryName,
                        'contactPerson'=> $contactPerson,
                        'contact'=> $contact,
                        'date'=> $date,
                        'meetingDate'=> $meetingDate,
                        'meetingTime'=> $meetingTime,
                        'address'=> $address,
                        'status'=> $status,
                        'remark	'=> $remark,
                        'created_at'=> date('Y-m-d H:i:s'),
                        'modified_at'=> date('Y-m-d H:i:s'),
                            
                    );
                print_r($data);

               $insert = $this->db->insert('meeting',  $data);

        }

    }
    redirect('Excelupload');
  }



}
?>
