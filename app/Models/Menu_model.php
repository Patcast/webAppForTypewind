<?php

namespace App\Models;

use CodeIgniter\Model;
class Menu_model extends Model
{
    private array $menu_items;
    private array $menu_items_kids;


    public function __construct()
    {
        $this->menu_items = array (
            array('name' => 'Home', 'link' => '/experts/home', 'className' => 'activeItem','image'=>'/public/assets/icons/Home_icon.svg'),
            array('name' => 'Students', 'link' => '/experts/studentsList', 'className' => 'inactive','image'=>'/public/assets/icons/Students_Icon.svg') ,
            array('name' => 'Exercises', 'link' => '/experts/exercises', 'className' => 'inactive','image'=>'/public/assets/icons/exercises_icon.svg') ,
            array('name' => 'My Profile', 'link' => '/experts/profile', 'className' => 'inactive','image'=>'/public/assets/icons/teacherSmall.svg')
        );
        $this->menu_items_kids = array (
            array('name' => 'Home', 'link' => '/kids/home', 'className' => 'activeItem','image'=>'/public/assets/icons/Home_icon.svg'),
            array('name' => 'Exercises', 'link' => '/kids/exercises', 'className' => 'inactive','image'=>'/public/assets/icons/exercises_icon.svg') ,
            array('name' => 'Avatar shop', 'link' => '/kids/avatar', 'className' => 'inactive','image'=>'/public/assets/icons/shop.svg')
        );
    }

    private function set_active($menutitle) {
        foreach ($this->menu_items as &$item) {
            if (strcasecmp($menutitle, $item['name']) == 0) {
                $item['className'] = 'activeItem';
            } else {
                $item['className'] = 'inactive';
            }
        }
    }

    public function get_menuitems($menutitle = 'Home'): array
    {
        $this->set_active($menutitle);
        return $this->menu_items;
    }
    private function set_active_kids($menutitle) {
        foreach ($this->menu_items_kids as &$item) {
            if (strcasecmp($menutitle, $item['name']) == 0) {
                $item['className'] = 'activeItem';
            } else {
                $item['className'] = 'inactive';
            }
        }
    }

    public function get_menuitems_kids($menutitle = 'Home'): array
    {
        $this->set_active_kids($menutitle);
        return $this->menu_items_kids;
    }


}