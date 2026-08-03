<?php
@exec('python "c:\\xampp\\htdocs\\principle1\\convert_logo2.py"', $out1, $ret1);
@exec('py "c:\\xampp\\htdocs\\principle1\\convert_logo2.py"', $out2, $ret2);
echo "Logo processing complete! Python output: " . implode("\n", array_merge((array)$out1, (array)$out2));
