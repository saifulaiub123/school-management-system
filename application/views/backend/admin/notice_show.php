<?php
$edit_data		=	$this->db->get_where('noticeboard' , array('notice_id' => $notice_id) )->result_array();
?>


<?php foreach($edit_data as $row):?>
    <?php echo form_open(base_url(). 'index.php?admin/noticeboard/notice_view/'.$row['notice_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    <div class="profile-env">

        <header class="row">



            <div class="col-sm-9">

                <ul class="profile-info-sections">
                    <li style="padding:0px; margin:0px;">
                        <div class="profile-name">
                            <h3><?php// echo $row['notice_id'];?></h3>
                        </div>
                    </li>
                </ul>

            </div>


        </header>

        <section class="profile-info-tabs">

            <div class="row">

                <div class="">
                    <br>
                    <table class="table">

                        <?php if($row['notice_title'] != ''):?>
                            <tr>
                                <td>Notice Title</td>
                                <td><b><?php echo $row['notice_title'];?></b></td>
                            </tr>
                        <?php endif;?>




                        <?php if($row['notice'] != ''):?>
                            <tr>
                                <td>Notice</td>
                                <td><b><?php echo $row['notice'];?></b></td>
                            </tr>
                        <?php endif;?>







                        <?php if($row['create_timestamp'] != ''):?>
                            <tr>
                                <td>Date</td>

                                <td><b>  <?php echo date('m/d/Y',$row['create_timestamp']);?></b>
                                </td>
                            </tr>
                        <?php endif;?>


                    </table>
                </div>
            </div>
        </section>



    </div>


<?php endforeach;?>