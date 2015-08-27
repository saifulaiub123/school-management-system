<div class="sidebar-menu">
		<header class="logo-env" >
			
            <!-- logo -->
			<div class="logo" style="">
				<a href="<?php echo base_url();?>">
					<img src="uploads/logo3.png"  style="max-height:60px;width: 30%"/>
				</a>
			</div>
            
			<!-- logo collapse icon -->
			<div class="sidebar-collapse" style="">
				<a href="#" class="sidebar-collapse-icon with-animation">
                
					<i class="entypo-menu"></i>
				</a>
			</div>
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation">
					<i class="entypo-menu"></i>
				</a>
			</div>
		</header>
		
		<div style="border-top:2px solid #117d94;"></div>	
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            
           
           <!-- DASHBOARD -->
           <li class="<?php if($page_name == 'dashboard')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/dashboard">
					<i class="fa fa-home"></i>
					<span><?php echo get_phrase('dashboard');?></span>
				</a>
           </li>
           
           
           
           <!--NOTICEBOARD--> 
           <li class="<?php if($page_name == 'noticeboard')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/noticeboard">
					<i class="entypo-doc-text-inv"></i>
					<span><?php echo get_phrase('noticeboard');?></span>
				</a>
           </li>
           
           
           <!-- CLASS -->
           
           
          
<!--           <li class="<?php if($page_name == 'class')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/classes">
					<i class="entypo-flow-tree"></i>
					<span><?php echo get_phrase('class');?></span>
				</a>
                
           </li>-->
           
           
           
           
           
           
           <!--Manage Section--> 
<!--           <li class="<?php if($page_name == 'section' || 
									$page_name == 'add_section' || 
										$page_name == 'section_information')
											//echo 'active';?> ">
				<a href="#">
					<i class="fa fa-group"></i>
					<span><?php echo get_phrase('section');?></span>
				</a>
				<ul>
                	 Add Section 
					<li class="<?php if($page_name == 'section_add')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/add_section">
							<span>
                                                            <i class="entypo-dot"></i> 
                                                                <?php echo get_phrase('add_section');?></span>
						</a>
					</li>
                  
                   Section INFORMATION 
					<li class="<?php if($page_name == 'section_information')//echo 'opened active';?> ">
						<a href="#">
							<span>
                                                            <i class="entypo-dot"></i>
                                                     <?php echo get_phrase('section_information');?></span>
						</a>
                                            <ul>
                                                <?php $classes	= $this->db->get('class')->result_array();
							foreach ($classes as $row):?>
							<li class="<?php if ($page_name == 'section_information' && $class_id == $row['class_id']) //echo 'active';?>">
								<a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/student_information">
                                                                    <span><?php //echo get_phrase('class');?> <?php echo $row['name'];?></span>
								</a>
							</li>
                                                <?php endforeach;?>
                                            </ul>
					</li>	
				</ul>
			</li>-->
                        
                        
                        <!-- ADMISSION -->
                        
                         <!-- <li class="<?php //if($page_name == 'admission' || $page_name == 'admit_student' )//echo 'opened active has-sub';?> "> 
									
											
				<a href="#">
					<i class="fa fa-group"></i>
					<span><?php //echo get_phrase('admission');?></span>
				</a>
				<ul> -->
                	<!-- Add Section -->
					
					<!--<li class="<?php //if($page_name == 'student_add')//echo 'active';?> ">
						<a href="<?php //echo base_url();?>index.php?student/student_add">
							<span>
                                                            <!--<i class="entypo-dot"></i>--> 
                                                                <?php //echo get_phrase('admit_student');?></span>
						<!--</a>
					</li>
                                </ul>
                         </li>-->
           
           <!-- STUDENT -->
<!--			<li class="<?php if($page_name == 'student_add' || 
									$page_name == 'student_information' || 
										$page_name == 'student_marksheet')
											//echo 'opened active has-sub';?> ">
				<a href="#">
					<i class="fa fa-group"></i>
					<span><?php echo get_phrase('student');?></span>
				</a>
				<ul>
                	 STUDENT ADMISSION 
					<li class="<?php if($page_name == 'student_add')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/student_add">
							<span>
                                                            <i class="entypo-dot"></i> 
                                                                <?php echo get_phrase('admit_student');?></span>
						</a>
					</li>
                  
                   STUDENT INFORMATION 
					<li class="<?php if($page_name == 'student_information')//echo 'opened active';
                                        ?> ">
						<a href="<?php echo base_url();?>index.php?student/class_filter/get_student_list/student_list/student_information">
							<span>
                                                            <i class="entypo-dot"></i>
                                                     <?php echo get_phrase('student_information');?></span>
						</a>
                                            <ul>
                                                <?php $classes	=	$this->db->get('class')->result_array();
							foreach ($classes as $row):?>
							<li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo '';?>">
								<a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/student_information">
									<span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
								</a>
							</li>
                                                <?php endforeach;?>
                                            </ul>
					</li>
                    
                   STUDENT MARKSHEET 
					
				</ul>
			</li>-->
            
           <!-- TEACHER -->
           <li class="<?php if($page_name == 'teacher' )//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/teacher">
					<i class="entypo-users"></i>
					<span><?php echo get_phrase('teacher');?></span>
				</a>
               
           </li>
          
           <!-- PARENT -->
           <!--
        
           <li class="<?php if($page_name == 'parent')//echo 'opened active';?> ">
				<a href="<?php echo base_url();?>index.php?student/class_filter/parent_list/parent_list/get_parent_info">
					<i class="entypo-user"></i>
					<span><?php echo get_phrase('parent');?></span>
				</a>
