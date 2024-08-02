<?php

include_once("api_database.php");
include_once("api_igdb.php");

function getPreviews($count=10, $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());
    $keysTxt = getUniqueKeys($count);
    $keys = json_decode($keysTxt);
    $gameIds = array();
    foreach($keys as $key) {
        array_push($gameIds, $key->game_id);
    }

    $gamesInfoTxt = getPreviewsByGameIds($gameIds, $auth);

    $gamesInfo = json_decode($gamesInfoTxt);
    $previews = array();
    for ($i = 0; $i < count($keys); $i++) {
        $preview = new stdClass();
        $preview->game_id = $keys[$i]->game_id;
        $preview->name = $gamesInfo[$i]->name;
        $preview->platform = $keys[$i]->platform;
        $preview->credits = $keys[$i]->credits;
        $preview->coverImageSrc = $gamesInfo[$i]->coverImageSrc;
        $preview->rating = $gamesInfo[$i]->rating;

        array_push($previews, $preview);
    }

    return json_encode($previews, JSON_PRETTY_PRINT);
}

function getKeys($count="", $platform="", $name="", $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());
    
    if ($count == "")
        $count = 15;

    if ($platform != "" && $name != "")
        $keysTxt = getKeysByTitleAndPlatform($name, $platform, $count);
    else if ($platform != "")
        $keysTxt = getKeysByPlatform($platform, $count);
    else if ($name != "")
        $keysTxt = getKeysByTitle($name, $count);
    else
        $keysTxt = getGameKeys($count);

    return $keysTxt;
}

function buyKey($buyerId, $keyId) {
    $buyer = json_decode(getUserById($buyerId));
    $key = json_decode(getGameKeyById($keyId));
    $owner = json_decode(getUserById($key->owner_id));
    echo "owner".$owner->id;
    if ($buyerId == $owner->id)
        return "You cannot buy your own key.";

    if ($key == null)
        return "Key not available.";

    if ($buyer->credits < $key->credits)
        return "Not enough credits.";

    $owner->credits += $key->credits;
    $buyer->credits -= $key->credits;
    $key->buyer_id = $buyer->id;
    $key->purchase_date = date("Y-m-d");
    
    if (!updateUser(json_encode($owner)))
        return "Owner failed to update.";

    if (!updateUser(json_encode($buyer)))
        return "Buyer failed to update.";

    if (!deleteGameKeyById($key->id))
        return "Deleting game key failed.";

    if (!createPurchasedGameKey(json_encode($key)))
        return "Failed to create purchased game key.";

    return  1;
}

function viewKey($buyerId, $keyId) {
    $buyer = json_decode(getUserById($buyerId));
    $key = json_decode(getPurchasedGameKeyById($keyId));

    if ($buyer->id != $key->buyer_id)
        return 0;

    return $key->_key;
}

function donateKey($key, $title, $gameId, $ownerId, $platform, $credits, $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());

    $gameKey = new stdClass();
    $gameKey->_key = $key;
    $gameKey->game_id = $gameId;
    $gameKey->owner_id = $ownerId;
    $gameKey->title = $title;
    $gameKey->platform = $platform;
    $gameKey->credits = $credits;
    $gameKey->upload_date = date("Y-m-d");
    $gameKeyTxt = json_encode($gameKey);

    return createGameKey($gameKeyTxt);
}

?>