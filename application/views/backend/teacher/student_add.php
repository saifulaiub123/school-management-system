

<div class="<?php echo $this->session->flashdata('class_type');?>" role='alert'><?php echo $this->session->flashdata('flash_message');?></div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('addmission_form');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'add' ,'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
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
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="roll" value="" >
						</div> 
					</div>
                            
                            
                                        <div class="form-group">
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('optional_subject');?></label>
                        
                                            <div class="col-sm-5">
                                                <select name="optional_sub_id" id="sub_id" class="form-control" >
                                                    <option value="0"><?php echo get_phrase('no_optional');?></option>

                                            </select>
                                            </div> 
                                        </div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
						</div> 
					</div>
					
					<div class="form-group">
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>

                                            <div class="col-sm-5">
                                                <select name="sex" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="male"><?php echo get_phrase('male');?></option>
                                                    <option value="female"><?php echo get_phrase('female');?></option>
                                                </select>
                                            </div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="" >
						</div> 
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-5">
                                                    <input type="text" class="form-control email" name="email"  value="" data-validate="required">
                                                        <br>
                                                        <input type="button" value="Check Availability">
                                                        <span class="nav"></span>
                                                        <span class="av"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" id="password" value="" data-validate="required">
						</div> 
					</div>
                            <div class="form-group">
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>

                                            <div class="col-sm-5">
                                                <select name="status" class="form-control" data-validate="required">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('available');?>"><?php echo get_phrase('available');?></option>
                                                    <option value="<?php echo get_phrase('not_available');?>"><?php echo get_phrase('not_available');?></option>
                                                </select>
                                            </div> 
					</div>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_student');?></button>
                        </div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>