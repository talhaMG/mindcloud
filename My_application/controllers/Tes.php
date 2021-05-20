<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once('vendor/autoload.php');
//include('../libraries/S3.php');
include('My_application/libraries/S3.php');

 
 


class Tes extends CI_Controller
{

    public function __construct(){
        global $config;

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('S3_upload');
        $this->load->library('S3');
        
    }

    public function addImages()
    {   
        global $config;
        
    
        $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                $dir = dirname($_FILES["file"]["tmp_name"]);
                $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];
                rename($_FILES["file"]["tmp_name"], $destination);

                $upload = $this->s3_upload->upload_file($destination);                
            }     
    }

    public function my()
    {
        $this->load->view("my",$data); 
    }

}