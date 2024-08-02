<?php

$clientId = "k6p0aypktu77x5ju7t5zppsv9wiqwd";

function request($url, $body, $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());
    global $clientId;
    $headers = [
        "Content-Type:application/json",
        "Client-ID: $clientId",
        "Authorization: Bearer $auth->access_token",
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    return $result;
}

function authenticate() { 
    $url = "https://id.twitch.tv/oauth2/token";
    global $clientId;
    $fields = [
        "client_id" => $clientId,
        "client_secret" => "omkepu50gf6cbu8m93x9s6zo0yokvu",
        "grant_type" => "client_credentials"
    ];
    $fields_string = http_build_query($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    return $result;
}

function getPreviewsByGameIds($gameIds, $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());

    $gamesTxt = getGameById(implode(", ", $gameIds), $auth);
    $games = json_decode($gamesTxt);

    $coverIds = array();
    foreach($games as $game) {
        array_push($coverIds, $game->cover);
    }

    $coversTxt = getCoverById(implode(", ", $coverIds), $auth);
    $covers = json_decode($coversTxt);

    $previews = array();
    for($i = 0; $i < count($games); $i++) {
        $coverImageSrc = str_replace("t_thumb", "t_1080p", $covers[$i]->url);
        $preview = new stdClass();
        $preview->id = $games[$i]->id;
        $preview->name = $games[$i]->name;
        $preview->coverImageSrc = $coverImageSrc;
        $preview->rating = $games[$i]->rating;
        // $preview->summary = $games[$i]->summary;    
    
        array_push($previews, $preview);
    }
    
    return json_encode($previews, JSON_PRETTY_PRINT);
}

function getNamesByGameIds($gameIds, $auth="") {
    if ($auth == "")
        $auth = json_decode(authenticate());

    $gamesTxt = getGameById(implode(", ", $gameIds), $auth);
    $games = json_decode($gamesTxt);

    $nameIds = array();
    for($i = 0; $i < count($games); $i++) {
        $nameIds[$games[$i]->id] = $games[$i]->name;
    }
    
    return json_encode($nameIds, JSON_PRETTY_PRINT);
}

function searchGameByName($gameName, $auth="") {
    return request("https://api.igdb.com/v4/search", "fields *; search \"$gameName\"; limit 50;", $auth);
}

function getGameById($gameId, $auth="") {
    return request("https://api.igdb.com/v4/games", "fields *; where id = ($gameId);", $auth);
}

function getGenreById($genreId, $auth="") {
    return request("https://api.igdb.com/v4/genres", "fields *; where id = ($genreId);", $auth);
}

function getCoverById($coverId, $auth="") {
    return request("https://api.igdb.com/v4/covers", "fields alpha_channel,animated,checksum,game,game_localization,height,image_id,url,width; where id = ($coverId); sort game;", $auth);
}

function getArtworkById($artworkId, $auth="") {
    return request("https://api.igdb.com/v4/artworks", "fields alpha_channel,animated,checksum,game,height,image_id,url,width; where id = ($artworkId); sort game;", $auth);
}

function getWebsiteById($websiteId, $auth="") {
    return request("https://api.igdb.com/v4/websites", "fields *; where id = ($websiteId);", $auth);
}

?>