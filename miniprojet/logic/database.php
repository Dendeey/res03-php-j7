<?php 

// REQUIRE

require "../models/User.php";

// BRING BACK USER BY EMAIL

function loadUser(string $email) : User
{
    $db = new PDO(
    "mysql:host=db.3wa.io;port=3306;dbname=davidsim_phpj7",
    "davidsim",
    "83c8b946aee433563583381d62aa9c15"
    );
    
    
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        
        $parameters = ['email' => $email];
        
        $query->execute($parameters);

        $userByEmail = $query->fetch(PDO::FETCH_ASSOC);
        
        var_dump($userByEmail);
        
        $newUserByEmail = new User($userByEmail["first_name"], $userByEmail["last_name"], $userByEmail["email"], $userByEmail["password"],);
        
        return $newUserByEmail;
        
}

$loadUser = loadUser("david@gmail.com");


// SAVE A USER

function saveUser(User $user) : User
{
    
    $db = new PDO(
    "mysql:host=db.3wa.io;port=3306;dbname=davidsim_phpj7",
    "davidsim",
    "83c8b946aee433563583381d62aa9c15"
    );
    
    $query = $db->prepare('INSERT INTO users VALUES(null, :first_name, :last_name, :email, :password)');

    $parameters = [
        'first_name' => $user->getFirstName(),
        'last_name' => $user->getLastName(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword()
    ];
    
    $query->execute($parameters);
    
    return $user;
    echo "User saved !";
}

/*$user1 = new User("David", "Sim", "david@gmail.com", "abcde");
var_dump($user1);
saveUser($user1);*/




?>