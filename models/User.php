<?php  
require_once 'BaseModel.php';

class User extends Model
{

    protected static $table = 'users';

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

    public static function find($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM users WHERE id = :id';
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

    public static function findUserByEmail($email)
    {
        self::dbConnect();
        $query = 'SELECT user_id, email, password FROM users WHERE email = :email';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query('SELECT * FROM users');

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    public function update()
    {
        $query = 'UPDATE users SET name = :name, email = :email, phone = :phone WHERE password = :password AND id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->attributes['phone'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
        $stmt->execute();

    }

    public function insert()
    {
        $query = 'INSERT INTO users (name, email, password, phone) VALUES (:name, :email, :password, :phone);';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->attributes['phone'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete()
    {
        self::dbConnect();
        $query = 'DELETE * FROM users WHERE id = :id';
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




}

?>