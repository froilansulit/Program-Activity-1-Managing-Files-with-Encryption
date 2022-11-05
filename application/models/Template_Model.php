<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Template_Model extends CI_Model {

        //*---------------------------------- ALL ADDING METHOD'S HERE ! ----------------------------------\\

        /* MODEL FOR ADDING NEW CART || AUTHOR: FROILAN SULIT */
        function add_cart2($data) 
        {
            date_default_timezone_set('Asia/Manila');
            $date_now = date("Y-m-d, H:i:s");
            $query = "INSERT INTO carts(item_name, quantity, price, total_price, order_date) VALUES (?,?,?,?,?)";
            $values = array($data['item_name'], $data['quantity'], $data['item_price'], $data['total_price'], $date_now); 
            return $this->db->query($query, $values);
        }

        /* MODEL FOR ADDING NEW CONTACT || AUTHOR: FROILAN SULIT */
        function add_user($user) 
        {
            date_default_timezone_set('Asia/Manila');
            $date = date('Y-m-d H:i:s');
            $date2 = date("d M Y h:iA");
            
            $query = "INSERT INTO authentication(first_name , last_name , email, contact_number , password, created_at, failed_login) VALUES (?,?,?,?,?,?,?)";
            $values = array($user['firstname'], $user['lastname'], $user['email'], $user['contact_number'], $user['password'], $date, $date2); 
            return $this->db->query($query, $values);
        }

        /* MODEL FOR ADD BILLING || AUTHOR: FROILAN SULIT */
        function bill_info($data) 
        {
            date_default_timezone_set('Asia/Manila');
            $date_now = date("Y-m-d, H:i:s");

            $query = "INSERT INTO bill_info(name, address, card_num, date_ordered) VALUES (?,?,?,?)";
            $values = array($data['name'], $data['address'], $data['card_num'], $date_now); 
            return $this->db->query($query, $values);
        }
        /* MODEL FOR ADD ITEMS IN THE CART || AUTHOR: FROILAN SULIT */

        function add_cart($data) 
        {
            $query = "INSERT INTO carts(item_name, quantity, price, total_price) VALUES (?,?,?,?)";
            $values = array($data['item_name'], $data['quantity'], $data['price'], $data['total_price']); 
            return $this->db->query($query, $values);
        }

        //*---------------------------------- ALL UPDATING METHOD'S HERE ! ----------------------------------\\
         
         /* MODEL FOR FAILED LOGIN || AUTHOR: FROILAN SULIT */
         function failed_login($user_details)
         {
             date_default_timezone_set('Asia/Manila');
             $date2 = date("d M Y h:iA");
 
             return $this->db->query("UPDATE authentication SET failed_login = '{$date2}'  WHERE email = ? OR contact_number = ?", array($user_details,$user_details));
         }

         /* MODEL FOR UPDATING CART DATA || AUTHOR: FROILAN SULIT */
         function update_cart($cart_details, $cart_id)
        {
            return $this->db->query("UPDATE carts SET item_name = ? , quantity = ? , price = ? , total_price = ?  WHERE id = ?", array($cart_details['item_name'], $cart_details['quantity'], $cart_details['price'], $cart_details['total_price'], $cart_id));
        }

        /* MODEL FOR UPDATE CONTACT || AUTHOR: FROILAN SULIT */
        function update_contact($contact_details, $contact_id)
        {
            date_default_timezone_set('Asia/Manila');
            $date_now = date("Y-m-d, H:i:s");
            return $this->db->query("UPDATE contact SET name = '{$contact_details['name']}' , contact_num = '{$contact_details['contact_number']}' , updated_at = '$date_now'  WHERE id = ?", array($contact_id));
        }


        //*---------------------------------- ALL DELETING METHOD'S HERE ! ----------------------------------\\

        /* MODEL FOR DROPING ALL DATA IN THE TABLE || AUTHOR: FROILAN SULIT */
        function destroy_all_data()
        {
            return $this->db->query("TRUNCATE TABLE carts");
        }

        /* MODEL FOR DELETING CART || AUTHOR: FROILAN SULIT */
        function delete_cart($cart_id)
        {
            return $this->db->query("DELETE FROM carts WHERE id = ?", array($cart_id));
        }
    
        //*---------------------------------- ALL RETRIEVING METHOD'S HERE ! ----------------------------------\\

        //*---------------------------------- MODEL FOR GET CONTACT ! ----------------------------------\\
        function get_user_by_contact($user_crendentials)
        {
            return $this->db->query("SELECT * FROM authentication WHERE contact_number = ?", array($user_crendentials))->row_array();
        }
        //*---------------------------------- MODEL FOR GET EMAIL ! ----------------------------------\\
        function get_user_by_email($user_crendentials)
        {
            return $this->db->query("SELECT * FROM authentication WHERE email = ?", array($user_crendentials))->row_array();
        }
        //*---------------------------------- MODEL FOR VERIFY CONTACT ! ----------------------------------\\
        function verify_contact_number($contact_number)
        {
            return $this->db->query("SELECT * FROM authentication WHERE contact_number = ?", array($contact_number))->row_array();
        }
        //*---------------------------------- MODEL FOR VERIFY EMAIL ! ----------------------------------\\
        function verify_email($email)
        {
            return $this->db->query("SELECT * FROM authentication WHERE email = ?", array($email))->row_array();
        }

        //*---------------------------------- MODEL FOR VALIDATING EMAIL EXIST ! ----------------------------------\\

        function lgn_email($email, $password)
        {
            return $this->db->query("SELECT * FROM authentication WHERE email = ? AND password = ?", array($email, $password))->row_array();
        }
        //*---------------------------------- MODEL FOR VALIDATING CONTACT EXIST ! ----------------------------------\\
        function lgn_contact($contact, $password)
        {
            return $this->db->query("SELECT * FROM authentication WHERE contact_number = ? AND password = ?", array($contact, $password))->row_array();
        }


        //*---------------------------------- MODEL FOR GET ALL CONTACTS ! ----------------------------------\\
        function get_all_carts()
        {
            return $this->db->query("SELECT * FROM carts ORDER BY id DESC")->result_array();
        }
        function get_last()
        {
            return $this->db->query("SELECT * FROM carts ORDER BY id DESC LIMIT 1")->result_array();
            // select *from getLastRecord ORDER BY id DESC LIMIT 1;
        }

        function check_carts($item)
        {
            return $this->db->query("SELECT * FROM carts WHERE item_name = ?", array($item))->result_array();
        }

    }


?>