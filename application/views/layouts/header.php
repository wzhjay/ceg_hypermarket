<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo $this->config->item('base_url')?>">CEG-Hypermarket</a>
        <div class="nav-collapse collapse navbar-inverse-collapse">
          <ul class="nav">
            <li class="active"><a href="<?php echo $this->config->item('base_url').'index.php/display'?>">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Others<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->config->item('base_url').'index.php/admin'?>">Admin</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
              </ul>
            </li>
          </ul>
          <ul class="nav pull-right">
			<?php if($this->session->userdata('a_id')): ?>
				<li><a href="<?php echo $this->config->item('base_url').'index.php/admin/adminPage'; ?>">Hello! <?php echo $this->session->userdata('first_name'); ?></a></li>
				<li class="divider-vertical"></li>
				<li><a href="<?php echo $this->config->item('base_url').'index.php/admin/logout'; ?>">Logout</a></li>
			<?php elseif($this->session->userdata('m_id')): ?>
				<li><a href="<?php echo $this->config->item('base_url').'index.php/member/memberPage'; ?>">Hello! <?php echo $this->session->userdata('first_name'); ?></a></li>
				<li class="divider-vertical"></li>
				<li><a href="<?php echo $this->config->item('base_url').'index.php/member/logout'; ?>">Logout</a></li>
				<li><a href="" id='shopping_cart_btn'>Shopping Cart</a></li>
			<?php else: ?>
				<li class="divider-vertical"></li>
				<li><a href="<?php echo $this->config->item('base_url').'index.php/member'; ?>">Login</a></li>
			<?php endif;?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div>
</div>