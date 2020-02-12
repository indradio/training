<body>
	<div class="wrapper">
        	<div class="sidebar" data-background-color="brown" data-active-color="danger">
	    <!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->
			<div class="logo">
				<a href="https://www.creative-tim.com" class="simple-text logo-mini">
					PRE
				</a>
				<a href="https://training.winteq-astra.com" class="simple-text logo-normal">
					PRETEST TRAINING
				</a>
			</div>
	    	<div class="sidebar-wrapper">
				<div class="user">
	                <div class="info">
						<div class="photo">
		                    <!-- <img src="<?= base_url(); ?>assets/img/faces/face-0.jpg" /> -->
		                </div>
	                    <a href="#">
	                        <span><?= $this->session->userdata('nama'); ?></span>
	                    </a>
						<div class="clearfix"></div>
	                </div>
	            </div>
	            <ul class="nav">
                     <!-- QUERY ROLE MENU -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`,`title`,`icon`,`url`
                                FROM `user_menu` JOIN `user_access_menu`
                                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                AND `user_menu`.`is_active` = 1
                                ORDER BY `user_access_menu`.`menu_id` ASC ";
            $menu = $this->db->query($queryMenu)->result_array();
            foreach ($menu as $m) : 
				if ($title == $m['title']) :
					echo '<li class="active">';
				else :
					echo '<li>';
				endif; ?>
	                    <a href="<?= base_url($m['url']); ?>">
                            <i class="<?= $m['icon']; ?>"></i>
	                        <p><?= $m['title']; ?></p>
	                    </a>
					</li>
			<?php endforeach; ?>
					<li>
						<a href="<?= base_url('auth/logout'); ?>">
							<i class="ti-shift-left"></i>
							<p>Log out</p>
						</a>
					</li>
	            </ul>
	    	</div>
	    </div>