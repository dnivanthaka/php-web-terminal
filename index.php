<html>
<head>
<title></title>
<script type="text/javascript" src="jquery-1.12.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#command').focus();

    $('#command').keydown(function(evt){
        var code = evt.keyCode || evt.which;
        
        if(code == 9){
             evt.preventDefault();
           
        }else if(code == 13){
            //var boxData = $( "#codeBox" ).html();
            //alert(boxData.substr(0, $( "#codeBox" ).selectionStart).split("\n"));
            //alert($('#codeBox').prop("selectionStart"));
            var c = $(this).val();
            $(this).val('');
    
            $.post( "popen.php", {cmd:c}, function( data ) {
                $("#codeBox pre").append( c+"\n"+data );
                //alert($("#codeBox pre").height());
                $('#codeBox').animate({scrollTop: $("#codeBox pre").height()}, 800);
            });
            
            //$("#codeBox pre").scroll();
            
        }
    });
    
    $('#send').click(function(e){
        var c = 'ls -l';
    
        $.post( "execute.php", {cmd:c}, function( data ) {
            //$( "#codeBox" ).html( data );
        });
    });
});

</script>
<style type="text/css">
    #content {
        width: 650px;
        margin: 0 auto;
    }
    #codeBox{
        color: #0F0;
        height:450px;
        background-color:black; 
        overflow:auto; 
        width:600px; 
    }
    #command{
        width: 600px;
        background-color:black;
        color: #0F0;
        border:0px;
        font-size: 12px;
    }
</style>
</head>

<body>
<div id="content">
    <div id="codeBox" style=""><pre></pre></div>
    <input type="text" name="command" id="command" size="50" />
</div>
</body>
</html>
