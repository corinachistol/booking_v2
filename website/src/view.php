<?

     // DRY render
       function renderPage($title,$template_name, $data='', ){
        global $twig;
        $template = $twig->load($template_name. '.html.twig');

      
        print($template->render([
            'title' => $title,
            'data' => $data
        ]));
    }


