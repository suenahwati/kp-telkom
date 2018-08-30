<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Capex_m extends CI_Model
{

	public $_table = "capex";

	public function getData(){
	    $sql = "
	    SELECT
        id, 
        new_co,
        docc,
        witel,
        packet,
        wbs_element,
        ref_document_number,
        item,
        cost_element,
        name,
        vendor,
        user_name,
        document_date,
        value_trancurr,
        debit_date,
        document_header_text,
        purchasing_document,
        vendor2
        FROM capex
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
        new_co,
        docc,
        witel,
        packet,
        wbs_element,
        ref_document_number,
        item,
        cost_element,
        name,
        vendor,
        user_name,
        document_date,
        value_trancurr,
        debit_date,
        document_header_text,
        purchasing_document,
        vendor2
        FROM capex
        WHERE deleted='0'
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
            'new_co' => $this->input->post('new_co'),
            'docc' => $this->input->post('docc'),
            'witel' => $this->input->post('witel'),
            'packet' => $this->input->post('packet'),
            'wbs_element' => $this->input->post('wbs_element'),
            'ref_document_number' => $this->input->post('ref_document_number'),
            'item' => $this->input->post('item'),
            'cost_element' => $this->input->post('cost_element'),
            'name' => $this->input->post('name'),
            'vendor' => $this->input->post('vendor'),
            'user_name' => $this->input->post('user_name'),
            'document_date' => $this->input->post('document_date'),
            'value_trancurr' => $this->input->post('value_trancurr'),
            'debit_date' => $this->input->post('debit_date'),
            'document_header_text' => $this->input->post('document_header_text'),
            'purchasing_document' => $this->input->post('purchasing_document'),
            'vendor2' => $this->input->post('vendor2'),
            'created_by' => $this->session->userdata('logged_in')['id'],
            'date_created' => date("Y-m-d H:i:s", time())
        );

        $this->db->insert('capex',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function update($id)
    {

        $data = array(
            'new_co' => $this->input->post('new_co'),
            'docc' => $this->input->post('docc'),
            'witel' => $this->input->post('witel'),
            'packet' => $this->input->post('packet'),
            'wbs_element' => $this->input->post('wbs_element'),
            'ref_document_number' => $this->input->post('ref_document_number'),
            'item' => $this->input->post('item'),
            'cost_element' => $this->input->post('cost_element'),
            'name' => $this->input->post('name'),
            'vendor' => $this->input->post('vendor'),
            'user_name' => $this->input->post('user_name'),
            'document_date' => $this->input->post('document_date'),
            'value_trancurr' => $this->input->post('value_trancurr'),
            'debit_date' => $this->input->post('debit_date'),
            'document_header_text' => $this->input->post('document_header_text'),
            'purchasing_document' => $this->input->post('purchasing_document'),
            'vendor2' => $this->input->post('vendor2'),
            'modified_by' => $this->session->userdata('logged_in')['id'],
            'date_modified' => date("Y-m-d H:i:s", time()),
        );

        if($this->input->post('password')){
            $data['password'] = sha1($this->input->post('password'));
        }

        $this->db->where('id', $id);
        $this->db->update('capex', $data);

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
        $this->db->update('capex', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function save_import($data)
    {

        $this->db->insert('capex',$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    // public function login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $this->db->from('capex');
    //     $this->db->where('username', $username);
    //     $this->db->where('password=SHA1("' . $password . '")', '', false);
    //     $this->db->where('active','1');
    //     $this->db->where('deleted','0');
    //     $result = $this->db->get();

    //     if ($result->num_rows() == 0) {
    //         return false;
    //     } else {
    //         $userdata = $result->row();
    //         $session_data = array(
    //             'id' => $userdata->id,
    //             // 'group_id' => $this->get_user_group($userdata->id),
    //             'full_name' => $userdata->first_name . ' ' . $userdata->last_name,
    //             'username' => $userdata->username,
    //             'email' => $userdata->email,
    //             'photo_profile' => $userdata->image,
    //             'language'=> $userdata->language,
    //             'logged_in' => TRUE
    //         );

    //         $this->session->set_userdata('logged_in', $session_data);

    //         $data = array('last_login' => date("Y-m-d H:i:s", time()));
    //         $this->db->where('id', $userdata->id);
    //         $this->db->update('capex',$data);

    //         return true;
    //     }
    // }

    // public function signup()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $this->db->from('capex');
    //     $this->db->where('username', $username);
    //     $this->db->where('password=SHA1("' . $password . '")', '', false);
    //     $this->db->where('active = 1');
    //     $result = $this->db->get();

    //     if ($result->num_rows() == 0) {
    //         return false;
    //     } else {
    //         $userdata = $result->row();
    //         $session_data = array(
    //             'id' => $userdata->id,
    //             // 'group_id' => $this->get_user_group($userdata->id),
    //             'full_name' => $userdata->first_name . ' ' . $userdata->last_name,
    //             'username' => $userdata->username,
    //             'email' => $userdata->email,
    //             'photo_profile' => $userdata->image,
    //             'language'=> $userdata->language,
    //             'logged_in' => TRUE
    //         );

    //         $this->session->set_userdata('logged_in', $session_data);

    //         $data = array('last_login' => date("Y-m-d H:i:s", time()));
    //         $this->db->where('id', $userdata->id);
    //         $this->db->update('capex',$data);

    //         return true;
    //     }
    // }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    // }
}