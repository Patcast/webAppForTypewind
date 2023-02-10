<?php

namespace App\Models;

use CodeIgniter\Model;

class Teachers_model extends Model
{
    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'teachers';

    public function add_teacher($data)
    {
        $query = $this->db->table('teachers')->insert($data);
        return $query;
    }

    public function get_teacher($idTeachers) {
        $query_text = 'SELECT * FROM teachers where idTeachers= ?';
        $query = $this->db->query($query_text, $idTeachers);
        return $query->getResult();
    }

    public function get_all_teachers()
    {
        $query_text = 'SELECT * FROM a22ux02.teachers;';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function edit_teacher($data)
    {
        $builder = $this->db->table('teachers');
        $builder->where('idTeachers', session()->id);
        $builder->update($data);
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
        'password',
        'isActive',
        'created_at'
    ];

}