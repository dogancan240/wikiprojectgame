<?php
// Include MongoDB client and database connection
require_once 'vendor/autoload.php'; // Path to the Composer autoload file (if you're using Composer)

// Connect to MongoDB
$client = new MongoDB\Client("mongodb+srv://dogancandemir2001:vB552NzqmztOZdes@cluster0.utmhslq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$db = $client->webprogrammingproject; // Replace with your actual database name
$usersCollection = $db->users;
$gamesCollection = $db->games;

// Get the user from localStorage (sent via client-side JavaScript)
$userId = $_GET['userId'] ?? null;

if ($userId) {
    // Find the user by their user_id
    $user = $usersCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);

    if ($user) {
        // Get the favorites list from the user document
        $favoriteGameIds = $user['favorities'];

        if (!empty($favoriteGameIds)) {
            // Convert BSONArray to a PHP array
            $favoriteGameIds = (array) $favoriteGameIds;

            // Convert string values in favorities to integers if they are stored as strings
            $favoriteGameIds = array_map('intval', $favoriteGameIds);

            // Fetch the favorite games from the games collection
            $games = $gamesCollection->find([
                '_id' => ['$in' => array_map(function($id) { return (int)$id; }, $favoriteGameIds)]
            ]);

            // Prepare and send the list of favorite games as a JSON response
            $favoriteGames = iterator_to_array($games);

            if (!empty($favoriteGames)) {
                echo json_encode(["success" => true, "favorite_games" => $favoriteGames]);
            } else {
                echo json_encode(["success" => false, "message" => "No favorites found"]);
            }
        } else {
            // If there are no favorite games in the user document
            echo json_encode(["success" => false, "message" => "No favorites found"]);
        }
    } else {
        // If the user is not found
        echo json_encode(["success" => false, "message" => "User not found"]);
    }
} else {
    // If user_id is not provided
    echo json_encode(["success" => false, "message" => "User ID is required"]);
}
?>
