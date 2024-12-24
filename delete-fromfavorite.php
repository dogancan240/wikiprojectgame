<?php
// Include MongoDB client and database connection
require_once 'vendor/autoload.php'; // Path to the Composer autoload file (if you're using Composer)

$client = new MongoDB\Client("mongodb+srv://dogancandemir2001:vB552NzqmztOZdes@cluster0.utmhslq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$db = $client->webprogrammingproject; // Your MongoDB database name
$usersCollection = $db->users;

$data = json_decode(file_get_contents('php://input'), true); // Get the data from the POST request

if (isset($data['userId'], $data['productId'])) {
    $userId = $data['userId'];
    $productId = $data['productId'];

    // Find the user by their ID
    $user = $usersCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);

    if ($user) {
        // Get the user's current favorites list (convert BSONArray to a regular array)
        $favorites = iterator_to_array($user['favorities'] ?? []);
        
        // Now you can safely use array_search()
        if (($key = array_search($productId, $favorites)) !== false) {
            unset($favorites[$key]);
    
            // Update the user's document with the new favorites list
            $updateResult = $usersCollection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($userId)],
                ['$set' => ['favorities' => array_values($favorites)]] // Re-index the array
            );
    
            if ($updateResult->getModifiedCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Game removed from favorites.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update user favorites.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Game not found in favorites.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request, userId and productId are required.']);
}
?>
