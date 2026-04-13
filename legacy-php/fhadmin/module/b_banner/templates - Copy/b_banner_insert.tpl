<link rel="stylesheet" href="../../include/js/dateTimePicker/rfnet.css">
<script type="text/javascript" language="javascript" src="../../include/js/dateTimePicker/datetimepicker.js"></script>
{literal}
<script src="../../include/js/jquery.js"></script>
<script type="text/javascript">
      function countChar(val) {
        var len = val.value.length;
        if (len >= 161) {
          val.value = val.value.substring(0, 160);
        } else {
          $('#charNum').text('Character Left : '  + (160 - len) );
        }
      };
</script>
{/literal}

<div id=worksheet>
  <div id=tabelform>
    <table>
        <form method=post enctype="multipart/form-data" action={php}echo $_SERVER['PHP_SELF']; {/php}?data_newsid={$data_newsid}>
		 {if $msg neq ''}
        <tr><td colspan=3><span class=red>{$msg}</span></td></tr>
        <tr><td height=15 colspan=3></td></tr>
        {/if}

		<tr><td class=wdth100>Type</td>
			<td class=wdth10> : </td>
			<td>
				<select name="data_newstype">
					{section name=listing loop=$optarray_type}
						<option value="{$optarray_type[listing]}" {if $data_newstype eq $optarray_type[listing]} selected {/if}>{$optarray_type[listing]}</option>
					{/section}
				</select>
			</td>
		</tr>
		
        <tr><td class=wdth100>Date Expired</td>
              <td class=wdth10> : </td>
              <td><input type=text name=data_newsdate size=10 id="datestart" readonly value='{$data_newsdate}'> <a href="javascript:NewCal('datestart','ddmmyyyy')"><img src="../../images/cal.gif" width="16" height="16" border="0"> </td>
        </tr>
        <tr><td height=15 colspan=3></td></tr>

        {if $data_newspic neq ''}
    	<tr><td class=wdth100>Picture</td>
              <td class=wdth10> :</td>
              <td><a href="{$path_file_image}{$data_newspic}" title="Click to View" target="_blank"><img style="max-width:300px" src='{$path_file_image}{$data_newspic}' ></a></td>
        </tr>
        {/if}
  
        <tr><td class=wdth100>Upload Picture</td>
              <td class=wdth10>:</td>
              <td ><input type=file name=data_newspic size=40 value="{$data_newspic}"><font class=red> &nbsp; <b>* Homepage Top & Center: {$width}px x {$height}px, Homepage Bottom : {$width2}px x {$height2}px]</b> </font></td>
		</tr>
		
		<tr><td class=wdth100>Title</td>
	          <td class=wdth10> : </td>
		 	  <td><input type=text name=data_newstitle value='{$data_newstitle}' maxlength=255 size=55> <font class=red>*</font></td>
		</tr>

		<tr><td class=wdth100>URL</td>
	          <td class=wdth10> : </td>
		 	  <td><input type=text name=data_newsurl value='{$data_newsurl}' maxlength=255 size=55> <font class=red><b>Format : http://www.contoh.com</b></font></td>
		</tr>
		
		<tr><td class=wdth100>Status</td>
	          <td class=wdth10> : </td>
		 	  <td><select name='data_newsstatus'>
                      {section name=listing loop=$optarray}
				         <option value='{$optarray[listing]}' {if $data_newsstatus eq $optarray[listing]} selected {/if}>{$optarray[listing]}</option>
                       {/section}
                    </select>
		 	  </td>
		</tr>

        <tr><td colspan=3 height=30></td></tr>
        <tr><td colspan=2></td>
              <td>{if $data_newsid neq ''}
                      <input type=hidden name=data_newsid value='{$data_newsid}'>
                      <input type=submit value='save' name=edit>
                    {else}
                      <input type=submit value=submit name=insert>
                    {/if}
		    	    <input type=reset value=' reset '>            
		      </td>
        </tr>
        <tr><td colspan=3 height=20></td></tr>
	    </form>
        </table>
	</table>
  
  </div>
</div>

</body>
</html>

