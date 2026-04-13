
<div id=worksheet>
  <div id=tabelform>
  <table>
  
  {if $msg neq ''}<tr><td colspan=3><span class=red>{$msg}</span><br></td></tr>{/if}

  <form name=form method=post enctype="multipart/form-data" action={php}echo $_SERVER['PHP_SELF']; {/php}{if $data_fh_usergroupid neq ''}?data_fh_usergroupid={$data_fh_usergroupid}{/if}>

  {if $data_fh_usergroupid neq ''}
  <tr><td>ID</td>
      <td> : </td>
      <td><input type=hidden name=data_fh_usergroupid value='{$data_fh_usergroupid}'>{$data_fh_usergroupid}</td>
  </tr>
  {/if}

  <tr><td class=wdth120>User Group Name</td>
      <td class=wdth10>:</td>
      <td><input type=text name=data_fh_usergroupname maxlength=20 size=60 value='{$data_fh_usergroupname}'></td>
  </tr>

  <tr><td colspan=3 height=10></td></tr>

  <tr><td colspan=3>
      {section name=list loop=$list_kategorimenuid}  
      <div id=tabelaksesclear style='clear:both;'><br><span class=bold>{$list_kategorimenuname[list]}</span></div>

        {section name=list1 loop=$list_menuid[list]}
        <div id=tabelaksesright>
        <input type=Checkbox name=optmenu[] value='{$list_menuid[list][list1]}'
              {section name=list2 loop=$optmenu}  
              {if $optmenu[list2] eq $list_menuid[list][list1]}checked{/if}
              {/section}
        >{$list_menuname[list][list1]}
        </div>
        {/section}

        <div id=tabelaksesclear style='clear:both;'></div>
        {/section}
      </td>

  </tr>


  <tr><td colspan=3 height=20></td></tr>
  <tr><td colspan=2></td>
      <td>{if $data_fh_usergroupid neq ''}<input type=submit value='save' name=edit>
	  	  {else}<input type=submit value=submit name=insert>{/if}
		  <input type=reset value=reset></td>
  </tr>
  
  
  </form>
  </table>
  </div>

</div>

</body>
</html>

