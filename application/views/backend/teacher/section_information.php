<!--<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/section_add/');" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo get_phrase('add_section');?>
    </a> -->



<br><br>
<table class="table datatable" id="table_export">
    <thead>
        <tr>
            <th width="25%">Group</th>
            <th width="25%"><div><?php echo get_phrase('name');?></div></th>
            
            <th><div><?php echo get_phrase('options');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
                $section =$this->db->get_where('section' , array('class_id'=>$class_id))->result_array();
                foreach($section as $row):?>
        <tr>
            <!--get group information-->
            <td><?php
                    $group=array("No Group","Science","Commerce","Arts");
                   
                        echo $group[$row['dep_id']];
                   
                ?>
            </td>
            <td><?php echo $row['sec_name'];?></td>
            
            <td>
                
               
                <!--<a class="btn btn-default btn-sm"  href=""><?php echo get_phrase('edit');?></a>-->
                
                <a href="#" class="btn btn-info tn-primary btn-sm" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_section_edit/<?php echo $row['sec_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                </a>
                <a href="#" class="btn btn-danger tn-primary btn-sm" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/section/delete/<?php echo $row['sec_id'];?>/<?php echo $class_id ?>');">
                                <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                </a>
                
<!--                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        
                         STUDENT PROFILE LINK 
                        <li>
                            <a href="#" target="_blank" >
                                <i class="entypo-user"></i>
                                    <?php echo get_phrase('student_list');?>
                                </a>
                        </li>
                        
                         STUDENT EDITING LINK 
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_section_edit/<?php echo $row['sec_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                        </li>
                        <li class="divider"></li>
                        
                         Section DELETION LINK 
                        <li>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/section/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                        </li>
                    </ul>
                </div>-->
                
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