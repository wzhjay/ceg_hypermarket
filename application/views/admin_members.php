<?php $this->load->view('layouts/banner'); ?>
<div class="container">
	<div id="side-bar">
	<?php $this->load->view('layouts/admin_right_nav'); ?>
	<?php $this->load->view('layouts/admin_mem_search'); ?>
	</div>
	<section id='right_content'>
		<?php 
		//var_dump($members);
		echo "<table class='table table-hover'>";
		echo "<thead><th>Email Receive</th><th>Username</th><th>Email</th><th>Member Card ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Address</th><th>Level</th><th>Member Since</th><th>Actions</th></tr></thead>";
		echo "<tbody>";
		foreach ($members as $key => $member) {
			echo "<tr class='admin_member_tr'>";
			if($member['email_receive'] == 'Yes')
				echo "<td><input type='checkbox' ></td>";
			else 
				echo "<td>No</td>";
			echo "<td>".$member['username']."</td><td class='admin_member_email_td'>".$member['email']."</td><td>".$member['member_card_number']."</td><td>".$member['first_name']."</td><td>".$member['last_name']."</td><td>".$member['gender']."</td><td>".$member['address']."</td><td>".$member['level']."</td><td>".$member['created_date']."</td><td>".anchor('member/edit/'.$member['m_id'], 'Edit').' '.anchor('member/delete/'.$member['m_id'], 'Delete')."</td></tr>";
		}
		echo "</tbody></table><br><br>";
		
		echo "<button class='btn btn-success' id='admin_mem_check_all_btn'>Check/Uncheck All</button><br><br>";
		echo "<button class='btn btn-success' id='admin_mem_send_email_btn'>Send Email</button><br>";
		?>
	</section>
</div>