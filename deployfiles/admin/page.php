<h1>S3 Bulk Uploader</h1>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="s3upload.js"></script>
<style>
.fileinput-button {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
.fileinput-button input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  -ms-filter: 'alpha(opacity=0)';
  font-size: 200px !important;
  direction: ltr;
  cursor: pointer;
}
.progress {
	position:relative;
	height: 20px;
	margin-bottom: 20px;
	overflow: hidden;
	background-color: #f5f5f5;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}
.progress-number {
	position:absolute;
	left:50%;
	z-index:5;
}
.progress-bar {
	float: left;
	width: 0;
	height: 100%;
	font-size: 12px;
	line-height: 20px;
	color: #fff;
	text-align: center;
	background-color: #337ab7;
	-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
	-webkit-transition: width .6s ease;
	-o-transition: width .6s ease;
	transition: width .6s ease;
}
#uploadForm.is-dragover {
  background-color: #F7F7F7;
}
.button:focus{color:#fff;background-color:#449d44;border-color:#255625}
.button:hover{color:#fff;background-color:#449d44;border-color:#398439}
.button {
	color: #fff;
	background-color: #5cb85c;
	border-color: #4cae4c;

	display: inline-block;
	padding: 6px 12px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-ms-touch-action: manipulation;
	touch-action: manipulation;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
}
/* Fixes for IE < 8 */
@media screen\9 {
  .fileinput-button input {
    filter: alpha(opacity=0);
    font-size: 100%;
    height: 100%;
  }
}
#result {
	border:1px solid gray;
	margin:5px;
	padding:10px;
}
</style>


<p>You can upload files to S3 here.</p>
<fieldset id='uploadForm' style='padding:20px;'>
<form>
    <label for="fileInput" style='padding:15px;position:relative;top:-10px;color:gray;float:right;'>Drop file here to upload</label>
    <span class="button fileinput-button">
        <i class="fas fa-plus"></i>
        <span>Select File...</span>
        <input id="fileInput" type="file" name="file" />

    </span>
 	<span class="button cancel-button" style='display:none;'>
        <i class="fas fa-minus"></i>
        <a href='#' id='cancel' style="color:inherit;text-decoration: none;">Cancel</a>
    </span>

    </form>
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
        <div class="progress-number"></div>
    </div>
    <!-- <span class="button fileinput-button"> -->

        <!-- <input id="submit" type="submit" name="submit" /> -->
    <!-- </span> -->
    <span class="button submit-button">
        <i class="fas fa-plus"></i>
        <a href='#' id='submit' style='color:inherit;text-decoration: none;' name='submit'>Submit</a>
    </span>
</fieldset>
<div id='result'>

</div>
<script>
var s3upload=null;
function upload(file) {
    if (!(window.File && window.FileReader && window.FileList && window.Blob && window.Blob.prototype.slice)) {
        alert("You are using an unsupported browser. Please update your browser.");
        return;
    }
    $(".fileinput-button").toggle();
    $(".cancel-button").toggle();
    $("#result").text("");
    $('#progress .progress-bar').css('width',"0px");
    $('#progress .progress-number').text("");

    s3upload = new S3MultiUpload(file);
    s3upload.onServerError = function(command, jqXHR, textStatus, errorThrown) {
        $("#result").text("Upload failed with server error.");

    };
    s3upload.onS3UploadError = function(xhr) {
        $("#result").text("Upload to S3 failed.");
    };
    s3upload.onProgressChanged = function(uploadedSize, totalSize, speed) {
        var progress = parseInt(uploadedSize / totalSize * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
        $(".progress-number").html(getReadableFileSizeString(uploadedSize)+" / "+getReadableFileSizeString(totalSize)
            + " <span style='font-size:smaller;color:gray;'>("
            +uploadedSize+" / "+totalSize
            +" at "
            +getReadableFileSizeString(speed)+"ps"
            +")</span>").css({'margin-left' : -$('.progress-number').width()/2});

    };
    s3upload.onPrepareCompleted = function() {
        $("#result").text("Uploading...");
    }
    s3upload.onUploadCompleted = function() {
        $("#result").text("Upload successful.");
        $(".fileinput-button").toggle();
        $(".cancel-button").toggle();
    };
    $("#result").text("Preparing upload...");
    //
    $("#submit").click(function() {
        s3upload.start();
        $(".submit-button").toggle();
    });
}

function getReadableFileSizeString(fileSizeInBytes) {
    var i = -1;
    var byteUnits = [' KB', ' MB', ' GB', ' TB', 'PB', 'EB', 'ZB', 'YB'];
    do {
        fileSizeInBytes = fileSizeInBytes / 1024;
        i++;
    } while (fileSizeInBytes > 1024);

    return Math.max(fileSizeInBytes, 0.1).toFixed(1) + byteUnits[i];
}

$(function(){
    $("#fileInput").change(function() {
        upload($('#fileInput')[0].files[0]);
    });
    // Drag & drop support.
    $("#uploadForm").on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
    }).on('dragover dragenter', function() {
        $(this).addClass('is-dragover');
    }).on('dragleave dragend drop', function() {
        $(this).removeClass('is-dragover');
    }).on('drop', function(e) {
        droppedFiles = e.originalEvent.dataTransfer.files;
        upload(droppedFiles[0]);
    });
    $("#cancel").click(function() {
        s3upload.cancel();
        $(".fileinput-button").toggle();
        $(".cancel-button").toggle();
    });
})

</script>
