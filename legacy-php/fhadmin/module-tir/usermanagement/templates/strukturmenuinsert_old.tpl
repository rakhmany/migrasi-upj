{literal}
<script src="../../lib/ckeditor/ckeditor.js"></script>

<script language='javascript' type='text/javascript'>
function method_change(index){
	var objMethod = document.getElementById('fh_strukturtipeid' + index);
	var objFaberHost1 = document.getElementById('statusmenu1'); 
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = objMethod.value;	

	if(method == 'Parent'){
		objFaberHost1.style.display	='none';
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='none';
        window.document.form.fh_strukturcontenttipe.value = '';
    } else {
 		objFaberHost1.style.display	='';
    }
}

function method_change_content(index){
	var objMethod = document.getElementById('fh_strukturcontenttipeid' + index);
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = objMethod.value;	

	if(method == 'Statis'){
		objFaberHost2.style.display	='';
		objFaberHost3.style.display	='none';
    } else {
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='';
    }
}

function method_change_content_default(index){
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	objFaberHost2.style.display	='none';
	objFaberHost3.style.display	='none';
}

</script>
{/literal}
        


<div id=worksheet>
  <div id=tabelform>
  <table>
  
  <form name=form1 method=post enctype="multipart/form-data" action={php}echo $_SERVER['PHP_SELF']; {/php}?action=view>
  <input type='submit' value=' BACK '>
  </form>
  <br><br>

  {if $msg neq ''}<tr><td colspan=3><span class=red>{$msg}</span><br></td></tr>{/if}
  <form name=form method=post enctype="multipart/form-data" action={php}echo $_SERVER['PHP_SELF']; {/php}>

  <tr><td class=wdth100>Parent</td>
        <td class=wdth10>:</td>
        <td>
             <select name='coremenu' style='width:300px;'>
                    <option value='0' selected>Root Menu</option>
                    {$strukturmenu}
             </select>
        </td>
  </tr>
  
   <tr><td>Menu Name</td>
         <td>:</td>
         <td><input type='text' name='fh_menu_name' size=55 maxlength=255 value='{$fh_menu_name}'> <font color=red>*</font></td>
   </tr>
   
    <!-- content tipe parent berisi : Parent / Content -->
   <tr><td>Menu Type</td>
         <td>:</td>
         <td>{section name=listing loop=$optarray_strukturparenttipe}
                <input type=radio 
                        name='fh_strukturparenttipe'
                        id='fh_strukturtipeid{$smarty.section.listing.index}' 
                        onClick='javascript:method_change("{$smarty.section.listing.index}");' 
                        value='{$optarray_strukturparenttipe[listing]}' 
                        {if $fh_strukturparenttipe eq $optarray_strukturparenttipe[listing]} checked {/if}
               >
               {$optarray_strukturparenttipe[listing]} 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               {/section}
         </td>
   </tr>
   
    <!-- kalau tipe = Content maka dimunculkan form dibawah ini-->
    <tr><td colspan=3 height=15></td></tr>
    <tr id='statusmenu1' {if $fh_strukturparenttipe eq 'Parent' } style='display:none;'{/if} >
          <td colspan=3>
                <table>
                <tr><td class=wdth100>Status</td>
                       <td class=wdth10> : </td>
                       <td><select name=fh_strukturstatus>
                             {section name=listing loop=$optarray_strukturcontentstatus}
                                <option 
                                    value='{$optarray_strukturcontentstatus[listing]}' 
                                    {if $fh_strukturcontentstatus eq $optarray_strukturcontentstatus[listing]} selected {/if}
                                 >{$optarray_strukturcontentstatus[listing]}</option>
                            {/section}
                            </select>
                    </td>
                </tr>
                <tr><td>Content Type</td>
                      <td> : </td>
                      <td><select name=fh_strukturcontenttipe >
                                <option value='' onClick='javascript:method_change_content_default("{$smarty.section.listing.index}");' >-- Choose One --</option>
                                {section name=listing loop=$optarray_strukturcontenttipe}
                                <option 
                                    id='fh_strukturcontenttipeid{$smarty.section.listing.index}' 
                                    onClick='javascript:method_change_content("{$smarty.section.listing.index}");' 
                                    value='{$optarray_strukturcontenttipe[listing]}' 
                                    {if $fh_strukturcontenttipe eq $optarray_strukturcontenttipe[listing]} selected {/if}
                                 >{$optarray_strukturcontenttipe[listing]}</option>
                                {/section}
                            </select>
                      </td>
                </tr>
                </table>
            </td>
    </tr>
    
    <tr><td colspan=3 height=15></td></tr>

    <!-- kalau tipe = Parent atau Content = Module maka tidak dimunculkan form dibawah ini-->
    <!-- form untuk statis page -->
    <tr id='statusmenu2' {if ($fh_strukturparenttipe eq 'Parent') || ($fh_strukturcontenttipe eq 'Module') || ($fh_strukturcontenttipe eq '') } style='display:none;' {/if} >
            <td colspan=3>
                <table>
                <tr>
                    <td class=wdth100>Page Header</td>
                    <td class=wdth10> : </td>
                    <td><input type=text name=fh_menu_pageheader value='{$fh_menu_pageheader}' maxlength=255 size=50></td>
                </tr>
                <tr>
                    <td class=wdth100>Meta Keyword</td>
                    <td class=wdth10> : </td>
                    <td><textarea name=fh_menu_metakeyword cols=30 rows=4>{$fh_menu_metakeyword}</textarea></td>
                </tr>
                <tr>
                    <td class=wdth100>Meta Description</td>
                    <td class=wdth10> : </td>
                    <td><textarea name=fh_menu_metadescription cols=30 rows=4>{$fh_menu_metadescription}</textarea></td>
                </tr>
                <tr><td colspan=3 height=20></td></tr>

                <tr>
                    <td class=wdth100>Title</td>
                    <td class=wdth10> : </td>
                    <td><input type=text name=fh_content_title value='{$fh_content_title}'  maxlength=255 size=50></td>
                </tr>
                
                <tr><td>Banner</td>
                      <td> : </td>
                      <td>{if $fh_content_banner neq ''}<img src='{$path_image}{$fh_content_banner}' border='0' style='width:400px;'><br><br>
                      <input type='submit'  value=' Delete Banner' name='delbanner' onclick='return konfirmasi()';>
                      <br><br><br>{/if}
                      <input type='file'  name='fh_content_banner'> <font color=red><b>Resize Image => Width : {$width_imagelist} px &nbsp;&nbsp;&nbsp; Height : {$height_imagelist} px</b></font></td>
                </tr>

                <tr><td>Description</td>
                      <td> : </td>
                      <td><textarea class="ckeditor" name="fh_content_description" id="standard">{$fh_content_description}</textarea></td>
                </tr>
                {literal}<script src="../../lib/ckeditor/toolbarstandard.js"></script>{/literal}
                </table>
            </td>
    </tr>

    <!-- kalau tipe = Parent atau Content = Statis maka tidak dimunculkan form dibawah ini-->
    <!-- form untuk module page -->
    <tr id='statusmenu3' {if ($fh_strukturparenttipe eq 'Parent') || ($fh_strukturcontenttipe eq 'Statis') || ($fh_strukturcontenttipe eq '') } style='display:none;' {/if}>
            <td>File Name</td>
	        <td> : </td>
			<td><input type='text' name=fh_modulefilename value='{$fh_modulefilename}' maxlength=255 size=20></td>
    </tr>

    <tr><td colspan=3 height=15></td></tr>

    <tr><td colspan=2></td>
            <td>{if $flag1 eq 'insert'}
                <input type=submit value=' Add ' name=insertmenu>
             {else}
                <input type='hidden' name='fh_strukturid' value='{$fh_strukturid}'>
                <input type=submit value=' Save ' name=editmenu>
             {/if}
		     <input type=reset value=reset></td>
    </tr>
  
  </form>
  </table>
  </div>

</div>

</body>
</html>

