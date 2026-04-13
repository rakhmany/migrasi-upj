<div class="tab-pane fade" id="news1" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="lates-news">
                                        <div class="row g-0">
                                             <?php
										$sql = ' SELECT * FROM `latest_news1` WHERE `newsstatus`  = \'Active\'  ORDER BY  newsdate DESC, created_at DESC  limit 4   ';
										$RS = $db->Execute($sql); 
										if ($RS->fields['newsid'] != "")
										{
											 
											while (!$RS->EOF)  
											{
												$title_text 	= $language == '_en' ? $RS->fields['newstitle_en'] : $RS->fields['newstitle'] ; 
												$short_text 	= $language == '_en' ? $RS->fields['newsshortdesc_en'] : $RS->fields['newsshortdesc'] ; 
												$link_detail 	= 'news/'.$RS->fields['newsid'].'/'.createPermaLink($RS->fields['newstitle_en']).'';
												$this_image		= get_image_gallery('homenews', $RS->fields['newsmainimage']);  
												 
												echo '<div class="col-lg-6 p-3">
		                                                <div class="post-item border pb-0">
		                                                    <div class="post-item-wrap">
		                                                        <div class="post-image">
		                                                            <a href="'.$link_detail.'">
		                                                                <img alt="" src="'.$this_image.'">
		                                                            </a>
		                                                        </div>
		                                                        <div class="post-item-description">
		                                                            <span class="post-meta-date"><i class="fa fa-calendar"></i> '.date('d M Y', strtotime($RS->fields['newsdate'])).'</span>
		                                                            <h2><a href="'.$link_detail.'">'.$title_text.'
		                                                                </a></h2>
		                                                            <p>'.$short_text.'</p> 
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
                                         
									            ';
												 
												 
												 
												 
												$RS->MoveNext();  
											} 
										}
										
										?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center mt-4">
                                            <a type="button" href="news" class="btn btn-rounded btn-outline btn-reveal"><span>See More News</span><i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>