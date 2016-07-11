<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    public function checkTrackingCode($code) {
        if (!empty($code)) {
            $this->load->database();

            //in my database tracking_code can be in (123456, 123457, 248836)

            $sql = 'SELECT delivery_date FROM delivery WHERE tracking_code = ' . $code;
            $record = $this->db->query($sql);

            foreach ($record->result() as $row)
            {
                return $row->delivery_date;
            }
        }

        return false;

    }

    public function updateDeliveryDate($code, $date){
        if (!empty($code) && !empty($date)) {
            $this->load->database();

            $record = $this->checkTrackingCode($code);

            if ($record === false){
                return false;
            }

            $data = array('delivery_date' => $date);
            $this->db->where('tracking_code', $code);
            $this->db->update('delivery', $data);

            return true;

        }

    }
}