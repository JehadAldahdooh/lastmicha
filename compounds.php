<?php
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
    ini_set('memory_limit', '-1');
    ini_set('session.cookie_lifetime', 1308800.00016); // 15 days session will stay
	include("database.class.php");	//Include MySQL database class
	include("mysql.sessions.php");	//Include PHP MySQL sessions
	$session = new Session();	//Start a new PHP MySQL session
	
	//echo exec('whoami'); 
	header('Cache-Control: no cache'); //no cache
	//session_cache_limiter('private_no_expire'); // works
	date_default_timezone_set('Europe/Helsinki');
	
	if (session_status() == PHP_SESSION_NONE) {
			ini_set('session.cookie_lifetime', 1308800.00016);
			//   session_start();
	}

	$alldic=[];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MICHA</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126984000-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-126984000-3');
    </script>


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>


<link href="templatemo_style.css?version=3" rel="stylesheet" type="text/css" />
<link href="jehad_css.css" rel="stylesheet" type="text/css" />








<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">-->
    <script lang="javascript" src="js/xlsx.full.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css">

    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <!--<script type="text/javascript" src="main.js?version=19"></script>-->

    <!--this is for auto complete search list-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="lib/js/jquery-ui.js"></script>
    <!-- auto complete finish lib-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->

<link rel="stylesheet" type="text/css" href="form.css" >

<link rel="stylesheet" type="text/css" href="bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<style>


#Cell_line_name-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: absolute;

	 max-height: 400px;
overflow-y: auto;   /* prevent horizontal scrollbar */
    overflow-x: hidden; /* add padding to account for vertical scrollbar */
    z-index:1000 !important;

}
#Cell_line_name-list li{padding: 10px; background: lightslategray; border-bottom: #bbb9b9 1px solid;}
#Cell_line_name-list li:hover{background:#ece3d2;cursor: pointer;}


#expr-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: absolute;
     
	 
	 max-height: 400px;
overflow-y: auto;   /* prevent horizontal scrollbar */
    overflow-x: hidden; /* add padding to account for vertical scrollbar */
    z-index:1000 !important;


}
#expr-list li{padding: 10px; background: lightslategray; border-bottom: #bbb9b9 1px solid;}
#expr-list li:hover{background:#ece3d2;cursor: pointer;}


#ana-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: absolute;   

     max-height: 400px;

overflow-y: auto;   /* prevent horizontal scrollbar */
    overflow-x: hidden; /* add padding to account for vertical scrollbar */
    z-index:1000 !important;
	
	
}
#ana-list li{padding: 10px; background: lightslategray; border-bottom: #bbb9b9 1px solid;}
#ana-list li:hover{background:#ece3d2;cursor: pointer;}

  


</style>
<script language="javascript" type="text/javascript">
	function clearText(field) {
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}



function selectCell_line_name(val) {
$("#Cell_line_name").val(val);
$("#suggesstion-box_Cell_line_name").hide();
}

function selectCell_line_provenance(val) {
$("#Cell_line_provenance").val(val);
$("#suggesstion-box_Cell_line_provenance").hide();
}
function dilution_fold(val) {
$("#dilution_fold").val(val);
$("#suggesstion-box_dilution_fold").hide();
}






function experimental_medium(val) {
$("#Medium").val(val);
$("#suggesstion-box_Medium").hide();
}


function plate_type(val) {
$("#Plate_type").val(val);
$("#suggesstion-box_Plate_type").hide();
}

function cell_density(val) {
$("#Cell_density_at_plating").val(val);
$("#suggesstion-box_Cell_density").hide();
}

function vehicle(val) {
$("#vehicle").val(val);
$("#suggesstion-box_vehicle").hide();
}
function method_dispensation(val) {
$("#method_dispensation").val(val);
$("#suggesstion-box_method_dispensation").hide();
}
function volume_per_well(val) {
$("#volume_per_well").val(val);
$("#suggesstion-box_volume_per_well").hide();
}



function analysis_ref(val) {
$("#Analysis_reference").val(val);
$("#suggesstion-box_Analysis_reference").hide();
}
function analysis_metric(val) {
$("#Analysis_result").val(val);
$("#suggesstion-box_Analysis_result").hide();
}
function min_concentration(val) {
$("#min_concentration").val(val);
$("#suggesstion-box_min_concentration").hide();
}
function max_concentration(val) {
$("#max_concentration").val(val);
$("#suggesstion-box_max_concentration").hide();
}








    <!--jQuery code to show the working of this method-- >
    $(document).ready(function() {
		
		
		
		
		
	$("#Cell_line_name").keyup(function(){
		console.log("typing");
		$.ajax({
		type: "POST",
		url: "readCell.php",
		data:{
			
			keyword: $(this).val(),
			type: 'c_name'
			
		},
		beforeSend: function(){
			$("#Cell_line_name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Cell_line_name").show();
			$("#suggesstion-box_Cell_line_name").html(data);
			$("#Cell_line_name").css("background","#FFF");
		}
		});
	});


	$("#Cell_line_provenance").keyup(function(){
		console.log("typing");
		$.ajax({
		type: "POST",
		url: "readCell.php",
		data:{
			
			keyword: $(this).val(),
			type: 'c_provenance'
			
		},
		beforeSend: function(){
			$("#Cell_line_provenance").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Cell_line_provenance").show();
			$("#suggesstion-box_Cell_line_provenance").html(data);
			$("#Cell_line_provenance").css("background","#FFF");
		}
		});
	});





	$("#Medium").keyup(function(){
		console.log("MEDIUM");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'experimental_medium'
			
		},
		beforeSend: function(){
			$("#Medium").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Medium").show();
			$("#suggesstion-box_Medium").html(data);
			$("#Medium").css("background","#FFF");
		}
		});
	});

		
		
		$("#Plate_type").keyup(function(){
		console.log("Plate_type");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'Plate_type'
			
		},
		beforeSend: function(){
			$("#Plate_type").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Plate_type").show();
			$("#suggesstion-box_Plate_type").html(data);
			$("#Plate_type").css("background","#FFF");
		}
		});
	});
	
		
		
		
		
		$("#Cell_density_at_plating").keyup(function(){
		console.log("Cell_density_at_plating");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'Cell_density_at_plating'
			
		},
		beforeSend: function(){
			$("#Cell_density_at_plating").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Cell_density").show();
			$("#suggesstion-box_Cell_density").html(data);
			$("#Cell_density_at_plating").css("background","#FFF");
		}
		});
	});
	
				
		


		$("#dilution_fold").keyup(function(){
		console.log("dilution_fold");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'dilution_fold'
			
		},
		beforeSend: function(){
			$("#dilution_fold").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_dilution_fold").show();
			$("#suggesstion-box_dilution_fold").html(data);
			$("#dilution_fold").css("background","#FFF");
		}
		});
	});

	
		



















		$("#vehicle").keyup(function(){
		console.log("vehicle");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'vehicle'
			
		},
		beforeSend: function(){
			$("#vehicle").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_vehicle").show();
			$("#suggesstion-box_vehicle").html(data);
			$("#vehicle").css("background","#FFF");
		}
		});
	});

			$("#method_dispensation").keyup(function(){
		console.log("method_dispensation");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'method_dispensation'
			
		},
		beforeSend: function(){
			$("#method_dispensation").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_method_dispensation").show();
			$("#suggesstion-box_method_dispensation").html(data);
			$("#method_dispensation").css("background","#FFF");
		}
		});
	});

			$("#volume_per_well").keyup(function(){
		console.log("volume_per_well");
		$.ajax({
		type: "POST",
		url: "readexpr.php",
		data:{
			
			keyword: $(this).val(),
			type: 'volume_per_well'
			
		},
		beforeSend: function(){
			$("#volume_per_well").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_volume_per_well").show();
			$("#suggesstion-box_volume_per_well").html(data);
			$("#volume_per_well").css("background","#FFF");
		}
		});
	});

	














		
		
		
		
		


			$("#Analysis_reference").keyup(function(){
		console.log("Analysis_reference");
		$.ajax({
		type: "POST",
		url: "readana.php",
		data:{
			
			keyword: $(this).val(),
			type: 'Analysis_reference'
			
		},
		beforeSend: function(){
			$("#Analysis_reference").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Analysis_reference").show();
			$("#suggesstion-box_Analysis_reference").html(data);
			$("#Analysis_reference").css("background","#FFF");
		}
		});
	});		



	$("#Analysis_result").keyup(function(){
		console.log("Analysis_result");
		$.ajax({
		type: "POST",
		url: "readana.php",
		data:{
			
			keyword: $(this).val(),
			type: 'Analysis_result'
			
		},
		beforeSend: function(){
			$("#Analysis_result").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_Analysis_result").show();
			$("#suggesstion-box_Analysis_result").html(data);
			$("#Analysis_result").css("background","#FFF");
		}
		});
	});			
	
	
	
	$("#min_concentration").keyup(function(){
		console.log("min_concentration");
		$.ajax({
		type: "POST",
		url: "readana.php",
		data:{
			
			keyword: $(this).val(),
			type: 'min_concentration'
			
		},
		beforeSend: function(){
			$("#min_concentration").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_min_concentration").show();
			$("#suggesstion-box_min_concentration").html(data);
			$("#min_concentration").css("background","#FFF");
		}
		});
	});			
	
	
	$("#max_concentration").keyup(function(){
		console.log("max_concentration");
		$.ajax({
		type: "POST",
		url: "readana.php",
		data:{
			
			keyword: $(this).val(),
			type: 'max_concentration'
			
		},
		beforeSend: function(){
			$("#max_concentration").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box_max_concentration").show();
			$("#suggesstion-box_max_concentration").html(data);
			$("#max_concentration").css("background","#FFF");
		}
		});
	});		
		
		
		
		
        //$('#recordModal_expr').modal('hide');
        $("#templatemo_content_top").click(function() {
            //$(this).fadeOut();
            console.log("sdsdsdsss");
            $('html,body').animate({
                scrollTop: $(".moveto").offset().top
            }, 'slow');
            document.getElementById("style1").style.display = "none";
            document.getElementById("style2").style.display = "none";
            document.getElementById("style3").style.display = "none";
            document.getElementById("style_upload").style.display = "block";
        });

        $('#link').click(function(e) {
            e.preventDefault();
            console.log("sdsds");
            document.getElementById("dropme").style.display = "none";
            document.getElementById("expr_whole").style.display = "block";
            document.getElementById("cell_whole").style.display = "none";
            document.getElementById("an_whole").style.display = "none";
            document.getElementById("banner_right").style.display = "none";
            document.getElementById("annotate_banner").style.display = "block";
            document.getElementById("banner_left_annotate").style.display = "block";
            document.getElementById("banner_left").style.display = "none";
        });

        $('#expr_form_banner').click(function(e) {
            e.preventDefault();
            console.log("sdsds");
            document.getElementById("dropme").style.display = "none";
            document.getElementById("expr_whole").style.display = "block";
            document.getElementById("cell_whole").style.display = "none";
            document.getElementById("an_whole").style.display = "none";
            document.getElementById("banner_right").style.display = "none";
            document.getElementById("annotate_banner").style.display = "block";
        });

        $('#cell_form_banner').click(function(e) {
            e.preventDefault();
            console.log("sdsds");
            document.getElementById("dropme").style.display = "none";
            document.getElementById("expr_whole").style.display = "none";
            document.getElementById("cell_whole").style.display = "block";
            document.getElementById("an_whole").style.display = "none";
            document.getElementById("banner_right").style.display = "none";
            document.getElementById("annotate_banner").style.display = "block";

        });

        $('#an_form_banner').click(function(e) {
            e.preventDefault();
            console.log("sdsds");
            document.getElementById("dropme").style.display = "none";
            document.getElementById("expr_whole").style.display = "none";
            document.getElementById("cell_whole").style.display = "none";
            document.getElementById("an_whole").style.display = "block";
            document.getElementById("banner_right").style.display = "none";
            document.getElementById("annotate_banner").style.display = "block";
        });


        // This is the first point entry for history  so that if user click on annotate button then url will be changed and another sate will 
        // be pushed so if user click back he will come here to this defined first entry in history
        /*window.history.pushState({
            url: "/compounds",
            title: "compounds"
        }, "compounds", "/compounds");

		$('#link').click(function(e) {
			e.preventDefault();
			console.log("sdsds");
		    var $this = $(this),
            url = $this.attr("href"),
            title = $this.text();
		   //window.history.pushState('obj', 'newtitle', '/shifted_t/annotate');
            window.history.pushState({
              url: "/annotate",
            title: "annotate"
            }, 'annotate', '/annotate');
			
		    document.getElementById("dropme").style.display = "none";
		    document.getElementById("table_expr").style.display = "block";
		});

		$(window).on('popstate', function (e) {
			var state = e.originalEvent.state;
			console.log(state);
			if (state !== null) {
				document.title = state.title;
				console.log(state.title);
				if (state.title == "compounds"){
					document.getElementById("dropme").style.display = "block";
					document.getElementById("table_expr").style.display = "none";
				}else{
					document.getElementById("dropme").style.display = "none";
					document.getElementById("table_expr").style.display = "block";
				}
			} 
		});*/
    });
	</script>
