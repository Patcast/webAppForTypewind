<?php

namespace App\Models;

use CodeIgniter\Model;


class Students_model extends Model {

    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'students';


    public function add_student($data)
    {
        $query = $this->db->table('students')->insert($data);
        return $query;
    }

    public function get_student($idStudent) {
        $query_text = 'SELECT * FROM students where idStudents= ?';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }

    public function get_students() {
        $query_text = 'SELECT students.idStudents, students.firstname, students.lastname, students.email, students.gender, students.birthday
,students.handSelection, students.isActive, students.notes, students.coins
, teachers.firstname as teacherFirstname, teachers.lastname as teacherLastname, teachers.email as teacherEmail
, teachers.password as teacherPassword FROM a22ux02.students 
INNER JOIN a22ux02.teachers ON students.idTeacherFk=teachers.idTeachers order by students.firstname';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }
    public function edit_student($data)
    {
        $builder = $this->db->table('students');
        $builder->where('idStudents', $data['idStudents']);
        $builder->update($data);
    }

    public function getStudentExercises($idStudent)
    {
        $query_text = 'SELECT * FROM exercises INNER JOIN studentExerciseFk ON exercises.idExercises = studentExerciseFk.idExerciseFk WHERE studentExerciseFk.idStudentFk=?';
        $query = $this->db->query($query_text,$idStudent);
        return $query->getResult();
    }

    public function getSpecificExercises($idStudent) {
        $query_text = 'SELECT * FROM studentExerciseFk WHERE idStudentFk= ?';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }

    public function getExercises()
    {
        $query_text = 'SELECT * FROM exercises';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    //table data used for Log-In, please do not remove
    protected $allowedFields = [
        'firstname',
        'lastname',
        'email',
        /*        'password',*/
        'created_at'
    ];


    public function getBestScores($idStudent)
    {
        $query_text = 'SELECT idStudentFk, idExerciseFk, max(score) as score FROM a22ux02.studentExerciseFk WHERE idStudentFk= ? group by idStudentFk,idExerciseFk';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }




    public function getStudentsAvatarId(){
        $query_text = 'SELECT * FROM studentAvatarFk WHERE selected=true;';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

}
