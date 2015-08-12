<?php  
require_once 'BaseModel.php';

class Ad extends Model 
{
    // return all
    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query('SELECT L.title, L.price, L.image_url, L.description, L.year, C.type, U.name
                                    FROM listings AS L
                                    LEFT JOIN categories AS C 
                                    ON L.category_id = C.id
                                    LEFT JOIN users AS U
                                    ON L.user_id = U.id');


        //this returns the category names: 
        //SELECT instrument_type FROM categories LEFT JOIN listings ON listings.id = category_id;

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // find one by passing id
    public static function find($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM listings WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }
    // insert or update if key exists
    public function save()
    {
        if (isset($this->attributes)) {
            if (isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }
    }
    //called by save, if no id
    private function insert()
    {
        $query =    'INSERT INTO listings (title, date_posted, category_id, user_id, brand, year, item_condition, price, image_url, description) 
                    VALUES (:title, :date_posted, :category_id, :user_id, :brand, :year, :item_condition, :price, :image_url, :description);';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
        $stmt->bindValue(':date_posted', $this->attributes['date_posted'], PDO::PARAM_STR);
        $stmt->bindValue(':category_id', $this->attributes['category_id'], PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_STR);
        $stmt->bindValue(':brand', $this->attributes['brand'], PDO::PARAM_STR);
        $stmt->bindValue(':year', $this->attributes['year'], PDO::PARAM_STR);
        $stmt->bindValue(':item_condition', $this->attributes['item_condition'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
        $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->execute();
    }
    // called by save if id
    private function update()
    {
        $query = 'UPDATE listings SET   title = :title,
                                        category_id = :category_id;
                                        brand = :brand,
                                        year = :year,
                                        item_condition = :item_condition,
                                        price = :price,
                                        image_url = :image_url,
                                        description = :description
                                        WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':title', $this->attributes['title'], PDO::PARAM_STR);
        $stmt->bindValue(':category_id', $this->attributes['category_id'], PDO::PARAM_STR);
        $stmt->bindValue(':brand', $this->attributes['brand'], PDO::PARAM_STR);
        $stmt->bindValue(':year', $this->attributes['year'], PDO::PARAM_STR);
        $stmt->bindValue(':item_condition', $this->attributes['item_condition'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
        $stmt->bindValue(':image_url', $this->attributes['image_url'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
        $stmt->execute();
    }
    //return query where like %query%, param query string
    // some test -> ['some', 'test'] 
    //MAYBE FOR LATER
    public function search()
    {

    }

 
}