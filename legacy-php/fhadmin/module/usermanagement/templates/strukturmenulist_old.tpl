
<div id=worksheet>

  <div id=tabelform>
  {if $msg neq ''}<tr><td colspan=3><span class=red>{$msg}</span><br></td></tr>{/if}

  <table style='width:800px;'>
    <form name=form method=post action='{php}echo $_SERVER['PHP_SELF']; {/php}?action=insert'>
    <tr><td colspan=3><input type='submit' name='add' value=' Add Menu '> </td></th>
    </form>
    <tr><td colspan=3 height=20></td></tr>
  </table>
  
    <div id=tabellist>
    <table stlye='width:800px;'>
    <tr ><th colspan=6 >Structure Menu</th></tr>
    <tr style='background-color:white;'>
            <td style='padding:2px 10px 2px 10px'><b>[ ROOT ]</b></td>
            <td align=center><b>MENU TYPE</b></td>
            <td align=center><b>UP</b></td>
            <td align=center><b>DOWN</b></td>
            <td align=center><b>EDIT</b></td>
            <td align=center><b>DELETE</b></td>
    </tr>
          {$strukturmenu}
     </table>
     </div>

    <br><br>
  </div>
</div>
</body>
</html>

