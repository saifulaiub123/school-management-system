
                            
                            
                    <!--end class information-->        
                    <table cellpadding="0" cellspacing="0" border="0" class="table class_selector">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('class');?></th>
                                <th><?php echo get_phrase('group');?></th>
                                <th><?php echo get_phrase('section');?></th>
                                <!--<th>Date</th>-->
                                <th>Action</th>
                    
                            </tr>
                        </thead>
                        
                        <tr>
                             <form method="post" action="<?php echo base_url();?>index.php?admin/<?php echo $target_function ?>" class="form">
                            <td>
                                <select name="class_id" id="class_id" class="form-control" required data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                                     <option value=""><?php echo get_phrase('select');?></option>
                                                     <?php 
							$classes = $this->db->get('class')->result_array();
							foreach($classes as $row):
						     ?>
                                                    <option value="<?php echo $row['class_id'];?>">
                                                        <?php echo $row['name'];?>
                                                    </option>
                                                    
                                                    <?php
                                                            endforeach;
                                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="dep_id" id="dep_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="0"><?php echo get_phrase('no_group');?></option>
                                        <option value="1"><?php echo get_phrase('science');?></option>
                                        <option value="2"><?php echo get_phrase('arts');?></option>
                                        <option value="3"><?php echo get_phrase('commerce');?></option>
                                           
                                </select></td>
                            <td>
                                <select name="sec_id" id="sec_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                            </td>
<!--                            <td>
                                <input type="text" class="form-control datepicker" name="date" value="" data-start-view="2">

                            </td>-->
                            <td align="center"><input type="submit" value="<?php echo get_phrase($btn_name);?>" class="btn btn-info"/></td>
                        </tr>
                             </form>
                        
                        
                    </table>
                    
                    
                 
                    
                    
                    
<!--        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                        <thead>
                                <tr>
                                    <th><?php echo get_phrase('class');?></th>
                                    <th><?php echo get_phrase('group');?></th>
                                    <th><?php echo get_phrase('section');?></th>
                                    
                                    <th><?php echo get_phrase('select_date');?></th>
                                </tr>

                       </thead>
		<tbody>
                        <form method="post" action="<?php echo base_url();?>index.php?admin/attendance_selector" class="form">
                            <tr>

                            </tr>
                        <tr class="gradeA">
                            <td>
                                <select name="class_id" id="class_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                                     <option value=""><?php echo get_phrase('select');?></option>
                                                     <?php 
							$classes = $this->db->get('class')->result_array();
							foreach($classes as $row):
						     ?>
                                                    <option value="<?php echo $row['class_id'];?>">
                                                        <?php echo $row['name'];?>
                                                    </option>
                                                    
                                                    <?php
                                                            endforeach;
                                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="dep_id" id="dep_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="0"><?php echo get_phrase('no_group');?></option>
                                        <option value="1"><?php echo get_phrase('science');?></option>
                                        <option value="2"><?php echo get_phrase('arts');?></option>
                                        <option value="3"><?php echo get_phrase('commerce');?></option>
                                           
                                </select>
                                
                            </td>
                            <td>
                                <select name="sec_id" id="sec_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control datepicker" name="date" value="" data-start-view="2">

                            </td>
                            <td align="center"><input type="submit" value="<?php echo get_phrase('manage_attendance');?>" class="btn btn-info"/></td>
                        </tr>
                    </form>
		</tbody>
	</table>
                    
                    
                    -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                            
