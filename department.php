<?php include("header2.php"); ?>
<?php
function get_page_title($id){
    global $con;
    $escaped_id = mysqli_real_escape_string($con, $id);
    $sql = "SELECT * FROM `deparment_category` WHERE `id` = '$escaped_id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    if(!empty($row)){
        return $row['name']; 
    }
    return ""; 
}

$id = mysqli_real_escape_string($con, $_GET['page_id']);
$sid = mysqli_real_escape_string($con, $_GET['page_id']);
?>
$id = $_GET['page_id'];
$sid = $_GET['page_id'];
?>
<?php 
function get_page_banner($sid){
    global $con;
    $sql = "SELECT * FROM `d_slider` WHERE `type` = $sid";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    if(!empty($row)){
        return $row['d_image']; 
    }
    return ""; 
    
}
    $sql = "SELECT * FROM `d_slider` WHERE `type` = $sid";
    $banner_query = mysqli_query($con,$sql);
    $banner_row = mysqli_fetch_assoc($banner_query);
    
    $banner = $banner_row['d_image'];
?>
<!--------- Common Bannar --------->
<div class="page-heading"><img src="img/commonbanner.jpg" class="img-responsive compageimg">
  <div class="zoomIn animated comcaption">
    <h1 class="page-title">Department of <?php echo get_page_title($id);?></h1>
</div>
</div>
<!--------- Common Bannar End --------->

<?php
$infoid = $_GET['page_id'];
$page_setting = "SELECT * FROM `page_setting` WHERE `type` = $infoid";
$page_setting_query = mysqli_query($con,$page_setting);
$page_setting_row =  mysqli_fetch_assoc($page_setting_query);
?>
<section class="allpage_comdiv">
  <div class="container">
      <div class="pagecontent">
          <div class="aboutus">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h2 class="tabpackeg_sub_heading"><i class="fa fa-arrow-circle-right"></i>About</h2>
                   <h2 class=""><?php echo $page_setting_row['about_page']?></h2>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h2 class="tabpackeg_sub_heading"><i class="fa fa-arrow-circle-right"></i>Vision</h2>
                 <h2 class=""><?php echo $page_setting_row['vision_page']?></h2>
            </div>
            
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h2 class="tabpackeg_sub_heading"><i class="fa fa-arrow-circle-right"></i>Mission</h2>
                  <h2 class=""><?php echo $page_setting_row['mission_page']?></h2>
            </div>
            
            
            
            
            
            <!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 my-3">
                  <h2 class="tabpackeg_sub_heading"><i class="fa fa-arrow-circle-right"></i>Vision</h2>
                  <p align="justify"><?php echo $page_setting_row['vision_page']?></p>
            </div>-->

        </div>
    </div>
</div>






<div class="col-md-12 col-sm-12 col-xs-12 news"> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Faculties</div>
                                <div class="panel-body">



<!-- Tab panels 1 -->
<div class="tab-pane fade in active" id="tab-1">
<?php 
    $cat_id = $_GET['page_id'];
    $sql = "SELECT * FROM `tbl_faculty` WHERE `department_id` = '$cat_id' order by d_id desc";
    $query = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($query)) {?>
        <div class="facultypart">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="row">
              <div class="faculty">
                <div class="facultyname"><font size="5" color="#0B37CD"><b><?php echo $row['d_name'];?></b></font></div>
                <div class="faculbio">
                    <img class="img-responsive" alt="" src="file_store/faculty/big/<?php  echo $row['d_photo'];?>"/>
                    <ul>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Designation :</span><?php echo $row['d_desi'];?></li>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Date of Appointment :</span><?php echo $row['d_dob'];?></li>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Date of Joining :</span><?php echo $row['d_doj'];?></li>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Qualification :</span><?php echo $row['qualification'];?></li>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Mobile :</span><?php echo $row['d_phone'];?></li>
                        <li><i class="fa fa-arrow-circle-right"></i><span>Email :</span><?php echo $row['d_email'];?></li>
                </ul>
                <br><br><br>
                <a target="_blank" href="file_store/faculty/profile/<?php echo $row['f_pdf']?>" class="btn btn-light" style="background: DodgerBlue !important;color:#fff">View Profile</a>
            </div>
        </div>
    </div>
</div>
</div>
    <?php }

?>
</div>
</div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<head>
 <meta http-equiv="Content-Type" content="text/html;&#32;charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" /><meta name="viewport" content="width=device-width,&#32;initial-scale=1.0" />

 
<link href="css/notice.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div class="clearfix"></div>
    <section class="notice main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 news"> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading">Event</div>
                                <div class="panel-body">
                                    <?php 
    $cat_id = $_GET['page_id'];
    $sql = "SELECT * FROM `d_event` WHERE `type` = '$cat_id' order by event_id  desc limit 1";
    $query = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($query)) {?>
                                        <img src="file_store/d_event/big/<?php  echo $row['event_photo'];?>" width="315" height="230" caption="false" style="display: block; margin-left: auto; margin-right: auto;" />

                                        <center><a href="event.php?id=<?php echo $row['event_id']; ?>"> <?php echo $row['event_title'];?> <i class="fas fa-chevron-circle-right"></i> </a></center>
                                        <?php }

