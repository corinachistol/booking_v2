<?
  namespace Student\Booking\models;

class Review extends Model {
    public int $id;
    public string $author_name;
    public string $body;

    public function __construct(int $id=0, string $autor_name='', string $body=''){
        $this->id = $id;
        $this->author_name = $autor_name;
        $this->body = $body;
    }

    public function __get($name){
        if ($name == 'id') return $this->id;
        elseif ($name == 'author_name') return $this->author_name;
        elseif ($name == 'body') return $this->body;
        else die(sprintf("Unknown property %s", $name));
    }

    public function __set($name,$value){
        if($name == 'id'){
            if (!empty($value) && is_int($value)){
                $this->id = $value;
            }else{
                die(sprintf("Cannot leave %s empty", $name));
            }
        }elseif ($name == 'author_name'){
            if(!empty($value) && is_string($value)){
                if(strlen($value) >= 20 && strlen($value) <= 100){
                    $this->author_name = $value;
                }
            }else{
                die('Only string is allowed and the author name must be between 20 and 100 characters');
            }

        }elseif ($name == 'body'){
            if(!empty($value) && is_string($value)){
                if(strlen($value) >= 20 && strlen($value) <= 1000){
                    $this->author_name = $value;
                }
            }else{
                die('Only 1000 characters are allowed');
            }
        }
    }
    

    public static function getAll() {

        $stmt = static::$pdo->prepare('SELECT * FROM reviews');
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, __CLASS__);
        $reviews = $stmt->fetchAll();
        // $reviews_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($reviews);
        return $reviews;

    }

    public function save() {
        $stmt = static::$pdo->prepare('INSERT INTO reviews VALUES (?, ?, ?)');
        $stmt->execute([$this->id, $this->author_name, $this->body]);
    }


}