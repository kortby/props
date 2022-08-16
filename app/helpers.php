<?php

function getDefaultPictureIfNull($collection, $item)
{
    if (count($collection) > $item) {
        return $collection[$item]->getUrl();
    }
    return 'https://therevivalists.com/admin/fm/source/empty.png';
}
