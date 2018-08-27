<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Groups_m extends CI_Model
{

	public $_table = "groups";

	public function getData(){
	    $sql = "
	    SELECT 
		 id,
		 group_name,
         description
		FROM groups
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
		 id,
		 group_name,
         description
		FROM groups
		WHERE 
		deleted='0'
		AND id=? ";

        $query = $this->db->query($sql, array($id) );

        if($query->num_rows() > 0){

            return $query->row();
        }

        return array();

    }

    public function save()
    {
        $data = array(
            'id' => get_uuid(),
            'group_name' => $this->input->post('group_name'),
            'description' => $this->input->post('description'),
            'created_by' => $this->session->userdata('logged_in')['id'],
            'date_created' => date("Y-m-d H:i:s", time())
        );

        $this->db->insert('groups',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update($id)
    {

        $data = array(
            'group_name' => $this->input->post('group_name'),
            'description' => $this->input->post('description'),
            'modified_by' => $this->session->userdata('logged_in')['id'],
            'date_modified' => date("Y-m-d H:i:s", time()),
        );


        $this->db->where('id', $id);
        $this->db->update('groups', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function soft_delete($id)
    {

        $data = array(  
            'deleted' => '1',
            'modified_by' => $this->session->userdata('logged_in')['id'],
            'date_modified' => date("Y-m-d H:i:s", time()),
        );

        $this->db->where('id', $id);
        $this->db->update('groups', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }
}
