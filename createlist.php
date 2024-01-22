<?php

$filename = glob('m5stack-*/boards.txt');

$file = file_get_contents($filename[0]);

$lines = explode("\n", $file);
$list = array();
foreach ($lines as $line) {
    $line = trim($line);
    if ($line == "") {
        continue;
    }

    $temp = explode("=", $line);
    if (count($temp) == 2) {
        // =
        $temp2 = explode(".", $temp[0]);

        $item = &$list;
        for ($i = 0; $i < (count($temp2) - 1); $i++) {
            $item = &$item[$temp2[$i]];
            if (!is_array($item)) {
                $item = array();
            }
        }
        $name = $temp2[count($temp2) - 1];
        $item[$name]['value'] = $temp[1];
    }
}

$titleList = array();
$dataList = array();

foreach ($list as $name => $item) {
    if ($name == 'menu') {
        continue;
    }

    foreach ($item as $name2 => $item2) {
        if ($name2 != 'menu') {
            if (isset($item2['value'])) {
                $titleList[$name2] = $name2;
                $dataList[$name][$name2] = $item2['value'];
            }

            foreach ($item2 as $name3 => $item3) {
                if (isset($item3['value'])) {
                    $titleList[$name2 . '/' . $name3] = $name2 . '/' . $name3;
                    $dataList[$name][$name2 . '/' . $name3] = $item3['value'];
                }
            }
        } else {
            // menu
            foreach ($item2 as $name3 => $item3) {
                $titleList[$name2 . '/' . $name3] = $name2 . '/' . $name3;
                $dataList[$name][$name2 . '/' . $name3] = current($item3)['value'];
            }
        }
    }
}

ksort($titleList);

$titlelist2 = array();
$titlelist2['name'] = 'name';
$titlelist2['vid/0'] = 'vid/0';
$titlelist2['pid/0'] = 'pid/0';
$titleList = array_merge($titlelist2, $titleList);

$html = <<<END
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>M5Stack Board List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.combined.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
    <script>
    $(document).ready(function() {
      $('table').tablesorter({
      widthFixed: true,
        widgets: ['zebra', 'columns', 'filter', 'pager', 'resizable', 'stickyHeaders']
      });
    });
    </script>
  </head>

  <body>
    <h1>M5Stack Board List</h1>
    <table>
END;

$html .= "      <thead><tr>";
$html .=  '<th>config</th>';
foreach ($dataList as $data) {
    $html .=  '<th>' . $data['name'] . '</th>';
}
$html .=  "</tr></thead>\n";

foreach ($titleList as $name => $item) {
    $html .=  "      <tr>";
    $html .=  '<th>' . $name . "</th>";
    foreach ($dataList as $data) {
        $html .=  '<td>' . @$data[$name] . "</td>";
    }
    $html .=  "</tr>\n";
}

$html .= <<<END
</table>
</body>

</html>
END;

file_put_contents('board.html', $html);

// 縦横違い
$html = <<<END
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>M5Stack Board List2</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.combined.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
    <script>
    $(document).ready(function() {
      $('table').tablesorter({
      widthFixed: true,
        widgets: ['zebra', 'columns', 'filter', 'pager', 'resizable', 'stickyHeaders']
      });
    });
    </script>
  </head>

  <body>
    <h1>EM5Stack Board List2</h1>
    <table>
END;

$html .= "      <thead><tr>";
foreach ($titleList as $data) {
    $html .=  '<th>' . $data . '</th>';
}
$html .=  "</tr></thead>\n";

foreach ($dataList as $name => $data) {
    $html .=  "      <tr>";
    foreach ($titleList as $title) {
        $html .=  '<td>' . @$data[$title] . "</td>";
    }
    $html .=  "</tr>\n";
}

$html .= <<<END
</table>
</body>

</html>
END;

file_put_contents('board2.html', $html);
