<?
   require_once './src/bootstrap.php';

   $page = $_GET['page'] ?? '';

   // $deleted = Tour::delete(3);

   // $tour = Tour::getOne(15);
   // var_dump($tour);


   if($page === 'home') {

      $tours = Tour::getAll();
      $title = 'Our Fall Tours';
      renderPage($title, 'home', $tours);

   } else if($page === 'reviews'){

      $reviews = Review::getAll();
      $title = 'What people think';
      renderPage($title,'reviews', $reviews );
      
   } elseif ($page === 'test'){
      $review = new Review(4, 'Author_nam', 'Review Body' );
      $review->save();

   } elseif ($page === 'delete'){
      $tour = Tour::delete(1);
      // print_r($tour);
    
      
      // $tours->delete( 10);
   } 
   else{
      
     renderPage("The page you are looking for was not found", '404');
   }





   

 

   
