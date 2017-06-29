<?php # PHP 5 multi array sort by column

/**
 * [sort an array of arrays by specified column]
 * @param  [array]  $list   [list of people and identifying info]
 * @param  [string] $column [the column value to sort by]
 * @param  [sort]   $type   [the type of sort performed - default is SORT_ASC]
 */
  function SortByColumn(&$list, $column, $type = SORT_ASC) {
    $sort_col = array();
    foreach ($list as $key=> $row) {
        $sort_col[$key] = $row[$column];
    }

    array_multisort($sort_col, $type, $list);
  }

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
  SortByColumn($list, 'Name');

  //print
  foreach($list as $listitem){
    echo implode(" ",$listitem)."\n";
  }
?>