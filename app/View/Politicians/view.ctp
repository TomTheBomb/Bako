<!-- Suburb Name -->
<section id="suburbName">
    <h1><?php echo h($politician['Politician']['electorate']); ?></h1>
</section><!-- End Suburb Name -->

<!-- Suburb Map -->
<div id="suburbMap">
    <div id="map_canvas">
    
    </div>
</div>

<!-- Suburb Section -->
<section id="fluidGridSystem">
    <!-- Suburb Wrap -->
    <div class="row-fluid">
        <!-- Suburb MP Profile -->
        <div class="span4 suburbSidebar">
            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-facetime-video icon-white')) . ' Record Your Question', array('controller' => 'questions', 'action' => 'add', $politician['Politician']['id']), array('class' => 'btn btn-danger record-btn rounded', 'escape' => false)); ?>
            
            <a class="" href="#"><i class=""></i> </a>
            <div class="profileImageWrap rounded">
                <img width="100%" src="http://placehold.it/200x250" alt="profile image">
            </div>
            <h2 class="t-center"><?php echo h($politician['Politician']['salutation']); ?></h2>
            <hr />
            <h3><?php echo h($politician['Politician']['party']); ?></h3>
            <h3><?php echo h($politician['Politician']['post-nominals']); ?> of <?php echo h($politician['Politician']['electorate']); ?></h3>
        </div><!-- End Suburb Mp Profile -->

        <!-- Suburb Questions list -->
        <div class="span8 suburbBody">
            <?php if (empty($politician['Question'])) : ?>
                <p class="t-center alert-danger alert"><strong>No questions have been asked.</strong></p>
            <?php endif; ?>
            <?php if ($politician['Question']): ?>
                <ul style="list-style:none">
                <?php foreach($politician['Question'] as $question): ?>
                    <li class="rounded">
                        <a href="<?php echo Router::Url(array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>">
                            <div class="videoImageWrap">
                                <img src="http://placehold.it/160x120" alt="placeholder">
                            </div>
                            <div class="videoMetaWrap">
                                <h4>Question Asked <?php echo $this->Time->timeAgoInWords($question['created']); ?></h4>
                                <!-- <h5>Asked by Albert Issa from North Ryde</h5> -->
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div><!-- End Suburb Questions list -->
    </div><!-- End Suburb Wrap -->

</section><!-- End Suburb Section -->

<!-- Le Google Map for Suburb -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize() {
    var myOptions = {
      zoom: 13,
      center: new google.maps.LatLng(<?php echo $politician['Electorate']['Location'][0]['latitude'] . ',' . $politician['Electorate']['Location'][0]['longitude']; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true
    };

    var map = new google.maps.Map(document.getElementById('map_canvas'),
        myOptions);
    }

    function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?sensor=false&' +
        'callback=initialize';
    document.body.appendChild(script);
}

window.onload = loadScript;
</script>
<!-- End Javascript -->
