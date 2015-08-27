<div class="row">
	<div class="col-md-12">
            
            
<!--            
            <table cellpadding="0" cellspacing="0" border="0" class="table">
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
                             <form method="post" action="<?php echo base_url();?>index.php?admin/get_routine_info" class="form">
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
                            <td align="center"><input type="submit" value="<?php echo get_phrase("show_routine");?>" class="btn btn-info"/></td>
                        </tr>
                             </form>
                        
                        
                    </table>-->
    
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
            <div class="tab-pane active" id="list">
				<div class="panel-group joined" id="accordion-test-2">
                	<?php 
					$toggle = true;
//					$classes = $this->db->get('class')->result_array();
                                        $dep_id=$this->session->userdata('dep_id');
                                        $sec_id=$this->session->userdata('sec_id');
                                        
                                        //$classes=$this->db->get_where('class', array('class_id' => $class_id))->result_array();
                                     
					//foreach($classes as $row):
						?>
                        
                
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                		<h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $class_id;?>">
                                        <i class="entypo-rss"></i> Class <?php //echo $row['name'];?>
                                    </a>
                                    </h4>
                                </div>
                
                                <div id="collapse<?php echo $class_id;?>" class="panel-collapse collapse <?php if($toggle){echo 'in';$toggle=false;}?>">
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
                                                            $this->db->where('class_id' , $class_id);
                                                            $this->db->where('dep_id' , $group_id);
                                                            $this->db->where('sec_id' , $sec_id);
                                                            $routines	=	$this->db->get('class_routine')->result_array();

                                                            foreach($routines as $row2):
                                                            ?>
														<!--<div class="btn-group">-->
                                                            <div class="btn btn-primary dropdown-toggle" >
                                                            	<?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
                                                                
                                                                
                                                                <?php echo '('.date("g:i a", strtotime($row2['time_start'].":".$row2['time_start_min'])) .' - '.date("g:i a", strtotime($row2['time_end'].":".$row2['time_end_min'])).')'; ?>
                                                                <?php //echo '('.$row2['time_start'].' '.$row2['start_format'].' - '.$row2['time_end'].' '.$row2['end_format'].')';
                                                                echo "<br>".$this->crud_model->get_teacher_name($row2['teacher_id']);
                
                
                                                              ?>
                                                                
                                                            	<!--<span class="caret"></span>-->
                                                            </div>
<!--															<ul class="dropdown-menu">
																
                                                         
                                                        
															</ul>-->
														<!--</div>-->
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
					//endforeach;
					?>
  				</div>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
<!--			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('admin/class_routine/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
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
                            </div>


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
                            
                            Added Group List
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
                            
                            End Group List
                            
                            Added section list
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
                        
                                <div class="col-sm-5">
                                    <select name="sec_id" id="sec_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                                </div> 
			  </div>
                            
                            end add sec
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                                <div class="col-sm-5">
                                    <select name="time_start" class="form-control" style="width:100%;">
										<?php for($i = 0; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <select name="starting_ampm" class="form-control" style="width:100%">
                                    	<option value="1">am</option>
                                    	<option value="2">pm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                                <div class="col-sm-5">
                                    <select name="time_end" class="form-control" style="width:100%;">
										<?php for($i = 0; $i <= 12 ; $i++):?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <select name="ending_ampm" class="form-control" style="width:100%">
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
			</div>-->
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>

