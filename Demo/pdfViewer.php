

<!doctype html>
 
<html lang="en">
<head>
<style>
    #canvas_container {
        width: 100%;
        height: 100%;
        overflow: auto;
        background: #333;
        text-align: center;
        border: solid 3px;
    }
</style>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
<link rel="stylesheet" href="assets/css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My PDF Viewer</title>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>
</head>
<body onkeypress ="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
    <div id="my_pdf_viewer">

            <div id="canvas_container">
                <canvas id="pdf_renderer"></canvas>
            </div>
            <div id="navigation_controls">
                <div class = "btn" id="go_previous">Previous</div>
                <input id="current_page" value="1" type="number"/>
                <div class = "btn" id="go_next">Next</div>
            </div>
            <div id="zoom_controls">  
                <div class = "btn" id="zoom_in" style="margin-top: 10px;">+</div>
                <div class = "btn" id="zoom_out" style="margin-top: 10px;">-</div>
                <?php
    
        $url = $_POST['view'];
        

    ?>
            </div>
     
    </div>
</body>
</html>

<script>
    var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }
    var canvas = document.getElementById("pdf_renderer");
    var ctx = canvas.getContext('2d');
    
    

    pdfjsLib.getDocument('<?php echo $url?>').then((pdf) => {
        myState.pdf = pdf;
        render();

 // more code here

});
function render() {
    myState.pdf.getPage(myState.currentPage).then((page) => {
    var viewport = page.getViewport(myState.zoom);
    canvas.width = viewport.width;
    canvas.height = viewport.height;
            page.render({
            canvasContext: ctx,
            viewport: viewport
        }); // more code here
 
    });
}
document.getElementById('go_previous')
        .addEventListener('click', (e) => {
            if(myState.pdf == null
               || myState.currentPage == 1) return;
            myState.currentPage -= 1;
            document.getElementById("current_page")
                    .value = myState.currentPage;
            render();
        });
document.getElementById('go_next')
.addEventListener('click', (e) => {
    if(myState.pdf == null
        || myState.currentPage > myState.pdf
                                        ._pdfInfo.numPages) 
        return;
    
    myState.currentPage += 1;
    document.getElementById("current_page")
            .value = myState.currentPage;
    render();
});

document.getElementById('current_page')
.addEventListener('keypress', (e) => {
    if(myState.pdf == null) return;
    
    // Get key code
    var code = (e.keyCode ? e.keyCode : e.which);
    
    // If key code matches that of the Enter key
    if(code == 13) {
        var desiredPage = 
                document.getElementById('current_page')
                        .valueAsNumber;
                            
        if(desiredPage >= 1 
            && desiredPage <= myState.pdf
                                    ._pdfInfo.numPages) {
                myState.currentPage = desiredPage;
                document.getElementById("current_page")
                        .value = desiredPage;
                render();
        }
    }
});

document.getElementById('zoom_in')
.addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom += 0.5;
    render();
});

document.getElementById('zoom_out')
.addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom -= 0.5;
    render();
});

//disable f12 key
document.onkeypress = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 alert('No F-12');
 return false;
 }
 }
 document.onmousedown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
    alert('No F-12');
 return false;
 }
 }
document.onkeydown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
    alert('No F-12');
 return false;
 }
 }
 
 function disableCtrlKeyCombination(e){
    //list all CTRL + key combinations you want to disable
    var forbiddenKeys = new Array('a','s','c','x','v','i','p');
    var key;
    var isCtrl;
    if(window.event)
    {
        key = window.event.keyCode; //IE
        if(window.event.ctrlKey)
            isCtrl = true;
        else
            isCtrl = false;
    }
    else
    {
        key = e.which; //firefox
        if(e.ctrlKey)
            isCtrl = true;
        else
            isCtrl = false;
    }
    //if ctrl is pressed check if other key is in forbidenKeys array
    if(isCtrl)
    {
        for(i=0; i<forbiddenKeys.length; i++)
        {
            //case-insensitive comparation
            if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
            {
                alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
                return false;
            }
        }
    }
    return true;
    }
 
</script>

<script language=javascript>
		<!--
		//Disable right click script - By www.BBeginner.com
		//
		var message="Function Disabled";
		////////////////
		function clickIE() {if (document.all) {(message);return false;}}
		function clickNS(e) {if
		(document.layers||(document.getElementById&&!document.all)) {
		if (e.which==2||e.which==3) {(message);return false;}}}
		if (document.layers)
		{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
		document.oncontextmenu=new Function("return false")
		// -->
</script>

