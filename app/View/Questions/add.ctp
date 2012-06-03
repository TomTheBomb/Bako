<!-- Record Question -->
<section id="suburbName">
    <h1>Record your 2 minute question for <?php echo $politician['Politician']['salutation']; ?></h1>
    
    <div class="recordWrap">
        <div id="recorderContainer"></div>
    </div>
    
    <div class="alert alert-info"><strong>Warning!</strong> The recorder will stop after 2 minutes!</div>
</section><!-- End Record Question -->

<?php echo $this->Html->script(Configure::read('Tokbox.script'), array('block' => 'scriptBottom')); ?>

<?php $this->Html->scriptBlock("var apiKey = '" . Configure::read('Tokbox.ApiKey') . "';
var TOKEN = '". $opentok['token'] ."';",
array('inline' => false)); ?>
<?php echo $this->Html->script('question.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Form->create(null, array('class' => 'hidden')); ?>
<?php echo $this->Form->hidden('archive_id'); ?>
<?php echo $this->Form->end(); ?>
