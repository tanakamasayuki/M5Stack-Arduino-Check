<?php

$files = glob('m5stack-*/variants/*/pins_arduino.h');

$dataList = array();
foreach ($files as $filename) {
    $file = file_get_contents($filename);
    $dirname = basename(dirname($filename));
    $dataList[$dirname]['name'] = $dirname;

    $lines = explode("\n", $file);
    $list = array();
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line == "") {
            continue;
        }
        if (strpos($line, '(')) {
            continue;
        }

        $line = preg_replace('/\s+/', ' ', $line);
        $item = explode(' ', $line);
        if ($item[0] == '#define' && $item[1] != 'Pins_Arduino_h') {
            $dataList[$dirname][$item[1]] = trim($item[2]);
        }
        if ($item[0] == 'static') {
            $dataList[$dirname][$item[3]] = trim($item[5], " ;");
        }
    }
}

$titleList = array();
foreach ($dataList as $name => $data) {
    foreach ($data as $key => $value) {
        $titleList[$key] = $key;
    }
}

ksort($titleList);

$titleList0['name'] = 'name';
$titleList0['EXTERNAL_NUM_INTERRUPTS'] = 'EXTERNAL_NUM_INTERRUPTS';
$titleList0['NUM_DIGITAL_PINS'] = 'NUM_DIGITAL_PINS';
$titleList0['NUM_ANALOG_INPUTS'] = 'NUM_ANALOG_INPUTS';

$titleList0['USB_VID'] = 'USB_VID';
$titleList0['USB_PID'] = 'USB_PID';

$titleList0['TX'] = 'TX';
$titleList0['RX'] = 'RX';
$titleList0['TX2'] = 'TX2';
$titleList0['RX2'] = 'RX2';
$titleList0['TXD1'] = 'TXD1';
$titleList0['RXD1'] = 'RXD1';
$titleList0['TXD2'] = 'TXD2';
$titleList0['RXD2'] = 'RXD2';

$titleList0['SDA'] = 'SDA';
$titleList0['SCL'] = 'SCL';

$titleList0['SS'] = 'SS';
$titleList0['MOSI'] = 'MOSI';
$titleList0['MISO'] = 'MISO';
$titleList0['SCK'] = 'SCK';

$titleList0['ADC'] = 'ADC';
$titleList0['ADC1'] = 'ADC1';
$titleList0['ADC2'] = 'ADC2';

$titleList0['DAC1'] = 'DAC1';
$titleList0['DAC2'] = 'DAC2';

$titleList0['BUILTIN_LED'] = 'BUILTIN_LED';
$titleList0['LED_BUILTIN'] = 'LED_BUILTIN';
$titleList0['RGB_BUILTIN'] = 'RGB_BUILTIN';
$titleList0['RGB_BRIGHTNESS'] = 'RGB_BRIGHTNESS';

$titleList0['A0'] = 'A0';
$titleList0['A1'] = 'A1';
$titleList0['A2'] = 'A2';
$titleList0['A3'] = 'A3';
$titleList0['A4'] = 'A4';
$titleList0['A5'] = 'A5';

$titleList0['G0'] = 'G0';
$titleList0['G1'] = 'G1';
$titleList0['G2'] = 'G2';
$titleList0['G3'] = 'G3';
$titleList0['G4'] = 'G4';
$titleList0['G5'] = 'G5';
$titleList0['G6'] = 'G6';
$titleList0['G7'] = 'G7';
$titleList0['G8'] = 'G8';
$titleList0['G9'] = 'G9';

$titleList = array_merge($titleList0, $titleList);

$html = <<<END
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>M5Stack Variants List</title>

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
    <h1>EM5Stack Variants List</h1>
    <table>"
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

file_put_contents('variants.html', $html);

// 縦横違い
$html = <<<END
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>M5Stack Variants List2</title>

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
    <h1>EM5Stack Variants List2</h1>
    <table>"
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

file_put_contents('variants2.html', $html);
