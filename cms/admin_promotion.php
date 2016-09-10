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


    

<?php include 'include/navbar.php';?>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	 <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>หน้าโปรโมชั่น</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#slide-mini" data-toggle="tab">รายการโปรโมชั่น</a>
						  </li>
						
						 
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane  active" id="slide-mini">

									<form id="Upload" action="content_pro_ac_save.php" enctype="multipart/form-data" method="post">
									<input type="hidden" value="pro_content" name="sourcename" />
									<div class="widget">
						                <div class="widget-header">
						                   <i class="icon-list-alt"></i>
						                   <h3>ใส่โปรโมชั่นใหม่</h3>
						               </div>
						                <div class="widget-content" id="holiday_insert_box">
						               <div class="row-fluid stats-box block-margin">
						                  <div class="span2">
						                        <div class="control-group">											
											   <label class="control-label" for="holiday_title">เลือกไฟล์รูปภาพ <br/> <span>[ขนาดรูปภาพ 579 * 129 px]</span></label>
											    <div class="controls">
											    <input id="fileToUpload" type="file" class="span4" name="fileToUpload" /> 
												
											    </div>				
											    </div>
						                   </div>
						                   <div class="span8">

						                       <div class="control-group">											
											
											    <div class="controls">
												    <input type="text" name="txt_title" class="span7"  />
											    </div>				
											    </div>
											     <div class="control-group">											
											
											    <div class="controls">
												    <textarea  class="ckeditor" cols="80" rows="3" id="editor0" name="txt_detail" class="span12"></textarea>
											    </div>				
											    </div>
						                       
						                       
						                   </div>
						                   <div class="span2">

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
						                    <h3>โปรโมชั่นปัจจุบัน</h3>
						                </div>
						                <div class="widget-content">
						                    <?php include 'include/promotion_content_list.php';?>
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
<!-- <script src="js/adapters/jquery.js"></script> -->
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="js/ckeditor.js"></script>
<script src="js/ckeditpr-custom-mini.js"></script>
<script src="js/darkman.js"></script>

<script type="text/javascript">

function beforeSubmit(id) {
            var count = 0;
            //check whether browser fully supports all File API
            if (window.File && window.FileReader && window.FileList && window.Blob) {

                if (!$("#imageInput_" + id + "").val()) //check empty input filed
                {
                    $("#output_" + id + "").html("Please select file.");
                    count = count + 1;
                    return false
                }

                var fsize = $("#imageInput_" + id + "")[0].files[0].size; //get file size
                var ftype = $("#imageInput_" + id + "")[0].files[0].type; // get file type


                // var checkSize = readImage($("#imageInput_" + id + "")[0].files[0]);

                //if (!checkSize) {
                //    $("#output_" + id + "").html("<b>" + bytesToSize(fsize) + "</b> File Must be 225x160 px ! <br />Please reduce the size of your photo using an image editor.");
                //    count = count + 1;
                //    return false
                //}


                //allow only valid image file types 
                switch (ftype) {
                    case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                        break;
                    default:
                        $("#output_" + id + "").html("<b>" + ftype + "</b> Unsupported file type!");
                        count = count + 1;
                        return false
                }

                //Allowed file size is less than 1 MB (1048576)
                if (fsize > 1048576) {
                    $("#output_" + id + "").html("<b>" + bytesToSize(fsize) + "</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                    count = count + 1;
                    return false
                }


                return true;

                //$("#submit-btn_"+id+"").hide(); //hide submit button
                //$("#loading-img_" + id + "").show(); //hide submit button
                //$("#output_" + id + "").html("");
            }

        }

        //function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

$(document).ready(function(){


	$("[data-customsave='1']").click(function () {

					var cid  = $(this).attr("id");

					var urls = "save_content_byId.php?id="+ cid + "&action=promotion" ;
//serialize
					var datafrom = $("#save_content").find("input,textarea,select,hidden").serialize()

                    var data = new FormData();

                    var files = $("#fileToUpload_content_" + cid).get(0).files;

                    // Add the uploaded image content to the form data collection
                    if (files.length > 0) {
                        data.append("fileToUpload", files[0]);
                    }

                    var formarr = datafrom.split('&');

                    	for(var i =0 ;i < formarr.length;i++){
                    		data.append(formarr[i].split('=')[0], formarr[i].split('=')[1]);
                    	}



                        var txtareadata = CKEDITOR.instances["editor_" + cid].getData();
                        data.append("txtdetail",txtareadata );

                        data.append("submit","val");
        //             $.each(datafrom, function(key, value)
				    // {
				        
				    // });


                   // if (beforeSubmit(id)) {

                        $.ajax({
                            type: "POST",
                            url: urls,
                            contentType: false,
                            processData: false,
                            data: data,

                            success: function (data) {
                                console.log(data);
                                  $('#myModal_' + cid).modal('toggle');

                                if(data == "yes"){
                                    window.location.href= "admin_promotion.php";
                                }

                            },
                            error: function (error) {
                                alert("errror");
                            }
                        });
                    ///}

					return false;


                });



	

});

</script>


  </body>

</html>
