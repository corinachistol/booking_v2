<?
//HW*2: try to apply DRY to the model functions
    // function getAllTours() {
    //     global $pdo;
    //     $stmt = $pdo->query('SELECT * FROM tours');
    //     $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $tours;
    // }

    // function getAllReviews() {
    //     global $pdo;
    //     $stmt = $pdo->query('SELECT * FROM reviews');
    //     $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $reviews;
    // }

     function getData($data): array {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM ' . $data);
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        return $info;
    }

    //-------------------- #stmt --------------
    // 0... 
    // 1... 
    // 2...  