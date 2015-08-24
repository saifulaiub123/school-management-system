
<!--            <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_add/');" 
            	class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
            	<?php echo get_phrase('add_new_teacher');?>
            </a> -->
			<!--
            <a href="<?php echo base_url();?>index.php?admin/navigation/modal_teacher_add" 
            	class="btn btn-primary pull-right" target="_blank">
                <i class="entypo-plus-circled"></i>
            	<?php echo get_phrase('add_new_teacher');?>
            </a>-->
                <br><br>
               <table class="table datatable" id="table_export">
                    <thead>
                        <tr>
                            <th width="10%"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('status');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $teachers	=	$this->db->get('teacher' )->result_array();
                                foreach($teachers as $row):?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="img-circle" width="50" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td ><span class="<?php if($row['t_status']=='available')echo 'badge badge-success';else echo 'badge badge-danger' ;?>"><?php echo $row['t_status'];?></span></td>
                            <td>
                                
                                <!--
                                        	<a class="btn btn-success tn-primary btn-sm" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_edit/<?php echo $row['teacher_id'];?>');">
                                            	<i class="entypo-pencil"></i>
													<?php echo get_phrase('edit');?>
                                               	</a>
                                        -->
                                        	<a class="btn btn-info tn-primary btn-sm" href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_teacher_profile/<?php echo $row['teacher_id'];?>');">
                                            	<i class="entypo-pencil"></i>
													<?php echo get_phrase('profile');?>
                                               	</a>
                                        	<!--			
                                            <a class="btn btn-warning tn-primary btn-sm" href="<?php echo base_url();?>index.php?admin/navigation/modal_document_upload/<?php echo $row['teacher_id'];?>/2" target="_blank">
                                                <i class="entypo-user"></i>
                                                <?php echo get_phrase('document');?>
                                            </a>
                                        
                                        
                                       
                                        	<a class="btn btn-danger tn-primary btn-sm" href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/teacher/delete/<?php echo $row['teacher_id'];?>');">
                                            	<i class="entypo-trash"></i>
													<?php echo get_phrase('delete');?>
                                               	</a>
                                        		-->		
                                   
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>



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
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
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

