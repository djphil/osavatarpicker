<?php
function debug($variable)
{
	echo '<pre>' . print_r($variable, true) . '</pre>';
}

function getImageByName($dir, $name, $offset)
{
    foreach (glob($dir."*.jpg") as $filename)
    {
        $filename = explode('/', $filename);
        $filename = $filename[$offset];
        $filename = explode('.', $filename);
        $filename = $filename[0];

        if ($filename === $name)
            return $dir.$filename.".jpg"; 
    }
    return $dir."default.jpg"; 
}
?>