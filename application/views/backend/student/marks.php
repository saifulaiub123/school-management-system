<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('manage_marks');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  <?php if(!isset($edit_data) && !isset($personal_profile) && !isset($academic_result) )echo 'active';?>" id="list">
				<center>
                <?php //echo form_open('admin/marks');?>
            <form method="post" action="<?php echo base_url();?>index.php?admin/marks" id="marks">
                <table border="0" cellspacing="0" cellpadding="0" class="tables">
                	<tr>
                        <td><?php echo get_phrase('select_exam');?></td>
                        <td><?php echo get_phrase('select_class');?></td>
                        <td><?php echo get_phrase('select_group');?></td>
                        <td><?php echo get_phrase('select_section');?></td>
                        <td><?php echo get_phrase('select_subject');?></td>
                        <td>&nbsp;</td>
                	</tr>
                	<tr>
                        <td>
                        	<select name="exam_id" class="form-control"  style="float:left;">
                                <option value=""><?php echo get_phrase('select_an_exam');?></option>
                                <?php 
                                $exams = $this->db->get('exam')->result_array();
                                foreach($exams as $row):
                                ?>
                                    <option value="<?php echo $row['exam_id'];?>"
                                        <?php if($exam_id == $row['exam_id'])echo 'selected';?>>
                                            <?php //echo get_phrase('class');?> <?php echo $row['name'];?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </td>
                        <!--onchange="show_subjects(this.value)"  style="float:left;"-->
                        
                        <td>
                        	<select name="class_id" id="class_id" class="form-control"  >
                                <option value=""><?php echo get_phrase('select_a_class');?></option>
                                <?php 
                                $classes = $this->db->get('class')->result_array();
                                foreach($classes as $row):
                                ?>
                                    <option value="<?php echo $row['class_id'];?>"
                                        <?php if($class_id == $row['class_id'])echo 'selected';?>>
                                            Class <?php echo $row['name'];?></option>
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
                                <select name="sub_id" id="sub_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                            </td>
                        
                        
                        
                        <td>
                        	<input type="hidden" name="operation" value="selection" />
                    		<input type="submit" value="<?php echo get_phrase('manage_marks');?>" class="btn btn-info" />
                        </td>
                	</tr>
                </table>
                </form>
                </center>
                
                
                <br /><br />
                
                
                //<?php if($exam_id >0 && $class_id >0 && $subject_id >0 ):?>
                //<?php 
//						////CREATE THE MARK ENTRY ONLY IF NOT EXISTS////
//						$students	=	$this->crud_model->get_students($class_id);
//						foreach($students as $row):
//							$verify_data	=	array(	'exam_id' => $exam_id ,
//														'class_id' => $class_id ,
//														'subject_id' => $subject_id , 
//														'student_id' => $row['student_id']);
//							$query = $this->db->get_where('mark' , $verify_data);
//							
//							if($query->num_rows() < 1)
//								$this->db->insert('mark' , $verify_data);
//						 endforeach;
//				?>
                
            <?php echo form_open('admin/marks');?>
                <table class="table" >
                    <thead>
                        <tr>
                            <td><?php echo get_phrase('student');?></td>
                            <td><?php echo get_phrase('mark_obtained');?>(out of 100)</td>
                            <td><?php echo get_phrase('attendance');?></td>
                            <td><?php echo get_phrase('comment');?></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    
                        
                        
                            <input type="hidden" name="exam_id" value="<?php echo $exam_id;?>" />
                            <input type="hidden" name="class_id" value="<?php echo $class_id;?>" />
                            <input type="hidden" name="dep_id" value="<?php echo $dep_id;?>" />
                            <input type="hidden" name="sec_id" value="<?php echo $sec_id;?>" />
                            <input type="hidden" name="subject_id" value="<?php echo $subject_id;?>" />
                                    
                        <?php 
                            $students	=	$this->crud_model->get_students($class_id,$dep_id,$sec_id);
                            
                            foreach($students as $row):
						
							$verify_data	=	array(	'exam_id' => $exam_id ,'class_id'=>$class_id,
														'subject_id' => $subject_id , 
														'student_id' => $row['student_id']);
//                                                        $verify_data	=	array('student_id' => $row['class_id']);
														
							$query = $this->db->get_where('mark' , $verify_data);
                                                        
                                                        
                                                        if($query->num_rows() < 1)
                                                        {
                                                            
                                                            $this->db->insert('mark' , $verify_data);
                                                        }
                                                        
                                                        
                                                        
                                                        
							$marks	=	$query->result_array();
							foreach($marks as $row2):
							?>
                               
							<tr>
								<td>
									<?php echo $row['name'];?>
								</td>
								<td>
									 <input type="number" value="<?php echo $row2['mark_obtained'];?>" name="mark_obtained_<?php echo $row['student_id']; ?>" class="form-control"  />
												
								</td>
                                <td>
                                	<input type="number" value="<?php echo $row2['attendance'];?>" name="attendance_<?php echo $row['student_id']; ?>" class="form-control"  />
                                </td>
								<td>
									<textarea name="comment_<?php echo $row['student_id']; ?>" class="form-control"><?php echo $row2['comment'];?></textarea>
								</td>
                                <td>
                                	<input type="hidden" name="mark_id_<?php echo $row['student_id']; ?>" value="<?php echo $row2['mark_id'];?>" />
                                	
                                </td>
							 </tr>
                            
                         	<?php 
							endforeach;
						 endforeach;
						 ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;">
                                        <input type="hidden" name="operation" value="update" />
                                        <button type="submit" class="btn btn-primary"> Update</button>
                                    </td>
                                </tr>
                     </tbody>
                  </table>
            </form> 
            <?php endif;?>
			</div>
            <!----TABLE LISTING ENDS--->
            
		</div>
	</div>
</div>

<script type="text/javascript">
//  function show_subjects(class_id)
//  {
//      for(i=0;i<=100;i++)
//      {
//
//          try
//          {
//              document.getElementById('subject_id_'+i).style.display = 'none' ;
//	  		  document.getElementById('subject_id_'+i).setAttribute("name" , "temp");
//          }
//          catch(err){}
//      }
//      document.getElementById('subject_id_'+class_id).style.display = 'block' ;
//	  document.getElementById('subject_id_'+class_id).setAttribute("name" , "subject_id");
//  }

</script> 