<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Odp_m extends CI_Model
{

	public $_table = "users";

	public function getData(){
	    $sql = "
	   SELECT
         id,
         noss_id,
         odp_index,
         odp_name,
         latitude,
         clusname,
         clusterstatus,
         avai,
         used,
         rsk,
         rsv,
         is_total,
         regional,
         witel,
         datel,
         sto,
         sto_desc,
         odp_info,
         update_date,
         keterangan,
         date_created,
         date_modified,
         created_by,
         modified_by,
         deleted
        FROM odp 
        WHERE deleted='0'";

	    $query = $this->db->query($sql);

	    if($query->num_rows() > 0){

	        return $query->result();
	    }

	    return array();
	}

	public function get($id){

        $sql = "
        SELECT
         `id`,
         `noss_id`,
         `odp_index`,
         `odp_name`,
         `latitude`,
         `clusname`,
         `clusterstatus`,
         `avai`,
         `used`,
         `rsk`,
         `rsv`,
         `is_total`,
         `regional`,
         `witel`,
         `datel`,
         `sto`,
         `sto_desc`,
         `odp_info`,
         `update_date`,
         `keterangan`,
         `date_created`,
         `date_modified`,
         `created_by`,
         `modified_by`,
         `deleted`
        FROM `odp` 
        WHERE deleted='0'
		AND id=? ";

        $query = $this->db->query($sql, array($id) );

        if($query->num_rows() > 0){

            return $query->row();
        }

        return array();

    }

    public function input_data_odp($id)
    {

        $data = array(
            ' Noss_id' => $this->input->post('noss_id'),
            'odp_index' => $this->input->post('odp_index'),
            'odp_name' => $this->input->post('odp_name'),
            'latitude' => $this->input->post('latitude'),
            'longitude'=> $this->input->post,('longitude'),
            'clusname'=> $this->input->post,('clusname'),
            'clusterstatus'=> $this->input->post,('clusterstatus'),
            'avai'=> $this->input->post,('avai'),
            'used'=> $this->input->post,('used'),
            'rsk'=> $this->input->post,('rsk'),
            'rsv'=> $this->input->post,('rsv'),
            'is_total'=> $this->input->post,('is_total'),


        );

        if($this->input->post('password')){
            $data['password'] = sha1($this->input->post('password'));
        }

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function save()
    {
        $data = array(
            'id' => get_uuid(),
            'noss_id' => $this->input->post('noss_id'),
            'odp_index' => sha1($this->input->post('odp_index')),
            'odp_name' => $this->input->post('odp_name'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'clusname' => $this->input->post('clusname'),
            'clusterstatus' => $this->input->post('clusterstatus'),
            'avai' => $this->input->post('avai'),
            'used' => $this->input->post('used'),
            'rsk' => $this->input->post('rsk'),
            'rsv' => $this->input->post('rsv'),
            'is_total' => $this->input->post('istotal'),
            'regional' => $this->input->post('regional'),
            'witel' => $this->input->post('witel'),
            'datel' => $this->input->post('datel'),
            'sto' => $this->input->post('sto'),
            'sto_desc' => $this->input->post('sto_desc'),
            'odp_info' => $this->input->post('odp_info'),
            'update_date' => $this->input->post('update_date'),
            'keterangan' => $this->input->post('keterangan'),
            'created_by' => $this->session->userdata('logged_in')['id'],
            'date_created' => date("Y-m-d H:i:s", time())
        );

        $this->db->insert('odp',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }


}