<!--------------------------------Compounds-------------------------------->
<!------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126984000-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-126984000-3');
    </script>

   
<style>


.container {
	margin: 80px auto;
	padding: 25px 10px 20px 50px;
	width: 100%;
	height: 40px;
	text-align: center;
	border-radius: 50px;
	
}

.sphere {
	height: 2em;
	width: 2em;
	border-radius: 50%;
	float: left;
	margin-right: 31px;
	z-index: 20 !Important;
	position: relative;
	-webkit-transform: scale(.3);
	z-index: -1;
  background: rgb(255,75,35); /* Old browsers */
  background: -moz-radial-gradient(10% 10%, ellipse cover,  rgba(255,75,35,1) 0%, rgba(220,22,4,1) 100%); /* FF3.6+ */
  background: -webkit-gradient(radial, 10% 10%, 0px, center center, 100%, color-stop(0%,rgba(255,75,35,1)), color-stop(100%,rgba(220,22,4,1))); /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(10% 10%, ellipse cover,  rgba(255,75,35,1) 0%,rgba(220,22,4,1) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(10% 10%, ellipse cover,  rgba(255,75,35,1) 0%,rgba(220,22,4,1) 100%); /* Opera 12+ */
  background: -ms-radial-gradient(10% 10%, ellipse cover,  rgba(255,75,35,1) 0%,rgba(220,22,4,1) 100%); /* IE10+ */

}

.shadow {
	position: relative;
	top: -6.6em;
	width: 2em;
	left: 50px;
	height: 0.5em;
	box-shadow: 0px 0px 25px -.5px rgba(255, 255, 255, 1);
	border-radius: 50%;
	float: left;
	margin-right: 31px;
	-webkit-transform: scale(.3);
	opacity: 0;
}

.sphere:before { /*sourced from hop.ie/blog/balls*/
  content: "";
  position: absolute;
  top: 1%;
  left: 5%;
  width: 90%;
  height: 90%;
  border-radius: 50%;
  background: -webkit-radial-gradient(50% 20%, circle, #ffffff, rgba(255, 255, 255, 0) 58%);
  z-index: 2;
} 


#wrap {
	margin: 0 auto;
	width: 640px;
}

.clear {
	clear: both;
}

#shadow1 {
	-webkit-animation: fade-1 2s 0s infinite;
  -moz-animation: fade-1 2s 0s infinite;
  -o-animation: fade-1 2s 0s infinite;
  animation: fade-1 2s 0s infinite;
}

#shadow2 {
	-webkit-animation: fade-2 2s .2s infinite;
  -moz-animation: fade-2 2s .2s infinite;
  -o-animation: fade-2 2s .2s infinite;
  animation: fade-2 2s .2s infinite;
}

#shadow3 {
	-webkit-animation: fade-3 2s .4s infinite;
  -moz-animation: fade-3 2s .4s infinite;
  -o-animation: fade-3 2s .4s infinite;
  animation: fade-3 2s .4s infinite;
}

#shadow4 {
	-webkit-animation: fade-4 2s .6s infinite;
  -moz-animation: fade-4 2s .6s infinite;
  -o-animation: fade-4 2s .6s infinite;
  animation: fade-4 2s .6s infinite;
}

#shadow5 {
	-webkit-animation: fade-5 2s .8s infinite;
  -moz-animation: fade-5 2s .8s infinite;
  -o-animation: fade-5 2s .8s infinite;
  animation: fade-5 2s .8s infinite;
}

#shadow6 {
	-webkit-animation: fade-6 2s 1s infinite;
  -moz-animation: fade-6 2s 1s infinite;
  -o-animation: fade-6 2s 1s infinite;
  animation: fade-6 2s 1s infinite;
}

#shadow7 {
	-webkit-animation: fade-7 2s 1.2s infinite;
  -moz-animation: fade-7 2s 1.2s infinite;
  -o-animation: fade-7 2s 1.2s infinite;
  animation: fade-7 2s 1.2s infinite;
}

#shadow8 {
	-webkit-animation: fade-8 2s 1.4s infinite;
  -moz-animation: fade-8 2s 1.4s infinite;
  -o-animation: fade-8 2s 1.4s infinite;
  animation: fade-8 2s 1.4s infinite;
}

#shadow9 {
	-webkit-animation: fade-9 2s 1.6s infinite;
  -moz-animation: fade-9 2s 1.6s infinite;
  -o-animation: fade-9 2s 1.6s infinite;
  animation: fade-9 2s 1.6s infinite;
}

#shadow10 {
	-webkit-animation: fade-10 2s 1.8s infinite;
  -moz-animation: fade-10 2s 1.8s infinite;
  -o-animation: fade-10 2s 1.8s infinite;
  animation: fade-10 2s 1.8s infinite;
}

#sphere1{
	-webkit-animation: scale-1 2s 0s infinite;
  -moz-animation: scale-1 2s 0s infinite;
  -o-animation: scale-1 2s 0s infinite;
  animation: scale-1 2s 0s infinite;
}

#sphere2 {
	-webkit-animation: scale-2 2s .2s infinite;
  -moz-animation: scale-2 2s .2s infinite;
  -o-animation: scale-2 2s .2s infinite;
  animation: scale-2 2s .2s infinite;
}

#sphere3 {
	-webkit-animation: scale-3 2s .4s infinite;
  -moz-animation: scale-3 2s .4s infinite;
  -o-animation: scale-3 2s .4s infinite;
  animation: scale-3 2s .4s infinite;
}

#sphere4 {
	-webkit-animation: scale-4 2s .6s infinite;
  -moz-animation: scale-4 2s .6s infinite;
  -o-animation: scale-4 2s .6s infinite;
  animation: scale-4 2s .6s infinite;
}

#sphere5 {
	-webkit-animation: scale-5 2s .8s infinite;
  -moz-animation: scale-5 2s .8s infinite;
  -o-animation: scale-5 2s .8s infinite;
  animation: scale-5 2s .8s infinite;
}

#sphere6 {
	-webkit-animation: scale-6 2s 1s infinite;
  -moz-animation: scale-6 2s .1s infinite;
  -o-animation: scale-6 2s .1s infinite;
  animation: scale-6 2s .1s infinite;
}

#sphere7 {
	-webkit-animation: scale-7 2s 1.2s infinite;
  -moz-animation: scale-7 2s 1.2s infinite;
  -o-animation: scale-7 2s 1.2s infinite;
  animation: scale-7 2s 1.2s infinite;
}

#sphere8 {
	-webkit-animation: scale-8 2s 1.4s infinite;
  -moz-animation: scale-8 2s 1.4s infinite;
  -o-animation: scale-8 2s 1.4s infinite;
  animation: scale-8 2s 1.4s infinite;
}

#sphere9 {
	-webkit-animation: scale-9 2s 1.6s infinite;
  -moz-animation: scale-9 2s 1.6s infinite;
  -o-animation: scale-9 2s 1.6s infinite;
  animation: scale-9 2s 1.6s infinite;
}

#sphere10 {
	-webkit-animation: scale-10 2s 1.8s infinite;
  -moz-animation: scale-10 2s 1.8s infinite;
  -o-animation: scale-10 2s 1.8s infinite;
  animation: scale-10 2s 1.8s infinite;
}

@-webkit-keyframes fade-1 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-1 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-1 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-1 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-2 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-2 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-2 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-2 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-3 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-3 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-3 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-3 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-4 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-4 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-4 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-4 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-5 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-5 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-5 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-5 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-6 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-6 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-6 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-6 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-7 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-7 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-7 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-7 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-8 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-8 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-8 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-8 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-9 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-9 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-9 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-9 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes fade-10 {
	0% 		 { -webkit-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -webkit-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -webkit-transform: scale(.3);
				opacity: 0;
				}
}

@-moz-keyframes fade-10 {
	0% 		 { -moz-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -moz-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -moz-transform: scale(.3);
				opacity: 0;
				}
}

@-o-keyframes fade-10 {
	0% 		 { -o-transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { -o-transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ -o-transform: scale(.3);
				opacity: 0;
				}
}

@keyframes fade-10 {
	0% 		 { transform: scale(.3);
				opacity: 0;
				}
	35%, 65% { transform: scale(1);
				opacity: .3;
				}
	65%, 100%{ transform: scale(.3);
				opacity: 0;
				}
}

@-webkit-keyframes scale-1 {
	0% 		 { -webkit-transform: scale(.3);
				}
	35%, 65% { -webkit-transform: scale(1);
				}
	65%, 100%{ -webkit-transform: scale(.3);
				}
}

@-moz-keyframes scale-1 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-1 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-1 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-2 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}
	}

@-moz-keyframes scale-2 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-2 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-2 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-3 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}
	}

