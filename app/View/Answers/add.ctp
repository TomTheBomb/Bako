<!-- Record Answer -->
<section id="suburbName">
    <h1>Record your response to <?php echo $question['User']['first_name'] . ' ' . $question['User']['last_name']; ?></h1>
    
    <div class="recordWrap">
        <div id="recorderContainer"></div>
    </div>
    
    <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-chevron-left')) . ' Back to Question', array('controller' => 'questions', 'action' => 'view', $question['Question']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>
</section><!-- End Record Answer -->

<?php echo $this->Html->script(Configure::read('Tokbox.script'), array('block' => 'scriptBottom')); ?>

<?php $this->Html->scriptBlock("var apiKey = '" . Configure::read('Tokbox.ApiKey') . "';
var TOKEN = '". $opentok['token'] ."';",
array('inline' => false)); ?>
<?php echo $this->Html->script('answer.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Form->create(null, array('class' => 'responseAddForm')); ?>
<?php echo $this->Form->hidden('archive_id'); ?>
<?php echo $this->Form->end(); ?>

