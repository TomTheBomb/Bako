recorderManager = TB.initRecorderManager(apiKey);
function createRecorder() {
    var recDiv = document.createElement('div');
    recDiv.setAttribute('id', 'recorderElement');
    document.getElementById('recorderContainer').appendChild(recDiv);
    recorder = recorderManager.displayRecorder(TOKEN, recDiv.id, {width: 640, height: 480});
    recorder.addEventListener('recordingStarted', recStartedHandler);
	recorder.addEventListener('recordingStopped', recStoppedHandler);
    recorder.addEventListener('playbackStarted', playbackStartedHandler);
    recorder.addEventListener('archiveSaved', archiveSavedHandler);
}
function archiveSavedHandler(event) {
	var archiveId = event.archives[0].archiveId;
	$('#QuestionArchiveId').val(archiveId);
	$('#QuestionAddForm').submit();
}

function recStartedHandler(event) {
	t = setTimeout("recorder.stopRecording();",121000); // Stop recording after 121 seconds
}
function recStoppedHandler(event) {
	clearTimeout(t);
}
function playbackStartedHandler(event) {
}
$(document).ready(function() {
	if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS)
	{
		$('#recorderContainer').append('Bako.co requires Adobe Flash Player to be installed. <a href="http://get.adobe.com/flashplayer/" target="_blank">Click here</a> to <a href="http://get.adobe.com/flashplayer/" target="_blank">install Adobe Flash Player</a>');
	} else {
		createRecorder();
	}
});

