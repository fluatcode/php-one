<?php
class User {
    public $name;
    public $email;
    private $password;

    // دالة البناء (constructor) لتعيين الخصائص عند إنشاء الكائن
    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // دالة لفحص ما إذا كان البريد الإلكتروني صالحًا (مثال بسيط)
    public function isValidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // دالة للتحقق من كلمة المرور
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    // دالة لتغيير كلمة المرور
    public function changePassword($newPassword) {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
    }
}

// إنشاء كائن جديد من User
$user = new User("William Gates", "william@example.com", "123456");

// اختبار البريد الإلكتروني
if ($user->isValidEmail()) {
    echo "Email is valid!";
} else {
    echo "Email is not valid!";
}
?>
