<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('secure')) {
  /**
   *
   * Trim data agar tidak ada spasi
   * Gunakan html_entities
   * Mysql real escape string
   *
   */
  function secure($input)
  {

    $input = trim($input);
    $input = htmlentities($input);
    return $input;
  }
}

if (!function_exists('multisecure')) {
  /**
   *
   * Untuk keamanan data, trim inputan agar tidak ada spasi, Htmlentities
   *
   */
  function multisecure($array)
  {
    foreach ($array as $key => $value) {
      $array[$key] = secure($value);
    }
    return $array;
  }
}

if (!function_exists('dd')) {
  function dd($var)
  {

    if (is_object($var) || is_array($var)) {
      echo '<pre>';
      print_r($var);
      echo '</pre>';
    } else {
      echo $var;
    }
    exit();
  }
}

if (!function_exists('flashdata')) {
  function flashdata($type, $message)
  {
    $CI = &get_instance();
    $CI->session->set_flashdata($type, $message);
  }
}

if (!function_exists('display_404')) {
  function display_404()
  {
    $CI = &get_instance();
    $CI->load->view('404');
  }
}

if (!function_exists('get_url')) {
  function get_url()
  {
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  }
}

if (!function_exists('get_ip')) {
  function get_ip()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
  }
}

if (!function_exists('get_browser_user')) {
  function get_browser_user()
  {
    $u_agent  = $_SERVER['HTTP_USER_AGENT'];
    $bname    = 'Unknown';
    $platform = 'Unknown';
    $version  = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
      $bname = 'Internet Explorer';
      $ub    = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
      $bname = 'Mozilla Firefox';
      $ub    = "Firefox";
    } elseif (preg_match('/OPR/i', $u_agent)) {
      $bname = 'Opera';
      $ub    = "Opera";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
      $bname = 'Google Chrome';
      $ub    = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
      $bname = 'Apple Safari';
      $ub    = "Safari";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
      $bname = 'Netscape';
      $ub    = "Netscape";
    }

    // finally get the correct version number
    $known   = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
      ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
        $version = $matches['version'][0];
      } else {
        $version = $matches['version'][1];
      }
    } else {
      $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
      $version = "?";
    }
    return array(
      'userAgent' => $u_agent,
      'name'      => $bname,
      'version'   => $version,
      'platform'  => $platform,
      'pattern'   => $pattern,
    );
  }
}

if (!function_exists('setNewDateTime')) {
  function setNewDateTime()
  {
    date_default_timezone_set("Asia/Jakarta");
    $date = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
    // $date->modify('+114 minutes');
    return $date->format('Y-m-d H:i:s');
  }
}


if (!function_exists('client_url')){
  function api_url($url = ''){
    $api_url = 'https://api.digipol.id/api' . $url;
    return $api_url;
  }
}