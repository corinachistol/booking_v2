<?
   require_once './src/bootstrap.php';

   $page = $_GET['page'] ?? '';

   //HW1: try to use switch/case - git branch with this code
   // if($page === 'home') {

   //    $tours = getData(data: 'tours');
   //    $title = 'Our Fall Tours';
   //    renderPage($title, 'home', $tours);

   // } else if($page === 'reviews'){

   //    $reviews = getData('reviews');
   //    $title = 'What people think';
   //    renderPage($title,'reviews', $reviews );
      
   // } else{
      
   //   renderPage("The page you are looking for was not found", '404');
   // }

   switch ($page) {
      case 'home':
         $tours = getData(data: 'tours');
         $title = 'Our Fall Tours';
         renderPage($title, 'home', $tours);
         break;

      case 'reviews':
         $reviews = getData('reviews');
         $title = 'What people think';
         renderPage($title,'reviews', $reviews );
      
         break;
      
      default:
         renderPage("The page you are looking for was not found", '404');
         break;
   }



   

 

   
