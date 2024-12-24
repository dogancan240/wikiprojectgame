<?php
header('Content-Type: application/json');

// Include MongoDB library
require 'vendor/autoload.php'; // Adjust path if needed

try {
    // MongoDB Connection
    $client = new MongoDB\Client("mongodb+srv://dogancandemir2001:vB552NzqmztOZdes@cluster0.utmhslq.mongodb.net/?retryWrites=true&w=majority");
    $database = $client->webprogrammingproject; // Your database name
    $collection = $database->users; // Assuming a 'users' collection

    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['userId']) || !isset($data['productId'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
        exit;
    }

    $userId = $data['userId'];
    $productId = $data['productId'];

    // Find the user
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($userId)]);
    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
        exit;
    }

    // Retrieve and convert the user's favorites to a PHP array
    $favorites = isset($user['favorities']) ? (array) $user['favorities'] : [];
    
    // Check if the product is already in the favorites
    if (!in_array($productId, $favorites)) {
        // Add the product to the favorites
        $favorites[] = $productId;

        // Update the user's favorites in the database
        $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($userId)],
            ['$set' => ['favorities' => $favorites]]
        );

        echo json_encode(['success' => true, 'message' => 'Favorites updated.', 'updatedFavorites' => $favorites]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product already in favorites.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}
?>