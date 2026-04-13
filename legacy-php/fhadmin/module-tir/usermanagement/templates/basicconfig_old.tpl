<html>
<head>
  <title>FaberCMS</title>
  <meta name="author" content="FaberHost Indonesia - Seto Andry Wibowo">
  <meta name="copyright" content="FaberHost Indonesia">
  <meta name="creator" content="Webmaster">
</head>
<link rel="stylesheet" href="../../css.css" type="text/css">

<script src="../../include/js/jquery-1.10.2.min.js"></script>
<script src="../../include/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../lib/ckeditor/ckeditor.js"></script>
<script src="../../lib/ckeditor/adapters/jquery.js"></script>
<script src="../../lib/ckfinder/ckfinder.js"></script>
<script src="../../include/js/localscript.js"></script>

</head>

<body>

<div id=worksheet>
  <div id=header>
  <h1><span><img src=../../images/icon1.gif> {$title}</span></h1>
  <hr class=black>
  
  </div>
</div>


<div id=worksheet>
  <div id=tabelform>
  <table>
  {if $msg neq ''}<font color=red><b>{$msg}</b></font><br>{/if}
  <form name=form method=post enctype="multipart/form-data" action={php}echo $_SERVER['PHP_SELF']; {/php}{if $fh_basicconfigid neq ''}?fh_basicconfigid={$fh_basicconfigid}{/if}>

  <tr><td class=wdth150>Company Name</td>
      <td class=wdth10>:</td>
      <td><input type=text name=fh_companyname maxlength=255 size=60 value='{$fh_companyname}'></td>
  </tr>

  <tr><td>Address</td>
      <td>:</td>
      <td><textarea name='fh_companyaddress' rows=5 cols=40>{$fh_companyaddress}</textarea></td>
  </tr>

  <tr><td>Phone</td>
      <td>:</td>
      <td><input type=text name=fh_companyphone maxlength=50 size=50 value='{$fh_companyphone}'></td>
  </tr>
  <tr><td>Fax</td>
      <td>:</td>
      <td><input type=text name=fh_companyfax maxlength=25 size=25 value='{$fh_companyfax}'></td>
  </tr>
  <tr><td>Email</td>
      <td>:</td>
      <td><input type=text name=fh_companyemail maxlength=255 size=50 value='{$fh_companyemail}'> <font color=red><b>*</b></font></td>
  </tr>
  <tr><td>Notification Email</td>
      <td>:</td>
      <td><input type=text name=fh_notifemail maxlength=255 size=50 value='{$fh_notifemail}'> <font color=red><b>*</b></font></td>
  </tr>
  <tr><td>Website</td>
      <td>:</td>
      <td><input type=text name=fh_companyweb maxlength=255 size=30 value='{$fh_companyweb}'></td>
  </tr>

  <tr><td>YM 1</td>
      <td>:</td>
      <td><input type=text name=fh_company_ym1 maxlength=255 size=30 value='{$fh_company_ym1}'></td>
  </tr>
  <tr><td>YM 2</td>
      <td>:</td>
      <td><input type=text name=fh_company_ym2 maxlength=255 size=30 value='{$fh_company_ym2}'></td>
  </tr>

  <!-- Start Social Link-->
  <tr><td>Facebook Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_fb maxlength=255 size=30 value='{$fh_social_fb}'></td>
  </tr>
  <tr><td>Twitter Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_twt maxlength=255 size=30 value='{$fh_social_twt}'></td>
  </tr>
  <tr><td>Google Plus Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_gplus maxlength=255 size=30 value='{$fh_social_gplus}'></td>
  </tr>
  <tr><td>Blogger Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_blogger maxlength=255 size=30 value='{$fh_social_blogger}'></td>
  </tr>
  <tr><td>Linkedin Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_linkedin maxlength=255 size=30 value='{$fh_social_linkedin}'></td>
  </tr>
  <tr><td>Youtube Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_youtube maxlength=255 size=30 value='{$fh_social_youtube}'></td>
  </tr>
  <tr><td>Vimeo Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_vimeo maxlength=255 size=30 value='{$fh_social_vimeo}'></td>
  </tr>
  <tr><td>RSS Link</td>
      <td>:</td>
      <td><input type=text name=fh_social_rss maxlength=255 size=30 value='{$fh_social_rss}'></td>
  </tr>
  <!-- End Social Link-->
  
  <tr><td>Google Map</td>
      <td>:</td>
      <td><textarea name='fh_googlemap' rows=8 cols=40>{$fh_googlemap}</textarea></td>
  </tr>
  
  <tr><td>Facebook Likebox Script</td>
      <td>:</td>
      <td><textarea name='fh_fbbox' rows=8 cols=40>{$fh_fbbox}</textarea></td>
  </tr>  
  <tr><td>Twitter Box Script</td>
      <td>:</td>
      <td><textarea name='fh_twtbox' rows=8 cols=40>{$fh_twtbox}</textarea></td>
  </tr>
  
  <!-- Start Index Content-->
  <tr><td>Home Title (EN)</td>
      <td>:</td>
      <td><input type=text name=fh_index_title maxlength=255 size=50 value='{$fh_index_title}'></td>
  </tr>
  <tr><td>Home Title (ID)</td>
      <td>:</td>
      <td><input type=text name=fh_index_title_en maxlength=255 size=50 value='{$fh_index_title_en}'></td>
  </tr>
  <tr><td>Home Description (EN)</td>
      <td>:</td>
      <td>
		<textarea class="jckeditor" name="fh_index_description" id="fh_index_description">{$fh_index_description}</textarea>
	  </td>
  </tr>
  <tr><td>Home Description (ID)</td>
      <td>:</td>
      <td>
		<textarea class="jckeditor" name="fh_index_description_en" id="fh_index_description_en">{$fh_index_description_en}</textarea>
	  </td>
  </tr>
  <!-- End Index Content-->
  
  <tr><td colspan=3 height=30></td></tr>
  <tr><td>General Page Header (EN)</td>
      <td>:</td>
      <td><input type=text name=fh_general_pageheader maxlength=255 size=30 value='{$fh_general_pageheader}'></td>
  </tr>
  <tr><td>General Page Header (ID)</td>
      <td>:</td>
      <td><input type=text name=fh_general_pageheader_en maxlength=255 size=30 value='{$fh_general_pageheader_en}'></td>
  </tr>
  <tr><td>General Meta Keyword</td>
      <td>:</td>
      <td><input type=text name=fh_general_metakeyword maxlength=255 size=30 value='{$fh_general_metakeyword}'></td>
  </tr>
  <tr><td>General Meta Description</td>
      <td>:</td>
      <td><input type=text name=fh_general_metadescription maxlength=255 size=30 value='{$fh_general_metadescription}'></td>
  </tr>
  <tr><td>General Banner</td>
      <td>:</td>
      <td>{if $fh_general_banner neq ''}
                <img src='{$path_image}{$fh_general_banner}' style='width:400px;'><br>
                <input type='submit'  value=' Delete General Banner ' name='delbanner' onclick='return konfirmasi()';><br><br>
             {/if}
             <input type='file'  name='fh_general_banner'> <br><font color=red><b>Resize Image => Width : {$fh_widthgeneralbanner} px &nbsp;&nbsp;&nbsp; Height : {$fh_heightgeneralbanner} px</b></font>
      </td>
  </tr>
  <tr><td>General Banner Size</td>
      <td>:</td>
      <td>Width : <input type=text name=fh_widthgeneralbanner maxlength=255 size=10 value='{$fh_widthgeneralbanner}'> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            Height : <input type=text name=fh_heightgeneralbanner maxlength=255 size=10 value='{$fh_heightgeneralbanner}'> 
      </td>
  </tr>
  
  <tr><td>Statis Banner Size</td>
      <td>:</td>
      <td>Width : <input type=text name=fh_widthstatisbanner maxlength=255 size=10 value='{$fh_widthstatisbanner}'> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            Height : <input type=text name=fh_heightstatisbanner maxlength=255 size=10 value='{$fh_heightstatisbanner}'> 
      </td>
  </tr>

  <tr><td colspan=3 height=30></td></tr>
  <tr><td>Site Title</td>
      <td>:</td>
      <td><input type=text name=fh_sitetitle maxlength=255 size=50 value='{$fh_sitetitle}'></td>
  </tr>
  <tr><td>Project Name</td>
      <td>:</td>
      <td><input type=text name=fh_projectname maxlength=255 size=50 value='{$fh_projectname}'></td>
  </tr>
  <tr><td>Project URL</td>
      <td>:</td>
      <td><input type=text name=fh_projecturl maxlength=255 size=50 value='{$fh_projecturl}'></td>
  </tr>

  <tr><td>Email Admin</td>
      <td>:</td>
      <td><input type=text name=fh_emailadmin maxlength=255 size=50 value='{$fh_emailadmin}'> <font color=red><b>*</b></font></td>
  </tr>
  <tr><td>Maximum Log</td>
      <td>:</td>
      <td><input type=text name=fh_maxuserlog maxlength=10 size=6 value='{$fh_maxuserlog}'></td>
  </tr>
  <tr><td>Maximum File Size</td>
      <td>:</td>
      <td><input type=text name=fh_maxfilesize maxlength=10 size=10 value='{$fh_maxfilesize}'> bytes</td>
  </tr>
  <tr><td>Listing / Page [Frontend]</td>
      <td>:</td>
      <td><input type=text name=fh_frontend_page maxlength=10 size=6 value='{$fh_frontend_page}'></td>
  </tr>
  <tr><td>Listing / Page [Backend]</td>
      <td>:</td>
      <td><input type=text name=fh_backend_page maxlength=10 size=6 value='{$fh_backend_page}'></td>
  </tr>
  


  <tr><td colspan=3 height=30></td></tr>
  <tr><td>Web Status</td>
      <td>:</td>
      <td><select name=fh_webstatus>
			<option value='Published' {if $fh_webstatus eq 'Published'}selected{/if}>Published</option>
			<option value='On Progress' {if $fh_webstatus eq 'On Progress'}selected{/if}>On Progress</option>
		  </select>
	  </td>
  </tr>
  <tr><td>Keyword for Progress</td>
      <td>:</td>
      <td><input type=text name=fh_webstatuskey maxlength=25 size=25 value='{$fh_webstatuskey}'></td>
  </tr>
  
  <tr><td colspan=3 height=10></td></tr>

  
  <tr><td colspan=3 height=20></td></tr>
  <tr><td colspan=2></td>
      <td><input type=hidden name='fh_basicconfigid' value='{$fh_basicconfigid}'>
		  <input type=submit value='save' name=edit> <input type=reset value=reset></td>
  </tr>
  
  
  </form>
  
  
  
  </table>
  </div>
</div>