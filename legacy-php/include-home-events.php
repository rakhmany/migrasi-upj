<div class="tab-pane fade" id="upevent2" role="tabpanel" aria-labelledby="profile-tab">
									<div class="lates-news">
                                        <div class="row g-0">
                                             <?php
										$sql = ' SELECT * FROM `latest_event1` WHERE `eventstatus`  = \'Active\'  ORDER BY  eventdate DESC, created_at DESC limit 4    ';
										$RS = $db->Execute($sql); 
										if ($RS->fields['eventid'] != "")
										{
											 
											while (!$RS->EOF)  
											{
												$title_text 	= $language == '_en' ? $RS->fields['eventtitle_en'] : $RS->fields['eventtitle'] ; 
												$short_text 	= $language == '_en' ? $RS->fields['eventshortdesc_en'] : $RS->fields['eventshortdesc'] ; 
												$link_detail 	= 'events/'.$RS->fields['eventid'].'/'.createPermaLink($RS->fields['eventtitle_en']).'';
												$this_image		= get_image_gallery('homeevent', $RS->fields['eventmainimage']);  
												 
												 
												echo '<div class="col-lg-6 p-3">
		                                                <div class="post-item border pb-0">
		                                                    <div class="post-item-wrap">
		                                                        <div class="post-image">
		                                                            <a href="'.$link_detail.'">
		                                                                <img alt="" src="'.$this_image.'">
		                                                            </a>
		                                                        </div>
		                                                        <div class="post-item-description">
		                                                            <span class="post-meta-date"><i class="fa fa-calendar"></i> '.date('d M Y', strtotime($RS->fields['eventdate'])).'</span>
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
                                            <a type="button" href="events" class="btn btn-rounded btn-outline btn-reveal"><span>See More Event</span><i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>