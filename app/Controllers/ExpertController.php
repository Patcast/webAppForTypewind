<?php

namespace App\Controllers;

use App\Models\ExerciseModel;
use App\Models\Students_model;
use App\Models\Teachers_model;
use App\Models\Menu_model;

class ExpertController extends BaseController
{

    /// CSS FILES *********************
    private array $commonCssFiles = array("components/main.css", "components/generalComponents.css", "components/menubar.css", "components/expertComponents.css");
    private array $studentsList = array("expert/studentsList.css");
    private array $home = array("expert/home.css");
    private array $exercises = array("expert/exercises.css");
    private array $studentOverview = array("expert/studentOverview.css");
    private array $editStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css");
    private array $addStudentPage = array("expert/studentOverview.css", "expert/editStudentPage.css", "expert/addStudentPage.css");
    private array $profile = array("expert/profile.css");
    private array $editProfilePage = array("expert/profile.css", "expert/editProfile.css");
    private array $exerciseContentPage = array("expert/exercises.css","expert/exerciseContentPage.css");
    private array $addExercisePage = array("expert/exercises.css","expert/addExercisePage.css");
    private array $editExercisePage = array("expert/exercises.css","expert/addExercisePage.css");

    /// END OF CSS FILES ************************
    //    private $data;
    private Students_model $students_model;
    private Teachers_model $teachers_model;
    private ExerciseModel  $exercises_model;

    private $menu_model;

    public function __construct() {
        $this->menu_model = new Menu_model();
        $this->students_model = new Students_model();
        $this->teachers_model = new Teachers_model();
        $this->exercises_model = new ExerciseModel();
    }
    public function view($page = 'home',$arg='0')
    {
        if (! is_file(APPPATH . 'Views/pages/experts/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $css = ['cssFiles' =>  $this->getCSSFile($page)];
        $page_data =$this->getDataForPage($page,$arg);
        if(sizeof($page_data)>0) $data = array_merge($page_data,$css);
        else $data = $css;
        return view('/pages/experts/' . $page,$data);
    }

    ////// SET UP METHODS ALL
    private function getDataForPage($pageName,$args): array
    {
        switch ($pageName) {
            case 'home':
                return $this->home();
            case 'studentsList':
                return $this->studentsList();
            case 'exercises':
                return $this->exercises();
            case 'studentOverview':
                return $this->studentOverview($args);
            case 'editStudentPage':
                return $this->editStudentPage($args);
            case 'addStudentPage':
                return $this->addStudentPage();
            case 'profile':
                return $this->profile();
            case 'editProfilePage':
                return $this->editProfilePage();
            case 'exerciseContentPage':
                return $this->exerciseContentPage($args);
            case 'addExercisePage':
                return $this->addExercisePage();
            case 'editExercisePage':
                return $this->editExercisePage($args);
            default:
                return $this->commonCssFiles;
        }
    }
    private function getCSSFile($pageName): array
    {
        switch ($pageName) {
            case 'home':
                return$this->includeCSSFilesInCommonFiles( $this->home);
            case 'studentsList':
                return $this->includeCSSFilesInCommonFiles( $this->studentsList);
            case 'exercises':
                return $this->includeCSSFilesInCommonFiles( $this->exercises);
            case 'studentOverview':
                return $this->includeCSSFilesInCommonFiles( $this->studentOverview);
            case 'editStudentPage':
                return $this->includeCSSFilesInCommonFiles( $this->editStudentPage);
            case 'addStudentPage':
                return $this->includeCSSFilesInCommonFiles( $this->addStudentPage);
            case 'profile':
                return $this->includeCSSFilesInCommonFiles( $this->profile);
            case 'editProfilePage':
                return $this->includeCSSFilesInCommonFiles( $this->editProfilePage);
            case 'exerciseContentPage':
                return $this->includeCSSFilesInCommonFiles( $this->exerciseContentPage);
            case 'addExercisePage':
                return $this->includeCSSFilesInCommonFiles( $this->addExercisePage);
            case 'editExercisePage':
                return $this->includeCSSFilesInCommonFiles( $this->editExercisePage);
            default:
                return $this->commonCssFiles;
        }
    }


    private function includeCSSFilesInCommonFiles($arrayOfCSSFiles): array{
        return array_merge($this->commonCssFiles, $arrayOfCSSFiles);
    }


    ////// SET UP METHODS FOR EACH VIEW
    public function home():array
    {
        $data['menu_items'] = $this->menu_model->get_menuitems();
        $data['teachers'] = $this->teachers_model->get_all_teachers();
        session()->set('teachers', $data['teachers']);
        return ($data);
    }
    public function studentsList():array
    {
        $data['students'] = $this->students_model->get_students();
        $data['avatars'] = $this->students_model->getStudentsAvatarId();
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');
        $data['teachers'] = session()->get('teachers');
        session()->set('students', $data['students']);
        return $data;
    }

    public function exercises():array
    {
        $model = model(ExerciseModel::class);
        $data = ['exercises' => json_encode($model->getExercises())];
        $data['menu_items'] = $this->menu_model->get_menuitems('Exercises');
        session()->set('exercises', $data['exercises']);
        return ($data);
    }

    public function studentOverview($idStudents): array
    {
        $data['avatars'] = $this->students_model->getStudentsAvatarId();
        $data['idStudents']=$idStudents;
        $data['students'] = session()->get('students');
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return  $data;
    }

    public function editStudentPage($idStudents): array
    {
        $data['idStudents']=$idStudents;
        $data['avatars'] = $this->students_model->getStudentsAvatarId();
        $data['students'] = session()->get('students');
        $data['teachers'] = session()->get('teachers');
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return( $data);
    }

    public function addStudentPage():array
    {
        $data['teachers']=session()->get('teachers');
        $data['menu_items'] = $this->menu_model->get_menuitems('Students');

        return ( $data);
    }

    public function profile():array
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('My Profile');
        return $data;
    }

    public function editProfilePage()
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('My Profile');
        return $data;
    }

