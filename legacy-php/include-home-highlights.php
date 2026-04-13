								<div class="tab-pane fade show active" id="highlight" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="lates-news">
                                        <div class="row g-0">
                                        <?php
										$sql = ' SELECT * FROM `latest_news1` LEFT JOIN latest_news1_kataterkait ON latest_news1_kataterkait.newsid=latest_news1.newsid WHERE    latest_news1.newsstatus  != \'Hidden\' AND   kataterkait LIKE '.$db->qstr('%Highlight%').'   ORDER BY  latest_news1.`newsdate` DESC,   latest_news1.`newsid` DESC limit 4   ';
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
                                            <a type="button" href="highlights" class="btn btn-rounded btn-outline btn-reveal"><span>See More Highlight</span><i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>