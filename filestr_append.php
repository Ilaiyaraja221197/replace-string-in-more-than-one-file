<?php
ini_set("display_errors",1);
/*Multiple file str change */
    $path = $_SERVER['DOCUMENT_ROOT']."/tests/replace/"; // Path to your textfiles 
    $fileList = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
    $string_to_replace="https://omni.mconnectapps.com/aa/ms-sso/";
        $replace_with="https://omni.mconnectapps.com/bb/ms-sso/";
    foreach ($fileList as $item) {
        if ($item->isFile() && stripos($item->getPathName(), 'txt') !== false) {
            $file_contents = file_get_contents($item->getPathName());
            $file_contents = str_replace($string_to_replace,$replace_with,$file_contents);
            file_put_contents($item->getPathName(),$file_contents);
        }
    }


/* Single file sting change */
    // function replace_string_in_file($filename, $string_to_replace, $replace_with){
    //     $content=file_get_contents($filename);
    //     $content_chunks=explode($string_to_replace, $content);
    //     $content=implode($replace_with, $content_chunks);
    //     file_put_contents($filename, $content);
    // }

    //$filename="ve.txt";
    //    $string_to_replace="https://omni.mconnectapps.com/ms-sso/";
    //    $replace_with="https://omni.mconnectapps.com/aa/ms-sso/";
       // replace_string_in_file($filename, $string_to_replace, $replace_with);
    

// function recurse_strfile($src,$string_to_replace,$replace_with){
//     $dir = opendir($src);
//     while (false !== ($file = readdir($dir))) {
//         if (($file != '.') && ($file != '..')) {
//             if (is_dir($src . '/' . $file)) {   
//                 recurse_strfile($src . '/' . $file,$string_to_replace,$replace_with);
               
//             } else {
                
//                 $content=file_get_contents($file);
//                 $content_chunks=explode($string_to_replace, $content);
//                 $content=implode($replace_with, $content_chunks);
//                 file_put_contents($file, $content);
//             }
//         }      
//     }
// }

   

//    $src = $_SERVER['DOCUMENT_ROOT']."/tests/replace/"; // Path to your textfiles 
//    $string_to_replace="https://omni.mconnectapps.com/ms-sso/";
//    $replace_with="https://omni.mconnectapps.com/aa/ms-sso/";
//    recurse_strfile($src,$string_to_replace,$replace_with);
//     $fileList = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
//    // print_r($fileList);
// // exit;
