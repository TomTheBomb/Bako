<!-- Navbar -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">Bako</a>
            <!-- Nav Collapse -->
            <div class="nav-collapse">
                 <ul class="nav"> 
                    <li>
                        <a href="/">Search for MP</a>
                   </li>
                    <?php if (!$this->Session->read('Auth.User')) : ?>
                        <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ;?></li>
                        <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'register')); ?></li>
                    <?php else : ?>
                        <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
                    <?php endif; ?>
                </ul>
            </div><!-- End Nav Collapse -->
            <?php if ($this->Session->read('Auth.User')) : ?>
                <p class="hello-message">Hello <?php echo $this->Session->read('Auth.User.first_name'); ?></p>
            <?php endif; ?>
        </div><!-- End container -->
    </div><!-- End navbar-inner -->
</div><!-- End Navbar -->
