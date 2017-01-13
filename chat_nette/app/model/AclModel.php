<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AclModel{
    private $acl=null;
    public function __construct(){
        
        $this->acl = new Nette\Security\Permission;
        
        $this->acl->addRole("guest");
        $this->acl->addRole("member");
        $this->acl->addRole("admin");
        
        $this->acl->addResource("sign");
        $this->acl->addResource("homepage");
        $this->acl->addResource("debate");
        
        $this->acl->allow("guest","sign","in");
        $this->acl->allow("member",array("debate","homepage"),"default");
        $this->acl->allow("member","sign","out");
        $this->acl->allow("admin",array("debate","homepage"),array("create","edit","delete"));
    }
    
    public function isAllowed($role,$presenter,$akce) {
        
        return $this->acl->isAllowed($role,$presenter,$akce);
        
    }
    
}