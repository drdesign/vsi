<?php
/*************************************************
 * SOFT64 PhpAjaxWhois
 *
 * Version: 1.1
 * Date: 2/22/2008
 *
 ****************************************************/

class AjaxWhois{

    var $serverList;
    var $tr = 0;
    var $domain_url;
    var $link_to_whmcs;
    var $domain;
    
    function AjaxWhois($params = array())
    {
        if (isset($params['server_list'])) {
            $this->serverList = $params['server_list'];
        }
        
        if (isset($params['domain_url'])) {
            $this->domain_url = $params['domain_url'];
        }

        if (isset($params['link_to_whmcs'])) {
            $this->link_to_whmcs = $params['link_to_whmcs'];
        }
        
        if (isset($params['domain'])) {
            $this->domain = $params['domain'];
        }
        
    }
    
    function CheckWhois($domain) {
        return " <a href=\"#\" onclick=\"javascript:makeRequest('get.php', '?domain=$domain');\">Whois</a>";
    }
    
    function tldList()
    {
      $i = 0;
        foreach ($this->serverList as $value)
        {
            if ($value['check'] == true) {
                $checked = " checked='checked' ";
            } else {
                $checked = " ";
            }
        echo '<td><input type="checkbox" name="tld_'.$value['tld'].'"'.$checked.' />.'.$value['tld'].'</td>';
            $i++;
        if ($i > 4) {
            $i = 0;
            echo '</tr><tr>';
        }
      } 
    }
    
    function processAjaxWhois()
    {
            $domainName = $this->domain;
            
            for ($i = 0; $i < sizeof($this->serverList); $i++) {
              $actTop = "tld_".$this->serverList[$i]['tld'];
          $check = str_replace(".", "_", $actTop);
              $this->serverList[$i]['check'] = isset($_POST[$check]) ? true : false;
            }
    
            if (strlen($domainName)>2){
          echo '<fieldset><legend class="green">Whois results</legend>';
                echo '<table class="tabel">';
        
                for ($i = 0; $i < sizeof($this->serverList); $i++) {
                if ($this->serverList[$i]['check']){
                $this->showDomainResult($domainName.".".$this->serverList[$i]['tld'],
                                        $this->serverList[$i]['server'],
                                        $this->serverList[$i]['response']);
              }
            }
            
            echo '</table></fieldset>';
            }
    
    }
    
    function showDomainResult( $domain, $server, $findText )
    {
       if ($this->tr == 0) {
           $this->tr = 1;
           $class = " class='alt'";
       } else {
           $this->tr = 0;
           $class = "";
       }
       
       $domainName = $this->domain;
       $domaindot  = strstr($domain,'.');
       
       if ($this->checkDomain($domain,$server,$findText)){
          echo "<tr $class>";
          echo "<td><span class='td'>$domain</span></td>";
          echo "<td class='disponibil'>&nbsp; AVAILABLE</td>";
          echo "<td class='disponibil'><a href='".$this->domain_url."?ccce=cart&a=add&domain=register&sld=$domainName&tld=$domaindot' >Order Now</a></td>";
          echo "</tr>";
       }else{   
          echo "<tr $class>";
          echo "<td><span class='ta'>$domain</span></td>";
          echo "<td class='ocupat'>&nbsp;TAKEN </td>";
          echo "<td class='disponibil'>&nbsp;<a href='http://www.$domain/' target='_blank'>View</a></td>";
          echo "</tr>";
       }
    }
    
    function checkDomain($domain,$server,$findText){
        $con = @fsockopen($server, 43);
        if (!$con) return false;
            
        @fputs($con, $domain."\r\n");
        $response = ' :';
        while(!feof($con)) {
            $response .= @fgets($con,128); 
        }
        
        @fclose($con);
        
        $find_text = array('not found in database', 'No match for', 'No entries found for the selected source', 'FREE', 'AVAIL', 'Not found', 'No match', 'No Data Found');
        
        $response = strtolower( $response );
        $find = false;
        foreach ( $find_text as $text )
        {
            $text = strtolower( $text );
            if ( $find == false )
            {
                if ( strpos( $response, $text ) ) {
                    $find = true;
                }
            }
        }
        
        if ( $find ) {
            return true;
        } else {
            return false;
        }
    }
}
?>