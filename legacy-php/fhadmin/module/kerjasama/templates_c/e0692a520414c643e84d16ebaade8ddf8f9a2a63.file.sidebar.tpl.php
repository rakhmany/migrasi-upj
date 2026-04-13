<?php /* Smarty version Smarty-3.1.17, created on 2023-10-02 12:34:06
         compiled from "/home/upjnewfa/public_html/integrasi/fhadmin/templates/scale/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1236138204651a564ea4f5e0-51327061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0692a520414c643e84d16ebaade8ddf8f9a2a63' => 
    array (
      0 => '/home/upjnewfa/public_html/integrasi/fhadmin/templates/scale/sidebar.tpl',
      1 => 1415860432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1236138204651a564ea4f5e0-51327061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl_admin' => 0,
    'fh_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651a564ea67a75_79603875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651a564ea67a75_79603875')) {function content_651a564ea67a75_79603875($_smarty_tpl) {?>		<!-- .aside -->
        <aside class="bg-black lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                  
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Main menu</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li<?php if (basename($_SERVER['PHP_SELF'])=='index.php') {?> class="active"<?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Overview</span>
                      </a>
                    </li>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['fh_menu']->value['fh_kategorimenuid']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
					<li<?php if ($_smarty_tpl->tpl_vars['fh_menu']->value['activecat'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]=='1') {?> class="active"<?php }?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!-- <b class="badge bg-danger pull-right">4</b> -->
                        <i class="i <?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['fh_icon'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
 icon">
                        </i>
                        <span class="font-bold"><?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['fh_name'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</span>
                      </a>
                      <ul class="nav dk">
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['name'] = 'listing2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]['fh_menuid']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total']);
?>
						<li<?php if ($_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]['activemenu'][$_smarty_tpl->getVariable('smarty')->value['section']['listing2']['index']]=='1') {?> class="active"<?php }?>>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]['fh_url'][$_smarty_tpl->getVariable('smarty')->value['section']['listing2']['index']];?>
" class="auto">                                                        
                            <i class="i i-dot"></i><span><?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]['fh_name'][$_smarty_tpl->getVariable('smarty')->value['section']['listing2']['index']];?>
</span>
                          </a>
                        </li>
						<?php endfor; endif; ?>
                      </ul>
                    </li>
					<?php endfor; endif; ?>
                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                   
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
locked.php" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside --><?php }} ?>
