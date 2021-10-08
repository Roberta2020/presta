<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// 1. 

$table = array(
    array(
        'Name'    => 'Trikse',
        'Color'   => 'Green',
        'Element' => 'Earth',
        'Likes'   => 'Flowers'
    ),
    array(
        'Name'    => 'Vardenis',
        'Element' => 'Air',
        'Likes'   => 'Singing',
        'Color'   => 'Blue'
    ),
    array(
        'Element' => 'Water',
        'Likes'   => 'Dancing',
        'Name'    => 'Jonas',
        'Color'   => 'Pink'
    ),
);

function render($table) {
    $columns_headers = calcColumnsHeaders($table);
    $columns_length = calcColumnsLength($table, $columns_headers);
    $space_rows = str_repeat(spaceRows($columns_length) . "\n" , 0);
    $seperate_rows = seperateRows($columns_length);
    $headers = renderHeader($columns_headers, $columns_length);

    echo '<pre>' . 
                $seperate_rows . "\n" .
                $space_rows .
                $headers . "\n" .
                $space_rows .
                $seperate_rows . "\n" .
                $space_rows;
                foreach ($table as $body) {
                    $body = renderBody($body, $columns_headers, $columns_length);
                    printf($body . "\n" .
                    $space_rows);
                }
    echo $seperate_rows . "\n" . "</pre>";
}

function calcColumnsHeaders($table) {
    return array_keys(reset($table));
}

function calcColumnsLength($table, $columns_headers) {
    $length = [];
    foreach ($columns_headers as $header) {
        $header_length = strlen($header);
        $max = $header_length;
        foreach ($table as $row) {
            $l = strlen($row[$header]);
                if ($l > $max) {
                    $max = $l;
                }
        }   
        if (($max % 2) != ($header_length % 2)) {
            $max += 1;
        }
        $length[$header] = $max;      
    }
    return $length;
}

function spaceRows($columns_length) {
    $row = '';
    foreach ($columns_length as $c) {
        $row .= '|' . str_repeat(' ', $c + 2);
    }
    $row .= '|';
    return $row;
}

function seperateRows($columns_length){
    $row = '';
    foreach ($columns_length as $c) {
        $row .= '+' . str_repeat('-', $c + 2);
    }
    $row .= '+';
    return $row;
}

function renderHeader($columns_headers, $columns_length) {
    $row = '';
    foreach ($columns_headers as $h) {
        $row .= '|' . str_pad($h, $columns_length[$h] + 2, ' ', STR_PAD_BOTH);
    }
    $row .= '|';
    return $row;
}

function renderBody($body, $columns_headers, $columns_length) {
    $row = '';
    foreach ($columns_headers as $h) {
        $row .= '|' . str_repeat(' ', 1) . str_pad($body[$h],  $columns_length[$h] + 1, ' ', STR_PAD_RIGHT);
    }
    $row .= '|';
    return $row;
}

render($table);

print('------------------------------------------------------------------- <br>');

// 2.

$arr = array(1, 2, 4, 7, 1, 6, 2, 8);
$n = floor(array_sum($arr) / count($arr));  
$group = array_chunk($arr, $n);             
     
print_r ($group);

  
// function subsetSums($arr, $a, $b, $sum = 0) {
//     if($a > $b) {
//         echo $sum , " ";
//         return;
//     }
//     subsetSums($arr, $a + 1, $b,
//                $sum + $arr[$a]);

//     subsetSums($arr, $a + 1, $b, $sum);        
// }
// $n = count($arr);
 
// subsetSums($arr, 0, $n - 1);

?>    


</body>
</html>








