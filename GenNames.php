<?php
    // Create first and last names //

    // Open txt document from which names are being taken
    $filename = 'list.txt';
    $filestream1 = fopen($filename, 'r') or die('Unable to read file!');

    // Extract names from the txt document
    $names = array();

    // Define number of names to take
    while(!feof($filestream1)){
        $expl = explode(" ",fgets($filestream1));
        $names[] = $expl[0];
      }

    fclose($filestream1);

    $firsts = $names;

    // Shuffle names to 'generate' surnames
    shuffle($names);
    $lasts = $names;

    // Combine into full names
    $full = array();

    for($i = 0; $i<sizeof($firsts) ; $i++ ){
      $full[$i] = $firsts[$i].' '.$lasts[$i].PHP_EOL;
    }

    // Create a txt document of names
    $filename = "names.txt";
    $filestream2 = fopen($filename, 'w') or die ("Unable to write file!");

    // Write the first names to the file
    for( $i = 0 ; $i<sizeof($full) ; $i++){
      fwrite($filestream2,$full[$i]);
    }

    fclose($filestream2);