?><center><div class="btn btn-danger btn-sm"><a style="color: #fff" href="all_event_department.php?department_id=<?php echo $id;?>">View All <i class="fas fa-chevron-circle-right"></i></a></div></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    $stu_feedback_sql =mysqli_query($con,"SELECT * FROM `stu_feedback` WHERE `type` = '$cat_id' order by feed_id desc limit 1");
    $stu_feedback_row = mysqli_fetch_assoc($stu_feedback_sql);
?>
                <div class="col-md-4 col-sm-12 col-xs-12 news"> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading">Students Feedback</div>
                                <div class="panel-body">


                                    <img src="https://www.gse.harvard.edu/sites/default/files//banner/1500x750_studentfeedback.jpg" alt="studentfeedback" width="350" height="200">
                                    <br><br>
                                    <div style="text-align:center">


                                        <table id="customers">
                                            
                                              <tr>
                                                <th><center>Title</center></th>
                                                <th><center>PDF</center></th>
                                            </tr>
                                        
                                          <tr>
                                            <td><center><?php echo $stu_feedback_row['feed_title']?></center></td>
                                            <td><center><a href="file_store/stu_feedback/big/<?php echo $stu_feedback_row['feed_pdf']?>" download>Download <i class="fa fa-download" aria-hidden="true"></i></a></center></td>
                                        </tr>
                                    
                                </table>
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="col-md-4 col-sm-12 col-xs-12 news news-annou">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Notice &amp; Announcement
                                <div class="play-pause"><span> <b id="stop2" style="display: inline;"><i class="fa fa-pause btn btn-default btn-sm"></i> </b> <b style="display: none;" id="play2"> <i class="fa fa-play-circle btn btn-default btn-sm"></i> </b> </span></div>
                            </div>
                            <div class="panel-body">
                                <ul id="notice" class="news-panel list-notic-and-announcement" style="overflow: hidden;">
                                    <?php
                                    $id = $_GET['page_id'];
                                    $ret=mysqli_query($con,"select * from n_a where type='$cat_id' order by n_a_id desc limit 10");
                                    while ($row=mysqli_fetch_assoc($ret)) {
                                        ?>
                                        <li class='news-item'><span class='arw'></span>
                                            <a class='adtext' target='_blank' href='file_store/n_a/big//<?php  echo $row['n_a_pdf'];?>' >
                                                <?php  echo $row['n_a_title'];?>   <br><i class="fa fa-calendar" aria-hidden="true"></i> Date : <span> <?php echo $row['n_a_date']; ?></span> 
                                                <img src='https://www.bujhansi.ac.in/site/Images/new_red.gif' /> 
                                            </li>
                                            <?php 
                                            $cnt=$cnt+1;
                                        }?>
                                    </ul>
                                    <center><div class="btn btn-danger btn-sm"><a style="color: #fff" href="all_notice_department.php?department_id=<?php echo $id;?>">View All <i class="fas fa-chevron-circle-right"></i></a></div></center>
                                </div>
                            </div></div>
                        </div>
                    </div>
        
     
     
     
     
     
     
     
     <?php
    $stu_result_sql =mysqli_query($con,"SELECT * FROM `stu_result` WHERE `type` = '$cat_id' order by feed_id desc limit 1");
    $stu_result_row = mysqli_fetch_assoc($stu_result_sql);
?>
      <div class="col-sm-4 news"> 
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading"><!--<?php echo get_page_title($id);?>--> Result</div>
                                <div class="panel-body">


                                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/result-3715221-3119070.png" alt="studentresult" width="350" height="200">
                                    <br><br>
                                    


                                        <table id="customers">
                                            
                                              <tr>
                                                <th>Title</th>
                                                <th>PDF</th>
                                            </tr>
                                        
                                        
                                          <tr>
                                            <td><?php echo $stu_result_row['feed_title']?></td>
                                            <td><a href="file_store/stu_feedback/big/<?php echo $stu_result_row['feed_pdf']?>" download>Download <i class="fa fa-download" aria-hidden="true"></i></a></td>
                                        </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
     
     
     
     <div class="col-sm-8 news news-annou">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Gallery
                                
                            </div>
                            <div class="panel-body">
                                

 <section class="hero-section">
    
  <div class="hero-slider owl-carousel">
          <?php
    $d_id = $_GET['page_id'];
    $sql = "SELECT * FROM `d_slider` WHERE `type` = '$d_id'";
    $querys = mysqli_query($con,$sql);
    while ($rows = mysqli_fetch_assoc($querys)){
            ?>
        <div class="hs-item set-bg" data-setbg="file_store/d_slider/big/<?php echo $rows['d_image'];?>">
      <div class="hs-text">
        
      </div>
    </div>
    <?php 
           
            }?>
      </div>
      
</section>
                                    
                                </div>
                            </div></div>
                        </div>
                    </div>
     
     
     
     
     
     
    

     
     
     
     

                    
                    
       <br>             
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </body>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script> <!--jquery/1.11.3--> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.bujhansi.ac.in/js/news-scroller.js"></script> 
</section>  




<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>	
		


 <br>      <br>      <br>     


<style>
.mySlides {display:none;}
</style>

      <?php include("footerhead.php"); ?>