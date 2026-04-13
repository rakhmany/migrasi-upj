<?php



function get_top_subcareer() 
{
	global $db, $language;
	$detail_menu = '';
	$optarray_jobvacancycat = enum("job_vacancy1.jobvacancycat");
	foreach($optarray_jobvacancycat as $jobvacancycat)
	{
		$joblist = '';
		$sql = ' SELECT * FROM `job_vacancy1` WHERE   jobvacancycat=\''.$jobvacancycat.'\' AND jobvacancystatus  != \'Hidden\' AND jobvacancydatestart <= \''.date('Y-m-d').'\'  AND jobvacancydateend >= \''.date('Y-m-d').'\' ORDER BY  `jobvacancyid` ASC  ';
		$RS = $db->Execute($sql); 
		if ($RS->fields['jobvacancyid'] != "")
		{ 
			while (!$RS->EOF)  
			{ 
				$title_text = $language == '_en' ? $RS->fields['jobvacancytitle_en'] : $RS->fields['jobvacancytitle'] ; 
				$joblist .= '<li><a href="vacancy/'.$RS->fields['jobvacancyid'].'/'.createPermaLink($RS->fields['jobvacancytitle_en']).'">'.$title_text.'</a></li>';
					 
				$RS->MoveNext();  
			}
			 
		}
		if(!empty($joblist))
		{
			$detail_menu .= '<div class="col-lg-3"><ul class="list-icon list-icon-arrow list-icon-colored">';
			$detail_menu .= ' <h5 class="mega-menu-title m-b-0"><a href="javascript:void(0)">'.$jobvacancycat.'</a></h5>';
			$detail_menu .= $joblist;
			$detail_menu .= '</ul></div>';
		}			
		
		
		
	}
	return $detail_menu;
	
}

function get_subfacilities($fh_strukturid)
{
	global $db, $language;
	
	$detail_menu = '';
	$sql = ' SELECT * FROM `gallery3_category` WHERE   categorystatus  = \'Active\' ORDER BY  `categoryprioritas` ASC  ';
	$RS = $db->Execute($sql); 
	if ($RS->fields['categoryid'] != "")
	{ 
		while (!$RS->EOF)  
		{ 
			$title_text = $language == '_en' ? $RS->fields['categoryname_en'] : $RS->fields['categoryname'] ; 
			  	 
			$detail_menu .= '<li><a href="facilities/'.$RS->fields['categoryid'].'/'.createPermaLink($RS->fields['categoryname_en']).'">'.$title_text.'</a></li>';
				 
			$RS->MoveNext();  
		}
		 
	}
	return $detail_menu;
	
}


function get_top_submenu($fh_strukturparent)
{
	global $db, $language;
	
	$detail_menu = '';
	$sql = ' SELECT * FROM `fh_struktur_menu` WHERE `fh_strukturparent` = '.$db->qstr($fh_strukturparent).'  AND fh_strukturstatus != \'Hidden\' ORDER BY  `fh_strukturprioritas` ASC  ';
	$RS = $db->Execute($sql); 
	if ($RS->fields['fh_strukturid'] != "")
	{
		$i = 0;
		while (!$RS->EOF)  
		{
			if($RS->fields['fh_menu_sub_pos'] == 'Top' )
			{
				if($i > 0 )
				{
					$detail_menu .= '</ul></div>';
				}
				$detail_menu .= '<div class="col-lg-3"><ul class="list-icon list-icon-arrow list-icon-colored">';
				
			}
			if($RS->fields['fh_strukturparenttipe'] == 'Parent')
			{  
				$link_menu_rs = 'javascript:void(0)';
			}
			elseif($RS->fields['fh_strukturtipe'] == 'Custom Link' && stripos($RS->fields['fh_modulefilename'],"://") )
			{  
				$link_menu_rs = $RS->fields['fh_modulefilename'] .'" target="_blank';
			}
			elseif($RS->fields['fh_strukturtipe'] ==  'Page Statis' )
			{
				$link_menu_rs = 'static-page/'.$RS->fields['fh_pagestatisid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']);
			}
			else
			{
				$link_menu_rs = 'menu/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']).'';
				
			}
			$title_text = $language == '_en' ? $RS->fields['fh_menu_name_en'] : $RS->fields['fh_menu_name'] ; 
			$q = ' SELECT * FROM `fh_struktur_menu` WHERE `fh_strukturparent` = '.$db->qstr($RS->fields['fh_strukturid']).'  AND fh_strukturstatus != \'Hidden\' ORDER BY  `fh_strukturprioritas` ASC  ';
			$S = $db->Execute($q); 
			if ($S->fields['fh_strukturid'] != "")
			{
				
				$detail_menu .= ' 
					<h5 class="mega-menu-title m-b-0"><a href="'.$link_menu_rs.'">'.$title_text.'</a></h5>
					';
				while (!$S->EOF)  
				{ 	
					$subtitle_text = $language == '_en' ? $S->fields['fh_menu_name_en'] : $S->fields['fh_menu_name'] ; 
					
					if($S->fields['fh_strukturtipe'] == 'Custom Link' && stripos($S->fields['fh_modulefilename'],"://") )
					{  
						$link_menu_s = $S->fields['fh_modulefilename'] .'" target="_blank';
					}
					elseif($S->fields['fh_strukturtipe'] ==  'Page Statis' )
					{
						$link_menu_s = 'static-page/'.$S->fields['fh_pagestatisid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']);
					}
					else
					{
						$link_menu_s = 'menu/'.$S->fields['fh_strukturid'].'/'.createPermaLink($S->fields['fh_menu_name_en']).'';
						
					}
				
					$detail_menu .= '
					<li><a href="'.$link_menu_s.'">'.$subtitle_text.'</a></li>';
					$S->MoveNext();  
				}
				if($RS->fields['fh_menu_name_en'] == 'Facilities' && $RS->fields['fh_menu_name'] == 'Fasilitas' )
				{ 
					$submenu_facilities = get_subfacilities($RS->fields['fh_strukturid']);
					$detail_menu 		.= $submenu_facilities ;
				}
				 
				 
			}
			else
			{
				
				$detail_menu .= ' 
					<h5 class="mega-menu-title m-b-0"><a href="'.$link_menu_rs .'">'.$title_text.'</a></h5>
					 ';
						 
				 
			}
			$i++;
			$RS->MoveNext();  
		}
		$detail_menu .= '</ul></div>';
		 
	}
	return $detail_menu;
	
}


