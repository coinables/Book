$table = <<<EOT
<table width="100%">
<tr>
  <td rowspan="3" width="60%" id="lastPrice">
  $$lastPrice 
  </td>
<td align="right" style="color: <?php echo $color; ?>;">
  $percentChange %
  </td>
</tr>
  <td align="right">
  H: $highPrice 
  </td>
<tr>
  <td align="right">
  L: $lowPrice 
  </td>
</tr>
<tr>
  <td align="right" colspan="2" id="dateTime">
  Powered by: <a href="#" target="_blank">BTCthreads.com</a> $date 
  </td>
</tr>
</table>
EOT;

echo $table;