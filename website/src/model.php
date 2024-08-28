<?

    function getAllTours() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM tours');
        $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tours;
    }

    //-------------------- #stmt --------------
    // 0... 
    // 1... 
    // 2...  