?> 
<header id="header" data-transparent="true" class="submenu-light ">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo"> 
                <a href="./"><img src="images/logo.png" class="sticky-hide"> 
                <a href="./"><img src="images/logo.png" class="sticky-show"> 
            </div>
            <!--End: Logo-->
            <!-- Search -->
            <div id="search"> <a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                <form class="search-form" action="search.php" method="get"> <input class="form-control" name="keyword" type="text" placeholder="Type & Search..." /> <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span> </form>
            </div>
            <!-- end: search -->
            <!-- Header Extras-->
            <div class="header-extras">
                <ul>
                    <li>
                        <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                    </li>
                    <li>
                        <div class="p-dropdown"> 
                        	<a href="#">
                        	<?php
                        	if($language == '_en')
                        	{
	                        	?>
                        		<img src="images/en-flag.gif"><span>EN</span>
                        		<?php
                    		}
                    		else
                    		{
	                    		?>
                        		<img src="images/id-flag.gif"><span>ID</span>
                        		<?php
                    		}
                    		?>
                        	
                        	</a>
                            <ul class="p-dropdown-content">
                                <li><a href="en.php"><img src="images/en-flag.gif">EN</a></li>
                                <li><a href="id.php"><img src="images/id-flag.gif">ID</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            <!--<li><a href="index.php">Home</a></li>-->
                            <?php
                           
                            $sql = ' SELECT * FROM `fh_struktur_menu` WHERE `fh_strukturparent` = 0 AND fh_strukturstatus != \'Hidden\' ORDER BY  `fh_strukturprioritas` ASC  ';
							$RS = $db->Execute($sql); 
							if ($RS->fields['fh_strukturid'] != "")
							{ 
								while (!$RS->EOF)  
								{
									$title_text = $language == '_en' ? $RS->fields['fh_menu_name_en'] : $RS->fields['fh_menu_name'] ; 
									$submenu = '';
									if($RS->fields['fh_strukturparenttipe'] == 'Parent' && $RS->fields['fh_menu_name'] != 'Kerjasama' )
									{
										$submenu = get_top_submenu($RS->fields['fh_strukturid']);
										echo '<li class="dropdown mega-menu-item"><a href="#">'.$title_text.'</a>
			                                <ul class="dropdown-menu"  style="background-image:url(images/bg-parallax-1.png);">
			                                    <li class="mega-menu-content">
			                                        <div class="row">
			                                        	'.$submenu .'
			                                        </div>
			                                        </li>
			                                </ul>
			                            </li>';
									}
									else
									{
										if( $RS->fields['fh_menu_name'] == 'Karir' )
										{
											$subcareer = get_top_subcareer();
											if(!empty($subcareer))
											{
												echo '<li class="dropdown mega-menu-item"><a href="career">'.$title_text.'</a>
					                                <ul class="dropdown-menu"  style="background-image:url(images/bg-parallax-1.png);">
					                                    <li class="mega-menu-content">
					                                        <div class="row">
					                                        	'.$subcareer .'
					                                        </div>
					                                        </li>
					                                </ul>
					                            </li>';
											}
											else
											{
												echo '<li><a href="career">'.$title_text.'</a></li>';
											}
											
										}
										else
										{
											echo '<li><a href="menu/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']).'">'.$title_text.'</a></li>';
										}
										
									}
									 
									$RS->MoveNext();  
								}
								 
							}
                            ?>
                             
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>