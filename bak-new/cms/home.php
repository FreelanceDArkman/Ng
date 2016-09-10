<?php 

require("function/staffauthen.php");
require("function/global.php");


?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Account - Bootstrap Admin Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
   


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>


    

<?php include 'include/navbar.php'; ?>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	 <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>หน้าแรก</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#formcontrols" data-toggle="tab">รูปภาพหน้าแรก</a>
						  </li>
						  <li  ><a href="#jscontrols" data-toggle="tab">สดจากนางนวล</a></li>
						  <li  ><a href="#menucontrol" data-toggle="tab">รายการอาหารแนะนำ</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane  active" id="formcontrols">

									<form id="Upload" action="upload.php" enctype="multipart/form-data" method="post"> 
									<div class="widget">
						                <div class="widget-header">
						                   <i class="icon-list-alt"></i>
						                   <h3>Picture Box</h3>
						               </div>
						                <div class="widget-content" id="holiday_insert_box">
						               <div class="row-fluid stats-box block-margin">
						                  <div class="span4">
						                        <div class="control-group">											
											   <label class="control-label" for="holiday_title">เลือกไฟล์รูปภาพ</label>
											    <div class="controls">
											    <input id="fileToUpload" type="file" class="span4" name="fileToUpload" /> 
												
											    </div>				
											    </div>
						                   </div>
						                   <div class="span4">

						                       <div class="control-group">											
											
											    <div class="controls">
												    <input type="submit" onclick="return CheckFileUPload('fileToUpload');" style="margin-top:21px;" class="btn btn-primary" value="Save" />
											    </div>				
											    </div>
						                       
						                       
						                   </div>
						               </div>
						                  
						            </div>
						            </div>

						            </form>


						            <div class="widget">
						                <div class="widget-header">
						                    <i class="icon-list-alt"></i>
						                    <h3>รายการรูปภาพ</h3>
						                </div>
						                <div class="widget-content">
						                    <?php include 'include/index-pic-list.php';?>
						                </div>
						            </div>
								</div>
								
								<div class="tab-pane" id="jscontrols">
									<form action="index-save-notic.php" method="post">	
										<div class="widget">
						                <div class="widget-header">
						                    <i class="icon-list-alt"></i>
						                    <h3>Box</h3>
						                </div>
						                <div class="widget-content">
						                   
						                    <div class="row-fluid stats-box" style="margin:0px">
						                        <div class="span12">
						                            <div class="control-group">                     
						                              <label class="control-label" for="option_title">สดจากนางนวล</label>
						                              <div class="controls">
						                             <!--     <textarea  cols="6" rows="5" name="notice_detail" class="span8"><?php include 'include/index-notice.php';?></textarea> -->
						                                <textarea  class="ckeditor" cols="80" rows="20" id="editor1" name="notice_detail" class="span12"><?php include 'include/index-notice.php';?></textarea>
						                               
						                              </div>      
						                              </div>
						                        </div>
						                      
						                      
						                        </div>
						                        
						                 </div>

						                  		
						             </div>	
				             			<div class="form-actions">
									          <input type="submit"  value="Update Now" class="btn btn-primary">
									  
										</div>

									</form>

								</div>


								<div class="tab-pane" id="menucontrol">

									<form id="Upload" action="upload-recom-menu.php" enctype="multipart/form-data" method="post"> 
									<div class="widget">
						                <div class="widget-header">
						                   <i class="icon-list-alt"></i>
						                   <h3>Picture Box</h3>
						               </div>
						                <div class="widget-content" id="holiday_insert_box">
						               <div class="row-fluid stats-box block-margin">
						                  <div class="span4">
						                        <div class="control-group">											
											   <label class="control-label" for="holiday_title">เลือกไฟล์รูปภาพ [240 * 172 px]</label>
											    <div class="controls">
											    <input id="fileToUpload2" type="file" class="span4" name="fileToUpload" /> 
												
											    </div>				
											    </div>
						                   </div>
						                   <div class="span4">
						                        <div class="control-group">											
											   <label class="control-label" for="holiday_title">ชื่อรูปภาพ</label>
											    <div class="controls">
											    <input type="text" class="span4" name="title_pic_recom" style="width:300px;" /> 
												
											    </div>				
											    </div>
                                               <div class="control-group">
                                                   <label class="control-label" for="holiday_title">รายละเอียดแบบย่อกับราคา</label>
                                                   <div class="controls">
                                                       <textarea row="3" name="detail_pic_recom"></textarea>
                                                       <input type="text" class="span4" name="price_pic_recom" placeholder="ราคา" style="width:100px;background-color: lightgoldenrodyellow" />

                                                   </div>
                                               </div>
						                    </div>
						                   <div class="span4">

						                       <div class="control-group">											
											
											    <div class="controls">
												    <input type="submit" onclick="return CheckFileUPload('fileToUpload2');" style="margin-top:21px;" class="btn btn-primary" value="Save" />
											    </div>				
											    </div>
						                       
						                       
						                   </div>
						               </div>
						                  
						            </div>
						            </div>

						            </form>


						            <div class="widget">
						                <div class="widget-header">
						                    <i class="icon-list-alt"></i>
						                    <h3>รายการรูปภาพ</h3>
						                </div>
						                <div class="widget-content">
						                 <?php include 'include/index-menu-recom-list.php';?>
						                </div>
						            </div>

								</div>
								
							</div>
						  
						  
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->


	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->


	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
    
 

    
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				&copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
    


<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="js/ckeditor.js"></script>
<script src="js/ckeditor-custom.js"></script>
<script src="js/darkman.js"></script>


  </body>

</html>
