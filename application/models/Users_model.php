<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function get_all_with_roles() {
        $this->db->select('users.id, users.username, users.email, users.active, users.company, users.phone, groups.name as role');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id', 'left');
        $this->db->join('groups', 'users_groups.group_id = groups.id', 'left');
        return $this->db->get()->result_array();
    }
} 