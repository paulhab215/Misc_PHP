<?php # PHP 7 multi array sort by column using spaceship operator

  //create array of arrays
  $list = array(
          array('EyeColor' => "Brown",'Name' => "John", 'HairColor' => "Blonde"),
          array('EyeColor' => "Black",'Name' => "Alex", 'HairColor' => "Brown"),
          array('EyeColor' => "Hazel",'Name' => "Paul", 'HairColor' => "Black"),
          array('EyeColor' => "Brown",'Name' => "Mike", 'HairColor' => "Green"),
          array('EyeColor' => "Brown",'Name' => "Pati", 'HairColor' => "Blonde"),
          array('EyeColor' => "Hazel",'Name' => "Juan", 'HairColor' => "Brown"),
          array('EyeColor' => "Brown",'Name' => "Zach", 'HairColor' => "Brown"),
          array('EyeColor' => "Hazel",'Name' => "Kyle", 'HairColor' => "Brown"),
        );

  //sort                                 
  usort($list, function($a, $b) {
      return $a['Name'] <=> $b['Name'];
  });

  //print
  foreach($list as $listitem){
    echo implode(" ",$listitem)."\n";
  }
?>