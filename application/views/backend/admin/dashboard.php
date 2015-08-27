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
                <img src="1.jpg" alt="" height="140" width="300">
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/class_routine/show_routine/get_routine_info">
                <img src="2.jpg" alt="" height="140" width="300">
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/class_routine">
                <img src="3.jpg" alt="" height="140" width="300">
            </a>
	</div>
        
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/get_student_list/student_list/student_information">
                <img src="4.jpg" alt="" height="140" width="300">
            </a>
	</div>
   
	
</div>


    <br><br>

<div class="row">
	<div class="col-sm-4">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_students; ?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $total_students; ?></div>
			
                        <h3><?php echo get_phrase('student')?></h3>
           <p>Total number of students</p>
		</div>
		
	</div>
	
	<div class="col-sm-4">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_teachers; ?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $total_teachers; ?></div>
			
			<h3><?php echo get_phrase('teachers')?></h3>
			<p>Total number of teachers</p>
		</div>
		
	</div>
	
	<div class="col-sm-4">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $total_parents; ?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $total_parents; ?></div>
			
			<h3><?php echo get_phrase('parents')?></h3>
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
	<div class="col-md-7 col-xs-12">    
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
    <div class="col-md-5">
    	<div class="panel panel-primary " data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-paperclip"></i>
					<?php echo get_phrase('noticeboard');?>
                </div>
            </div>
            <div class="tab-content">
                <!----TABLE LISTING STARTS-->


                <?php 
                
               
                $query= $this->db->order_by("date", "DESC")->get('noticeboard');
                $notices   = $query->result_array(); ?>

                <div class="tab-pane box active" id="list">
                    <table cellpadding="0" cellspacing="0" border="0" class="table datatable" id="">
                        <thead>
                        <tr>
                            <!--<th width="9%"><div>#</div></th>-->
                            <th><div><?php echo get_phrase('date');?></div></th>
                            <th width=""><div><?php echo get_phrase('title');?></div></th>
                            <!--<th><div><?php echo get_phrase('notice');?></div></th>-->
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;foreach($notices as $row):?>
                            <tr>
                                <!--<td><?php echo $count++;?></td>-->
                                <td><?php echo date('d M,Y', strtotime($row['date']));?></td>
                                <td><a href="<?php echo base_url();?>index.php?admin/notice_show/<?php echo $row['notice_id'];?>"><?php echo $row['notice_title'];?></a></td>
                                <!--<td class="span5"><?php //echo substr($row['notice'], 0, 200);?><?php //echo $row['notice'];?></td>-->
                                
                                <td>

                                            <!--View Notice-->

                                 <a href="#" class="btn btn-success btn-sm"onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_notice_view/<?php echo $row['notice_id'];?>');">
                                                    <i class="entypo-user"></i>
                                                    <?php echo get_phrase('Read More');?>
                                                </a>








                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <!----TABLE LISTING ENDS--->



            </div>
		</div>
    </div>
</div>



    <script>




$(document).ready(function() {
    
    
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
//					defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 5,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get_where('noticeboard',array('is_event'=>1))->result_array();
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

  <style>
      
      .fc-week .fc-day:nth-child(1)
      {
          background: red;
          color: white;
          
      }
      .fc-view .fc-week:nth-child(1)
      {
          background: red;
          color: white;
      }
      
      
  </style>
</body>

</html>

