



<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_form');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/parent/create/'.$param1.'/'.$param2.'/'.$param3.'/'.$param4 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                            
<!--                            <input type="text" name="class_id" value="<?php echo $param1 ?> " />
                            <input type="text" name="class_id" value="<?php echo $param2 ?> " />
                            <input type="text" name="class_id" value="<?php echo $param3 ?> " />
                            <input type="text" name="class_id" value="<?php echo $param4 ?> " />-->
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('parent_of');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" readonly
                            	value="<?php echo $this->db->get_where('student', array('student_id'=>$param1))->row()->name;?>">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  autofocus
                            	value="">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email" 
                            	value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" value="">
						</div>
					</div>
					
					<div class="form-group">
                                            
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('relation_with_student');?></label>
                                            <div class="col-sm-5">
                                                <select name="relation_with_student" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('father');?>"><?php echo get_phrase('father');?></option>
                                                    <option value="<?php echo get_phrase('mother');?>"><?php echo get_phrase('mother');?></option>
                                                    <option value="<?php echo get_phrase('brother');?>"><?php echo get_phrase('brother');?></option>
                                                    <option value="<?php echo get_phrase('sister');?>"><?php echo get_phrase('sister');?></option>
                                                    <option value="<?php echo get_phrase('grandfather');?>"><?php echo get_phrase('grandfather');?></option>
                                                    <option value="<?php echo get_phrase('grandmother');?>"><?php echo get_phrase('grandmother');?></option>
                                                    <option value="<?php echo get_phrase('uncle');?>"><?php echo get_phrase('uncle');?></option>
                                                    <option value="<?php echo get_phrase('aunt');?>"><?php echo get_phrase('aunt');?></option>
                                                   
                                                </select>
						</div>  
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="">
						</div>
					</div>
                                         <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('mobile');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="mobile" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('profession');?></label>
                        
						<div class="col-sm-5">
							<select name="relation_with_student" class="form-control">
                                                            <option value=""><?php echo get_phrase('select');?></option>
                                                            <option value="<?php echo get_phrase('business');?>"><?php echo get_phrase('business');?></option>
                                                            <option value="<?php echo get_phrase('service_holder');?>"><?php echo get_phrase('service_holder');?></option>
                                                        </select>
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default"><?php echo get_phrase('add_parent');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>