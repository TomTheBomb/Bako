<!-- Register Form -->
<section id="userLogin">
    <h1>Register to Bako</h1>
    <?php echo $this->Session->flash('auth'); ?>
    
    <?php
        echo $this->Form->create('User', array('class' => 'registerForm'));
        echo $this->Form->input('email');
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('password');
        echo $this->Form->input('postcode');
        echo $this->Form->end(__('Register'));
    ?>
    <p class="requiredFields"><strong>*</strong> Required Fields</p>
    <br />
    <p class="t-center">Already have an account? <?php echo $this->Html->link('Login here', array('controller' => 'users', 'action' =>  'login')); ?></p>
</section><!-- End Register Form -->
