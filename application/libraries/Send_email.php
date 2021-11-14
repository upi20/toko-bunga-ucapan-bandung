<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email {

    /**
    *
    *
    * GLOBAL VARIABLE 
    *
    *
    **/

    public $from            = '';
    public $to              = '';
    public $subject         = '';
    public $html            = '';
    public $data            = array();
    public $attach          = null;

    /**
    *
    *
    *
    *
    *
    **/

    public function send($config = array())
    {
        /**
        *
        *
        * SET VALUE GLOBAL VARIABLE
        *
        *
        **/


        $this->from         = isset($config['from']) ? $config['from'] : $this->from;
        $this->to           = isset($config['to']) ? $config['to'] : $this->to;
        $this->subject      = isset($config['subject']) ? $config['subject'] : $this->subject;
        $this->html         = isset($config['html']) ? $config['html'] : $this->html;
        $this->data         = isset($config['data']) ? $config['data'] : $this->data;
        $this->attach       = isset($config['attach']) ? $config['attach'] : $this->attach;

        /**
        *
        *
        *
        *
        *
        **/

        $this->ci               = &get_instance();

        $this->ci->load->config('email');
        
        $host                   = $this->ci->config->item('host');
        $port                   = $this->ci->config->item('port');
        $user_email             = $this->ci->config->item('user_email');
        $user_password          = $this->ci->config->item('user_password');

        $config     = array(

            'protocol'  => 'smtp',
            'smtp_host' => $host,
            'smtp_port' => $port,
            'smtp_user' => $user_email,
            'smtp_pass' => $user_password,
            'wordwrap'  => TRUE,

        );


        $this->ci->load->library('email', $config);
        
        $this->ci->email->set_header('MIME-Version', '1.0; charset=utf-8');
        
        $this->ci->email->set_header('Content-type', 'text/html');

        $this->ci->email->set_newline("\r\n");

        $this->ci->email->from($user_email, $this->from);

        $this->ci->email->to($this->to);

        if($this->attach !== null)
        {
            $this->ci->email->attach($this->attach);
        }

        $this->ci->email->subject($this->subject);

        $view                   = $this->ci->load->view($this->html, $this->data, TRUE);

        $this->ci->email->message($view);

        if(!$this->ci->email->send()) 
        {
            show_error($this->ci->email->print_debugger());

            exit; 
        }
        else
        {
            return TRUE;
        }
    }


}