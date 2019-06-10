

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
<body>
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

document.onmousedown = disableRightclick;
var message = "Right click not allowed !!";
function disableRightclick(evt){
    if(evt.button == 2){
        alert(message);
        return false;    
    }
}

</script>