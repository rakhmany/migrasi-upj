<?php
/* Smarty version 3.1.31, created on 2021-05-05 10:11:57
  from "/home/upeje/public_html/fhadmin/templates/scale/sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_60920cfdefc185_66171063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b04b8b54a426f3e9c6c3440dfd87fda9bb9cbf8' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/templates/scale/sidebar.tpl',
      1 => 1506050075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60920cfdefc185_66171063 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<!-- .aside -->
        <aside class="bg-black lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                

                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Main menu</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {?> class="active"<?php }?>>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Overview</span>
                      </a>
                    </li>
                    <?php
$__section_listing_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['fh_menu']->value['fh_kategorimenuid']) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_2_total = $__section_listing_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_2_total != 0) {
for ($__section_listing_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_2_iteration <= $__section_listing_2_total; $__section_listing_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
					<li<?php if ($_smarty_tpl->tpl_vars['fh_menu']->value['activecat'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)] == '1') {?> class="active"<?php }?>>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!-- <b class="badge bg-danger pull-right">4</b> -->
                        <i class="i <?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['fh_icon'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
 icon">
                        </i>
                        <span class="font-bold"><?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['fh_name'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</span>
                      </a>
                      <ul class="nav dk">
                        <?php
$__section_listing2_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing2']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing2'] : false;
$__section_listing2_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]['fh_menuid']) ? count($_loop) : max(0, (int) $_loop));
$__section_listing2_3_total = $__section_listing2_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing2'] = new Smarty_Variable(array());
if ($__section_listing2_3_total != 0) {
for ($__section_listing2_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index'] = 0; $__section_listing2_3_iteration <= $__section_listing2_3_total; $__section_listing2_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index']++){
?>
						<li<?php if ($_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]['activemenu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index'] : null)] == '1') {?> class="active"<?php }?>>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]['fh_url'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index'] : null)];?>
" class="auto">                                                        
                            <i class="i i-dot"></i><span><?php echo $_smarty_tpl->tpl_vars['fh_menu']->value['menulist'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]['fh_name'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing2']->value['index'] : null)];?>
</span>
                          </a>
                        </li>
						<?php
}
}
if ($__section_listing2_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing2'] = $__section_listing2_3_saved;
}
?>
                      </ul>
                    </li>
					<?php
}
}
if ($__section_listing_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_2_saved;
}
?>
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
        <!-- /.aside --><?php }
}
