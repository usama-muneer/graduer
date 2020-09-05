<?php

  class Buyer_model extends CI_Model{

    function __construct(){
      parent::__construct();

      $this->load->library('form_validation');

      //prevent user if not logged in into the system
      if($this->session->userdata('logged_in') != true ){
        redirect(base_url(), '');
      }
    }

    function va_gig($serviceCategory_id = null){
      $sql = 'SELECT * FROM gigs where serviceCategory_name= ' . $serviceCategory_id;
      $query = $this->db->query($sql);
      //$this->db->where('user_id',$user_id);
      //$query = $this->db->get('gigs');
      //this query is = select * from users where username=$username and password=$password;
      return $query->result_array();
    }

    function verifypayment($card_no, $expiry_date, $cvv, $payment_method){
      $this->db->where('card_no',$card_no);
      $this->db->where('expiry_date',$expiry_date);
      $this->db->where('cvv', $cvv);
      $this->db->where('payment_method',$payment_method);
      $query = $this->db->get('cardverification');
      $result = $query->row_array();
      return ($query->num_rows() == 1) ? $result: false;
      }

    //UPDATE BUYER REQUEST DATA code START
    function update_balance($data = null, $payment_id = null){
        $this->db->where('payment_id', $payment_id);
        $this->db->update('cardverification', $data);
    }
    //UPDATE BUYER REQUEST DATA code END

    //INSERT ORDER DATA
    function insert_order($data){
      $this->db->insert('orders', $data);
      $order_id = $this->db->insert_id();
      return $order_id;
    }
    //INSERT ORDER DATA

    //INSERT EARNINGS DATA
    function insert_earning($data){
      $this->db->insert('earnings', $data);
    }
    //INSERT EARNINGS DATA

    //INSERT QWP EARNINGS DATA
    function insert_qwpearning($data){
      $this->db->insert('qwpearnings', $data);
    }
    //INSERT QWP EARNINGS DATA

    //INSERT ORDER DATA
    function insert_requirements($data){
      $this->db->insert('orderrequirements', $data);
      return true;
    }
    //INSERT ORDER DATA

    function update_status_approved($order_id){
      $this->db->set('approve_date', date('Y-m-d H:i:s'));
      $this->db->set('order_status', 'Completed');
      $this->db->where('order_id', $order_id);
      $this->db->update('orders');
    }

    function update_status_dispute($order_id){
      $this->db->set('order_status', 'Disputed');
      $this->db->where('order_id', $order_id);
      $this->db->update('orders');
    }

    function update_status_active($order_id){
      $this->db->set('order_status', 'Active');
      $this->db->where('order_id', $order_id);
      $this->db->update('orders');
    }

    function getOrderDataByOrderId($order_id){
      $this->db->where('order_id', $order_id);
      $data = $this->db->get('orders')->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

    function getOrderStatusByOrderId($order_id, $order_status){
      $where ="order_id = ". $order_id ." AND order_status ='" . $order_status ."'";
      $this->db->where($where);
      $data = $this->db->get('orders')->result_array();
      if($data){
        return $data;
      }
      else{
        return false;
      }
    }

  }

?>
