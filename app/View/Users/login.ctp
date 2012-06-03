<!-- Login Form -->
<section id="userLogin">
    <h1>Login to Bako</h1>
    <?php echo $this->Session->flash('auth'); ?>
    <?php
        echo $this->Form->create('User', array('class' => 'registerForm'));
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->end(__('login'));
    ?>
    <p class="requiredFields"><strong>*</strong> Required Fields</p>
    <br />
    <p class="t-center">Don't have an account? <?php echo $this->Html->link('Register here', array('controller' => 'users', 'action' => 'register')); ?></p>
</section><!-- End Login Form -->
