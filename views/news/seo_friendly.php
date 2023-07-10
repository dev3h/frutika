<?php
$query = "SELECT * FROM posts WHERE url = '' ";
$query_run = Database::getInstance()->query($query);

while ($row = $query_run->fetch_assoc()) {
    $new_friendly_url = $vl_url_string = friendly_seo_string($row['title']);

    $counter = 1;
    $initial_friendly_url = $new_friendly_url;

    $getPostByUrl = "SELECT *  FROM posts  WHERE url = '$new_friendly_url' ";
    $getPostByUrl_run = Database::getInstance()->getNumRow($query);

    while ($getPostByUrl_run) {
        $counter++;

        $new_friendly_url = "{$initial_friendly_url}-{$counter}";
    }

    $updateUrl = "UPDATE posts SET url = '{$new_friendly_url}' WHERE id = '{$row['id']}' ";
    Database::getInstance()->query($updateUrl);
}

function friendly_seo_string($vp_string) {
    $vp_string = trim($vp_string);

    $vp_string = html_entity_decode($vp_string);

    $vp_string = strip_tags($vp_string);

    $vp_string = strtolower($vp_string);

    $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);

    $vp_string = preg_replace('~ ~', '-', $vp_string);

    $vp_string = preg_replace('~-+~', '-', $vp_string);

    return $vp_string;
}
