
                            
                            
                    <!--end class information-->        
                    <table cellpadding="0" cellspacing="0" border="0" class="table ">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('class');?></th>
                                <th><?php echo get_phrase('group');?></th>
                                <th><?php echo get_phrase('section');?></th>
                                <th>Date</th>
                                <th>Action</th>
                    
                            </tr>
                        </thead>
                        
                        <tr>
                             <form method="post" action="<?php echo base_url();?>index.php?admin/manage_attendance" class="form">
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
                            <td>
                                <input type="text" class="form-control datepicker" name="date" value="" data-start-view="2">

                            </td>
                            <td align="center"><input type="submit" name="get_attendence" value="<?php echo get_phrase('manage_attendance');?>" class="btn btn-info"/></td>
                        </tr>
                             </form>
                        
                        
                    </table>



<?php if($flag !=0):?>

<center>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        
            <div class="tile-stats tile-white-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <?php
//                    $full_date	=	$year.'-'.$month.'-'.$date;
                    $full_date=$date;
                    $timestamp  = strtotime($full_date);
                    $day        = strtolower(date('l', $timestamp));
                 ?>
                <h2><?php echo ucwords($day);?></h2>
                
                <h3>Attendance of class <?php echo ($class_id);?></h3>
                <p><?php echo $full_date;?></p>
            </div>
            <a href="#" id="update_attendance_button" onclick="return update_attendance()" 
                class="btn btn-info">
                    Update Attendance
            </a>
        </div>

    </div>
</center>
<hr/>

<div class="row" id="attendance_list">
    <div class="col-sm-offset-3 col-md-6">
        <table class="table datatable" id="table_export">
            <thead>
                <tr>
                    
                    <th><div><?php echo get_phrase('roll');?></div></th>
                    <th><div><?php echo get_phrase('name');?></div></th>
                    <th><div><?php echo get_phrase('status');?></div></th>
                    
                </tr>
            </thead>
            <tbody>

                <?php 
                    $students	=	$this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,'sec_id'=>$sec_id))->result_array();
                        foreach($students as $row):?>
                        <tr class="gradeA">
                            <td><?php echo $row['roll'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <?php 
                                //inserting blank data for students attendance if unavailable
                                $verify_data    =   array(  'student_id' => $row['student_id'], 'date' => $full_date);
                                                           
                                $query = $this->db->get_where('attendance' , $verify_data);
                                if($query->num_rows() < 1)
                                {
                                    $this->db->insert('attendance' , array(  'student_id' => $row['student_id'], 'date' => $full_date));
                                    echo $full_date;
                                }
                                //showing the attendance status editing option
                                $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                                $status     = $attendance->status;
                            ?>
                        <?php if ($status == 1):?>
                            <td align="center">
                              <span class="badge badge-success"><?php echo get_phrase('present');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 2):?>
                            <td align="center">
                              <span class="badge badge-danger"><?php echo get_phrase('absent');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 0):?>
                            <td>--</td>
                        <?php endif;?>
                        </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>




<div class="row" id="update_attendance">

<!-- STUDENT's attendance submission form here -->
 <form method="post" action="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo $class_id .'/'.$group_id.'/'.$sec_id;?>">
        <div class="col-sm-offset-3 col-md-6">
            <table class="table datatable" id="table_export">
            <thead>
                <tr>
                    
                    <th><div><?php echo get_phrase('roll');?></div></th>
                    <th><div><?php echo get_phrase('name');?></div></th>
                    <th><div><?php echo get_phrase('status');?></div></th>
                    
                </tr>
            </thead>
                <tbody>
                		
                	<?php 
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
        						$verify_data	=	array(	'student_id' => $row['student_id'],
        													'date' => $full_date);
        						$query = $this->db->get_where('attendance' , $verify_data);
        						if($query->num_rows() < 1)
        						$this->db->insert('attendance' , $verify_data);
        						
        						//showing the attendance status editing option
        						$attendance = $this->db->get_where('attendance' , $verify_data)->row();
        						$status		= $attendance->status;
                            	?>
                                
                                
                                    <select name="status_<?php echo $row['student_id'];?>" class="form-control" style="width:100px; float:left;">
                                        <!--<option value="0" <?php if($status == 0)echo 'selected="selected"';?>></option>-->
                                        <option value="1" <?php if($status == 1)echo 'selected="selected"';?>>Present</option>
                                        <option value="2" <?php if($status == 2)echo 'selected="selected"';?>>Absent</option>
                                    </select>
                                
                            </td>
        				</tr>
        				<?php 
        			}
        			?>
                </tbody>
            </table>
            <input type="hidden" name="date" value="<?php echo $full_date;?>" />
            <center>
                <input type="submit" name="save_attendence" class="btn btn-info" value="save changes">
            </center>
        </div>
    
    
</form>
</div>
<?php endif;?>

<script type="text/javascript">

    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
</script>