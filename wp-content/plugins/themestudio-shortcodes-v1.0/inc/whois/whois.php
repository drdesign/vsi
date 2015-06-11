<?php
/**
 * Whois Search Domain
 */

require_once("AjaxWhois.php"); 
$search_link_button   = ( isset( $_POST['search_link_button'] ) && !empty( $_POST['search_link_button'] ) ) ? $_POST['search_link_button'] : null;
$select_option_search = ( isset( $_POST['select_option_search'] ) && !empty( $_POST['select_option_search'] ) ) ? $_POST['select_option_search'] : null;
$link_to_whmcs        = ( isset( $_POST['select_option_whmcs'] ) && !empty( $_POST['select_option_whmcs'] ) ) ? $_POST['select_option_whmcs'] : null;

$list = array();

$server_list = $select_option_search;

if ( !empty( $server_list ) )
{
    $server_list = explode(",", $server_list);
    foreach ( $server_list as $item )
    {
        if ( isset( $item ) && !empty( $item ) )
        {
            $item = trim( $item );
            $item = explode( "|", $item );
            $tld        = ( isset( $item[0] ) && !empty( $item[0] ) ) ? $item[0] : null;
            $server     = ( isset( $item[1] ) && !empty( $item[1] ) ) ? $item[1] : null;
            $response   = ( isset( $item[2] ) && !empty( $item[2] ) ) ? $item[2] : 'NOT FOUND';
            $check      = ( isset( $item[3] ) && $item[3] == 'true' ) ? true : false;
            
            if ( $tld && $server && $response )
            {
                $item = array();
                $item['tld']        = trim( $tld );
                $item['server']     = trim( $server );
                $item['response']   = trim( $response );
                $item['check']      = $check;
                $list[] = $item;
            }
        }
    }
}

$domain = ( isset( $_POST['domain'] ) ) ? $_POST['domain'] : '';

$params = array();
$params['server_list']      = $list;
$params['domain_url']       = $search_link_button;
$params['link_to_whmcs']    = $link_to_whmcs;
$params['domain']           = $domain;


$whois = new AjaxWhois( $params );

$whois->processAjaxWhois();

die();