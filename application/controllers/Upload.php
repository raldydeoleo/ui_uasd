<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $config);
    }

    public function index()
    {
        $this->load->view('Uploadform', array('error' => ' ' ));
    }

    public function do_upload()
    {  $config = array(
        'upload_path'   => './uploads/',
        'allowed_types' => '*',
        'max_size'   => 10,
        'max_width'  => 1024,
        'max_height' => 768,

    );

        if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('file_view', $error);
        }


        $this->upload->do_upload('userfile');
        $data = $this->upload->data();

    }

    public function cargaimagen(){



    }

}
?>