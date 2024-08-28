<?

    function renderHome($title,$tours) {
        global $twig;
        $template = $twig->load('home.html.twig');

      
        print($template->render([
            'title' => $title,
            'tours' => $tours
        ]));
    }