<!--	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
    	<thead>
        	<tr>
                    <th><?php echo get_phrase('select_date');?></th>
                    <th><?php echo get_phrase('select_month');?></th>
                    <th><?php echo get_phrase('select_year');?></th>
                    <th><?php echo get_phrase('select_class');?></th>
                    <th><?php echo get_phrase('select_date');?></th>
                </tr>
                
       </thead>
		<tbody>
        	<form method="post" action="<?php echo base_url();?>index.php?admin/attendance_selector" class="form">
                    <tr>
                        
                        
                        
                        
                    </tr>
            	<tr class="gradeA">
                    <td>
                    	<select name="date" class="form-control">
                        	<?php for($i=1;$i<=31;$i++):?>
                            	<option value="<?php echo $i;?>" 
                                	<?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
										<?php echo $i;?>
                                        	</option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                    	<select name="month" class="form-control">
                        	<?php 
							for($i=1;$i<=12;$i++):
								if($i==1)$m='january';
								else if($i==2)$m='february';
								else if($i==3)$m='march';
								else if($i==4)$m='april';
								else if($i==5)$m='may';
								else if($i==6)$m='june';
								else if($i==7)$m='july';
								else if($i==8)$m='august';
								else if($i==9)$m='september';
								else if($i==10)$m='october';
								else if($i==11)$m='november';
								else if($i==12)$m='december';
							?>
                            	<option value="<?php echo $i;?>"
                                	<?php if($month==$i)echo 'selected="selected"';?>>
										<?php echo $m;?>
                                        	</option>
                            <?php 
							endfor;
							?>
                        </select>
                    </td>
                    <td>
                    	<select name="year" class="form-control">
                        	<?php for($i=2020;$i>=2010;$i--):?>
                            	<option value="<?php echo $i;?>"
                                	<?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
										<?php echo $i;?>
                                        	</option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                    	<select name="class_id" class="form-control">
                        	<option value="">Select a class</option>
                        	<?php 
							$classes	=	$this->db->get('class')->result_array();
							foreach($classes as $row):?>
                        	<option value="<?php echo $row['class_id'];?>"
                            	<?php if(isset($class_id) && $class_id==$row['class_id'])echo 'selected="selected"';?>>
									<?php echo $row['name'];?>
                              			</option>
                            <?php endforeach;?>
                        </select>

                    </td>
                    <td align="center"><input type="submit" value="<?php echo get_phrase('manage_attendance');?>" class="btn btn-info"/></td>
                </tr>
            </form>
		</tbody>
	</table>-->

<?php if($date!='' && $class_id!=''):?>

<!--<center>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        
            <div class="tile-stats tile-white-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <?php
                   $full_date	=$year.'-'.$date.'-'.$month;
                    $timestamp = strtotime($full_date);
                    $day = strtolower(date('l', $timestamp));
                 ?>
                <h2><?php echo ucwords($day);?></h2>
                
                <h3>Attendance of class <?php echo ($class_id);?></h3>
                <p><?php echo $date.'-'.$month.'-'.$year;
                
                        
                ?></p>
            </div>
        </div>
    </div>
</center>






<div class="row">
<div class="col-sm-offset-3 col-md-6">
    <table  class="table table-bordered">
		<thead>
			<tr class="gradeA">
            	<th><?php echo get_phrase('roll');?></th>
            	<th><?php echo get_phrase('name');?></th>
            	<th><?php echo get_phrase('status');?></th>
			</tr>
        </thead>
        <tbody>
        		
        	<?php echo $class_id;
			//STUDENTS ATTENDANCE
			$students	=	$this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,'sec_id'=>$sec_id))->result_array();
				
			foreach($students as $row)
			{
				?>
				<tr class="gradeA">
					<td><?php echo $row['roll'];?></td>
					<td><?php echo $row['name'];?></td>
					<td align="center">
						<?php 
						//inserting blank data for students attendance if unavailable
						$verify_data	=	array(	'student_id' => $row['student_id'],'date' => $full_date);
													
						$query = $this->db->get_where('attendance' , $verify_data);
						if($query->num_rows() < 1)
						$this->db->insert('attendance' , $verify_data);
						
						//showing the attendance status editing option
						$attendance = $this->db->get_where('attendance' , $verify_data)->row();
						$status		= $attendance->status;
                    	?>
                        
                        <form method="post" action="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id .'/'.$group_id.'/'.$sec_id;?>">
                            <select name="status" class="form-control" style="width:100px; float:left;">
                                <option value="0" <?php if($status == 0)echo 'selected="selected"';?>></option>
                                <option value="1" <?php if($status == 1)echo 'selected="selected"';?>>Present</option>
                                <option value="2" <?php if($status == 2)echo 'selected="selected"';?>>Absent</option>
                            </select>
                            <input type="hidden" name="student_id" 			value="<?php echo $row['student_id'];?>" />
                            <input type="hidden" name="date" 					value="<?php echo $full_date;?>" />
                            <input type="submit" class="btn btn-default" 	value="save" style="float:left; margin:0px 10px;">
                        </form>
                    </td>
				</tr>
				<?php 
			}
			?>
    </table>
</div>
</div>-->
<?php endif;?>