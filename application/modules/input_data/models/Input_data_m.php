<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class input_data_m extends CI_Model
{

	public $_table = "users";

	public function getData(){
	    $sql = "
	    SELECT 
		 Noss_id,
		 odp_index,
		 odp_name,
		 latitude,
		 longitude,
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
         keterangan
		FROM input_data
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
		 Noss_id,
         odp_index,
         odp_name,
         latitude,
         longitude,
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
         keterangan
		FROM input_data
		WHERE 
		deleted='0'
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

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->from($this->_table);
        $this->db->where('username', $username);
        $this->db->where('password=SHA1("' . $password . '")', '', false);
        $this->db->where('active = 1');
        $result = $this->db->get();

        if ($result->num_rows() == 0) {
            return false;
        } else {
            $userdata = $result->row();
            $session_data = array(
                'id' => $userdata->id,
                // 'group_id' => $this->get_user_group($userdata->id),
                'full_name' => $userdata->first_name . ' ' . $userdata->last_name,
                'username' => $userdata->username,
                'email' => $userdata->email,
                'photo_profile' => $userdata->image,
                'language'=> $userdata->language,
                'logged_in' => TRUE
            );

            $this->session->set_userdata('logged_in', $session_data);

            $data = array('last_login' => date("Y-m-d H:i:s", time()));
            $this->db->where('id', $userdata->id);
            $this->db->update($this->_table,$data);

            return true;
        }
    }

    public function signup()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->from($this->_table);
        $this->db->where('username', $username);
        $this->db->where('password=SHA1("' . $password . '")', '', false);
        $this->db->where('active = 1');
        $result = $this->db->get();

        if ($result->num_rows() == 0) {
            return false;
        } else {
            $userdata = $result->row();
            $session_data = array(
                'id' => $userdata->id,
                // 'group_id' => $this->get_user_group($userdata->id),
                'full_name' => $userdata->first_name . ' ' . $userdata->last_name,
                'username' => $userdata->username,
                'email' => $userdata->email,
                'photo_profile' => $userdata->image,
                'language'=> $userdata->language,
                'logged_in' => TRUE
            );

            $this->session->set_userdata('logged_in', $session_data);

            $data = array('last_login' => date("Y-m-d H:i:s", time()));
            $this->db->where('id', $userdata->id);
            $this->db->update($this->_table,$data);

            return true;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }



}
