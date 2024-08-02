<?php
include_once("connection.php");
$conn = getDatabaseConnection();

// USER FUNCTIONS -------------------------------------------------------

function getUserById($id)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE id = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);

    return json_encode($row, JSON_PRETTY_PRINT);
}

function getUserByUsername($username)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE username = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);

    return json_encode($row, JSON_PRETTY_PRINT);
}

function getAllUsers()
{
    global $conn;
    $sql = "SELECT * FROM USER";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function createUser($txt)
{
    $user = json_decode($txt);
    $username = $user->username;
    $is_member = $user->is_member;
    $is_admin = $user->is_admin;
    $email = $user->email;
    $phone = $user->phone;
    $password = $user->password;
    $credits = $user->credits;

    global $conn;
    $stmt = $conn->prepare("INSERT INTO USER(username, is_member, is_admin, email, phone, password, credits) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siisssi", $username, $is_member, $is_admin, $email, $phone, $password, $credits);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}

function updateUser($txt)
{
    $user = json_decode($txt);
    $id = $user->id;
    $username = $user->username;
    $is_member = $user->is_member;
    $is_admin = $user->is_admin;
    $email = $user->email;
    $phone = $user->phone;
    $password = $user->password;
    $credits = $user->credits;

    global $conn;
    $stmt = $conn->prepare("UPDATE USER SET username = ?, is_member = ?, is_admin = ?, email = ?, phone = ?, password = ?, credits = ? WHERE id = ?");
    $stmt->bind_param("siisssii", $username, $is_member, $is_admin, $email, $phone, $password, $credits, $id);
    $result = $stmt->execute();
    if(!$result){$result = 0;}
    return $result;
}

function deleteUserById($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM USER WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}

// returns user id if credentials are correct, else returns 0
function authenticateEmail($email, $password) {
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE email = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);

    $hash = $row['password'];
    if (password_verify($password, $hash)) {
        return $row['id'];
    }
    else {
        return 0;
    }
}

// returns user id if credentials are correct, else returns 0
function authenticateUsername($username, $password) {
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE username = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);

    $hash = $row['password'];
    if (password_verify($password, $hash)) {
        return $row['id'];
    }
    else {
        return 0;
    }
}

// GAME_KEY functions -------------------------------------------------------

function getGameKeyById($id)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM GAME_KEY WHERE id = ? LIMIT 1";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);
    return json_encode($row, JSON_PRETTY_PRINT);
}

function getKeysByTitle($title, $count=9)
{
    global $conn;
    $sql = "SELECT id, title, game_id, owner_id, platform, credits, upload_date FROM GAME_KEY WHERE title = '$title' ORDER BY game_id LIMIT $count";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function getKeysByPlatform($platform, $count=9)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT id, title, game_id, owner_id, platform, credits, upload_date FROM GAME_KEY WHERE platform = ? ORDER BY game_id LIMIT ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $platform, $count);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function getKeysByTitleAndPlatform($title, $platform, $count=9)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT id, title, game_id, owner_id, platform, credits, upload_date FROM GAME_KEY WHERE platform = ? AND title = ? ORDER BY game_id LIMIT ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $platform, $title, $count);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function getGameKeys($count=9)
{
    global $conn;
    $sql = "SELECT id, title, game_id, owner_id, platform, credits, upload_date FROM GAME_KEY ORDER BY game_id LIMIT ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $count);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function getUniqueKeys($count=9)
{
    global $conn;
    $sql = "SELECT id, title, game_id, owner_id, platform, credits, upload_date
            FROM GAME_KEY 
            WHERE id in (SELECT max(id)
                         FROM GAME_KEY
                         GROUP BY game_id)
            ORDER BY game_id 
            LIMIT ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $count);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return json_encode($rows, JSON_PRETTY_PRINT);
}

function createGameKey($txt)
{
    $game_key = json_decode($txt);
    $_key = $game_key->_key;
    $game_id = $game_key->game_id;
    $owner_id = $game_key->owner_id;
    $title = $game_key->title;
    $platform = $game_key->platform;
    $credits = $game_key->credits;
    $upload_date = $game_key->upload_date;

    global $conn;
    $stmt = $conn->prepare("INSERT INTO GAME_KEY(_key, game_id, owner_id, title, platform, credits, upload_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siissis", $_key, $game_id, $owner_id, $title, $platform, $credits, $upload_date);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}

function updateGameKey($txt)
{
    $game_key = json_decode($txt);
    $id = $game_key->id;
    $_key = $game_key->_key;
    $game_id = $game_key->game_id;
    $owner_id = $game_key->owner_id;
    $title = $game_key->title;
    $platform = $game_key->platform;
    $credits = $game_key->credits;
    $upload_date = $game_key->upload_date;

    global $conn;
    $stmt = $conn->prepare("UPDATE GAME_KEY SET _key = ?, game_id = ?, owner_id = ?, title = ?, platform = ?, credits = ?, upload_date = ? WHERE id = ?");
    $stmt->bind_param("siissisi", $_key, $game_id, $owner_id, $title, $platform, $credits, $upload_date, $id);
    $result = $stmt->execute();
    if(!$result){$result = 0;}
    return $result;
}

function deleteGameKeyById($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM GAME_KEY WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}

// PURCHASED_GAME_KEY functions -------------------------------------------------------

function getPurchasedGameKeyById($id)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM PURCHASED_GAME_KEY WHERE id = ? LIMIT 1";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_assoc($result);
    return json_encode($row, JSON_PRETTY_PRINT);
}

function createPurchasedGameKey($txt)
{
    $game_key = json_decode($txt);
    $id = $game_key->id;
    $_key = $game_key->_key;
    $game_id = $game_key->game_id;
    $owner_id = $game_key->owner_id;
    $buyer_id = $game_key->buyer_id;
    $title = $game_key->title;
    $platform = $game_key->platform;
    $credits = $game_key->credits;
    $upload_date = $game_key->upload_date;
    $purchase_date = $game_key->purchase_date;

    global $conn;
    $stmt = $conn->prepare("INSERT INTO PURCHASED_GAME_KEY(id, _key, game_id, owner_id, buyer_id, title, platform, credits, upload_date, purchase_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isiiississ", $id, $_key, $game_id, $owner_id, $buyer_id, $title, $platform, $credits, $upload_date, $purchase_date);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}

function updatePurchasedGameKey($txt)
{
    $game_key = json_decode($txt);
    $id = $game_key->id;
    $_key = $game_key->_key;
    $game_id = $game_key->game_id;
    $owner_id = $game_key->owner_id;
    $buyer_id = $game_key->buyer_id;
    $title = $game_key->title;
    $platform = $game_key->platform;
    $credits = $game_key->credits;
    $upload_date = $game_key->upload_date;
    $purchase_date = $game_key->purchase_date;

    global $conn;
    $stmt = $conn->prepare("UPDATE PURCHASED_GAME_KEY SET _key = ?, game_id = ?, owner_id = ?, buyer_id = ?, title = ?, platform = ?, credits = ?, upload_date = ?, purchase_date = ? WHERE id = ?");
    $stmt->bind_param("siiississi", $_key, $game_id, $owner_id, $buyer_id, $title, $platform, $credits, $upload_date, $purchase_date, $id);
    $result = $stmt->execute();
    if(!$result){$result = 0;}
    return $result;
}

function deletePurchasedGameKeyById($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM PURCHASED_GAME_KEY WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    if(!$result) {$result = 0;}
    return $result;
}
?>