<!--                <ul>
					<?php $classes	=	$this->db->get('class')->result_array();
                    foreach ($classes as $row):?>
                    <li class="<?php if ($page_name == 'parent' && $class_id == $row['class_id'])// echo 'active';?>">
                        <a href="<?php echo base_url();?>index.php?student/parent/<?php echo $row['class_id'];?>"> 
                        <a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/get_parent_info">
                            <span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>-->
          <!-- </li> -->
            <!--
           <li class="<?php if($page_name == 'staff' )//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/staff">
					<i class="entypo-users"></i>
					<span><?php echo get_phrase('Staff');?></span>
				</a>
               
           </li>
               -->         
                        
            
           <!-- SUBJECT -->
<!--          <li class="<?php if($page_name == 'subject')//echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-docs"></i>
					<span><?php echo get_phrase('subject');?></span>
				</a>
              <ul>
                  
                  <li class="<?php if($page_name == 'subject_add')echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/subject_add">
							<span>
                                                            <i class="entypo-dot"></i>
                                                                <?php echo get_phrase('add_subject');?></span>
						</a>
                    </li>
                    
                    <li class="<?php if($page_name == 'section_information')//echo 'opened active';?> ">
						<a href="#">
							<span>
                                                            <i class="entypo-dot"></i>
                                                     <?php echo get_phrase('subject_list');?></span>
						</a>
                                            <ul>
                                                <?php $classes	=	$this->db->get('class')->result_array();
                                                foreach ($classes as $row):?>
                                                <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) //echo 'active';?>">
                                                    <a href="<?php echo base_url();?>index.php?student/subject/<?php echo $row['class_id'];?>">

                                                     <a href="<?php echo base_url();?>index.php?student/subject/<?php echo $row['class_id'];?>/subject">
                                                        <span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
                                                    </a>
                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                    </li>
                    
                    
                    
                    
                 
              </ul>
           </li>-->
           
            <!--CLASS ROUTINE--> 
           <li class="<?php if($page_name == 'class_routine')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?/student/get_routine_info">
					<i class="entypo-target"></i>
					<span><?php echo get_phrase('class_routine');?></span>
				</a>
               
<!--               <ul>
                	 Add Section 
					<li class="<?php if($page_name == 'section_add')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/add_cl">
							<span>
                                                            <i class="entypo-dot"></i>
                                                                <?php echo get_phrase('add_class_routine');?></span>
						</a>
					</li>
                                        
                                        
                                        
                                        
                                        <li class="<?php if($page_name == 'section_information')//echo 'opened active';?> ">
						<a href="<?php echo base_url();?>index.php?student/class_filter/class_routine/show_routine/get_routine_info">
							<span>
                                                            <i class="entypo-dot"></i>
                                                     <?php echo get_phrase('Routine List');?></span>
						</a>
                                            
                                            
                                            <ul>
                                                <?php $classes	= $this->db->get('class')->result_array();
							foreach ($classes as $row):?>
							<li class="<?php if ($page_name == 'section_information' && $class_id == $row['class_id']) //echo 'active';?>">
								<a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/get_routine_info">
                                                                    <span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
								</a>
							</li>
                                                <?php endforeach;?>
                                            </ul>
					</li>	
               </ul>-->
               
               
               <!--manually added-->
               
<!--               <ul>
                  <?php $classes	=	$this->db->get('class')->result_array();
                  foreach ($classes as $row):?>
                  <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id'])// echo 'active';?>">
                      <a href="<?php echo base_url();?>index.php?student/subject/<?php echo $row['class_id'];?>">
                      
                       <a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/get_routine_info">
                          <span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
                      </a>
                  </li>
                  <?php endforeach;?>
              </ul>-->
           </li>
       
            <!--DAILY ATTENDANCE--> 
