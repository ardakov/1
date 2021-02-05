<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeacherMap
 *
 * @author Владелец
 */
class TeacherMap {
    function TeacherMap($id) {
        if ($id) {
$res = $this->db->query("SELECT user_id, otdel_id
FROM teacher WHERE user_id = $id");
$teacher = $res->fetchObject("Teacher");
if ($teacher) {
return $teacher;
}
}
return new Teacher();
    }
    function save($user) {
       if ($user->validate() && $teacher->validate() && (new
UserMap())->save($user)) {
if ($teacher->user_id == 0) {
$teacher->user_id = $user->user_id;
return $this->insert($teacher);
} else {
return $this->update($teacher);
}
}
return false; 
    }
    private function insert($teacher) {
    if ($this->db->exec("INSERT INTO teacher(user_id,
otdel_id) VALUES($teacher->user_id, $teacher->otdel_id)")
== 1) {
return true;
}
return false;    
    }
    private function update($teacher) {
        if ($this->db->exec("UPDATE teacher SET otdel_id =
$teacher->otdel_id WHERE user_id=".$teacher->user_id) ==
1) {
return true;
}
return false;
    }
    function findAll($ofset) {
        $res = $this->db->query("SELECT user.user_id,
CONCAT(user.lastname,' ', user.firstname, ' ',
user.patronymic) AS fio, user.birthday, "
. " gender.name AS gender, otdel.name AS otdel,
role.name AS role FROM user INNER JOIN teacher ON
user.user_id=teacher.user_id "
. "INNER JOIN gender ON
user.gender_id=gender.gender_id INNER JOIN otdel ON
teacher.otdel_id=otdel.otdel_id"
. " INNER JOIN role ON user.role_id=role.role_id LIMIT
$ofset, $limit");
return $res->fetchAll(PDO::FETCH_OBJ);
    }
    function count($param) {
     $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
teacher");
return $res->fetch(PDO::FETCH_OBJ)->cnt;   
    }
    function findProfileById($id) {
     if ($id) {
$res = $this->db->query("SELECT teacher.user_id,
otdel.name AS otdel FROM teacher "
. "INNER JOIN otdel ON
teacher.otdel_id=otdel.otdel_id WHERE teacher.user_id =
$id");
return $res->fetch(PDO::FETCH_OBJ);
}
return false;   
    }
}