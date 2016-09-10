<?php 

require("function/staffauthen.php");
require("function/global.php");
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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


    

<?php include 'include/navbar.php';?>

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
						    <a href="#slide-mini" data-toggle="tab">รูปสไลด์</a>
						  </li>
						  <li  ><a href="#history" data-toggle="tab">ประวัติภัตตาคารนางนวล</a></li>
						 
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane  active" id="slide-mini">

									<form id="Upload" action="upload_mini.php" enctype="multipart/form-data" method="post"> 
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
						                    <?php include 'include/about-pic-list.php';?>
						                </div>
						            </div>
								</div>
								
								<div class="tab-pane" id="history">
									<form action="about-save-history.php" method="post">	
										<div class="widget">
						                <div class="widget-header">
						                    <i class="icon-list-alt"></i>
						                    <h3>Box</h3>
						                </div>
						                <div class="widget-content">
						                   
						                    <div class="row-fluid stats-box" style="margin:0px">
						                        <div class="span12">
						                            <div class="control-group">                     
						                              <label class="control-label" for="option_title">ประวัตินางนวล</label>
						                              <div class="controls">
						                              <!-- <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"> -->
						                                 <textarea  class="ckeditor" cols="80" rows="20" id="editor1" name="notice_detail" class="span12"><?php include 'include/about-history.php';?></textarea>
						                               
						                              </div>      
						                              </div>
						                        </div>
						                      
						                      
						                        </div>
						                        
						                 </div>

						                  		
						             </div>	
				             			<div class="form-actions">
									          <input type="submit" name="submit_about" value="Update Now" class="btn btn-primary">
									  
										</div>

									</form>

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
<!-- <script src="js/adapters/jquery.js"></script> -->
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="js/ckeditor.js"></script>
<script src="js/ckeditor-custom.js"></script>
<script src="js/darkman.js"></script>


  </body>

</html>
