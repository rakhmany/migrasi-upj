		<!-- .aside -->
        <aside class="bg-black lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                  
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Main menu</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li{if basename($smarty.server.PHP_SELF) eq 'index.php' } class="active"{/if}>
                      <a href="{$baseurl_admin}" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Overview</span>
                      </a>
                    </li>
                    {section name=listing loop=$fh_menu.fh_kategorimenuid}
					<li{if $fh_menu.activecat[listing] eq '1'} class="active"{/if}>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <!-- <b class="badge bg-danger pull-right">4</b> -->
                        <i class="i {$fh_menu.fh_icon[listing]} icon">
                        </i>
                        <span class="font-bold">{$fh_menu.fh_name[listing]}</span>
                      </a>
                      <ul class="nav dk">
                        {section name=listing2 loop=$fh_menu.menulist[listing].fh_menuid}
						<li{if $fh_menu.menulist[listing].activemenu[listing2] eq '1'} class="active"{/if}>
                          <a href="{$fh_menu.menulist[listing].fh_url[listing2]}" class="auto">                                                        
                            <i class="i i-dot"></i><span>{$fh_menu.menulist[listing].fh_name[listing2]}</span>
                          </a>
                        </li>
						{/section}
                      </ul>
                    </li>
					{/section}
                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                   
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="{$baseurl_admin}locked.php" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->