@-moz-keyframes scale-3 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-3 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-3 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-4 {
	0%  	 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-4 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-4 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-4 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-5 {
	0%  	 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-5 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-5 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-5 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-6{
	0% 	 	 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-6 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-6 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-6 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-7 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-7 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-7 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-7 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-8 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-8 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-8 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-8 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-9 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-9 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-9 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-9 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

@-webkit-keyframes scale-10 {
	0% 		 { -webkit-transform: scale(.3);}
	35%, 65% { -webkit-transform: scale(1);}
	65%, 100%{ -webkit-transform: scale(.3);}}

@-moz-keyframes scale-10 {
	0% 		 { -moz-transform: scale(.3);
				}
	35%, 65% { -moz-transform: scale(1);
				}
	65%, 100%{ -moz-transform: scale(.3);
				}
}

@-o-keyframes scale-10 {
	0% 		 { -o-transform: scale(.3);
				}
	35%, 65% { -o-transform: scale(1);
				}
	65%, 100%{ -o-transform: scale(.3);
				}
}

@keyframes scale-10 {
	0% 		 { transform: scale(.3);
				}
	35%, 65% { transform: scale(1);
				}
	65%, 100%{ transform: scale(.3);
				}
}

















/*
.btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
}
.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
*/














/*
.pulsing {
  width: 99%;
  height: 99%;
  border-radius: 50px;
  z-index: 1;
  position: relative;
}
.pulsing:before, .pulsing:after {
  width: 100%;
  height: 100%;
  border: inherit;
  top: 0;
  left: 0;
  z-index: 0;
  background: #fff;
  border-radius: inherit;
  animation: pulsing 2.5s linear infinite;
}
.pulsing:after {
  animation: pulsing1 2.5s linear infinite;
}




@keyframes pulsing {
  0% {
    opacity: 1;
    transform: scaleY(1) scaleX(1);
  }
  20% {
    opacity: 0.5;
  }
  70% {
    opacity: 0.2;
    transform: scaleY(1.8) scaleX(1.4);
  }
  80% {
    opacity: 0;
    transform: scaleY(1.8) scaleX(1.4);
  }
  90% {
    opacity: 0;
    transform: scaleY(1) scaleX(1);
  }
}
*/


.button-hand:before {

    content: "👉";
   // font-size: 60px;
   // transform: scaleX(-1);
    right: 0px;
   // top: -68px;
    animation: up-down 1s infinite;
	
	background: transparent;
    color: #fff;
   // border: 3px solid #fff;
    border-radius: 50px;
   // padding: 0.8rem 2rem;
    font: 24px "Margarine", sans-serif;
    outline: none;
    cursor: pointer;
    position: relative;
    transition: 0.2s ease-in-out;
    letter-spacing: 2px;
	animation: pulsing 0.2s linear infinite;
}












</style>



</head>
<body>
<div id="templatemo_wrapper">	
    <div id="templatemo_site_title_bar">

		<div id="site_title">
			<h1>
			    <a href="#"> MICHA <div class="cleaner_h40"></div></a>
			</h1>
		</div>            
        <ul class="social_network">
            <li><a href="https://twitter.com/NetPharMed" target="_blank"><img src="images/twitter_icon.png" alt="twitter" /></a></li>
        </ul>   
    </div> <!-- end of templatemo_site_title_bar -->
    
    <div id="templatemo_menu">
    
        <ul style="padding:0px;padding-left:15px;">
            <li><a href="#" class="current">Home</a></li>
            <li><a href="about/index" >About</a></li>
            <li><a href="glossary/index">Glossary</a></li>
			<li><a href="protocols/index">Protocols</a></li>
            <li><a href="api">API</a></li>
						<li><a href="/covid19" >Covid-19</a></li>

            <!--<li><a href="#">Contact</a></li>-->
        </ul>    	
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_search">
    
    	<div id="search_box">
            <form action="#" method="get">
                <input type="text" value="Enter a keyword..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>
    
    </div> <!-- end of search -->
    
    <div id="templatemo_banner">

	    <div id="banner_left">
        
            <!--<p>MICHA (Minimal Information for CHemosensitivity Assay) is a protocol for the annotation and reporting of 
			Chemosensensitivity assays by FAIRifying drug sensitivity screening data.<span> </span> </p>-->
			
			<p>MICHA extracted all publicly available information for the compounds such as primary targets, other potent targets, 
			clinical information and physiochemical information.</p>
			
			<p>
			Please continue to annotate your data by clicking on Annotate data or you can download the results by clicking Download results.
			
			
			</p>
			
			
           <!-- <div class="cleaner_h20"></div>-->
            
        </div>
		
		
		
	    <div id="banner_left_annotate" style="display:none;">
        
            <!--<p>MICHA (Minimal Information for CHemosensitivity Assay) is a protocol for the annotation and reporting of 
			Chemosensensitivity assays by FAIRifying drug sensitivity screening data.<span> </span> </p>-->
			
			<p>Please annotate your data by filling any form .</p>
			
			<p>
			Once finised , please click here to generate a report.             

			
			
			</p>
			
				 <div class="banner_button">
            	            	<a  href="#" id="ExportReporttoExcel_new">Download Results</a>

            </div>
			
			
           <!-- <div class="cleaner_h20"></div>-->
            
        </div>		
		
		
        
        <div id="banner_right" >
        
        	<div class="banner_button"  data-target="#templatemo_content">
            	<a href="index.html" id="templatemo_content_top">Back</a>
            </div>
            
            <div class="banner_button">
            	<a  href="#" id="ExportReporttoExcel">Download Results</a>
            </div>
            
            <div class="banner_button">
            	<a href="#expr_form_table" id="link" class="button-hand">Annotate data</a>
            </div>
        
        </div>
   

        <div id="annotate_banner" style="display:none;">
        
        	<div class="banner_button" data-target="#templatemo_content">
            	<a href="#" id="expr_form_banner">Experiment form</a>
            </div>
            
            <div class="banner_button">
            	<a  href="#" id="cell_form_banner">Cells form</a>
            </div>
            
            <div class="banner_button">
            	<a href="#" id="an_form_banner">Analysis form</a>
            </div>
			
		
        
        </div>

		
    </div> <!-- end of templatemo_banner -->
    
    <div id="templatemo_content_top" class="moveto"></div>
	
    <div id="templatemo_content">
    
        <div class="section_w940">
		
		
		
		
		
		
		
		<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
        <div class="modal" id="expr_Modal">
            <div class="modal-dialog modal-lg" style="width: 90%;">
    		<form method="post" id="expr_form_modal">
			
                <div class="modal-content sky-form">
                    <!-- Modal Header -->
                    <div class="modal-header sky-form">
                        <header class="modal-title">New Entry Create</header>
                        <!-- <h4 ></h4>-->
                        <button type="button" class="close" data-dismiss="modal" 
						style="padding: 1rem 1rem;margin: 1rem 0rem 0rem auto;">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            <strong>Success!</strong>Added successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--<header></header>-->
                        <fieldset>
                            <div class="row">
						
						
						
                          
								
													<section class="col col-6">
                <label class="label" style="color:lightgrey;">Assay format</label>
                <label class="select" >
                    <select id="assa" name="Assay_format">
                        <option value="biochemical" />Biochemical
                        <option value="cell_based" />Cell based
                        <option value="cell_free" />Cell free
                        <option value="physiochemical" />Physiochemical
                        <option value="tissue" />Tissue
						<option value="organism_based" />Organism_based
                    </select>
                    <i></i>
                </label>
            </section>
			
							<section class="col col-6">
									<label class="label" style="color:lightgrey;">Assay test type</label>
									<label class="select">
										<select name="Assay_test_type">
											<option value="Invitro" />	Invitro
											<option value="Invivo" />	Invivo
											<option value="Exvivo" />	Exvivo
											<option value="Other" />	Other
										</select>
										<i></i>
									</label>
								</section>

                            </div>
                            <div class="row">
								
								
								<section class="col col-6">
									<label class="label" style="color:lightgrey;">Detection technology</label>
									<label class="select">
										<select name="Detection_technology">
											<option value="fluoresecence" />	Fluoresecence
											<option value="luminescence" />		Luminescence
											<option value="spectrophotometry" />Spectrophotometry
											<option value="radiometry" />		Radiometry
											<option value="microscopy" />		Microscopy
											<option value="label_free_technology" />Label free technology
											<option value="fluorescence_polarization" />Fluorescence_polarization
											<option value="TRF" />				TRF
											<option value="TR_FRET" />			TR FRET
											<option value="AlphaScreen" />		AlphaScreen
											<option value="qPCR" />				qPCR
											<option value="termal_shift" />		Termal shift
											
										</select>
										
										
										<i></i>
									</label>
								</section>
								
								
													<section class="col col-6">
									<label class="label" style="color:lightgrey;">End Point mode</label>
									<label class="select">
										<select name="Endpoint_mode">
											<option value="activation" />			Activation
											<option value="cytotoxocity" />			Cytotoxocity
											<option value="growth_inhibition" />	Growth inhibition
											<option value="inhibition" />			Inhibition
											<option value="inverse_agonist" />		Inverse agonist
										</select>
										<i></i>
									</label>
								</section>

								
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
							
							
								
								
								
								
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Medium
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="Medium" name="Medium" type="text" placeholder="Medium">
										<div id="suggesstion-box_Medium"></div>

										
										
                                    </label>
                                </section>
								    <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Plate type
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="Plate_type" name="Plate_type" type="text" placeholder="Plate type">
                                    	<div id="suggesstion-box_Plate_type"></div>

									
									
									</label>
                                </section>

								
                            </div>
                            <div class="row">
                               <!-- <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Measurement
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input id="Measurement" name="Measurement"  type="text" placeholder="Measurement">
                                    </label>
                                </section>-->
								                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Cell density at plating
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="Cell_density_at_plating" name="Cell_density_at_plating"  type="text" placeholder="Cell density at plating">
                                    	
										<div id="suggesstion-box_Cell_density"></div>
                                    
									</label>
                                </section>
								
								
								 <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Time of treatment
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input id="Time_of_treatment" name="Time_of_treatment" type="text" placeholder="Time of treatment">
                                    </label>
                                </section>
								
								


                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                               
								
								                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Dilution fold
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="dilution_fold" name="dilution_fold"  type="text" placeholder="Dilution fold">
                                   		
										<div id="suggesstion-box_dilution_fold"></div>


								   </label>
                                </section>
								<section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Vehicle
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="vehicle" name="vehicle" type="text" placeholder="vehicle">
 										<div id="suggesstion-box_vehicle"></div>
                                   
									
									</label>
                                </section>

                            </div>
                            <div class="row">
                               
								
								                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Method dispensation
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input  autocomplete="off" id="method_dispensation" name="method_dispensation" type="text" placeholder="Method dispensation">
 										<div id="suggesstion-box_method_dispensation"></div>
                                   
									
									</label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Volume per well
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="volume_per_well" name="volume_per_well" type="text" placeholder="Volume per well">
                                   
										<div id="suggesstion-box_volume_per_well"></div>

								   </label>
                                </section>


                            </div>
                        </fieldset>
                     
                        <footer class="modal-footer">
						 
						 <input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
						
						<input type="hidden" name="filename" id="filename" value="" />

    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />

                           <!-- <button type="button" class="btn btn-success" id="SubmitCreate_expr_Form" style="width:10%;float:right;">Create</button>-->
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:10%;float:right;margin-right:4px;">Close</button>
                        </footer>
                    </div>
                </div>
				</form>
            </div>
        </div>
		
												<div class="card" id="expr_whole" style="display:none;">
													<div class="card-header">
														Experiments
														<button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" id="addRecord_expr"
														data-backdrop="static" data-keyboard="false" type="button" data-toggle="modal" data-target="#expr_Modal">
															Create a new entry
														</button>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table id="expr_form_table" class="display" style="clear:both;table-layout:fixed;width:100%;">
																<thead>
																	<tr>
																		<th width="50px"></th>	
																		<th width="50px"></th>					
																		<th width="188px">Assay format</th>					
																		<th width="188px">Assay test type</th>
																		<th width="188px">Detection technology</th>
																		<th width="188px">Endpoint mode</th>	
																		<th width="188px">Medium</th>	
																		<th width="188px">Plate type</th>	
																		<!-- <th width="188px">Measurement</th>-->	
																		<th width="188px">Cell density at plating</th>	
																		<th width="188px">Time of treatment</th>	
																		<th width="188px">Dilution fold</th>	
																		<th width="188px">Vehicle</th>	
																		<th width="188px">Method dispensation</th>	
																		<th width="188px">Volume per well</th>					
																	</tr>
																</thead>
															</table>
														</div>
													</div>
												</div>
							
	
	
	
	
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!-----------------------------cell_line form-------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
        <div class="modal" id="cell_Modal">
            <div class="modal-dialog modal-lg" style="width: 90%;">
			   <form method="post" id="cell_form_modal">
                <div class="modal-content sky-form">
                    <!-- Modal Header -->
                    <div class="modal-header sky-form">
                        <header class="modal-title">New Entry Create</header>
                        <!-- <h4 ></h4>-->
                        <button type="button" class="close" data-dismiss="modal" 
						style="padding: 1rem 1rem;margin: 1rem 0rem 0rem auto;">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            <strong>Success!</strong>Added successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--<header></header>-->
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Cell line name
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
										
                                        <input autocomplete="off" type="text" name="Cell_line_name" id="Cell_line_name" type="text" placeholder="Cell line name">
                                        <div id="suggesstion-box_Cell_line_name"></div>

                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Cell line provenance
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
										
                                        <input autocomplete="off" name="Cell_line_provenance" id="Cell_line_provenance" type="text" 
										placeholder="Cell line provenance">
                                        <div id="suggesstion-box_Cell_line_provenance"></div>
										
										
										
										
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> ID
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input name="CID" id="CID" type="text" placeholder="ID">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Cell type
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input name="Cell_type" id="Cell_type" type="text" placeholder="Cell type">
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Cell line organism
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Cell_line_organism" id="Cell_line_organism" type="text" 
										placeholder="Cell line organism">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Passage number
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Passage_number" id="Passage_number" type="text" placeholder="Passage number">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Modifications
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Modifications" id="Modifications" type="text" placeholder="Modifications">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Age
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input name="Age" id="Age" type="text" placeholder="Age">
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Sex
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Sex" id="Sex" type="text" placeholder="Sex">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Diagnosis
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Diagnosis" id="Diagnosis" type="text" placeholder="Diagnosis">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Sample material
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Sample_material" id="Sample_material" type="text" placeholder="Sample material">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Date of evaluation
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input name="Date_of_evaluation" id="Date_of_evaluation" type="text" placeholder="Date of evaluation">
                                    </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Date of sampling
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input name="Date_of_sampling" id="Date_of_sampling" type="text" placeholder="Date of sampling">
                                    </label>
                                </section>
                             
                            </div>
                        </fieldset>


                        <footer class="modal-footer">
											 <input type="hidden" name="id_c" id="id_c" />
    					<input type="hidden" name="action_c" id="action_c" value="" />  
						
						<input type="hidden" name="filename_c" id="filename_c" value="" />

    					<input type="submit" name="save_c" id="save_c" class="btn btn-info" value="Save" />

                            <!--<button type="button" class="btn btn-success" id="SubmitCreate_cell_Form" style="width:10%;float:right;">Create</button>-->
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:10%;float:right;margin-right:4px;">Close</button>
                        </footer>
                    </div>
                </div>
			</form>
            </div>
        </div>
		
		
		<div class="card" id="cell_whole" style="display:none;">
			<div class="card-header">
				Cell line
				<button style="float: right; font-weight: 900;" class="btn btn-info btn-sm"  id="addRecord_cell"
				data-backdrop="static" data-keyboard="false" type="button" data-toggle="modal" data-target="#cell_Modal">
					Create a new entry
				</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="cell_form_table" class="display" style="clear:both;table-layout:fixed;width:100%;">
						<thead>
							<tr>
								<th width="50px"></th>	
								<th width="50px"></th>					
								<th width="188px">Cell line_name</th>					
								<th width="188px">Cell line provenance</th>					
								<th width="188px">ID</th>
								<th width="188px">Cell type</th>
								<th width="188px">Cell line organism</th>	
								<th width="188px">Passage number</th>	
								<th width="188px">Modifications</th>	
								<th width="188px">Age</th>	
								<th width="188px">Sex</th>	
								<th width="188px">Diagnosis</th>	
								<th width="188px">Sample material</th>	
								<th width="188px">Date of evaluation</th>	
								<th width="188px">Date of sampling</th>	
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!-----------------------------analysis form-------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------->

        <div class="modal" id="analysis_Modal">
            <div class="modal-dialog modal-lg" style="width: 90%;">
				<form method="post" id="analysis_form_modal">
                <div class="modal-content sky-form">
                    <!-- Modal Header -->
                    <div class="modal-header sky-form">
                        <header class="modal-title">New Entry Create</header>
                        <!-- <h4 ></h4>-->
                        <button type="button" class="close" data-dismiss="modal" 
						style="padding: 1rem 1rem;margin: 1rem 0rem 0rem auto;">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            <strong>Success!</strong>Added successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--<header></header>-->
                        <fieldset>
                             <!--<div class="row">
                              
							   <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Analysis normalization
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input id="Analysis_Normalization" name="Analysis_Normalization" type="text" 
										placeholder="Analysis Normalization">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Analysis formulas
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input id="Analysis_Formulas" name="Analysis_Formulas" type="text" placeholder="Analysis Formulas">
                                    </label>
                                </section>
                            </div> -->
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Analysis reference
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="Analysis_reference" name="Analysis_reference"  type="text" placeholder="web link or DOI ">
										
                                   
										<div id="suggesstion-box_Analysis_reference"></div>
										
										
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Analysis metric
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input  autocomplete="off" id="Analysis_result" name="Analysis_result" type="text" placeholder="IC50, AC50, ..etc">
                                    										<div id="suggesstion-box_Analysis_result"></div>

									
									</label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                           <!-- <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Analysis pipeline name
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input id="Analysis_pipeline_name" name="Analysis_pipeline_name" type="text" 
										placeholder="Analysis pipeline name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Analysis pipeline	address
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input id="Analysis_pipeline_Address" name="Analysis_pipeline_Address" type="text" 
										placeholder="Analysis pipeline Address">
                                    </label>
                                </section>
                            </div>-->
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;">Min concentration
                                        <i class="icon-prepend icon-th-large" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="min_concentration" name="min_concentration" type="text" 
										placeholder="units in nM">
										<div id="suggesstion-box_min_concentration"></div>
										
										
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input" style="color:lightgrey;"> Max concentration
                                        <i class="icon-prepend icon-user" style="margin-top: 20px;"></i>
                                        <input autocomplete="off" id="max_concentration" name="max_concentration" type="text" 
										placeholder="units in nM">
																				<div id="suggesstion-box_max_concentration"></div>

                                    </label>
                                </section>
                            </div>
                        </fieldset>
                     

                        <footer class="modal-footer">
												 <input type="hidden" name="id_an" id="id_an" />
    					<input type="hidden" name="action_an" id="action_an" value="" />
						
						<input type="hidden" name="filename_an" id="filename_an" value="" />

    					<input type="submit" name="save_an" id="save_an" class="btn btn-info" value="Save" />

                            <!--<button type="button" class="btn btn-success" id="SubmitCreate_analysis_Form" style="width:10%;float:right;">Create</button>-->
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:10%;float:right;margin-right:4px;">Close</button>
                        </footer>
                    </div>
                </div>
			</form>
            </div>
        </div>
	
	

												<div class="card" id="an_whole" style="display:none;">
													<div class="card-header">
														Analysis
														<button style="float: right; font-weight: 900;" class="btn btn-info btn-sm"  id="addRecord_analysis"
														data-backdrop="static" data-keyboard="false" type="button" data-toggle="modal" data-target="#analysis_Modal">
															Create a new entry
														</button>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table id="analysis_form_table" class="display" style="clear:both;table-layout:fixed;width:100%;">
																<thead>
																	<tr>
																		<th width="50px"></th>	
																		<th width="50px"></th>					
																		<!--<th width="200px">Analysis normalization</th>					
																		<th width="188px">Analysis formulas</th>-->					
																		<th width="188px">Analysis reference</th>
																		<th width="188px">Analysis result</th>
																		<!--<th width="200px">Analysis pipeline name</th>	
																		<th width="220px">Analysis pipeline address</th>-->	
																		<th width="188px">Min concentration</th>	
																		<th width="188px">Max concentration</th>	
				
																	</tr>
																</thead>
															</table>
														</div>
													</div>
												</div>


	<!--<div class="box margin_r30 box_border"  style="width: 900px;border-right: 0px dotted #999;" id="table_expr">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-4" align="right" style="position: absolute;
right: 10px;
top: 5px; ">
					<button type="button" name="add" id="addRecord_expr" class="btn btn-success" data-toggle="modal" data-target="#expr_Modal">Add New Record</button>
				</div>
			</div>
		</div>
		<br>
		<table id="expr_form_table" class="display" style="clear:both;table-layout:fixed;width:100%;">
			<thead>
				<tr>
					<th width="50px"></th>	
					<th width="50px"></th>					
					<th width="188px">Assay Name</th>					
					<th width="188px">Assay format</th>					
					<th width="188px">Assay test type</th>
					<th width="188px">Detection technology</th>
					<th width="188px">Endpoint mode</th>	
					<th width="188px">Medium</th>	
					<th width="188px">Plate type</th>	
					<th width="188px">Measurement</th>	
					<th width="188px">Cell density at plating</th>	
					<th width="188px">Time of treatment</th>	
					<th width="188px">dilution_fold</th>	
					<th width="188px">vehicle</th>	
					<th width="188px">method_dispensation</th>	
					<th width="188px">volume_per_well</th>					
				</tr>
			</thead>
		</table>
	</div>
	
	-->
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->

		<!-------------------------------Upload file----------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		   <div class="box margin_r30 box_border" id="style_upload" style="width: 900px;border-right: 0px dotted #999;">
		            




<div id="wrap">
	<div class="container" id="progess">

		<div class="sphere" id="sphere1"></div>
		<div class="sphere" id="sphere2"></div>
		<div class="sphere" id="sphere3"></div>
		<div class="sphere" id="sphere4"></div>
		<div class="sphere" id="sphere5"></div>
		<div class="sphere" id="sphere6"></div>
		<div class="sphere" id="sphere7"></div>
		<div class="sphere" id="sphere8"></div>
		<div class="sphere" id="sphere9"></div>

		
		<div class="clear"></div>
		
	</div><!-- progress -->
		
		<div class="shadow" id="shadow1"></div>
		<div class="shadow" id="shadow2"></div>
		<div class="shadow" id="shadow3"></div>
		<div class="shadow" id="shadow4"></div>
		<div class="shadow" id="shadow5"></div>
		<div class="shadow" id="shadow6"></div>
		<div class="shadow" id="shadow7"></div>
		<div class="shadow" id="shadow8"></div>
		<div class="shadow" id="shadow9"></div>
		
	</div><!-- wrap -->




            <div   id="dropme">
				<div id="results_table" style="display:none;">
				<table id="results" class="display" style="clear:both;table-layout:fixed;width:100%;">
				<thead>
				  <tr>
					 <th width="188px">					  
						Compound name
					 </th>
					 <th width="188px">					  
						Inchikey
					 </th>
					 <th width="188px">					 
						Primary target
					 </th>
					 					 
					<th width="188px"> 
						Other potent target ids
					</th>				 			 
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='This is the max clinical phase for compound that has been clinically tested. This is automatically extracted by MICHA using ChEMBL API.'
						   >?</p>
						Max phase
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Cross referencing drug databases: Provide hyperlinks to other compound databases such as: Pubchem, ChEMBL, DTC, BindingDB, Drugbank, Zinc, emolecules, atlas, gtopDB, Chebi, PharmGKB, sure ChEMBL , Lincs.'>
						   ?
						</p>
						Cross ref
					 </th>
					 <th width="188px">
					 
						Drug indications
					 </th>

					 <th width="188px"> 
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Molecular weight of parent compound'>?</p>
						mw freebase
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Measure of hydrophobicity'>?</p>
						Alogp
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Number hydrogen bond acceptors'>?</p>
						Hba
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Number hydrogen bond donors'>?</p>
						Hbd
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Polar surface area'>?</p>
						Psa
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Number rotatable bonds'>?</p>
						Rtb
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Indicates whether the compound passes the rule-of-three (mw < 300, logP < 3 etc)'>?</p>
						Num lipinski ro5 violations
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='The most acidic pKa calculated using ACDlabs v12.01'>?</p>
						Acd most apka
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='The most basic pKa calculated using ACDlabs v12.01'>?</p>
						Acd most bpka
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='The calculated octanol/water partition coefficient using ACDlabs v12.01'>?</p>
						Acd logp
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='The calculated octanol/water distribution coefficient at pH7.4 using ACDlabs v12.01'>?</p>
						Acd logd
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Molecular weight of the full compound including any salts'>?</p>
						Full mwt
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Number of aromatic rings'>?</p>
						Aromatic rings
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Number of heavy (non-hydrogen) atoms'>?</p>
						Heavy atoms
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Weighted quantitative estimate of drug likeness (as defined by Bickerton et al., Nature Chem 2012)'>?</p>
						Qed weighted
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Monoisotopic parent molecular weight'>?</p>
						Mw monoisotopic
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Molecular formula for the full compound (including any salt)'>?</p>
						Full molformula
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title="Number of hydrogen bond acceptors calculated according to Lipinski's original rules (i.e., N + O count))">?</p>
						Hba lipinski
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title="Number of hydrogen bond donors calculated according to Lipinski's original rules (i.e., NH + OH count)">?</p>
						Hbd lipinski
					 </th>
					 <th width="188px">
						<p style='text-align: center;cursor: pointer;display: inline-block; position: relative; margin-left:0em; float:
						   right;width: 20.6px;border-radius: 10px;background: #bacabe;'class='tool-tip2 tool-tip__icon'
						   data-toggle='tooltip' data-placement='top'
						   title='Cross referencing drug databases: Provide hyperlinks to other compound databases such as: Pubchem, ChEMBL, DTC, BindingDB, Drugbank, Zinc, emolecules, atlas, gtopDB, Chebi, PharmGKB, sure ChEMBL , Lincs.'>
						   ?
						</p>
						Cross ref
					 </th>
		  </tr>
		</thead>
		</table>

	</div>
        </div>				                    
            </div>
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------->
            <div class="cleaner"></div>
        </div>
    
    </div>
    <div id="templatemo_content_bottom"></div>
   
        <div id="templatemo_footer">
            <div class="section_w240" style="margin-left: 0px;padding-right: 0px;width:240px;">
                <h3></h3>
                <div class="sub_content">
                    <ul class="footer_list " style="width:400px;">
                        <li>
                            Copyright © 2020 <a style="color:blue;" target="_blank"  href="https://www.helsinki.fi/en/researchgroups/network-pharmacology-for-precision-medicine">Netphar</a>
                            <!-- Credit: www.templatemo.com -->
                        </li>
                        <li>Email: jing.tang@helsinki.fi</li>
                    </ul>
					<ul class="footer_list " style="width:400px;">
                        <li>
                        </li>
                        <li>
                        </li>
                        <li>
						License: 
                        </li>
                        <li><a style="color:blue;" target="_blank" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0</a></li>
                        <li><a style="color:blue;" target="_blank" href="https://creativecommons.org/licenses/by/4.0/">International License</a></li>
                    </ul>
                </div>
            </div>
            <div class="section_w240" style="width:340px;margin-left:120px;">
                <h3>Partners</h3>
                <div class="sub_content">
                    <ul class="footer_list numbering">
                        <li><a target="_blank" href="https://www.fimm.fi/">Institue For Molecular Medicine, University of Helsinki (FIMM-UH)</a></li>
                        <li><a target="_blank" href="https://www.imtm.cz/">Institute of Molecular and Translational Medicine (IMTM)</a></li>
                        <li><a target="_blank" href="https://www.marionegri.it/">Mario Negri Institute for Pharmacological Research (MN)</a></li>
                        <li><a target="_blank" href="https://eatris.eu/">European Infrastructure for Translational Medicine (EATRIS)</a></li>
                    </ul>
                </div>
            </div>
            <div class="section_w240" style="margin-left: 30px;padding-right: 0px;"> <!--style="width:150px;"-->
                <h3>Tools by our lab</h3>
                <div class="sub_content">
                    <ul class="footer_list ">
                        <li><a target="_blank" href="https://drugcomb.fimm.fi/" style="color:blue;">DrugComb</a></li>
                        <li><a target="_blank" href="http://drugtargetcommons.fimm.fi/" style="color:blue;">DrugTargetCommons</a></li>
                        <li><a target="_blank" href="http://drugtargetprofiler.fimm.fi/" style="color:blue;">Drug Target Profiler</a></li>
                    </ul>
                </div>
            </div>
            <!--  <div class="section_w240">
           <h3>About Light Space</h3>
            <div class="sub_content">
                <p>Nullam ultrices tempor nisi, ac egestas diam aliquam a. Ut eleifend <a href="#">semper</a> turpis, id feugiat arcu dignissim eu. Donec <a href="#">mattis</a> adipiscing imperdiet.</p>
          </div>
        </div>
        <div class="section_w240">
           <!-- <h3>Testimonials</h3>
            <div class="sub_content">
                <p>" Aliquam vehicula accumsan arcu, vestibulum cursus purus lobortis eu. Pellentesque vitae neque non lorem vehicula adipiscing."</p>
                <a href="#"> - Templatemo </a>
            </div>-->
        </div>

<div class="cleaner_h40"></div>

	
	
	
	
	</div> <!-- end of footer -->
</div> <!-- end of wrapper -->
</body>
</html>



	<script type="text/javascript">
	   window._urq = window._urq || [];
	   _urq.push(['initSite', '1b1bafee-3533-4536-bdd8-3c02b964d2b8']);
	   (function() {
	   var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true;
	   ur.src = ('https:' == document.location.protocol ? 'https://cdn.userreport.com/userreport.js' : 'http://cdn.userreport.com/userreport.js');
	   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s);
	   })();
	</script>








<?php

ini_set('max_execution_time', 3000);


/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/


//if ( isset($_POST["submit"]) ) {


if (isset($_POST) && isset($_FILES["file"])) {
	$name = $_FILES['file']['tmp_name'];
 
 

	if ($_FILES["file"]["error"] > 0) {
			 echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

	}else{
		//echo "hi";

        $storagename = $_FILES["file"]["name"];
        // move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);
        //check the file header after upload
        $csv = array();
        // check there are no errors
        $filename = $storagename;
		//print $filename;

        $path_info = pathinfo($filename);

        //echo $path_info['extension'];

        if (file_exists($filename)) {
            // echo "The file $filename exists";
            /*
            $F=substr($filename, 0, -4).rand(1, 1000000).uniqid();
            $F=str_replace(array( '(', ')' ), '', $F);
            $F = preg_replace('/\s+/', '', $F);
            $F = $F.'.csv';
            $filename=$F;
            move_uploaded_file($_FILES["file"]["tmp_name"], $F);
            */
        } else {
            // echo "The file $filename does not exist";
            //  move_uploaded_file($_FILES["file"]["tmp_name"], $storagename);

        }
        //print_r($filename);
        //Remove all non characters from the filename string
        $num = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $F = str_replace($num, null, $filename);
        $F = preg_replace('/[^A-Za-z0-9\-]/', '', $F);
        $F = substr($F, 0, -4) . rand(1, 1000000) . uniqid();
        $F = str_replace(array('(', ')'), '', $F);
        $F = str_replace(array('-'), '', $F);
        $F = preg_replace('/\s+/', '', $F);
        //$num = array(0,1,2,3,4,5,6,7,8,9);
        //$F =str_replace($num, null, $F);
        $F = $F .'.'.$path_info['extension'];
        $filename = $F;
        move_uploaded_file($_FILES["file"]["tmp_name"], "updated/sample_data/".$F);
        //$name = $_FILES['file']['name'];


?>



<script type="text/javascript">var filename = "<?= $filename ?>";</script>
<script type="text/javascript">var storagename = "<?= $storagename ?>";</script>

<script src="js/ajax_expr.js?version=5"></script>	
<script src="js/ajax_cell.js?version=1"></script>	
<script src="js/ajax_analysis.js?version=3"></script>	


<?php





		include "SimpleXLSX.php";


          //echo '<h1>Your input file</h1><pre>';
		if ( $xlsx = SimpleXLSX::parse("updated/sample_data/".$F) ) {
			//echo '<table><tbody>';
			$i = 0;
			$arrayallrows=[];
			$m_assoc_array = array();//associative array
			$m_assoc_array_drug_indication = array();//associative array
			$m_assoc_array_cross_ref = array();//associative array
			$m_assoc_array_cross_ref_ids = array();//associative array

			$m_assoc_array_structure = [];

			$m_indexes_order = array();//associative array


			//print_r($xlsx->rows());
			//get all inchikey in the file without any for loop
			$inchikeysall = array_slice(array_column($xlsx->rows(), '1'),1);


//print_r($inchikeysall);
            //echo strtolower($xlsx->rows()[0][0]);
            //echo strtolower($xlsx->rows()[0][1]);


			if(count($inchikeysall) <= 5000){


			}else{
$message = "It is not allowed to submit more than 5k inchi keys.";
echo "<script type='text/javascript'>alert('$message');</script>";


			}

		    $compund_names=[];
		    $inchiall=[];
$y=0; // for saving the whole data to be included if some inchikeys are present then show no data
$i=0;  // to ignore the first row header in reading the excel file
			foreach ($xlsx->rows() as $elt) {
				if ($i == 0) {
					 //echo "header file"."\n";
					//echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th></tr>"."\n";
				} else {
					
				//$elt_1=	preg_replace('/\s+/', '', $elt[1]);
				//$elt_0=	preg_replace('/\s+/', '', $elt[0]);
					
					
				$elt_1=	preg_replace('/\xc2\xa0/', '', $elt[1]);  //inchi key
				$elt_0=	$elt[0];
				
					//echo $elt_1;

				

			   // echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td></tr>";

				array_push($arrayallrows,[$elt_1,$elt_0]);
				
				
				
				
			//print_r("'".preg_replace('/\xc2\xa0/', '', $elt_1)."'");
 
 
 			//print_r("<br>");
			//print_r("\n");
			//print_r("<br>");
			//print_r("\n");
				

				$key=$elt[1];

				$m_assoc_array_drug_indication[$elt_1] = [];//adding a couple key-value
				$m_assoc_array_cross_ref[$elt_1] = [];//adding a couple key-value
						$m_assoc_array_cross_ref_ids[$elt_1] = [];//adding a couple key-value

				$compund_names[$elt_1] = $elt_0;
$m_indexes_order[$elt_1]=$y++;
							array_push($inchiall,preg_replace('/\xc2\xa0/', '', $elt_1));


			  }
			  $i++;
			}
			
			
			 //print_r($arrayallrows);

			$dbconn = pg_connect("host=192.168.4.173 dbname=compounds_20 user=fimm password=pxqgBsFLTwTzc")
				or die('Could not connect: ' . pg_last_error());

				//$userStr = implode("', '", $arrayallrows);
				


 				$inchiall = array_map('trim', array_values($inchiall));

				//print_r(json_encode($inchiall));
 
 
 			//print_r("<br>");
			//print_r("\n");
			//print_r("<br>");
			//print_r("\n");



				$userStr = implode("', '", array_filter($inchiall));
							//	print_r($userStr);
 
 
 			//print_r("<br>");
			//print_r("\n");
			//print_r("<br>");
			//print_r("\n");


			






			$query2 = "
			select standard_inchi_key, di.efo_term as disease_name, ir.ref_url as disease_ref from chembl24.drug_indication di,
			chembl24.indication_refs ir where ir.drugind_id=di.drugind_id and standard_inchi_key in ('$userStr') order by standard_inchi_key";


			//print_r($query);
			$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

			// Printing results in HTML
			//echo "<table>\n";
			while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {

				//echo "****************************************\n";
				//echo $line;
				$contact_name = "<a target='_blank' href='".$line2['disease_ref'] . "'" . ">"
							   . $line2['disease_name'] . "</a>"  ;



                //print_r($m_assoc_array_drug_indication[$line2['standard_inchi_key']]);
				
				
				array_push($m_assoc_array_drug_indication[$line2['standard_inchi_key']],$contact_name);//adding a couple key-value

				//echo "\t<tr>\n";
				//foreach ($line2 as $col_value2) {
				   // echo "<td>$col_value</td>\n";
				 // echo $col_value2."\n";
				//}
					//echo "****************************************\n";
				// echo "</tr>\n";
			}


	//print_r($m_assoc_array_drug_indication);

	$query3="
			select distinct standard_inchi_key, name_label as DB_name,  (base_id_url || cim.compound_id::text) as web_link,
			cim.compound_id::text as cimids from chembl22.uc_source uc,drugtargetcommons.compound_id_mapping cim
			where cim.src_id = uc.src_id and cim.standard_inchi_key in ('$userStr') order by cim.standard_inchi_key
			";

	//print_r($query);
	$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());

	// Printing results in HTML
	//echo "<table>\n";
	while ($line3= pg_fetch_array($result3, null, PGSQL_ASSOC)) {

		//echo "****************************************\n";
		//echo $line;
		$contact_name = "<a target='_blank' href='".$line3['web_link'] . "'" . ">"
					   . $line3['db_name'] . "</a>"  ;

		array_push($m_assoc_array_cross_ref[$line3['standard_inchi_key']],$contact_name);//adding a couple key-value
		array_push($m_assoc_array_cross_ref_ids[$line3['standard_inchi_key']],$line3['cimids']);//adding a couple key-value

		//echo "\t<tr>\n";
		//foreach ($line2 as $col_value2) {
		   // echo "<td>$col_value</td>\n";
		 // echo $col_value2."\n";
		//}
			//echo "****************************************\n";
	   // echo "</tr>\n";
	}




/*

include_once 'config/Database_Conn.php';
$database = new Database_Conn();
$db = $database->getConnection();
				$userStr = implode("', '", array_filter($inchiall));
						print_r($userStr);
print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("\n");

print_r("	 select standard_inchi_key , primary_target_ids, primary_target_names,other_potent_target_ids, max_phase,
  mw_freebase, alogp, hba, hbd, psa,
				rtb, num_ro5_violations, acd_most_apka, acd_most_bpka, acd_logp, acd_logd, full_mwt,
				 aromatic_rings, heavy_atoms, qed_weighted, mw_monoisotopic, full_molformula, hba_lipinski, hbd_lipinski  from
				fimm.micha_compounds where standard_inchi_key in ('$userStr') 
			"
);

		$sqlQuery = "create table test as select standard_inchi_key , primary_target_ids, primary_target_names,other_potent_target_ids,
		max_phase,
  mw_freebase, alogp, hba, hbd, psa,
				rtb, num_ro5_violations, acd_most_apka, acd_most_bpka, acd_logp, acd_logd, full_mwt,
				 aromatic_rings, heavy_atoms, qed_weighted, mw_monoisotopic, full_molformula, hba_lipinski, hbd_lipinski  from
				fimm.micha_compounds where standard_inchi_key in ('$userStr') " ;
		//$stmt = $db->prepare($sqlQuery);
		print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("<br>");
print_r("\n");


if ($db->query($sqlQuery) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $db->error;
} */

	$query1=" select standard_inchi_key , primary_target_ids, primary_target_names,other_potent_target_ids, max_phase,  mw_freebase, alogp, hba, hbd, psa,
				rtb, num_ro5_violations, acd_most_apka, acd_most_bpka, acd_logp, acd_logd, full_mwt,
				 aromatic_rings, heavy_atoms, qed_weighted, mw_monoisotopic, full_molformula, hba_lipinski, hbd_lipinski  from
				fimm.micha_compounds where standard_inchi_key in ('$userStr') 
			";


	//print_r($query1);
	$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());

	// Printing results in HTML
	//echo "<table>\n";

	$alldic=[];
	$i=0;
	while ($line = pg_fetch_array($result1, null, PGSQL_ASSOC)) {
			$arr23=[];
			//echo "\t<tr>\n";
			echo '<tr>';
			//array_push($arr23,$m_assoc_array[$line['standard_inchi_key']]);//associative array
			//echo "**********no way*******\n";

			 array_push($arr23,$compund_names[$line['standard_inchi_key']]);
			 array_push($arr23,$line['standard_inchi_key']);

			$primary_target_links=$line['primary_target_ids'];
			$primary_target_names=$line['primary_target_names'];

			$arr=[];
			$contact_name='';

			if($primary_target_names){
				$names=explode(',', $primary_target_names);
				$links=explode(',', $primary_target_links);

				$k=0;
				$numb=count($names);
				if($numb == 1){
					foreach($names as $key=>$value){
							$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$links[$key] . "'" . ">"
							   . $value . "</a> "  ;
					}
				}else{
						foreach($names as $key=>$value){
								if($key==$numb-1){
								$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$links[$key] . "'" . ">"
								   . $value . "</a>"  ;
								}
								else
								{
								$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$links[$key] . "'" . ">"
								   . $value . "</a>, "  ;
								}

						}
				}
			}



			 array_push($arr23,$contact_name);
			 
			 
			 
			$other_potent_target_ids=$line['other_potent_target_ids'];

			$arr=[];
			$contact_name='';

			if($other_potent_target_ids){
				$names=explode(',', $other_potent_target_ids);

				$k=0;
				$numb=count($names);
				if($numb == 1){
					foreach($names as $key=>$value){
							$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$value . "'" . ">"
							   . $value . "</a> "  ;
					}
				}else{
						foreach($names as $key=>$value){
								if($key==$numb-1){
								$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$value . "'" . ">"
								   . $value . "</a>"  ;
								}
								else
								{
								$contact_name = $contact_name. "<a target='_blank' href='https://www.uniprot.org/uniprot/?query=accession:".$value. "'" . ">"
								   . $value . "</a>, "  ;
								}

						}
				}
			}
			
			array_push($arr23,$contact_name);

			
			 array_push($arr23,$line['max_phase']);
			 array_push($arr23, implode(",", array_unique($m_assoc_array_cross_ref[$line['standard_inchi_key']])));

			//array_push($arr23, $m_assoc_array_structure[$line['standard_inchi_key']]);
			// print_r($line);
			 array_push($arr23,$line['mw_freebase']);
			 array_push($arr23,$line['alogp']);
			 array_push($arr23,$line['hba']);
			 array_push($arr23,$line['hbd']);
			 array_push($arr23,$line['psa']);
			 array_push($arr23,$line['rtb']);
			 array_push($arr23,$line['num_ro5_violations']);
			 array_push($arr23,$line['acd_most_apka']);
			 array_push($arr23,$line['acd_most_bpka']);
			 array_push($arr23,$line['acd_logp']);
			 array_push($arr23,$line['acd_logd']);
			 array_push($arr23,$line['full_mwt']);
			 array_push($arr23,$line['aromatic_rings']);
			 array_push($arr23,$line['heavy_atoms']);
			 array_push($arr23,$line['qed_weighted']);
			 array_push($arr23,$line['mw_monoisotopic']);
			 array_push($arr23,$line['full_molformula']);
			 array_push($arr23,$line['hba_lipinski']);
			 array_push($arr23,$line['hbd_lipinski']);
			 array_push($arr23, implode(",", array_unique($m_assoc_array_drug_indication[$line['standard_inchi_key']])));
			 array_push($arr23, implode(",", array_unique($m_assoc_array_cross_ref_ids[$line['standard_inchi_key']])));



//print_r($m_indexes_order[$line['standard_inchi_key']]);
//print_r('<br>');
	
				$alldic[$m_indexes_order[$line['standard_inchi_key']]]=$arr23;
				// echo "</tr>\n";

	}
	
					//print_r(count($alldic));
					


						$alldic_sort=[];
$i=0;  // this for starting the array and in the same time to keep index from zero same as $y in reading the excel file espace the first row header



					foreach($arrayallrows as $x => $x_value) {
						                       if(array_key_exists($i, $alldic)){
												$alldic_sort[$i]=$alldic[$i];
											   }else{
												 $alldic_sort[$i]=[$arrayallrows[$i][1], $arrayallrows[$i][0], 
												 '  ','',
     			'', '', '', '',
				'', '', '', '', '', '', '', '', '',
				'', '', '', '', '', '', '',
				'', '',''
			];

											   }
$i++;
  //echo "Key=" . $x . ", Value=" . $x_value;
  //echo "<br>";
  
  
}


//print_r('<br>');
//print_r('<br>');
					//print_r(krsort($alldic,1));
					//print_r($alldic_sort);
//print_r('<br>');




	

	$query_forms = "
			select distinct cell_line , cell_line_provenance ,  patient_age , patient_sex , patient_diagnosis , patient_sample , patient_sample_date ,
			patient_evaluation_date ,  min_concentration , max_concentration , dilution_fold , vehicle , experimental_medium , plate_type , 
			assay_format , assay_test_type , detection_tech , EP_mode , cell_density , method_dispensation , volume_per_well , treatment_time ,
			analysis_ref, analysis_metric from fimm.micha_protocols p where standard_inchi_key in ('$userStr') order by min_concentration desc";
			
	$result2 = pg_query($query_forms) or die('Query failed: ' . pg_last_error());
	$all_forms_data=[];
	$i=0;			
	while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
		 $arr23=[];
		// array_push($arr23,$line2['Protocol_name']);
		// array_push($arr23,$line2['compound_name']);
		// array_push($arr23,$line2['standard_inchi_key']);
		 
		 //Cell_line_form
		 array_push($arr23,$line2['cell_line']);//0
		 array_push($arr23,$line2['cell_line_provenance']);
		 array_push($arr23,$line2['patient_age']);//2
		 array_push($arr23,$line2['patient_sex']);
		 array_push($arr23,$line2['patient_diagnosis']);//4
		 array_push($arr23,$line2['patient_sample']);
		 array_push($arr23,$line2['patient_evaluation_date']);		 
		 array_push($arr23,$line2['patient_sample_date']);//7
		
         //Experiment
		 array_push($arr23,$line2['assay_format']);//8
		 array_push($arr23,$line2['assay_test_type']);
		 array_push($arr23,$line2['detection_tech']);//10
		 //array_push($arr23,$line2['EP_mode']);
		 array_push($arr23,$line2['experimental_medium']);//12
		 array_push($arr23,$line2['plate_type']);
		 array_push($arr23,$line2['cell_density']);//14
		 array_push($arr23,$line2['treatment_time']);
		 array_push($arr23,$line2['dilution_fold']);//16
		 array_push($arr23,$line2['vehicle']);
		 array_push($arr23,$line2['method_dispensation']);//18
		 array_push($arr23,$line2['volume_per_well']);
	 
		 //Analysis
		 array_push($arr23,$line2['min_concentration']); //20
		 array_push($arr23,$line2['max_concentration']);
		 array_push($arr23,$line2['analysis_ref']);    //corresponding=> pipeline address
		 array_push($arr23,$line2['analysis_metric']); //analysis result
		 
		 $all_forms_data[$i++]=$arr23;
	}
	
	//print_r($i);
	

		if(isset($_SESSION['uploaded_files'])){
                  // print_r( "yes is defined");
		           //array_push($_SESSION['uploaded_files'],$F); // Items added to cart
        //print_r($_SESSION['uploaded_files']);
		                  //  array_push($_SESSION['uploaded_files'],$alldic);
			$_SESSION['uploaded_files'][$filename]=array();
			$_SESSION['uploaded_files'][$filename]['date']=date('Y-m-d H:i:s');
			//$_SESSION['uploaded_files'][$filename]['data']=$alldic;
			//$_SESSION['uploaded_files'][$filename]['fname']=$storagename;
			//$_SESSION['uploaded_files'][$filename]['forms_data']=$all_forms_data;
			
	
                   // array_push($_SESSION['uploaded_files'],[$F,date(DATE_RFC822, filemtime("updated/sample_data/". $F))]);

	    }else{
			
			$_SESSION['uploaded_files']=array();
			
			$_SESSION['uploaded_files'][$filename]=array();
			$_SESSION['uploaded_files'][$filename]['date']= date('Y-m-d H:i:s');
			//$_SESSION['uploaded_files'][$filename]['data']=$alldic;
			//$_SESSION['uploaded_files'][$filename]['fname']=$storagename;
			//$_SESSION['uploaded_files'][$filename]['forms_data']=$all_forms_data;



					//$_SESSION['uploaded_files']=$alldic;
					//array_push($_SESSION['uploaded_files'],$alldic);

		}
		
		
		

	/*
		for($tr=0;$tr<count(array_keys($_SESSION['uploaded_files']));$tr++)
		{
			
				echo '<br>';		
			print_r(array_keys($_SESSION['uploaded_files'])[$tr]);
			echo '<br>';
			print_r($_SESSION['uploaded_files'][array_keys($_SESSION['uploaded_files'])[$tr]]['date']);
			echo '<br>';
			echo '<br>';

		}
		*/

   // note some files uploaded before add date ?? that's why you get index not defined
	//	print_r(date('Y-m-d H:i:s'));
	//	echo '<br>';
	//	print_r($_SESSION['uploaded_files'][array_keys($_SESSION['uploaded_files'])[0]]['date']);
	//	echo '<br>';

	//	print_r(array_keys($_SESSION['uploaded_files']));
		
		
//print_r(get_current_user());
		//var_dump($_SESSION['uploaded_files']);



   //$_SESSION['superhero'] = $alldic;

	//echo '</tbody> </table>';
	//echo "</table>\n";
	//echo "**********************\n";
	//echo "*********************query2*************\n";
	//echo "</table>\n";
	// Free resultset
	//pg_free_result($result);

		?>
			   <script>


          //  $('#hdnOrder').val(JSON.stringify(<?php echo json_encode($alldic); ?> ));
           // $('#hdnOrder').val("<?php echo $filename; ?>");
			//console.log("started");
			//document.getElementById("dropme").style.display = "none";
			//document.getElementById("loadbar").style.display = "none";
			document.getElementById("results_table").style.display = "block";
			document.getElementById("wrap").style.display = "none";


			var jArray = <?php echo json_encode($alldic_sort); ?> ;

			//for (var i = 0; i < jArray.length; i++) {
				//console.log(jArray[i]);
			//}

			//document.getElementById("nextbutton").style.display = "block";



			//document.getElementById("example").style.display = "none";
			//console.log("************** all dic *************");
			//console.log(alldic);
			//console.log(inchchembl);
			//document.getElementById("example").style.display = "none";
			//document.getElementById("filter").style.display = "none";
			document.getElementById("results_table").style.display = "block";

			var table = "";
			var table3 = "";
			var table4 = "";


			var t = "";
			var t2 = "";
			var t3 = "";




			//auto filter the first row
			function createCellPos(n) {
				var ordA = 'A'.charCodeAt(0);
				var ordZ = 'Z'.charCodeAt(0);
				var len = ordZ - ordA + 1;
				var s = "";

				while (n >= 0) {
					s = String.fromCharCode(n % len + ordA) + s;
					n = Math.floor(n / len) - 1;
				}

				return s;
			}
			////////////////////////////////


			var forms1dic = [];
			var forms2dic = [];
			var forms3dic = [];




			var headerdata = ['Compound name', 'Inchikey', 'Primary target','other_potent_target_ids',
     			'Max phase', 'Cross ref', 'Drug indications', 'mw_freebase',
				'Alogp', 'Hba', 'Hbd', 'Psa', 'Rtb', 'Num lipinski ro5 violations', 'Acd most apka', 'Acd most bpka', 'Acd logp',
				'Acd logd', 'Full mwt', 'Aromatic rings', 'Heavy atoms', 'Qed weighted', 'Mw monoisotopic', 'Full molformula',
				'Hba lipinski', 'Hbd lipinski', 'Cross ref'
			];











			var table1 = $('#results').DataTable({
				"bSort": false,
  "pageLength":  25,

				//  columnDefs: [{
				// targets: '_all',
				// createdCell: createdCell
				// }]
				//,
				"aaData": jArray,
				"fixedHeader": {
					header: true,
				},
				  "autoWidth": false,


				dom: 'Bfrtip',
				// buttons: [
				//    'excel'
				// ]
				//responsive: 'true',
				"scrollX": true,
				//   data: alldic,
				deferRender: true,
				scrollY: 450,
				scrollCollapse: true,
				scroller: true,
				"columns": [
				    {
						data: 0
					},
					{
						data: 1
					},
					{
						data: 2
					},
					{
						data: 3
					},
					{
						data: 4
					},
					{
						data: 5
					},

					{
						data: 25
					},
					{
						data: 6
					},
					{
						data: 7
					},
					{
						data: 8
					},
					{
						data: 9
					},
					{
						data: 10
					},
					{
						data: 11
					},
					{
						data: 12
					},
					{
						data: 13
					},
					{
						data: 14
					},
					{
						data: 15
					},
					{
						data: 16
					},
					{
						data: 17
					},
					{
						data: 18
					},
					{
						data: 19
					},
					{
						data: 20
					},
					{
						data: 21
					},
					{
						data: 22
					},
					{
						data: 23
					},
					{
						data: 24
					},
					{
						data: 26
					}

				],
				columnDefs: [{
						width: 350,
						targets: 1
					},
					{width: 200,
						targets: [0,1,2,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]
					},

						{width: 350,
						targets: 4
					},
						{width: 160,
						targets: 7
					},

					{
						width: 700,
						targets: 5
					},

					{
						width: 700,
						targets: [6,3]
					},
					{
						"targets": [26],
						"visible": false,
						"searchable": false
					}
				],



				buttons: [
					// 'copy',
					{
						extend: 'excelHtml5',
						autoFilter: true,

						text: 'Export to Excel',
						className: 'btn btn-light btn-radius btn-brd grd1',
						title: '',
						exportOptions: {
							columns: [0, 1, 2, 3,4, 26,  6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,25],
							format: {
								header: function(data, columnIdx) {
									return headerdata[columnIdx];
								}
							}
						},
						customize: function(xlsx) {
							
							
console.log("just test the parameters");
console.log(filename);

console.log(storagename);

			                var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];



	$.ajax({
			url:'all_forms_data.php',
			method:"POST",
			async: false,
			data:{fname: filename ,sname:storagename},
			dataType:"json",
			success:function(data){
				console.log(data);
				console.log(Object.keys(data).length);
			console.log(data["cell_data"].length);
			console.log(data["an_data"]);
			console.log(data["expr_data"]);
			
			                var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
							//test(source);
							source.setAttribute('name', 'MICHA_Table1');
							var sheet = xlsx.xl.worksheets['sheet1.xml'];
console.log("for exporting");

							if (data["cell_data"].length > 0 || data["an_data"].length > 0 || data["expr_data"].length > 0) {

								//=====================================================================
								//sheet 2 getElementsByTagName('Override')[1] index 1
								//=====================================================================
								var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[1];
								var clone = source.cloneNode(true);
								clone.setAttribute('PartName', '/xl/worksheets/sheet2.xml');
								xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone);
								//=====================================================================
								//sheet 3
								//=====================================================================
								var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[2];
								var clone1 = source.cloneNode(true);
								clone1.setAttribute('PartName', '/xl/worksheets/sheet3.xml');
								xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone1);
								//=====================================================================
								//sheet 4
								//=====================================================================
								var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[3];
								var clone1 = source.cloneNode(true);
								clone1.setAttribute('PartName', '/xl/worksheets/sheet4.xml');
								xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone1);
								//=====================================================================
								//Add sheet relationship to xl/_rels/workbook.xml.rels => Relationships
								//=====================================================================
								var source = xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationship')[0];
								var clone = source.cloneNode(true);
								clone.setAttribute('Id', 'rId3');
								clone.setAttribute('Target', 'worksheets/sheet2.xml');
								xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone);
								//=====================================================================
								var clone1 = source.cloneNode(true);
								clone1.setAttribute('Id', 'rId4');
								clone1.setAttribute('Target', 'worksheets/sheet3.xml');
								xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone1);
								//=====================================================================
								var clone2 = source.cloneNode(true);
								clone2.setAttribute('Id', 'rId5');
								clone2.setAttribute('Target', 'worksheets/sheet4.xml');
								xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone2);
								//=====================================================================
								//=====================================================================
								//Add second sheet to xl/workbook.xml => <workbook><sheets>
								//=========================================================
								var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
								var clone = source.cloneNode(true);
								clone.setAttribute('name', 'Cell_line_Table_2');
								clone.setAttribute('sheetId', '2');
								clone.setAttribute('r:id', 'rId3');
								xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone);

								var clone1 = source.cloneNode(true);
								clone1.setAttribute('name', 'Experiment_Table_3');
								clone1.setAttribute('sheetId', '3');
								clone1.setAttribute('r:id', 'rId4');
								xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone1);

								var clone1 = source.cloneNode(true);
								clone1.setAttribute('name', 'Analysis_Table_4');
								clone1.setAttribute('sheetId', '4');
								clone1.setAttribute('r:id', 'rId5');
								xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone1);

								//=====================================================================
								//=====================================================================
								//=====================================================================
								//=====================================================================
								/******************************** Form 1 Cell line table *******************************************************************************/
								var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' +
									'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">' +
									'<cols >' +
									'<col min="1" max="1" width="4.7" customWidth="1"/>' +
									'<col min="2" max="2" width="7.7" customWidth="1"/>' +
									'</cols>' +
									'<sheetData>';
								// add the header row in the excel file


								newSheet += '<row  r="' + 1 + '">' +
									'<c t="inlineStr" r="A' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_line_name' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="B' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_line_provenance' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="C' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'ID' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="D' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_type' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="E' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_line organism' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="F' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Passage_number' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="G' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Modifications' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="H' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Age' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="I' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Sex' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="J' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Diagnosis' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="K' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Sample_material' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="L' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Date_of_evaluation' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="M' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Date_of_sampling' + '</t>' +
									'</is>' +
									'</c>' +
									'</row>';




								// get the data for the table and add it
								rowCounter = 2;
								var colindex = 0;
								
								data["cell_data"].forEach(function(entry) {
									console.log(entry);
								//});

								//t.rows().every(function(rowIdx, tableLoop, rowLoop) {
									//var data = this.data();
									console.log("Cell_line_form");
									colindex = 0;
									//console.log(t.cell(rowIdx,colindex++).nodes().to$().find('input').val());
									//console.log(data);
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="G' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="H' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="I' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="J' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="K' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="L' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="M' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>'  +
										'</row>';
									rowCounter++;

									// ... do something with data(), or this.node(), etc
								});

								newSheet += '</sheetData>' +

									'</worksheet>';
									
									console.log(newSheet);
								xlsx.xl.worksheets['sheet2.xml'] = $.parseXML(newSheet);

                        


								var sheet = xlsx.xl.worksheets['sheet2.xml'];

								var lastCol = sheet.getElementsByTagName('col').length - 1;
								console.log("last col");
								console.log(lastCol);
								var colRange = createCellPos(lastCol) + '1';
								//Has to be done this way to avoid creation of unwanted namespace atributes.
								var afSerializer = new XMLSerializer();
								var xmlString = afSerializer.serializeToString(sheet);
								var parser = new DOMParser();
								var xmlDoc = parser.parseFromString(xmlString, 'text/xml');
								var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main', 'autoFilter');
								var filterAttr = xmlDoc.createAttribute('ref');
								filterAttr.value = 'A1:M1';
								xlsxFilter.setAttributeNode(filterAttr);
								sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);
								console.log("line 2395");


								$('row:first c', sheet).attr('s', '2');
								var col = $('col', sheet);
								col.each(function() {
									$(this).attr('width', 30);
								});

								$(col[3]).attr('width', 30);
								$(col[3]).attr('width', 30);
								$(col[4]).attr('width', 30);
								$(col[5]).attr('width', 30);
								$(col[6]).attr('width', 30);
								$(col[7]).attr('width', 30);
								$(col[8]).attr('width', 30);
								$(col[9]).attr('width', 30);
								$(col[10]).attr('width', 30);
								$(col[11]).attr('width', 30);
								$(col[12]).attr('width', 30);
								$(col[13]).attr('width', 30);
								$(col[14]).attr('width', 30);
								$(col[15]).attr('width', 30);
								
								
				//=====================================================================
								//=====================================================================
								//=====================================================================
								//=====================================================================
								/******************************** Form 2 Experiment table *******************************************************************************/
								var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' +
									'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">' +
									'<cols >' +
									'<col min="1" max="1" width="4.7" customWidth="1"/>' +
									'<col min="2" max="2" width="7.7" customWidth="1"/>' +
									'</cols>' +
									'<sheetData>';






								newSheet += '<row  r="' + 1 + '">' +
									'<c t="inlineStr" r="A' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + ' ' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="B' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Assay format' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="C' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Assay test type' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="D' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Detection technology' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="E' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Endpoint mode' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="F' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Medium' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="G' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Plate type' + '</t>' +
									'</is>' +
									'</c>' +
									//'<c t="inlineStr" r="       N' + 1 + '" s="3">' +
									//'<is>' +
									//'<t>' + 'Measurement' + '</t>' +
									//'</is>' +
									//'</c>' +
									'<c t="inlineStr" r="H' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_density_at_plating' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="I' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Time_of_treatment' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="J' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'dilution_fold' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="K' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'vehicle' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="L' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'method_dispensation' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="M'  + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'volume_per_well' + '</t>' +
									'</is>' +
									'</c>' +									
									'</row>';



								rowCounter = 2;
								var colindex = 0;
								
								data["expr_data"].forEach(function(entry) {
									//console.log(entry);
									
									console.log("expr_data_form");
									console.log(entry);

								//t2.rows().every(function(rowIdx, tableLoop, rowLoop) {
									//var data = this.data();
									//console.log(data);
									colindex = 0;
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + '' + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="G' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="H' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="I' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="J' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										
										'<c t="inlineStr" r="K' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="L' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="M' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										//'<c t="inlineStr" r="N' + rowCounter + '" s="3">' +
										//'<is>' +
										//'<t>' + entry[colindex++] + '</t>' +
										//'</is>' +
										//'</c>' +
										'</row>';
									rowCounter++;

									// ... do something with data(), or this.node(), etc
								});

								newSheet += '</sheetData>' +'</worksheet>';
								xlsx.xl.worksheets['sheet3.xml'] = $.parseXML(newSheet);

								var sheet = xlsx.xl.worksheets['sheet3.xml'];

								$('row:first c', sheet).attr('s', '2');



								var lastCol = sheet.getElementsByTagName('col').length - 1;
								console.log("last col");
								console.log(lastCol);
								var colRange = createCellPos(lastCol) + '1';
								//Has to be done this way to avoid creation of unwanted namespace atributes.
								var afSerializer = new XMLSerializer();
								var xmlString = afSerializer.serializeToString(sheet);
								var parser = new DOMParser();
								var xmlDoc = parser.parseFromString(xmlString, 'text/xml');
								var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main', 'autoFilter');
								var filterAttr = xmlDoc.createAttribute('ref');
								filterAttr.value = 'A1:N1';
								xlsxFilter.setAttributeNode(filterAttr);
								sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);


								var col = $('col', sheet);
								col.each(function() {
									$(this).attr('width', 30);
								});

								$(col[3]).attr('width', 30);
								$(col[3]).attr('width', 30);
								$(col[4]).attr('width', 30);
								$(col[5]).attr('width', 30);
								$(col[6]).attr('width', 30);
								$(col[7]).attr('width', 30);
								$(col[8]).attr('width', 30);
								$(col[9]).attr('width', 30);
								$(col[10]).attr('width', 30);





								//=====================================================================
								//=====================================================================
								//=====================================================================
								//=====================================================================
								/******************************** Form 3 Analysis table *******************************************************************************/

								var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' +
									'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">' +
									'<cols >' +
									'<col min="1" max="1" width="4.7" customWidth="1"/>' +
									'<col min="2" max="2" width="7.7" customWidth="1"/>' +
									'</cols>' +
									'<sheetData>';


								newSheet += '<row  r="' + 1 + '">' +
									//'<c t="inlineStr" r="    E' + 1 + '" s="3">' +
									//'<is>' +
									//'<t>' + 'Analysis_Normalization' + '</t>' +
									//'</is>' +
									//'</c>' +
									//'<c t="inlineStr" r="' + 1 + '" s="3">' +
									//'<is>' +
									//'<t>' + 'Analysis_Formulas' + '</t>' +
									//'</is>' +
									//'</c>' +
									'<c t="inlineStr" r="A' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis reference' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="B' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis metric' + '</t>' +
									'</is>' +
									'</c>' +
									//'<c t="inlineStr" r="' + 1 + '" s="3">' +
									//'<is>' +
									//'<t>' + 'Analysis_pipeline_name' + '</t>' +
									//'</is>' +
									//'</c>' +
									//'<c t="inlineStr" r="F' + 1 + '" s="3">' +
									//'<is>' +
									//'<t>' + 'Analysis_pipeline_Address' + '</t>' +
									//'</is>' +
									//'</c>' +
									'<c t="inlineStr" r="C' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'min_concentration' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="D' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'max_concentration' + '</t>' +
									'</is>' +
									'</c>' +
									
									'</row>';

								rowCounter = 2;
								var colindex = 0;
								data["an_data"].forEach(function(entry) {
									//console.log(entry);
									
									console.log("expr_data_form");
									colindex = 0;
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										/*'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="G' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="H' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + entry[colindex++] + '</t>' +
										'</is>' +
										'</c>' +*/
										
										'</row>';
									rowCounter++;

									// ... do something with data(), or this.node(), etc
								});

								newSheet += '</sheetData>' +

									'</worksheet>';
								xlsx.xl.worksheets['sheet4.xml'] = $.parseXML(newSheet);
								var sheet = xlsx.xl.worksheets['sheet4.xml'];
								$('row:first c', sheet).attr('s', '2');



								var lastCol = sheet.getElementsByTagName('col').length - 1;
								console.log("last col");
								console.log(lastCol);
								var colRange = createCellPos(lastCol) + '1';
								//Has to be done this way to avoid creation of unwanted namespace atributes.
								var afSerializer = new XMLSerializer();
								var xmlString = afSerializer.serializeToString(sheet);
								var parser = new DOMParser();
								var xmlDoc = parser.parseFromString(xmlString, 'text/xml');
								var xlsxFilter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main', 'autoFilter');
								var filterAttr = xmlDoc.createAttribute('ref');
								filterAttr.value = 'A1:H1';
								xlsxFilter.setAttributeNode(filterAttr);
								sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);

								var col = $('col', sheet);
								col.each(function() {
									$(this).attr('width', 30);
								});

								$(col[3]).attr('width', 30);
								$(col[3]).attr('width', 30);
								$(col[4]).attr('width', 30);
								$(col[5]).attr('width', 30);
								$(col[6]).attr('width', 30);


				
console.log("success");

								//=====================================================================
								//=====================================================================
								//=====================================================================
								//=====================================================================
							}			
			
			
			
			
			}
		})







						},

					} //, 'pdf'
				]
			});




$('#ExportReporttoExcel').on('click', function() {
  $('.buttons-excel').click()
});
$('#ExportReporttoExcel_new').on('click', function() {
  $('.buttons-excel').click()
});
			document.getElementsByClassName('dt-buttons')[0].style.display = "none";
			document.getElementById('results_filter').style.display = "none";


	








		



			// here you get all data filled in input texts in all forms

			 </script>

<?php
	//print_r($alldic);
    //echo "</tbody></table>";
  } else {
    echo SimpleXLSX::parseError();
  }






}}


