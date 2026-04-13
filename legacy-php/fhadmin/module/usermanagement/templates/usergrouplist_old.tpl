
<div id=worksheet>
{if $view.msg eq ''}

  <div id=tabellist>
  {$view.pagination.halaman_first} {$view.pagination.halaman_next} {$view.pagination.halaman_content} {$view.pagination.halaman_prev} {$view.pagination.halaman_last}
  <br><br>

  <table>
  <form name=form method=post action={php}echo $_SERVER['PHP_SELF']; {/php}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}>
  <tr><th class=wdth60><a href='{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=fh_usergroupid&search={$view.search}'><img src=../../images/arrow_down.gif></a>ID<a href='{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=fh_usergroupid&search={$view.search}'><img src=../../images/arrow_top.gif></a></th>
      <th><a href='{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=fh_usergroupname&search={$view.search}'><img src=../../images/arrow_down.gif></a>Group Name<a href='{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=fh_usergroupname&search={$view.search}'><img src=../../images/arrow_top.gif></a></th>
      <th class=wdth40>Edit</th>
      <th class=wdth70><input type="checkbox" onclick="SetAllCheckBoxes('form', 'delete[]')" name="selectbox"></th>
  </tr>

  {php}$i=0; {/php}
  {section name=listing loop=$view.fh_usergroupid_temp}
    
	{php}
    if ($i==0)   { $i=1; echo"<tr class='bgwhite'>"; }
    else  { $i=0; echo "<tr class='bgviolet3'>"; }
  	{/php}
    
    <td>{$view.fh_usergroupid_temp[listing]}</td>
    <td>{$view.fh_usergroupname_temp[listing]}</td>
    <td class=center><a href={php}echo $_SERVER['PHP_SELF']; {/php}?action=detail&data_fh_usergroupid={$view.fh_usergroupid_temp[listing]}><img src="../../images/edit.gif"></a></td>
    <td class=center><input type=checkbox name=delete[] value='{$view.fh_usergroupid_temp[listing]}'></td>
    </tr>
    
  {/section}

  <tr><th colspan=3></th>
      <th><input type=submit value=delete name='del' onclick='return konfirmasi()';></th>
  </tr>

  </form>
  </table>
  </div>

{else}
  <div id=tabellist><span class=red>{$view.msg}</span></div>
{/if}

</div>

</body>
</html>

