
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------->
		
    	<!------CONTROL TABS END------->
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			
                <div class="box-content">
                	<?php echo form_open('admin/subject/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control" style="width:100%;">
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    		<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_subject');?></button>
                              </div>
						   </div>
                    </form>                
                </div>                
			
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

//	jQuery(document).ready(function($)
//	{
//		
//
//		var datatable = $("#table_export").dataTable();
//		
//		$(".dataTables_wrapper select").select2({
//			minimumResultsForSearch: -1
//		});
//	});
		
</script>