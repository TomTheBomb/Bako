<div class="homeTitle">
    <h1>Bako</h1>
    <h5>Connecting Locals with Local Representatives</h5>
</div>

<!-- Search Suburb -->
<section>
    <h1>Search for your local MP</h1>
    <div class="alert alert-info">Type your postcode bellow to find out who your local MP is and to record a question for them.</div>
    
    <?php echo $this->Form->create('Location', array('class' => 'mpSearchForm')); ?>
    <?php echo $this->Form->input('postcode',array('label' => __('Postcode or Suburb'), 'type' => 'text-field', 'id' => 'LocationWord')); ?>
    <?php echo $this->Form->end(__('Search')); ?>
    
    <?php if ($locations): ?>
        <ul class="suburbList" style="list-style:none">
            <?php foreach ($locations as $location): ?>
                <li class="alert alert-success">
                <?php echo $this->Html->link(
                    $location['Location']['suburb'] . ' - ' .
                    $location['Electorate']['Politician']['salutation'] . ' of '.
                    $location['Electorate']['name'],
                    array('controller' => 'politicians', 'action' => 'view', $location['Electorate']['Politician']['id'])
                ); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php elseif(is_array($locations)):?>
        <h2>Sorry, we can't find your suburb.</h2>
    <?php endif; ?>
</section><!-- End Search Suburb -->