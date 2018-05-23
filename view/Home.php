<?php

class Home extends TwigView {

    public function show($medicamentos) {

        $templateDir="./templates";
		$templateDirCompi="./templates-c";
		$loader = new Twig_Loader_Filesystem($templateDir);
		$twig = new Twig_Environment($loader);
    	$template = $twig->loadTemplate("home.html.twig");

    	$template->display(array('medicamentos' => $medicamentos,)); 


    }

}