    public function addExercisePage():array
    {
        $data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return $data;
    }

    public function editExercisePage($idExercises):array
    {
        $this->data['idExercises']=$idExercises;
        $this->data['exercises'] = session()->get('exercises');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return( $this->data);
    }

    public function exerciseContentPage($idExercises):array
    {
        $this->data['idExercises']=$idExercises;
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Exercises');

        return( $this->data);
    }

    public function storeStudent($idStudents=null)
    {
        helper(['form']);

        $rules = [
            'firstname'          => 'required|min_length[3]|max_length[50]|alpha_space',
            'lastname'          => 'required|min_length[3]|alpha_space',
            'email'          => "required|min_length[4]|max_length[100]|valid_email|is_unique[students.email,idStudents,{$idStudents}]",
            'birthday'          => "required",
            'notes' => 'max_length[1000]',
        ];

        if($this->validate($rules)){

            $this->data = [
                'idStudents' => $idStudents,
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email'     => $_POST['email'],
                'isActive' => isset($_POST['active']),
                'birthday' => $_POST['birthday'],
                'idTeacherFk' => $_POST['teachers'],
                'notes' => nl2br($_POST['notes']),
            ];

            $gender= $_POST['gender'];

            if($gender == "male")
            {
                $this->data['gender']= 1;
            }
            else{
                $this->data['gender']=0;
            }

            $handSelection=$_POST['handSelection'];

            if ($handSelection=="One Hand, right hand")
            {
                $this->data['handSelection']=1;
            }
            if ($handSelection=="One Hand, left hand")
            {
                $this->data['handSelection']=2;
            }
            else{
                $this->data['handSelection']=0;
            }

            if($idStudents==null){
                $this->students_model->add_student($this->data);
            }
            else{
                $this->students_model->edit_student($this->data);
            }

            return redirect()->to('experts/studentsList');
        }else{
            $data['validation'] = $this->validator;
            session()->set("validation",$data['validation']);
            if($idStudents==null){
                return redirect()->to('experts/addStudentPage');}
            else{
                return redirect()->to('experts/editStudentPage/'.$idStudents);
            }
        }
    }

    public function storeExercise($idExercises=null)
    {
        $session=session();
        helper(['form']);
            $rules = [
                'title'          => "required|min_length[3]|max_length[50]|is_unique[exercises.name,idExercises,{$session->currentExercise}]",
                'content'          => 'required|min_length[2]'
            ];

        if($this->validate($rules)){

            $this->data = [
                'idExercises' => $idExercises,
                'name'     => $_POST['title'],
                'text'     => $_POST['content'],
                'lesson'    => "Beans",
                'idTeacherFk' => session()->id,
                'isCustom'    => 1
            ];
            if($idExercises==null){
            $this->exercises_model->add_exercise($this->data);}
            else{$this->exercises_model->edit_exercise($this->data);
            }
            return redirect()->to('experts/exercises');
        }else{
            $data['validation'] = $this->validator;
            session()->set("validation",$data['validation']);
            if($idExercises==null){
                return redirect()->to('experts/addExercisePage');}
            else{
                return redirect()->to('experts/editExercisePage/'.$idExercises);
            }
        }
    }

    public function storeProfile()
    {
        helper(['form']);
        $session=session();
        $rules = [
            'firstname'          => 'required|min_length[3]|max_length[50]|alpha_space',
            'lastname'          => 'required|min_length[3]|alpha_space',
            'email'          => "required|min_length[4]|max_length[100]|valid_email|is_unique[teachers.email,idTeachers,{$session->id}]"
        ];

        if($this->validate($rules)){

            $this->data = [
                'idTeachers' => session()->id,
                'firstname' => $_POST['firstname'],
                'lastname'     => $_POST['lastname'],
                'isActive'     =>  isset($_POST['active']),
                'email'     => $_POST['email']
            ];

            $session->firstname = $this->data['firstname'];
            $session->lastname = $this->data['lastname'];
            $session->isActive = $this->data['isActive'];
            $session->email = $this->data['email'];

            $this->teachers_model->edit_teacher($this->data);
            $this->data['teachers'] = $this->teachers_model->get_all_teachers();
            session()->set('teachers', $this->data['teachers']);
                return redirect()->to('experts/profile');
        }else{
            $data['validation'] = $this->validator;
            session()->set("validation",$data['validation']);
                return redirect()->to('experts/editProfilePage');
        }
    }
}
