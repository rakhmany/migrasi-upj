
<div id=worksheet>
{if $view.final_message neq ''}<div id=tabellist><span class=red>{$view.final_message}</span></div><br>{/if}

{if $view.msg eq ''}
  <div id=tabellist>
  {$view.pagination.halaman_first} {$view.pagination.halaman_next} {$view.pagination.halaman_content} {$view.pagination.halaman_prev} {$view.pagination.halaman_last}
  <br><br>

  <table>
  <form name=form method=post action={php}echo $_SERVER['PHP_SELF']; {/php}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}>
  <tr><th class=wdth110><a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=newsdate&search={$view.search}"><img src=../../images/arrow_down.gif></a>Exp. Date<a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=newsdate&search={$view.search}"><img src=../../images/arrow_top.gif></a></th>
        <th><a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=newstitle&search={$view.search}"><img src=../../images/arrow_down.gif></a>Title<a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=newstitle&search={$view.search}"><img src=../../images/arrow_top.gif></a></th>
        <th class=wdth120><a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=type&search={$view.search}"><img src=../../images/arrow_down.gif></a>Type<a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=type&search={$view.search}"><img src=../../images/arrow_top.gif></a></th>
        <th class=wdth120><a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=asc&orderfield=status&search={$view.search}"><img src=../../images/arrow_down.gif></a>Status<a href="{php}echo $_SERVER['PHP_SELF'];{/php}?action={$view.action}&page={$view.page}&order=desc&orderfield=status&search={$view.search}"><img src=../../images/arrow_top.gif></a></th>
        <th class=wdth70>Edit</th>
        <th class=wdth70><input type="checkbox" onclick="SetAllCheckBoxes('form', 'delete[]')" name="selectbox"></th>
  </tr>

  {php}$i=0; {/php}
  {section name=listing loop=$view.data_newsid}
    
	{php}
    if ($i==0)   { $i=1; echo"<tr class='bgwhite'>"; }
    else  { $i=0; echo "<tr class='bgviolet3'>"; }
    {/php}
    
    <td>{$view.data_newsdate[listing]}</td>
    <td>
		<u><b>{$view.data_newstitle[listing]}</u></b><br />
		Picture: <br />
		<a href="{$path_file_image}{$view.data_newspic[listing]}" title="Click to View" target="_blank"><img style="max-width:300px; max-height:150px;margin: 5px;" border=1 src='{$path_file_image}{$view.data_newspic[listing]}' ></a>
	</td>
    <td class=center>{$view.data_newstype[listing]}</td>
    <td class=center>{$view.data_newsstatus[listing]}</td>
    <td class=center><a href={php}echo $_SERVER['PHP_SELF']; {/php}?action=detail&data_newsid={$view.data_newsid[listing]}><img src="../../images/edit.gif"></a></td>
	<td class=center><input type=checkbox name=delete[] value='{$view.data_newsid[listing]}'></td>
    </tr>
    
  {/section}

  <tr><th colspan=5></th>
      <th><input type=submit value=delete name='del' onclick='return konfirmasi()';></th>
  </tr>

  </form>
  </table>
  </div>

{else}
  <div id=tabellist><span class=red>{$view.msg}</span></div>
{/if}

<br>
<!--     <div id=tabelform>
        <div style='padding: 10px 0px;'><b><u>Variable Resize Image :</u></b><br></div>
        <form method=post action={php} echo $_SERVER['PHP_SELF']; {/php}>
            <span>
            <div style='width:70px; float:left;'>Width </div><div>: <input type=text name=width value="{$width}" size=5> px </div>
            <div style='width:70px; float:left;'>Height </div><div>: <input type=text name=height value="{$height}" size=5> px </div>
            <div style='width:70px; float:left;'>&nbsp;</div>&nbsp;&nbsp;<input type=submit value=' update ' name='setwidth'><br>
            </span>
        </form>
    </div> -->
<br><Br>
</div>
</body>
</html>


