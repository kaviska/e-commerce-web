<?php

/**
 * Author: KAviska Dilshan, Janith Nirmal
 * Description: User API
 */

// Import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/PasswordHash.php';
require_once __DIR__ . '/../model/mail/MailSender.php';
require_once __DIR__ . '/../model/mail/test.php';

class User extends Api
{
    public function __construct($apiPath)
    {
        //pares apiPath parent class constructor
        parent::__construct($apiPath);
        $this->init($this);
    }

    /**
     * register a user if called with POST method
     */
    public function register()
    {
        // Check if the request method is POST
        if (!self::isPostMethod()) {
            return ['status' => 'failed', 'error' => INVALID_REQUEST_METHOD];
        }

        // Check if the request parameters are set
        if (self::postMethodHasError("email", "password", "conformPassword")) {
            return ['status' => 'failed', 'error' => 'One or more required fields missing'];
        }

        // Retrieve data from POST parameters with trimming
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conformPassword = $_POST['conformPassword'];
        $firstName = $_POST['first_name'] ?? null;
        $lastName = $_POST['last_name'] ?? null;
        $telephone = $_POST['telephone'] ?? null;

        // Data validation
        $dataToValidate = [
            'email' => ['user_email' => $email],
            'mobile_number' => ['mobile_number' => $telephone],
            'password' => ['password' => $password],
        ];

        if ($password != $conformPassword) {
            return ['status' => 'failed', 'error' => "Two password are not matching"];
        }

        // Perform data validation
        $validationErrors = $this->validateData($dataToValidate);
        if (!empty((array)$validationErrors)) {
            return [
                'status' => 'failed',
                'error' => $validationErrors,
            ];
        }

        $crudOperator = new CrudOperator(new DatabaseDriver());

        // Hash the password
        $passwordHash = PasswordHash::hash(trim($password));

        $insert = $crudOperator->insert('users', array(
            'email' => $email,
            'password' => $passwordHash,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'mobile' => $telephone,
            'verification_status' => 0,
        ), ['email']);

        if ($insert !== true) {
            if (is_string($insert)) {
                // It's an error message from unique constraint check
                return [
                    'status' => 'failed',
                    'error' => $insert
                ];
            }
        }

        // Get the newly inserted user ID
        $selectQuery = "SELECT id FROM users WHERE email = ?";
        $result = $this->dbCall($selectQuery, 's', array($email));
        
        if (empty($result)) {
            return ['status' => 'failed', 'error' => 'Registration failed, please try again.'];
        }

        $userId = $result[0]['id'];

        // Encrypt user ID and email for verification link
        $encodedUserId = base64_encode($userId);
        $encodedEmail = base64_encode($email);

        $login_link = $_SERVER['HTTP_HOST'] . "/api/user/validate?userId={$encodedUserId}&email={$encodedEmail}";
        $body = '<p>Welcome aboard! 🎉</p>
            <p>We\'re thrilled to extend our warmest greetings as you embark on your journey with us at E Commerce Website. 🚗✈️ Your account has been successfully created, marking the beginning of your seamless experience with our e commerce service.</p>
            <p>To ensure you enjoy every moment of your travels with convenience and peace of mind, we\'ve tailored our services to meet your needs. Whether it\'s a business trip or a well-deserved vacation, count on us to make your parking experience hassle-free and enjoyable.</p>
            <p>Before we get started, please verify your email by clicking on the link below:</p>
            <p><a href="http://' . $login_link . '">Verify Email</a></p>
            <p>Should you have any questions or need assistance, our dedicated customer support team is just a phone call away at 0333 355 0956. We\'re committed to providing you with the highest level of service, ensuring your journey starts and ends on a positive note.</p>
            <p>Thank you for entrusting Your Meet & Greet with your parking needs. 🙏 We eagerly anticipate the opportunity to serve you and exceed your expectations.</p>';

        $emailSender = new EmailSender();
        if ($emailSender->sendEmail($email, 'Welcome to Your Meet & Greet Service!', $body)) {
            return [
                'status' => 'success',
                'message' => 'Registration successful. Please check your email to verify your account.'
            ];
        } else {
            return ['status' => 'failed', 'error' => "Registration successful but email verification failed. Please contact support."];
        }
    }

    public function frogotPassword()
    {
        //return __DIR__ . '/../model/PasswordHash.php';
        // Check if the request method is POST
        if (!self::isPostMethod()) {
            return ['status' => 'failed', 'error' => INVALID_REQUEST_METHOD];
        }

        // Check if the request parameters are set
        if (self::postMethodHasError("email", "password")) {
            return ['status' => 'failed', 'error' => 'One or more required fields missing'];
        }

        // Retrieve data from POST parameters with trimming
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Data validation
        $dataToValidate = [
            'email' => ['user_email' => $email],
            'password' => ['password' => $password],
        ];

        // Perform data validation
        $validationErrors = $this->validateData($dataToValidate);
        if (!empty((array)$validationErrors)) {
            return [
                'status' => 'failed',
                'error' => 'Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character. It must be between 8 and 20 characters in length.'
            ];
        }
        $encodedEmail = base64_encode($email);
        $encodedPassword = base64_encode($password);

        $login_link =  $_SERVER['HTTP_HOST'] . "/api/user/validateFrogotPassword?email={$encodedEmail}&password={$encodedPassword}";
        $body = '<p>Click below to verify your action </p> <br> http://' . $login_link;

        $emailSender = new EmailSender();
        if ($emailSender->sendEmail($email, 'Verification Link', $body)) {
            return ['status' => 'success'];
        } else {
            return ['status' => 'failed', 'error' => "Email Send Unsuccessfull"];
        }
    }

