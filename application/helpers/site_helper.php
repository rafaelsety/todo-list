<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function slug($string, $spaceRepl = "-")
{
    $string = str_replace("&", "and", $string);

    $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

    $string = strtolower($string);

    $string = preg_replace("/[ ]+/", " ", $string);

    $string = str_replace(" ", $spaceRepl, $string);

    return $string;
}

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        $ci->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
        redirect('login');
    }
}