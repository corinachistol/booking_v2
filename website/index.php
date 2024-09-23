<?
   require_once './src/bootstrap.php';

   $page = $_GET['page'] ?? '';

   // $deleted = Tour::delete(3);

   $tour = Tour::getOne(15);
   var_dump($tour);


   // if($page === 'home') {

   //    $tours = Tour::getAll();
   //    $title = 'Our Fall Tours';
   //    renderPage($title, 'home', $tours);

   // } else if($page === 'reviews'){

   //    $reviews = Tour::getAll();
   //    $title = 'What people think';
   //    renderPage($title,'reviews', $reviews );
      
   // } elseif ($page === 'test'){
   //    $tour = new Tour(1, 'New Tour from ORM', new Money (50, 'MDL'));
   //    $tour->save();

   // } elseif ($page === 'delete'){
   //    $tour = Tour::delete(1);
   //    // print_r($tour);
    
      
   //    // $tours->delete( 10);
   // } 
   // else{
      
   //   renderPage("The page you are looking for was not found", '404');
   // }





   

 

   
