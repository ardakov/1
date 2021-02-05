<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Владелец
 */
class User {
    function functionName($param) {
        if (!empty($this->lastname) &&
                !empty($this->firstname) &&
                !empty($this->login) &&
                !empty($this->pass) &&
                !empty($this->role_id) &&
                !empty($this->gender_id)) {
            return true;
        }
        return false;
    }

}