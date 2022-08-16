<?php

function getDefaultPictureIfNull($collection, $item)
{
    return count($collection) ? $collection[$item]->getUrl() : 'https://therevivalists.com/admin/fm/source/empty.png';
}
