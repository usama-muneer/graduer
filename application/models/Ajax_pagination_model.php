<?php

 class Ajax_pagination_model extends CI_Model{

   function count_all(){
     $sql = 'SELECT * FROM gigs WHERE gig_status = "Active"';
     $data = $this->db->query($sql);
     return $data->num_rows();
   }

   public function getGig($page){
     $offset = 10 * $page;
     $limit = 10;
     $sql = "SELECT * FROM gigs LIMIT $offset ,$limit";
     $result = $this->db->query($sql)->result();
     return $result;
   }

   /*
   function fetch_details($limit, $start){
     $output = '';
     $this->db->select("*");
     $this->db->from("gigs");
     $this->db->order_by("gig_title", "ASC");
     $this->db->limit($limit, $start);
     $query  = $this->db->get();
     foreach($query->result() as $data){
     $output .= '
         <div class="col-md-4 padding card-deck">
         <div class="card">
           <a href="#"><img src="<?php echo base_url().$data['gig_picture']; ?>" class="img-fluid img-viewgig" alt="Image not found" /></a>
           <div class="card-body text-center">
             <h5><?php echo anchor("borderc/viewgig/{$data['gig_id']}", $data['gig_title'], ['class'=>'pfont']); ?></h5>
           </div>
           <div class="card-footer">
           <span><small><?php echo $data['user_id']; ?></small></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="text-center"><small>Starting from $<?php echo $data['gig_price']; ?></small></span>
         </div>
         </div>
       </div>
     ';
    }
    return $output;
   }
   */

 }

?>
