<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------->
<!--		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('class_routine_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_class_routine');?>
                    	</a></li>
		</ul>-->
    	<!------CONTROL TABS END------->
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
<!--            <div class="tab-pane active" id="list">
				<div class="panel-group joined" id="accordion-test-2">
                	<?php 
					$toggle = true;
					//$classes = $this->db->get('class')->result_array();
                                     
					foreach($classes as $row):
						?>
                        
                
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                		<h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row['class_id'];?>">
                                        <i class="entypo-rss"></i> Class <?php echo $row['name'];?>
                                    </a>
                                    </h4>
                                </div>
                
                                <div id="collapse<?php echo $row['class_id'];?>" class="panel-collapse collapse <?php if($toggle){echo 'in';$toggle=false;}?>">
                                    <div class="panel-body">
                                        <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered">
                                            <tbody>
                                                <?php 
                                                for($d=1;$d<=7;$d++):
                                                
                                                if($d==1)$day='sunday';
                                                else if($d==2)$day='monday';
                                                else if($d==3)$day='tuesday';
                                                else if($d==4)$day='wednesday';
                                                else if($d==5)$day='thursday';
                                                else if($d==6)$day='friday';
                                                else if($d==7)$day='saturday';
                                                ?>
                                                <tr class="gradeA">
                                                    <td width="100"><?php echo strtoupper($day);?></td>
                                                    <td>
                                                    	<?php
														$this->db->order_by("time_start", "asc");
														$this->db->where('day' , $day);
														$this->db->where('class_id' , $row['class_id']);
                                                                                                                $this->db->where('dep_id' , $group_id);
                                                                                                                $this->db->where('sec_id' , $sec_id);
														$routines	=	$this->db->get('class_routine')->result_array();
                                                                                                                
														foreach($routines as $row2):
														?>
														<div class="btn-group">
															<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            	<?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
																<?php echo '('.$row2['time_start'].'-'.$row2['time_end'].')';?>
                                                            	<span class="caret"></span>
                                                            </button>
															<ul class="dropdown-menu">
																<li>
                                                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $row2['class_routine_id'];?>');">
                                                                    <i class="entypo-pencil"></i>
                                                                        <?php echo get_phrase('edit');?>
                                                                    			</a>
                                                         </li>
                                                         
                                                         <li>
                                                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $row2['class_routine_id'];?>');">
                                                                <i class="entypo-trash"></i>
                                                                    <?php echo get_phrase('delete');?>
                                                                </a>
                                                    		</li>
															</ul>
														</div>
														<?php endforeach;?>

                                                    </td>
                                                </tr>
                                                <?php endfor;?>
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
						<?php
					endforeach;
					?>
  				</div>
			</div>-->
            <!----TABLE LISTING ENDS--->
             <!--<form method="post" action="<?php echo base_url()?>index.php?/admin/class_routine/create" id="add_routine" class="form-horizontal form-groups-bordered validate" target="_top" >-->
            
			<!----CREATION FORM STARTS---->
			<!--<div class="tab-pane box" id="add" style="padding: 5px">-->
                <div class="box-content">
                    <!--<form method="post" action="#" id="add_routine" class="form-horizontal form-groups-bordered validate" target="_top" >-->
                	<?php  echo form_open('admin/class_routine/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top','id'=>'add_routine'));?>
<!--                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">
                                    <select name="class_id" class="form-control" style="width:100%;">
                                    	<?php 
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row):
										?>
                                    		<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>-->


                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                        
						<div class="col-sm-5">
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
						</div> 
                            </div>
                            
                            <!--Added Group List-->
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('group');?></label>
                        
                                <div class="col-sm-5">
                                    <select name="dep_id" id="dep_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="0"><?php echo get_phrase('no_group');?></option>
                                        <option value="1"><?php echo get_phrase('science');?></option>
                                        <option value="2"><?php echo get_phrase('arts');?></option>
                                        <option value="3"><?php echo get_phrase('commerce');?></option>
                                           
                                </select>
                                </div> 
                            </div>
                            
                            <!--End Group List-->
                            
                            <!--Added section list-->
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
                        
                                <div class="col-sm-5">
                                    <select name="sec_id" id="sec_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                                </div> 
			  </div>
                            
                            <!--end add sec-->
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                                <div class="col-sm-5">
                                    <select name="subject_id" class="form-control" style="width:100%;">
                                    	<?php 
										$subjects = $this->db->get('subject')->result_array();
										foreach($subjects as $row):
										?>
                                    		<option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                                <div class="col-sm-5">
                                    <select name="day" class="form-control" style="width:100%;">
                                        <option value="sunday">sunday</option>
                                        <option value="monday">monday</option>
                                        <option value="tuesday">tuesday</option>
                                        <option value="wednesday">wednesday</option>
                                        <option value="thursday">thursday</option>
                                        <option value="friday">friday</option>
                                        <option value="saturday">saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control" style="width:100%;">
                                        <?php 
                                        $teacher_id=$this->db->get('teacher')->result_array();;
                                            foreach($teacher_id as $row):
										?>
                                    		<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
						endforeach;
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                                <div class="col-sm-5">
                                    <select name="time_start" class="form-control" style="width:33.33%;float: left;">
                                        <option value="">Hour</option>
                                        <?php for($i = 0; $i <= 12 ; $i++):?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <select name="time_start_min" class="form-control" style="width:33.33%;float: left;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                          
                                            <option value="">Minute</option>
                                                <?php for($i = 0; $i <= 60 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php endfor;?>
                                    </select>
                                    <select name="starting_ampm" class="form-control" style="width:33.33%;float: left;">
                                    	<option value="1">am</option>
                                    	<option value="2">pm</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                                <div class="col-sm-5">
                                    <select name="time_end" class="form-control" style="width:33.33%;float: left;">
                                        <option value="">Hour</option>
										<?php for($i = 0; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                      <select name="time_end_min" class="form-control" style="width:33.33%;float: left;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                          
                                            <option value="">Minute</option>
										<?php for($i = 0; $i <= 59 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    
                                    <select name="ending_ampm" class="form-control" style="width:33.33%;float: left;">
                                    	<option value="1">am</option>
                                    	<option value="2">pm</option>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class_routine');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			<!--</div>-->
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>

