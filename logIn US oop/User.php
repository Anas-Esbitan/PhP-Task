<?php
class User {
    private $conn;
    private $table_name = "users";

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $address;
    public $phone_number;
    public $dob;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        // تحقق من العمر
        if (!$this->isAgeValid()) {
            return "يجب أن يكون عمرك أكثر من 16 عامًا.";
        }

        // تحقق من أن كلمة المرور تحقق الشروط
        if (!$this->isPasswordValid()) {
            return "كلمة المرور يجب أن تحتوي على 8 خانات على الأقل وأن تحتوي على حروف كبيرة وصغيرة.";
        }

        if ($this->isEmailExist()) {
            return "البريد الإلكتروني مسجل من قبل.";
        }

        // تشفير كلمة المرور
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        // إعداد استعلام SQL
        $query = "INSERT INTO " . $this->table_name . " (First_Name, Last_Name, email, password_hash, address, phone_number, dob)
                  VALUES (:first_name, :last_name, :email, :password, :address, :phone_number, :dob)";
        
        // تحضير الاستعلام
        $stmt = $this->conn->prepare($query);

        // ربط القيم بالمتغيرات
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":dob", $this->dob);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            return "تم تسجيل الحساب بنجاح.";
        } else {
            return "فشل تسجيل الحساب.";
        }
    }

    private function isAgeValid() {
        $dob = new DateTime($this->dob);
        $age = $dob->diff(new DateTime())->y;
        return $age >= 16;
    }

    private function isPasswordValid() {
        // تحقق من أن كلمة المرور تحتوي على 8 خانات على الأقل، وحرف كبير وحرف صغير
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $this->password);
    }

    private function isEmailExist() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function login($email, $password) {
        // استعلام للبحث عن المستخدم
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // تحقق من كلمة المرور
            if (password_verify($password, $row['password_hash'])) {
                return "تسجيل دخول ناجح.";
            } else {
                return "كلمة المرور غير صحيحة.";
            }
        } else {
            return "البريد الإلكتروني غير موجود.";
        }
    }
    
}
?>
