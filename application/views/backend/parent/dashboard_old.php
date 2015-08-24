<!DOCTYPE html>
<html>
<head>
<style>
img {
    opacity: 1.0;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}

img:hover {
    opacity: 0.6;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
</style>
</head>
<body>



<div class="row">
    
	<div class="col-sm-4">
            <a href="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo date("d/m/Y");?>">
                <img src="attendanceRound.png" alt="" height="140" width="140">
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/class_routine/show_routine/get_routine_info">
                <img src="routineRound.png" alt="" height="140" width="140">
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/class_routine">
                <img src="messageRound.png" alt="" height="140" width="140">
            </a>
	</div>
        
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/get_student_list/student_list/student_information">
                <img src="Student_listRound.png" alt="" height="140" width="140">
            </a>
	</div>
   
	
</div>


    <br><br>

<div class="row">
	<div class="col-sm-4">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_students; ?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $total_students; ?></div>
			
			<h3>Students</h3>
           <p>Total number of students</p>
		</div>
		
	</div>
	
	<div class="col-sm-4">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_teachers; ?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $total_teachers; ?></div>
			
			<h3>Teachers</h3>
			<p>Total number of teachers</p>
		</div>
		
	</div>
	
	<div class="col-sm-4">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_parents; ?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $total_parents; ?></div>
			
			<h3>Parents</h3>
			<p>Total number of parents</p>
		</div>
		
	</div>
    
        <div class="col-md-12">
            
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    <?php 
							$check	=	array(	'date' => date('Y-m-d') , 'status' => '1' );
							$query = $this->db->get_where('attendance' , $check);
							$present_today		=	$query->num_rows();
						?>
                    <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo get_phrase('attendance');?></h3>
                   <p>Total present student today</p>
                </div>
                
        </div>
	
</div>

<div style="margin:40px;"></div>
<div class="row">
	<!-- CALENDAR-->
	<div class="col-md-6 col-xs-12">    
    	<div class="panel panel-primary " data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-calendar"></i>
					<?php echo get_phrase('event_schedule');?>
                </div>
            </div>
			<div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="notice_calendar"></div>
                    </div>
                </div>
			</div>
		</div>
    </div>   
    
    <!-- TIMELINE -->
    <div class="col-md-6">
    	<div class="panel panel-primary " data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-paperclip"></i>
					<?php echo get_phrase('noticeboard');?>
                </div>
            </div>
			<div class="panel-body" style="padding:0px;">
                <ul class="cbp_tmtimeline">
                    <li>
                        <time class="cbp_tmtime" datetime="2014-03-27T03:45"><span>03:45 AM</span> <span>Today</span></time>
                        
                        <div class="cbp_tmicon bg-success">
                            <i class="entypo-feather"></i>
                        </div>
                        
                        <div class="cbp_tmlabel">
                            <h2><a href="#">Demo Hassan</a> <span>posted a notice update</span></h2>
                            
                        </div>
                    </li>
                    
                    <li>
                        <time class="cbp_tmtime" datetime="2014-03-26T13:22"><span>01:22 PM</span> <span>Yesterday</span></time>
                        
                        <div class="cbp_tmicon bg-secondary">
                            <i class="entypo-suitcase"></i>
                        </div>
                        
                        <div class="cbp_tmlabel">
                            <h2><a href="#">Class Cancellation</a></h2>
                            <p>Class has been canceled by<strong> Demo Hassan</strong></p>
                    </li>
                </ul>
			</div>
		</div>
    </div>
</div>



    <script>
//  $(document).ready(function() {
//	  
//	  var calendar = $('#notice_calendar');
//				
//				$('#notice_calendar').fullCalendar({
//					header: {
//						left: 'title',
//						right: 'today prev,next'
//					},
//					
//					//defaultView: 'basicWeek',
//					
//					editable: false,
//					firstDay: 1,
//					height: 600,
//					droppable: false,
//					
//					events: [
//						{
//							title: 'Sports Tournament',
//							start: '2014-08-01',
//							end: '2014-08-03',
//							allDay: true,
//							className: 'color-blue'
//						}
//						
//					]
//				});
//	});





$(document).ready(function() {
    
    
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
                                               
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
                                                        url: "<?php echo base_url()?>index.php?admin/notice_show/<?php echo $row['notice_id'];?>"
						},
						<?php 
						endforeach
						?>
						
					],
                                        eventClick: function(event) {
                                            if (event.url) {
                                                window.open(event.url);
                                                return false;
                                            }

                                        }
	  
				});
	});
  </script>

  
</body>

</html>

