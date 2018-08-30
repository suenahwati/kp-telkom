<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class User_m extends CI_Model
{

	public $_table = "users";

	public function getData(){
	    $sql = "
	    SELECT 
		 id,
		 username,
		 email,
		 last_login,
		 first_name,
		 last_name
		FROM users
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
		 username,
		 email,
		 last_login,
		 first_name,
		 last_name
		FROM users
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
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password')),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'active' => $this->input->post('active'),
            'created_by' => $this->session->userdata('logged_in')['id'],
            'date_created' => date("Y-m-d H:i:s", time())
        );

        $this->db->insert('users',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update($id)
    {

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'modified_by' => $this->session->userdata('logged_in')['id'],
            'date_modified' => date("Y-m-d H:i:s", time()),
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

    public function soft_delete($id)
    {

        $data = array(  
            'deleted' => '1',
            'modified_by' => $this->session->userdata('logged_in')['id'],
            'date_modified' => date("Y-m-d H:i:s", time()),
        );

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

        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password=SHA1("' . $password . '")', '', false);
        $this->db->where('active','1');
        $this->db->where('deleted','0');
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
                'group'=> $userdata->group,
                'logged_in' => TRUE
            );

            $this->session->set_userdata('logged_in', $session_data);

            $data = array('last_login' => date("Y-m-d H:i:s", time()));
            $this->db->where('id', $userdata->id);
            $this->db->update('users',$data);

            return true;
        }
    }

    public function signup()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->from('users');
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
            $this->db->update('users',$data);

            return true;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }



}
