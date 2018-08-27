<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @author Suenawati <suenahwati@gmail.com>
 */

class Template
{
    var $template_data = array();

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