    public function validate()
    {
        if (!self::isGetMethod()) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Something Went Wrong', true, 301);
            exit();
        }

        // Check if the request parameters are set
        if (self::getMethodHasError("userId", "email")) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Invalid verification link', true, 301);
            exit();
        }

        // Decode the encrypted parameters
        $userId = base64_decode($_GET['userId']);
        $email = base64_decode($_GET['email']);

        

        // Validate decoded data
        $dataToValidate = [
            'email' => ['user_email' => $email],
            'int_or_null' => ['id' => $userId],
        ];


        $validationErrors = $this->validateData($dataToValidate);
        if (!empty((array)$validationErrors)) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Invalid verification data', true, 301);
            exit();
        }

    

        $crudOperator = new CrudOperator(new DatabaseDriver());

        // Check if user exists and is not already verified
        $selectQuery = "SELECT * FROM users WHERE id = ? AND email = ? AND verification_status = 0";
        $result = $this->dbCall($selectQuery, 'is', array($userId, $email));

      

        if (empty($result)) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Invalid verification link or account already verified', true, 301);
            exit();
        }

       

        // Update verification status
        $updateResult = $crudOperator->update('users', array('verification_status' => 1), array('id' => $userId));

        

       

        // Create session for the verified user
        $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
        $this->sessionManager->login($userId);

        // Send welcome email
        $body = '<p style="color: black;">Dear Customer,</p>
            <p style="color: black;">Welcome aboard! We are thrilled to have you join Your Meet & Greet Service. Your account has been successfully verified, and you\'re all set to start using our convenient meet and greet solutions.</p>
            <p style="color: black;">With Your Meet & Greet Service, you can seamlessly book professional and friendly greeters for your events or personal needs. We are committed to providing exceptional service to make your experience memorable.</p>
            <p style="color: black;">If you have any questions or need assistance, please don\'t hesitate to reach out to our customer support team at +0333 355 0956.</p>
            <p style="color: black;">Once again, thank you for choosing Your Meet & Greet Service. We look forward to assisting you.</p>
            <p style="color: black;">Best regards,<br>[Your Meet & Greet Service Team]</p>';

        $emailSender = new EmailSender();
        $emailSender->sendEmail($email, 'Account Verified - Welcome to Your Meet & Greet Service!', $body);

        // Redirect to success page
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Success&message=Account verified successfully', true, 301);
        exit();
    }

    public function validateFrogotPassword()
    {
        if (!self::isGetMethod()) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Something Went Wrong', true, 301);
            exit();
        }

        // Check if the request parameters are set
        if (self::getMethodHasError("email", "password")) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Something Went Wrong', true, 301);
            exit();
        }

        // Retrieve data from GET parameters with trimming
        $email = base64_decode($_GET['email']);
        $password = base64_decode($_GET['password']);

        // Data validation
        $dataToValidate = [
            'email' => ['user_email' => $email],
            'password' => ['password' => $password],
        ];

        // Perform data validation
        $validationErrors = $this->validateData($dataToValidate);
        if (!empty((array)$validationErrors)) {
            header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Data Are Not Corrected Format', true, 301);
            exit();
        }

        // Hash the password
        $passwordHash = PasswordHash::hash(trim($password));

        // Check if the user exists in the database
        $selectQuery = "SELECT * FROM `users` WHERE  `email` = ?";
        $result = $this->dbCall($selectQuery, 's', array($email));

        $crudOperator = new CrudOperator(new DatabaseDriver());

        // Use a foreach loop to check user existence
        foreach ($result as $record) {
            if ($record["email"] === $email) {
                $updateResult = $crudOperator->update('users', array('password' => $passwordHash), array('email' => $email));

                $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
                $this->sessionManager->login($record['user_id']);
                header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Success&message=Updated New Password Successfully', true, 301);
                exit();
            }
        }

        header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/verification?status=Failed&error=Email Not Found', true, 301);
        exit();
    }

    public function update()
    {
        if (!$this->isPostMethod()) {
            return ["status" => "failed", "error" => "invalid request method"];
        }

        $title = $_POST['title'];
        $fistName = $_POST['fistName'];
        $lastName = $_POST['lastName'];
        $telephone = $_POST['telephone'];
        $postalCode = $_POST['postalCode'];

        $dataOne = array(
            'title_title_id' => $title,
            'first_name' => $fistName,
            'last_name' => $lastName,
            'telephone' => $telephone,
            'postal_code' => $postalCode,
        );

        $userId =  $this->sessionManager->getUserId();
        $result = $this->crudOperator->update('user', $dataOne, array('user_id' => $userId));

        return ['status' => 'success'];
    }

    /**
     * delete a user based on ID
     */
    public function delete()
    {
        // Check if the request method is POST
        if (!self::isPostMethod()) {
            return self::response(false, INVALID_REQUEST_METHOD);
        }

        if (self::postMethodHasError("id")) {
            return self::response(false, "Required parameters are missing");
        }

        //get user id
        $userId = $_POST['id'];

        //databse opertion
        //check wherthere esxit email
        $selectQuery = "SELECT * FROM `user` WHERE `user_id`=?";
        $result = $this->dbCall($selectQuery, 's', array($userId));
        if (count($result) == 0) {
            return self::response(false, "Invalid User");
        }
        $databaseDriver = new DatabaseDriver();

        $result = $this->crudOperator->update('user', array('user_status_status_id' => 3), array('user_id' => $userId));

        return ['staus' => 'success'];
    }

    /**
     * sign in to a user account of passowrd provided
     */
    public function login()
    {
        if (!$this->isPostMethod()) {
            return ["status" => "failed", "error" => "invalid request method"];
        }

        if ($error = $this->postMethodHasError("email", "password")) {
            return ["status" => "failed", "error" => "invalid request parameters : $error"];
        }

        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($errors = $this->validateData(["email" => ["email" => $email], "password" => ["password" => $password]])) {
            return ["status" => "failed", "error" => 'Invalid Password or Email'];
        }

        $userData = $this->dbCall("SELECT * FROM `users` WHERE `email` = ?", "s", [$email]);
        if (count($userData) == 0) {
            // $adminData = $this->dbCall("SELECT * FROM `admin` WHERE `email` = ?", "s", [$email]);
            // if (count($adminData) == 0) {
            //     return ["status" => "failed", "error" => "User not found"];
            // }
            // if (!PasswordHash::isValid($password, $adminData[0]["hash"])) {
            //     return ["status" => "failed", "error" => "Invalid Password"];
            // }
            // $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
            // $this->sessionManager->login($adminData[0]["admin_id"]);

            // return ['status' => "admin", 'data' => 'admin'];
            return ["status" => "failed", "error" => "User not found"];
        }

        if (!PasswordHash::isValid($password, $userData[0]["password"])) {
            return ["status" => "failed", "error" => "Invalid Password"];
        }
        if ($userData[0]['verification_status'] == 0) {
            return ["status" => "failed", "error" => "You have not verifed yet"];
        }

        $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
        $this->sessionManager->login($userData[0]["id"]);
        return ["status" => "success"];
    }

    /**
     *  log out a user
     */
    public function logout()
    {
        if (!$this->isGetMethod()) {
            return ["status" => "failed", "error" => "invalid request method"];
        }

        $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
        $this->sessionManager->logout();
        return ["status" => "success"];
    }

    /**
     * utility process
     * check if a user is logged or not
     */
    public function isLogged()
    {
        if (!$this->isGetMethod()) {
            return ["status" => "failed", "error" => "invalid request method"];
        }

        $this->sessionManager->updateSessionVariable(SESSION_VARIABLE_USER);
        return $this->sessionManager->isLoggedIn();
    }

    /**
     * load user data based on differnet parameters
     * 
     * #### request parameters
     * - id = user id (single response). if not provided it will load all users
     * - limit = must be integer and limit the result count (default = 5)
     * - self = load self user data only if logged in
     */

    // updates - update the load to get self data even it is not public
    public function load()
    {
        if (!$this->isGetMethod()) {
            return ["status" => "failed", "error" => "invalid request method"];
        }

        $userId = $_GET["id"] ?? null;
        $limit = $_GET["limit"] ?? 5;

        $userId = isset($_GET["self"]) && $_GET["self"] == 1 ? $this->sessionManager->getUserId() : $userId;

        $query = "SELECT `user_id`, `email`, `first_name`, `last_name`, `mobile`, `bio`, `birthday`, `gender`,`status`, 
                    (SELECT COUNT(*) FROM `friend_list` WHERE `user_id_self`  = user.user_id) AS `followings`,
                    (SELECT COUNT(*) FROM `friend_list` WHERE `user_id_friend` = user.user_id) AS `followers`
                    FROM `user`
                    INNER JOIN `user_status` ON `user`.`user_status_status_id1` = `user_status`.`status_id` 
                    INNER JOIN `gender` ON `user`.`gender_gender_id` = `gender`.`gender_id` WHERE ";
        $dataType = "";
        $data = [];
        $isFirstWhereStatementSet = false;
        if ($userId) {
            $isFirstWhereStatementSet = true;
            $query .= "  `user_id`=? ";
            $dataType .= "s";
            array_push($data, $userId);
        }

        // future updates referance
        // if logged as ADMIN it should load all data based on another query parameter that has been set
        $query .= (($isFirstWhereStatementSet) ? " AND " : " ") . " `status`='public' ";

        $query .= " LIMIT ? ";
        $dataType .= "i";
        array_push($data,  intval($limit));

        $userList = $this->dbCall($query, $dataType, $data);
        return ["status" => "success", "results" => $userList];
    }

    //admin panel apis goes here
}