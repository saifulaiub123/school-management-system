
<table cellpadding="0" cellspacing="0" border="0" class="table">
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
                             <form method="post" action="<?php echo base_url();?>index.php?admin/student_information" class="form">
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
                            <td align="center"><input type="submit" value="<?php echo get_phrase("student_list");?>" class="btn btn-info"/></td>
                        </tr>
                             </form>
                        
                        
                    </table>



<div class="<?php echo $this->session->flashdata('class_type');?>" role='alert'><?php echo $this->session->flashdata('flash_message');?></div>
<br><br>
<?php //echo $this->session->userdata('class_id')."adsfasf";?>
<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_add/');" 
                    class="btn btn-primary pull-right">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_new_student');?>
                   
                </a>

<br><br>

      <?php //echo $this->session->userdata('class_id'); ?>
<?php //echo $this->session->userdata('session_set');?>


<table class="table datatable" id="table_export">
    <thead>
        <tr>
            <th width="80"><div><?php echo get_phrase('roll');?></div></th>
            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
            <th><div><?php echo get_phrase('name');?></div></th>
            <th class="span3"><div><?php echo get_phrase('phone');?></div></th>
            <th><div><?php echo get_phrase('email');?></div></th>
            <th><div><?php echo get_phrase('status');?></div></th>
            <th><div><?php echo get_phrase('options');?></div></th>

        </tr>
    </thead>
    <tbody>
        <?php 
        
                $students	=	$this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,"sec_id"=>$sec_id))->result_array();
                foreach($students as $row):?>
        <tr>
            <td><?php echo $row['roll'];?></td>
            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><span class="<?php if($row['status']=='available')echo 'badge badge-success';else echo 'badge badge-danger' ;?>"><?php echo $row['status'];?></td>
            <td>
                
              
                        
                        <!-- STUDENT PROFILE LINK -->
                   
                            <a href="#" class="btn btn-success tn-primary btn-sm" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');">
                                <i class="entypo-user"></i>
                                    <?php echo get_phrase('profile');?>
                                </a>
                                 
                        
                        <!-- STUDENT EDITING LINK -->
                      
                            <a href="#" class="btn btn-info tn-primary btn-sm" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                       
<!--                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_document_upload/<?php echo $row['student_id'];?>/<?php echo $account_type ?>');">
                                <i class="entypo-user"></i>
                                    <?php echo get_phrase('upload_document');?>
                                </a>
                        </li>-->
                      
                            <a class="btn btn-warning tn-primary btn-sm" href="<?php echo base_url();?>index.php?admin/navigation/modal_document_upload/<?php echo $row['student_id'];?>/1" target="_blank">
                                <i class="entypo-user"></i>
                                    <?php echo get_phrase('document');?>
                                </a>
                        
                       
                        
                        <!-- STUDENT DELETION LINK -->
                        
                            <a class="btn btn-danger tn-primary btn-sm" href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                            </a>
                                        
                   
                
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<script src="assets/js/ct/ajax_admin.js"></script>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "pdf",
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(1, false);
							datatable.fnSetColumnVis(5, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(1, true);
									  datatable.fnSetColumnVis(5, true);
								  }
							});
						},
						
					},
				]
			},
			
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>