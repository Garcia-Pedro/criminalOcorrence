<?php

require_once('Thumbnail.php');

/**
 * File.
 *
 * Upload pictures and files.
 *
 * @author Garcia Pedro <garciapedro.php@gmail.com>
 * @author Crisvan dos Santos <csdesigner.05@gmail.com>
 */

class File 
{
    private $file;
    

    /**
     * @param $file - the file you want to upload
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function Upload(string $dir)
    {
        $filePaths = ["png","jpg","jpeg",""];
        $path = pathinfo($this->file['name'], PATHINFO_EXTENSION);
   
        if (!in_array($path, $filePaths))
        {
            echo "Formato inválido";
        }
        else
        {
            if($path == "")
            {
                $newName = "empty.png";
            }
           else{
                $newName  = uniqid().".".$path;
           }
            $temporary = $this->file['tmp_name'];
            move_uploaded_file($temporary, $dir.$newName);
        }

        return $newName;
    }
}