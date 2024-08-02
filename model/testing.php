<?php

include_once("api.php");

// api.php tests -----------------------------------------------------------------------------

// echo "<pre>".getKeys("", "", "Dishonored 2", "")."</pre>";
// echo "<pre>".getKeys()."</pre>";
// echo buyKey(4,14);
// buyKey(4,9);
// echo viewKey(1,14);
// echo "<pre>".getPreviews()."</pre>";

// donateKey("", "", "", "")[57690];
// donateKey("", "", "", "");
// echo donateKey("aaaa-aaaa-aaaa-aaaa", "a", "1234", "1", "Epic Games", "9999");

// api_database.php tests --------------------------------------------------------------------

// USER TESTING -------------------------------------------------------

$user = new stdClass();
$user->username = "test4";
$user->is_member = 1;
$user->is_admin = 0;
$user->email = "test4";
$user->phone = "test4";
$user->password = password_hash("password", PASSWORD_DEFAULT);
$user->credits = 500;

$user2 = new stdClass();
$user2->id = 1;
$user2->username = "username";
$user2->is_member = 1;
$user2->is_admin = 1;
$user2->email = "email@email.com";
$user2->phone = "1234567890";
$user2->password = password_hash("password", PASSWORD_DEFAULT);
$user2->credits = 1000;

$usertxt = json_encode($user);
$user2txt = json_encode($user2);

// echo createUser($usertxt);
// echo updateUser($user2txt);
// echo deleteUserById(2);

// echo password_hash("password", PASSWORD_DEFAULT);
// echo getUserById(1);
// echo getUserByUsername("username");
// echo getAllUsers();
// echo authenticateEmail("email@email.com", "password");
// echo authenticateUsername("username", "password");

// GAME KEY TESTING -------------------------------------------------------

$game_key = new stdClass();
$game_key->_key = "hhhh-bbbb-wwww-qqqq";
$game_key->game_id = 5345;
$game_key->owner_id = 1;
$game_key->title = "Fallout 4";
$game_key->platform = "Epic Games";
$game_key->credits = 6000;
$game_key->upload_date = "2023-03-17";

$game_key2 = new stdClass();
$game_key2->id = 22;
$game_key2->_key = "aaaa-bbbb-cccc-dddd";
$game_key2->game_id = 7777;
$game_key2->owner_id = 1;
$game_key2->title = "Rocket League";
$game_key2->platform = "Steam";
$game_key2->credits = 7000;
$game_key2->upload_date = "2023-03-19";

$game_keytxt = json_encode($game_key);
$game_keytxt2 = json_encode($game_key2);

echo createGameKey($game_keytxt);

// echo updateGameKey($game_keytxt2);
// echo deleteGameKeyById(6);
// echo getGameKeyById(1);

// echo "<pre>".getGameKeys(null, null, null, null)."</pre>";

// echo getKeysByTitle("Dishonored 2");
// echo "<pre>".getKeysByPlatform("Steam")."</pre>";
// echo "<pre>".getGameKeys()."</pre>";
// echo "<pre>".getUniqueKeys()."</pre>";
// echo getKeysByTitleAndPlatform("Dishonored 2", "Epic Games");

$purchased_game_key = new stdClass();
$purchased_game_key->id = 1;
$purchased_game_key->_key = "hhhh-bbbb-wwww-qqqq";
$purchased_game_key->game_id = 787;
$purchased_game_key->buyer_id = 4;
$purchased_game_key->owner_id = 1;
$purchased_game_key->title = "Fallout 4";
$purchased_game_key->platform = "Epic Games";
$purchased_game_key->credits = 6000;
$purchased_game_key->upload_date = "2023-03-17";

$purchased_game_key2 = new stdClass();
$purchased_game_key2->id = 1;
$purchased_game_key2->_key = "aaaa-bbbb-cccc-dddd";
$purchased_game_key2->game_id = 222;
$purchased_game_key2->buyer_id = 4;
$purchased_game_key2->owner_id = 1;
$purchased_game_key2->title = "Rocket League";
$purchased_game_key2->platform = "Steam";
$purchased_game_key2->credits = 7000;
$purchased_game_key2->upload_date = "2023-03-19";

$purchased_game_keytxt = json_encode($purchased_game_key);
$purchased_game_keytxt2 = json_encode($purchased_game_key2);

// echo createPurchasedGameKey($purchased_game_keytxt);
// echo updatePurchasedGameKey($purchased_game_keytxt2);
// echo deletePurchasedGameKeyById(6);
// echo getPurchasedGameKeyById(1);

// api_igdb.php tests -------------------------------------------------------

// var_dump(getWebsiteById("23444"));
// echo "<pre>".getWebsiteById("19004")."</pre>";

// var_dump(getGameById(57690));
// echo "<pre>".getGameById("787")."</pre>";
// echo "<pre>".getPreviewsByGameIds([222, 123, 999, 1000])."</pre>";

// echo "<pre>".searchGameByName("mario")."</pre>";
// echo "<pre>".getCoverById(89386)."</pre>";
// echo "<pre>".getArtworkById(142)."</pre>";
// echo "<pre>".getGenreById(12)."</pre>";

// echo authenticate();

// echo "<pre>".getPreviewByGameId(222)."</pre>";
// echo "<pre>".getPreviewByGameId(3456)."</pre>";
// echo "<pre>".getPreviewByGameId(846)."</pre>";
// echo "<pre>".getPreviewByGameId(108)."</pre>";
// echo "<pre>".getPreviewByGameId(333)."</pre>";
// echo "<pre>".getPreviewByGameId(675)."</pre>";
// echo "<pre>".getPreviewByGameId(478)."</pre>";
// echo "<pre>".getPreviewByGameId(2001)."</pre>";
// echo "<pre>".getPreviewByGameId(787)."</pre>";
// echo "<pre>".getPreviewByGameId(1942)."</pre>";

// $previews = json_decode(getPreviews());
// echo"<pre>".json_encode($previews[0], JSON_PRETTY_PRINT)."</pre>";
?>