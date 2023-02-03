<?php 

// REQUIRE

require "../models/User.php";

// LOGIN TO DATABASE

$host = "db.3wa.io";
$port = "3306";
$dbname = "davidsim_phpj7";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "davidsim";
$password = "83c8b946aee433563583381d62aa9c15";

$db = new PDO(
    $connexionString,
    $user,
    $password
    );
    
// BRING BACK USER BY EMAIL

function loadUser(string $email) : User
{
    $host = "db.3wa.io";
    $port = "3306";
    $dbname = "davidsim_phpj7";
    $connexionString = "mysql:host=$host;port=$port;dbname=$dbname";
    
    $user = "davidsim";
    $password = "83c8b946aee433563583381d62aa9c15";
    
    $db = new PDO(
    $connexionString,
    $user,
    $password
    );
    
    if (isset($_GET['email']))  
    {
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        
        $parameters = ['email' => 'email'];
        
        $query->execute($parameters);
        
        $userByEmail = $query->fetch(PDO::FETCH_ASSOC);
    }
}

function saveUser(User $user) : User
{
    $host = "db.3wa.io";
    $port = "3306";
    $dbname = "davidsim_phpj7";
    $connexionString = "mysql:host=$host;port=$port;dbname=$dbname";
    
    $user = "davidsim";
    $password = "83c8b946aee433563583381d62aa9c15";
    
    $db = new PDO(
    $connexionString,
    $user,
    $password
    );
    
    $query = $db->prepare('INSERT INTO users VALUES(null, :first_name, :last_name, :email, :password)');

    $parameters = [
        'first_name' => $newUser->getFirstName(),
        'last_name' => $newUser->getLastName(),
        'email' => $newUser->getEmail(),
        'password' => $newUser->getPassword()
    ];
    
    $saveUser = new User();
    $saveUser->setId("test");
    
    $query->execute($parameters);
    
}

$user1 = new User("David", "Sim", "david@gmail.com", "abcde");
saveUser($user1);




?>