<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    ini_set('memory_limit', '-1');
    ini_set('../session.cookie_lifetime', 1308800.00016); // 15 days session will stay
	include("../database.class.php");	//Include MySQL database class
	include("../mysql.sessions.php");	//Include PHP MySQL sessions
	$session = new Session();	//Start a new PHP MySQL session
	
	//echo exec('whoami'); 
	header('Cache-Control: no cache'); //no cache
	//session_cache_limiter('private_no_expire'); // works
	date_default_timezone_set('Europe/Helsinki');
	
	if (session_status() == PHP_SESSION_NONE) {
			ini_set('session.cookie_lifetime', 1308800.00016);
			//   session_start();
	}

	echo session_id();
	$alldic=[];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MICHA</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 


<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="jehad_css.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}




        <!-- jQuery code to show the working of this method -->
        $(document).ready(function() { 
            $("#templatemo_content_top").click(function() { 
                //$(this).fadeOut();
console.log("sdsdsdsss");
    $('html,body').animate({
        scrollTop: $(".moveto").offset().top},
        'slow');


	document.getElementById("style1").style.display = "none";
	document.getElementById("style2").style.display = "none";
	document.getElementById("style3").style.display = "none";
	document.getElementById("style_upload").style.display = "block";

                 				
            }); 
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

    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">-->
    <script lang="javascript" src="../new/js/xlsx.full.min.js"></script>
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





<style>

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
    
        <ul>
            <li><a href="#" class="current">Home</a></li>
            <li><a href="about/">About</a></li>
            <li><a href="glossary/">Glossary</a></li>
			<li><a href="#">Protocols</a></li>
            <li><a href="#">API</a></li>
            <li><a href="#">Contact</a></li>
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
			
			
            <div class="cleaner_h20"></div>
            
        </div>
        
        <div id="banner_right">
        
        	<div class="banner_button" data-toggle="collapse" data-target="#templatemo_content">
            	<a href="index.html" id="templatemo_content_top">Back</a>
            </div>
            
            <div class="banner_button">
            	<a  href="#" id="ExportReporttoExcel">Download Results</a>
            </div>
            
            <div class="banner_button">
            	<a href="#">Annotate data</a>
            </div>
        
        </div>
        
    </div> <!-- end of templatemo_banner -->
    
    <div id="templatemo_content_top" class="moveto"></div>
	
    <div id="templatemo_content">
    
        <div class="section_w940">
		
		
		
		
		
		
		
		
		
	<!------------------------------------------------->
    <!------------- Exper_form_table------------------->	
	<!------------------------------------------------->
	<!------------------------------------------------->
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
				</div>
			</div>
		</div>
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
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->
	<!------------------------------------------------->



	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!-------------------------------Upload file----------------------------------------------->
		<!----------------------------------------------------------------------------------------->
		   <div class="box margin_r30 box_border" id="style_upload" style="width: 900px;border-right: 0px dotted #999;display:none;">
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
						other_potent_target_ids
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
						mw_freebase
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
		<div class="section_w240">
			<h3></h3>
			<div class="sub_content">
				<ul class="footer_list ">
					<li>
						Copyright © 2020 <a style="color:blue;" href="https://www.helsinki.fi/en/researchgroups/network-pharmacology-for-precision-medicine">Netphar</a>
					</li>
					<li>Email: jing.tang@helsinki.fi</li>
				</ul>
			</div>
		</div>
		<div class="section_w240">
			<h3></h3>
		</div>
		<div class="section_w240">
			<h3>Partners</h3>
			<div class="sub_content">
				<ul class="footer_list numbering">
					<li><a href="https://www.fimm.fi/">Institue For Molecular Medicine, University of Helsinki (FIMM-UH)</a></li>
					<li><a href="https://www.imtm.cz/">Institute of Molecular and Translational Medicine (IMTM)</a></li>
					<li><a href="https://www.marionegri.it/">Mario Negri Institute for Pharmacological Research (MN)</a></li>
					<li><a href="https://eatris.eu/">European Infrastructure for Translational Medicine (EATRIS)</a></li>
				</ul>
			</div>
		</div>
		<div class="section_w240">
			<h3>Cool Links</h3>
			<div class="sub_content">
				<ul class="footer_list ">
					<li><a href="https://drugcomb.fimm.fi/" style="color:blue;">DrugComb</a></li>
					<li><a href="http://drugtargetcommons.fimm.fi/" style="color:blue;">DrugTargetCommons</a></li>
				</ul>
			</div>
		</div>
	</div>
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
        move_uploaded_file($_FILES["file"]["tmp_name"], "../updated/sample_data/".$F);
        //$name = $_FILES['file']['name'];


?>

<script src="js/ajax_analysis.js"></script>	


<script type="text/javascript">var filename = "<?= $filename ?>";</script>
<script type="text/javascript">var storagename = "<?= $storagename ?>";</script>

<script src="js/ajax_expr.js?version=5"></script>	
<script src="js/ajax_cell.js"></script>	


<?php





		include "../SimpleXLSX.php";


          //echo '<h1>Your input file</h1><pre>';
		if ( $xlsx = SimpleXLSX::parse("../updated/sample_data/".$F) ) {
			//echo '<table><tbody>';
			$i = 0;
			$arrayallrows=[];
			$m_assoc_array = array();//associative array
			$m_assoc_array_drug_indication = array();//associative array
			$m_assoc_array_cross_ref = array();//associative array
			$m_assoc_array_cross_ref_ids = array();//associative array

			$m_assoc_array_structure = [];

			//print_r($xlsx->rows());
			//get all inchikey in the file without any for loop
			$inchikeysall = array_slice(array_column($xlsx->rows(), '1'),1);

            //echo strtolower($xlsx->rows()[0][0]);
            //echo strtolower($xlsx->rows()[0][1]);


			if(count($inchikeysall) <= 5000){


			}else{

				echo "It is not allowed to submit more than 5k inchi keys.";

			}

		    $compund_names=[];


			foreach ($xlsx->rows() as $elt) {
				if ($i == 0) {
					 //echo "header file"."\n";
					//echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th></tr>"."\n";
				} else {

				$arrayinc=[];

			   // echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td></tr>";

				array_push($arrayallrows,$elt[1]);
				array_push($arrayinc,$elt[0]);
				array_push($arrayinc,$elt[1]);

				$key=$elt[1];

				$m_assoc_array_drug_indication[$elt[1]] = [];//adding a couple key-value
				$m_assoc_array_cross_ref[$elt[1]] = [];//adding a couple key-value
						$m_assoc_array_cross_ref_ids[$elt[1]] = [];//adding a couple key-value

				$compund_names[$elt[1]] = $elt[0];

					//echo $key.'\n';

					////  $url = 'https://www.ebi.ac.uk/unichem/rest/verbose_inchikey/'.$key;
				//$result = file_get_contents($url);
				// Will dump a beauty json :3
				//var_dump(json_decode($result, true));
				//$test=json_encode($result);
				//$finaljsonob=json_decode($result,true); // send data as json format
				//echo gettype ($finaljsonob);
				///echo $finaljsonob;
				//echo $finaljsonob->{'src_compound_id'};
				//echo $finaljsonob[0]['src_compound_id'][0]."\n";


				//$m_assoc_array_structure[$elt[1]]='<img width="200px" height="200px" src="https://www.ebi.ac.uk/chembl/api/data/image/'.$finaljsonob[0]['src_compound_id'][0] . '"/>';
					//echo "**************chemblid********************"."\n";
				   // $chemblid=$finaljsonob[0]['src_compound_id'][0]."\n";
				   // echo $finaljsonob[0]['src_compound_id'][0]."\n";
					//echo "**************chemblid********************"."\n";
				//print_r($m_assoc_array['key3']);

			/*
			   $contact_name='';
			   foreach($finaljsonob as $i => $item) {
				//echo $finaljsonob[$i]['base_id_url']."\n";
				//echo $finaljsonob[$i]['src_compound_id'][0]."\n";
				//echo $finaljsonob[$i]['name_label']."\n";
				$contact_name = $contact_name."<a target='_blank' href='".$finaljsonob[$i]['base_id_url'] .$finaljsonob[$i]['src_compound_id'][0] . "'" . ">"
							   . $finaljsonob[$i]['name_label'] . "</a>" . ", " ;

				}
				$m_assoc_array[$elt[1]] = $contact_name;//adding a couple key-value
				*/
				// echo $contact_name;
				// array_push($arrayinc,$contact_name);
				//$alldic[$i]=$arrayinc;
				//print_r($arrayinc );

			  }
			  $i++;
			}


			$dbconn = pg_connect("host=192.168.4.173 dbname=compounds_20 user=fimm password=pxqgBsFLTwTzc")
				or die('Could not connect: ' . pg_last_error());

				//$userStr = implode("', '", $arrayallrows);
				$userStr = implode("', '", $inchikeysall);
				//print_r($userStr);


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




	/*
		foreach ($line as $col_value) {
			//print_r($line['standard_inchi_key']);
		   // echo "<td>$col_value</td>\n";
			 //echo '<td>'.$col_value.' </td>';
			 if($col_value){
			 array_push($arr23,$col_value);
			 }else{
				 array_push($arr23,"");
			 }
		}*/
				//echo '</tr>';
				//echo "****************************************\n";
				$alldic[$i++]=$arr23;
				// echo "</tr>\n";
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
	
	//print_r($all_forms_data);
//print_r("*************** id*******");
//echo '<br>';
//echo session_id();

		if(isset($_SESSION['uploaded_files'])){
                  // print_r( "yes is defined");
		           //array_push($_SESSION['uploaded_files'],$F); // Items added to cart
        //print_r($_SESSION['uploaded_files']);
		                  //  array_push($_SESSION['uploaded_files'],$alldic);
			$_SESSION['uploaded_files'][$filename]=array();
			$_SESSION['uploaded_files'][$filename]['date']=date('Y-m-d H:i:s');
			$_SESSION['uploaded_files'][$filename]['data']=$alldic;
			$_SESSION['uploaded_files'][$filename]['fname']=$storagename;
			$_SESSION['uploaded_files'][$filename]['forms_data']=$all_forms_data;
			
	
                   // array_push($_SESSION['uploaded_files'],[$F,date(DATE_RFC822, filemtime("updated/sample_data/". $F))]);

	    }else{
			
			$_SESSION['uploaded_files']=array();
			
			$_SESSION['uploaded_files'][$filename]=array();
			$_SESSION['uploaded_files'][$filename]['date']= date('Y-m-d H:i:s');
			$_SESSION['uploaded_files'][$filename]['data']=$alldic;
			$_SESSION['uploaded_files'][$filename]['fname']=$storagename;
			$_SESSION['uploaded_files'][$filename]['forms_data']=$all_forms_data;



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

			var jArray = <?php echo json_encode($alldic); ?> ;

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
							var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
							source.setAttribute('name', 'MICHA_Table1');



							var sheet = xlsx.xl.worksheets['sheet1.xml'];


							if (t2 && t3 && t) {

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
									'<c t="inlineStr" r="N' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + '' + '</t>' +
									'</is>' +
									'</c>' +
									'</row>';

								// get the data for the table and add it
								rowCounter = 2;
								var colindex = 0;
								t.rows().every(function(rowIdx, tableLoop, rowLoop) {
									var data = this.data();
									console.log("Just as a test");
									colindex = 0;
									//console.log(t.cell(rowIdx,colindex++).nodes().to$().find('input').val());
									console.log(data);
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="G' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="H' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="I' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="J' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="K' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="L' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="M' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="N' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'</row>';
									rowCounter++;

									// ... do something with data(), or this.node(), etc
								});

								newSheet += '</sheetData>' +

									'</worksheet>';
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
								filterAttr.value = 'A1:N1';
								xlsxFilter.setAttributeNode(filterAttr);
								sheet.getElementsByTagName('worksheet')[0].appendChild(xlsxFilter);




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
								//$(col[16]).attr('width', 30);
								//$(col[17]).attr('width', 30);
								//$(col[18]).attr('width', 30);
								//$('row:nth-child(1) c:nth-child(4)', sheet).attr('s','51');



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
									'<t>' + 'Assay Name' + '</t>' +
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
									'<c t="inlineStr" r="H' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Measurement' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="I' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Cell_density_at_plating' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="J' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Time_of_treatment' + '</t>' +
									'</is>' +
									'</c>' +
									'</row>';

								rowCounter = 2;
								var colindex = 0;
								t2.rows().every(function(rowIdx, tableLoop, rowLoop) {
									var data = this.data();
									//console.log(data);
									colindex = 0;
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('select').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('select').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('select').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('select').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="G' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="H' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="I' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="J' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t2.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'</row>';
									rowCounter++;

									// ... do something with data(), or this.node(), etc
								});

								newSheet += '</sheetData>' +

									'</worksheet>';
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
								filterAttr.value = 'A1:J1';
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
								//$(col[11]).attr('width', 30);
								//$('row:nth-child(1) c:nth-child(4)', sheet).attr('s','51');



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
									'<c t="inlineStr" r="A' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis_Normalization' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="B' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis_Formulas' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="C' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Citation' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="D' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Result' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="E' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis_pipeline_name' + '</t>' +
									'</is>' +
									'</c>' +
									'<c t="inlineStr" r="F' + 1 + '" s="3">' +
									'<is>' +
									'<t>' + 'Analysis_pipeline_Address' + '</t>' +
									'</is>' +
									'</c>' +
									'</row>';

								rowCounter = 2;
								var colindex = 0;
								t3.rows().every(function(rowIdx, tableLoop, rowLoop) {
									var data = this.data();
									colindex = 0;
									console.log(data);
									newSheet += '<row  r="' + rowCounter + '">' +
										'<c t="inlineStr" r="A' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="B' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="C' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="D' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="E' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
										'<c t="inlineStr" r="F' + rowCounter + '" s="3">' +
										'<is>' +
										'<t>' + t3.cell(rowIdx, colindex++).nodes().to$().find('input').val() + '</t>' +
										'</is>' +
										'</c>' +
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
								filterAttr.value = 'A1:F1';
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
								//$('row:nth-child(1) c:nth-child(4)', sheet).attr('s','51');

								//=====================================================================
								//=====================================================================
								//=====================================================================
								//=====================================================================
							}




						},

					} //, 'pdf'
				]
			});




$('#ExportReporttoExcel').on('click', function() {
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


