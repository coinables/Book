$table = <<<EOT
<table width="100%">
<tr>
  <td rowspan="3" width="60%" id="lastPrice">
  $<?php echo $lastPrice; ?>
  </td>
  <td align="right" style="color: <?php echo $color; ?>;">
  <?php echo $percentChange; ?>%
  </td>
</tr>
  <td align="right">
  H: <?php echo $highPrice; ?>
  </td>
<tr>
  <td align="right">
  L: <?php echo $lowPrice; ?>
  </td>
</tr>
<tr>
  <td align="right" colspan="2" id="dateTime">
  <?php echo $date; ?>
  </td>
</tr>
</table>
EOT;