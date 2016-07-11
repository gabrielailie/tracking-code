<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() //Get estimated delivery date
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code'])) {
         $code = $_POST['code'];
         $this->load->model('Delivery');
         $record = $this->Delivery->checkTrackingCode($code); 

         if ($record === false) {
         	$last['error'] = 'The tracking code is not correct! Please try again!';
         } else {
         	$last['date'] = $record;
         }

         $this->load->view('form_delivery_date', $last);

        } else {
            
            $this->load->view('form_delivery_date');
        }
    }

    public function updateDeliveryDate()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code']) && !empty($_POST['date'])) {
         $this->load->model('Delivery');
         $record = $this->Delivery->updateDeliveryDate($_POST['code'], $_POST['date']); 

         if ($record === false) {
         	$data['error'] = 'The tracking code is not correct! Please try again!';
         } else {
         	$data['succes'] = 'Delivery date was updated!';
         }

         $this->load->view('form_update_delivery_date', $data);

        } else {
            
            $this->load->view('form_update_delivery_date');
        }
    }
}
