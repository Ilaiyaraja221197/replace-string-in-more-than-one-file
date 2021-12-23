<?php
ini_set("display_errors",1);

/*Multiple file str change */
function multipleFileStrReplace($path,$string_to_replace,$replace_with){
    
    $fileList = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
    
    foreach ($fileList as $item) {
        /*
        for txt file is following if condition =>   if ($item->isFile() && stripos($item->getPathName(), 'txt') !== false) 
        for other extension file then =>  if ($item->isFile() && stripos($item->getPathName(), 'other extention') !== false) 
        for all files search then just =>  if ($item->isFile()) 
        */
        if ($item->isFile() && stripos($item->getPathName(), 'txt') !== false) 
        {
            $file_contents = file_get_contents($item->getPathName());
            $file_contents = str_replace($string_to_replace,$replace_with,$file_contents);
            file_put_contents($item->getPathName(),$file_contents);
        }
    }
}
$path = $_SERVER['DOCUMENT_ROOT']."/tests/replace/"; // Path to your textfiles 
$string_to_replace="text you want to change";
$replace_with="text you want to replace";
multipleFileStrReplace($path,$string_to_replace,$replace_with);



/* Single file sting change */
    function replace_string_in_file($filename, $string_to_replace, $replace_with){
        $content=file_get_contents($filename);
        $content_chunks=explode($string_to_replace, $content);
        $content=implode($replace_with, $content_chunks);
        file_put_contents($filename, $content);
    }

       $filename="ve.txt";
        $string_to_replace="text you want to change";
        $replace_with="text you want to replace";
       replace_string_in_file($filename, $string_to_replace, $replace_with);
    
