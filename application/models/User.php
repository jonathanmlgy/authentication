<?php
class User extends CI_Model {
    function add_user($user_details)
    {
        $query = "INSERT INTO users(first_name, last_name, contact_number, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($user_details['first_name'], $user_details['last_name'], $user_details['number'], $user_details['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }
    public function login_user($contact_number, $password)
    {
        return $this->db->query("SELECT first_name, last_name, contact_number FROM users WHERE contact_number = ? AND password = ?", array($contact_number, $password))->row_array();
    }
    /*function update_contact($new_contact_details)
    {
        $query = "UPDATE phonebook SET name = ?, contact_number = ?, updated_at = ? WHERE id = ?";
        $values = array($new_contact_details['name'], $new_contact_details['number'], date("Y-m-d, H:i:s"), $new_contact_details['update_id']); 
        return $this->db->query($query, $values);
    }

    function get_contact_by_id($show_id)
    {
        return $this->db->query("SELECT id, name, contact_number FROM Phonebook WHERE id = ?", array($show_id))->row_array();
    }
    
    function delete_by_id($destroy_id)
    {
        return $this->db->query("DELETE FROM Phonebook WHERE id = ?", array($destroy_id));
    }

    function get_all_contacts()
    {
        return $this->db->query("SELECT id, name, contact_number FROM phonebook")->result_array();
    }*/
}
?>