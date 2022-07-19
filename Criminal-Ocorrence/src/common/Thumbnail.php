<?php

/**
 * File.
 *
 * Make thumbnail images
 *
 * @author Garcia Pedro <garciapedro.php@gmail.com>
 * @author Crisvan dos Santos <csdesigner.05@gmail.com>
 */

class Thumbnail 
{
    private $image;

    public function __construct($image)
    {
        $this->image = $image;
        
        header("Content-type: image/jpeg");
        
        $newSizes = [500, 500];
        list($old_width, $old_height) = getimagesize($image);
        list($new_width, $new_height) = $newSizes;
        
        $new_image = imagecreatetruecolor(
            $new_width,
            $new_height
        );
        $old_image = imagecreatefromjpeg($image);
        imagecopyresampled(
            $new_image,
            $old_image,
            0,
            0,
            0,
            0,
            $new_width,
            $new_height,
            $old_width,
            $old_height
        );
        imagejpeg($new_image);
        imagedestroy($new_image);
    }
}