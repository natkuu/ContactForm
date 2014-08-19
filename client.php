<?php
    class clientClass {
        public $name;
        public $email;
        public $message;
        public $spam;

        function __construct($name, $email, $message, $spam) {
            $this->name = $name;
            $this->email = $email;
            $this->message = $message;
            $this->spam = $spam;
        }

        function getMessage() {
            return "{$this->name}" .
                    "{$this->email}" .
                    "{$this->message}";
        }

        function nameValidation() {
            if(isset($this->name) && !empty($this->name)) return true;
            else return false;
        }

        function emailValidation() {
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) return true;
            else return false;
        }
        function antiSpam() {
            if (($this->spam) == 4) return true;
            else return false;
        }
        function dbconnect () {

            $hostdb = 'localhost';
            $namedb = 'contact_form';
            $userdb = 'root';
            $passdb = 'root';

            $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);

            $sql = "INSERT INTO client ( name, email, message ) VALUES ( :name, :email, :message )";
            $query = $conn->prepare( $sql );
            $query->execute( array( ':name'=>$this->name, ':email'=>$this->email, ':message'=>$this->message ) );
        }

}

    $message1 = new clientClass ( $_POST['name'], $_POST['email'], $_POST['message'], $_POST['spam'] );
    if ($message1->nameValidation() && $message1->emailValidation() && $message1->antiSpam()) {
        $message1->dbconnect();
        echo 'Thank you for submiting the comment.';
    }
    else echo 'You shall not pass. <br /> Please make sure uou filled in all the details properly.';
?>
