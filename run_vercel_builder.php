<?php
exec('python c:\\xampp\\htdocs\\principle1\\build_vercel_export.py 2>&1', $output, $return_var);
echo "Output:<br>" . implode("<br>", $output);
unlink(__FILE__);
?>
