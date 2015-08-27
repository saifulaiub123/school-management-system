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
                <div class="boxshadow">
					<img src="1.jpg" alt="" height="140" width="100%">
				</div>
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/class_routine/show_routine/get_routine_info">
                 <div class="boxshadow">
					<img src="2.jpg" alt="" height="140" width="100%">
				</div>
            </a>
	</div>
	
	
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/class_routine">
                 <div class="boxshadow">
					<img src="3.jpg" alt="" height="140" width="100%">
				</div>
            </a>
	</div>
        
        <div class="col-sm-4">
        <a href="<?php echo base_url();?>index.php?admin/class_filter/get_student_list/student_list/student_information">
                 <div class="boxshadow">
					<img src="4.jpg" alt="" height="140" width="100%">
				</div>
            </a>
	</div>
   
	
</div>


    <br><br>

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
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
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

  
</body>

</html>

