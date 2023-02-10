<?php

namespace App\Controllers;

use App\Models\AvatarsModel;
use App\Models\ExerciseModel;
use App\Models\Students_model;
use App\Models\Menu_model;

class KidsController extends BaseController
{

    /// CSS FILES *********************
    private  array $commonCssFiles = array("components/main.css", "components/generalComponents.css", "components/menubar.css", "components/child_components_varia.css");
    private array $home = array("kids/home_child.css");
    private array $intro = array("kids/intro_exercise_child.css");
    private array $feedback = array("kids/feedback_exercise_child.css");
    private array $exercises = array("kids/exercises_child.css");
    private array $exercise = array();
    private array $avatar = array("kids/avatar.css","kids/dialog.css");

    /// END OF CSS FILES ************************
    private $data;
    private Students_model $students_model;
    private Menu_model $menu_model;
    private AvatarsModel $avatarModel;



    public function __construct() {
        $this->menu_model = new Menu_model();
        $this->students_model = new Students_model();
        $this ->avatarModel = new AvatarsModel();
    }

    public function view($page = 'home',$arg='0')
    {
        if (! is_file(APPPATH . 'Views/pages/kids/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $css = ['cssFiles' =>  $this->getCSSFile($page)];
        $page_data =$this->getDataForPage($page,$arg);
        if(sizeof($page_data)>0) $data = array_merge($page_data,$css);
        else $data = $css;
        return view('/pages/kids/' . $page,$data);
    }


    private function getDataForPage($pageName,$args): array
    {
        switch ($pageName) {
            case 'home':
                return $this->home();
            case 'intro':
                return $this->intro($args);
            case 'feedback':
                return $this->feedback($args);
            case 'exercises':
                return $this->exercises();
            case 'exercise':
                return $this->exercise($args);
            case 'avatar':
                return $this->avatar();



            default:
                return $this->commonCssFiles;
        }
    }
    private function getCSSFile($pageName): array
    {
        switch ($pageName) {
            case 'home':
                return$this->includeCSSFilesInCommonFiles( $this->home);
            case 'intro':
                return$this->includeCSSFilesInCommonFiles( $this->intro);
            case 'feedback':
                return$this->includeCSSFilesInCommonFiles( $this->feedback);
            case 'exercises':
                return$this->includeCSSFilesInCommonFiles( $this->exercises);
            case 'exercise':
                return$this->includeCSSFilesInCommonFiles( $this->exercise);
            case 'avatar':
                return$this->includeCSSFilesInCommonFiles( $this->avatar);

            default:
                return $this->commonCssFiles;
        }
    }
    private function includeCSSFilesInCommonFiles($arrayOfCSSFiles): array{
        return array_merge($this->commonCssFiles, $arrayOfCSSFiles);
    }
    ///// VIEW METHODS *********************

    public function home():array
    {
        $data['idStudents']=session()->id;
        $data['scores'] = $this->students_model->getBestScores($data['idStudents']);
        $data['menu_items'] = $this->menu_model->get_menuitems_kids();
        $data['exercises']= $this->students_model->getExercises();

        session()->set('exercises', $data['exercises']);
        return $data;
    }

    public function intro($idExercises)
    {
        $this->data['exercises']= session()->get('exercises');
//        $this->data['idExercises']= $_GET['idExercises'];
        $this->data['idExercises']= $idExercises;
        $this->data[ 'menu_items'] = $this->menu_model->get_menuitems_kids('Exercises');
        return ($this->data);
    }

    public function ex($idExercises)
    {
        $this->data['idExercises']= $idExercises;
        $this->data['showKeyboard']= isset($_POST['keyboardShowCopy']);
        $this->data['voice']= isset($_POST['voiceCopy']);
        $this->data['feedback']= isset($_POST['feedbackCopy']);
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Exercises');
        $css = ['cssFiles' =>  $this->getCSSFile("exercise")];
        $dataExercise = array_merge($this->getDataForPage('exercise',0),$css, $this->data);
        return view('pages/kids/exercise', $dataExercise);
    }

    public function exercise()
    {
        $this->data['showKeyboard']= isset($_POST['keyboardShowCopy']);
        $this->data['voiceCopy']= isset($_POST['voiceCopy']);
        $this->data['feedbackCopy']= isset($_POST['feedbackCopy']);
        $this->data['idStudents']=session()->id;
        $this->data['handSelection']=session()->handSelection;
        $this->data['exercises']= session()->get('exercises');
        $this->data[ 'menu_items'] = $this->menu_model->get_menuitems_kids('Exercises');
        return ($this->data);
    }

    public function feedback($idExercises)
    {
        if ($this->request->getMethod() === 'post') {

            $this->data['idStudentFk'] = $_POST['idStudentFk'];
            $this->data['idExerciseFk'] = $_POST['idExerciseFk'];
            $this->data['score'] = $_POST['score'];

            $this->data['date'] = $_POST['date'];

            $this->data['coins'] =$this->avatarModel->add_results($this->data);
        }

        $this->data['exercises']= session()->get('exercises');
        $this->data['idExercises']=$idExercises;

        $this->data[ 'menu_items'] = $this->menu_model->get_menuitems_kids('Exercises');
        $css = ['cssFiles' =>  $this->getCSSFile("feedback")];
        return array_merge($this->data,$css);
    }


    public function exercises():array
    {
        $idStudent= session()->id;
        $model = model(ExerciseModel::class);
        $data['exercises'] = $model->getExercises();
        $data['scores'] = $this->students_model->getBestScores($idStudent);
        $data[ 'menu_items'] = $this->menu_model->get_menuitems_kids('Exercises');

        return $data;
    }

    private function avatar():array
    {
        if ($this->request->getMethod() === 'post') {
            if($this->request->getVar('buy')){
                $this ->avatarModel->buyAvatar(session()->id, $this->request->getVar('id'));
            }
            else $this->avatarModel->changeSelectedAvatar( $this->request->getVar('id'));
        }
        $data['idStudents']=session()->id;
        $data['menu_items'] = $this->menu_model->get_menuitems_kids('Avatar shop');
        $data['avatars'] = $this ->avatarModel->getAvatarIcons();
        $data['idOfSelectedAvatar'] =$this ->avatarModel->getIdOfSelectedAvatar();
        return $data;
    }



}