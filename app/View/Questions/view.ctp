<!-- Question section -->
<section id="questionSection">
    <!-- Suburb Wrap -->
    <div class="row-fluid">
        <!-- Suburb MP Profile -->
        <div class="span4 suburbSidebar">
            
            <!-- Record Response btn -->
            <?php 
                if (isset($canRecord)) {
                    echo $this->Html->link($this->Html->tag('i', '', 
                    array('class' => 'icon-facetime-video icon-white')) . ' Record Your Response', 
                    array('controller' => 'answers', 'action' => 'add', $question['Question']['id']), 
                    array('class' => 'btn btn-danger record-btn rounded', 'escape' => false)); 
                }
            ?>
            
            <!-- MP Profile -->
            <div class="profileImageWrap rounded">
                <img width="100%" src="http://placehold.it/200x250" alt="Mr Gareth James" align="left">
            </div>
            <h2><?php echo $question['Politician']['salutation']; ?></h2>
            <hr />
            <h3>
                <ul>
                    <li>Member of the Legislative Assembly</li>
                    <li>Member for <?php echo $question['Politician']['electorate']; ?></li>
                    <li>Acting Speaker</li>
                    <li>Member of the <?php echo $question['Politician']['party']; ?></li>
                </ul>
            </h3>
            
            <!-- Suburb Map -->
            <div id="suburbMap" class="questionMap">
                <div id="map_canvas" class="questionMapCanvas"></div>
            </div>
            
        </div><!-- End Suburb Mp Profile -->
        

        <!-- Suburb Questions list -->
        <div class="span8 suburbBody">
            <h1>Question from: <?php echo $question['User']['first_name'] . ' ' . $question['User']['last_name']; ?></h1>
            <div class="recordWrap">
                <div id="playerContainer" class="player">
                    <div id="player"></div>
        	    </div>
            </div>
            
            <div class="answerWrap">
                <?php if ($question['Answer']['id']): ?>
                <h3>Reponsed <?php echo $this->Time->timeAgoInWords($question['Answer']['created']); ?> </h3>
                <div id="playerAnswerContainer">
                    <div id="playerAnswer"></div>
                </div>
                <?php endif; ?>
            </div>
        </div><!-- End Suburb Questions list -->
    </div><!-- End Suburb Wrap -->

</section><!-- End Question Section -->

<!-- Le Google Map for Suburb -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize() {
    var myOptions = {
      zoom: 13,
      center: new google.maps.LatLng(-34.668395,150.854602),
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

<?php echo $this->Html->script(Configure::read('Tokbox.script'), array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->script('view.js', array('block' => 'scriptBottom')); ?>
<?php $this->Html->scriptBlock("var apiKey = '" . Configure::read('Tokbox.ApiKey') . "';
var TOKEN = '". $opentok['token'] ."';
var archiveId = '".  $question['Question']['archive_id'] . "';
var archiveAnswerId = '".  $question['Answer']['archive_id'] . "';",
array('inline' => false)); ?>
<div id="opentok_console"></div>