<!--           <li class="<?php if($page_name == 'manage_attendance')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/manage_attendance/<?php echo date("d/m/Y");?>">
					<i class="entypo-chart-area"></i>
					<span><?php echo get_phrase('daily_attendance');?></span>
				</a>
               <ul>
					<?php $classes	=	$this->db->get('class')->result_array();
                    foreach ($classes as $row):?>
                    <li class="<?php if ($page_name == 'parent' && $class_id == $row['class_id']) //echo 'active';?>">
                        <a href="<?php echo base_url();?>index.php?student/parent/<?php echo $row['class_id'];?>"> 
                        <a href="<?php echo base_url();?>index.php?student/section_information/<?php echo $row['class_id'];?>/get_attendence_info">
                            <span><?php echo get_phrase('class');?> <?php echo $row['name'];?></span>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
                
           </li>-->
            
            <!--EXAMS--> 
         <li class="<?php if($page_name == 'exam' || $page_name == 'grade' || $page_name == 'marks')//echo 'opened active';?> ">
				<a href="#">
					<i class="entypo-graduation-cap"></i>
					<span><?php echo get_phrase('exam');?></span>
				</a>
                <ul>
					<li class="<?php if($page_name == 'exam')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/exam">
							<span>
                                                            <i class="entypo-dot"></i> <?php echo get_phrase('exam_list');?>
                                                        </span>
						</a>
					</li>
<!--					<li class="<?php if($page_name == 'grade')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/grade">
							<span>
                                                            <i class="entypo-dot"></i> <?php echo get_phrase('exam_grades');?>
                                                        </span>
						</a>
					</li>-->
                                        <li class="<?php if($page_name == 'student_marksheet')//echo 'opened active';?> ">
						<a href="<?php echo base_url();?>index.php?student/student_marksheet">
							<span>
                                                            <i class="entypo-dot"></i>
                                                    <?php echo get_phrase('marksheet');?></span>
						</a>

					</li>
<!--					<li class="<?php if($page_name == 'marks')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/marks">
							<span>
                                                            <i class="entypo-dot"></i> <?php echo get_phrase('manage_marks');?>
                                                        </span>
						</a>
					</li>-->
                </ul>
           </li>
            
            <!--PAYMENT--> 
           <li class="<?php if($page_name == 'invoice')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/class_filter/get_invoice_list_list/invoice_list/invoice">
					<i class="entypo-credit-card"></i>
					<span><?php echo get_phrase('payment');?></span>
				</a>
               
               
               <ul>
<!--					
					<li class="<?php if($page_name == 'grade')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/navigation/add_payment">
							<span>
                                                            <i class="entypo-dot"></i> <?php echo get_phrase('add_payment');?>
                                                        </span>
						</a>
					</li>-->
                                        <li class="<?php if($page_name == 'exam')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/invoice">
							<span>
                                                            <i class="entypo-dot"></i> <?php echo get_phrase('payment_list');?>
                                                        </span>
						</a>
					</li>
					
                </ul>
           </li>
            
            <!--LIBRARY--> 
           <li class="<?php if($page_name == 'book')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/book">
					<i class="entypo-book"></i>
					<span><?php echo get_phrase('library');?></span>
				</a>
           </li>
            
            <!--TRANSPORT--> 
<!--           <li class="<?php if($page_name == 'transport')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/transport">
					<i class="entypo-location"></i>
					<span><?php echo get_phrase('transport');?></span>
				</a>
           </li>-->
            
            <!--DORMITORY--> 
<!--           <li class="<?php if($page_name == 'dormitory')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/dormitory">
					<i class="entypo-home"></i>
					<span><?php echo get_phrase('dormitory');?></span>
				</a>
           </li>-->
            
            
            
            
            
        <!-- MESSAGE -->
      <li class="<?php if ($page_name == 'message')// echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?student/message">
               <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>
            
            <!--SETTINGS--> 
<!--           <li class="<?php if($page_name == 'system_settings' || $page_name == 'manage_language')echo 'opened active';?> ">
		   								
				<a href="#">
					<i class="entypo-lifebuoy"></i>
					<span><?php echo get_phrase('settings');?></span>
				</a>
                <ul>
			<li class="<?php if($page_name == 'system_settings')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/system_settings">
							<span>
                                                            <i class="entypo-dot"></i>
                                                            <?php echo get_phrase('general_settings');?></span>
						</a>
					</li>
					<li class="<?php if($page_name == 'manage_language')//echo 'active';?> ">
						<a href="<?php echo base_url();?>index.php?student/manage_language">
							<span>
                                                            <i class="entypo-dot"></i>
                                                             <?php echo get_phrase('language_settings');?>
                                                        </span>
						</a>
					</li>
                </ul>
           </li>-->
            
          <!--ACCOUNT--> 
            
<!--           <li class="<?php if($page_name == 'manage_profile')//echo 'active';?> ">
				<a href="<?php echo base_url();?>index.php?student/manage_profile">
					<i class="entypo-lock"></i>
					<span><?php echo get_phrase('account');?></span>
				</a>
           </li>-->
                
           
           
		</ul>
        		
</div>

