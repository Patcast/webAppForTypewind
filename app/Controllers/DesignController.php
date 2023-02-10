<?php

namespace App\Controllers;

class DesignController extends BaseController
{
    private array $commonCssFiles = array("components/main.css", "components/menubar.css", "components/generalComponents.css");
    private array $example =array( "components/expertComponents.css");
    private array $tests_rebecca =array("login_child.css", "components/expertComponents.css");

    public function view($page = 'css_example')
    {
        if (! is_file(APPPATH . 'Views/pages/css_testing/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        setcookie("englishActive", 'notActive', time()+3600, "/");
        setcookie("nederlandsActief", 'active', time()+3600, "/");
        $data = [
            'cssFiles' =>  $this->getCSSFile($page)
        ];

        return view('/pages/css_testing/' . $page,$data);
    }

    private function getCSSFile($pageName): array
    {

        switch ($pageName) {
            case 'example':
                return $this->includeCSSFilesInCommonFiles( $this->example);
            case 'tests_rebecca':
                return$this->includeCSSFilesInCommonFiles( $this->tests_rebecca);
            default:
                return $this->commonCssFiles;
        }
    }
    private function includeCSSFilesInCommonFiles($arrayOfCSSFiles): array{
        return array_merge($this->commonCssFiles, $arrayOfCSSFiles);
    }


}
// THIS IS A TUTORIAL
