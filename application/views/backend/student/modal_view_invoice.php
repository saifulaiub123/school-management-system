<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param1) )->result_array();

//echo $param1;
?>
<button onclick="printContent('printContent')">Print Content</button>

<div class="tab-pane box active" id="edit printContent" style="padding: 20px">
    <div class="box-content">
        <?php
        
        $group=array("No Group","Science","Commerce","Arts");
        
        foreach($edit_data as $row):?>
        
        
        <div class="pull-left">
			<span style="font-size:20px;font-weight:200;">
				<?php echo get_phrase('payment_to');?>
            </span>
            <br />
            <?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;?>
            <br />
            <?php echo $this->db->get_where('settings' , array('type'=>'address'))->row()->description;?>
        </div>
        <div class="pull-right">
			<span style="font-size:20px;font-weight:200;">
				<?php echo get_phrase('bill_to');?>
            </span>
            <br />
				<?php echo $this->db->get_where('student' , array('student_id'=>$row['student_id']))->row()->name;?>
            <br />
            	<?php echo get_phrase('roll');?> : 
            	<?php echo $this->db->get_where('student' , array('student_id'=>$row['student_id']))->row()->roll;?>
            <br />
            	<?php echo get_phrase('class');?> : 
            	<?php 
				$class_id	=	$this->db->get_where('student' , array('student_id'=>$row['student_id']))->row()->class_id;
				echo $this->db->get_where('class' , array('class_id'=>$class_id))->row()->name;
                                echo "<br>Group : ".  get_phrase($group[$this->session->userdata('_id')]);
                                echo "<br>Section : ".$this->db->get_where('section' , array('sec_id'=>$this->session->userdata('sec_id')))->row()->sec_name;
                                
				?>
        </div>
        <div style="clear:both;"></div>
        <hr />
        <table width="100%">
        	<tr style="background-color:#7087A3; color:#fff; padding:5px;">
            	<td style="padding:5px;"><?php echo get_phrase('invoice_title');?></td>
            	<td width="30%" style="padding:5px;">
					<div class="pull-right">
						<?php echo get_phrase('amount');?>
                    </div>
                </td>
            </tr>
        	<tr>
            	<td>
					<span style="font-size:20px;font-weight:200;">
						<?php echo $row['title'];?>
                    </span>
                    <br />
					<?php echo $row['description'];?>
                </td>
            	<td width="30%" style="padding:5px;">
					<div class="pull-right">
						<span style="font-size:20px;font-weight:200;">
							<?php echo $row['amount'];?>
                                                </span>
                                        </div>
                </td>
            </tr>
        	<tr>
            	<td></td>
            	<td width="30%" style="padding:5px;">
                	<div class="pull-right">
                    <hr />
                    <?php echo get_phrase('status');?> : <?php echo $row['status'];?>
                    <br />
                    <?php echo get_phrase('invoice_id');?> : <?php echo $row['invoice_id'];?>
                    <br />
                    <?php echo get_phrase('date');?> : <?php echo date('m/d/Y', $row['creation_timestamp']);?>
                    </div>
                </td>
            </tr>
        </table>
<br />
<br />

        
        <?php endforeach;?>
    </div>
</div>

<script>
function printContent(el){
    var restorepage=$('body');
    var printcontent=$('#printContent');
    $('body').html(printcontent);
//	var restorepage = document.body.innerHTML;
//	var printcontent = document.getElementById(el).innerHTML;
//	document.body.innerHTML = printcontent;
	window.print();
        $('body').html(restorepage);
//	document.body.innerHTML = restorepage;
}

</script>