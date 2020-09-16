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

    <!-- DataTable Libaraies -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">

    <link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css?version=4" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>






	

    <script language="javascript" type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>
	<style>
		a:hover{
			text-decoration: none;
		}
		
	







	#banner_right::-webkit-scrollbar {
    width: 12px;
}
 
/* Track */
#banner_right::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
#banner_right::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: 	#ffd39b;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
#banner_right::-webkit-scrollbar-thumb:window-inactive {
	background: 	#ffd39b;
}	

	
	</style>
	<script>
	$(document).ready(function() {
		
		var s_name='Fraunhofer IME';
		
		/*
		
		select * from fimm.micha_protocols where protocol_name='Covid19' and study_title='Fraunhofer IME'
7:21
select * from fimm.micha_protocols where protocol_name='Covid19' and study_title='SARS-CoV-2, Nature,2020'
7:22
select * from fimm.micha_protocols where protocol_name='Covid19' and study_title='NCATS'

*/
		
		
		    //cell line 
			var jArray = <?php echo json_encode($alldic); ?> ;
			var table1 = $('#results_1').DataTable({
							
        serverSide: true,
       // autoWidth: false, // as I chane it myself below
        pageLength: 10, // default is 5 to be shown
       // scrollX: true,
        //"order": [[ 0, "desc" ]],
		  'ajax': {
			url: "covid19_data.php",
			//type:"POST",  
			"data"   : function( d ) {
				
				d.action_c=s_name;
				d.type='cell'
               				
			},
			        beforeSend: function(){
          $('#results_1 > tbody').html(
            '<tr class="odd">' +
              '<td valign="top" colspan="6" class="dataTables_empty">Loading&hellip;</td>' +
            '</tr>'
          );
        }


    },				//"fixedHeader": {
				//header: true,
				//},
				//"autoWidth": false,
				
				responsive: 'true',
				deferRender: true,
				"scrollX": true		,		
				"bjQueryUI" : true,

            });
			


			
			
			
			//results 2 expr
			

			var jArray2 = <?php echo json_encode($alldic); ?> ;
			var table2 = $('#results_2').DataTable({
								/*"aoColumnDefs": [ {
                        "aTargets": [ 0 ],
                        "mRender":function (data, type, full) {
							console.log("hi print");
							console.log(data[0]);
							if(data[0]){
															console.log("not comng");

							return data.toString().match(/\d+(\.\d{1,2})?/g)[0];}else{
								return '';
								
							}
}

                    }],*/



				        serverSide: true,
       // autoWidth: false, // as I chane it myself below
        pageLength: 10, // default is 5 to be shown
       // scrollX: true,


						  'ajax': {
			url: "covid19_data.php",
			//type:"POST",  
			"data"   : function( d ) {
				
				d.action_c=s_name;  
								d.type='expr'

			},
			        beforeSend: function(){
          $('#results_2 > tbody').html(
            '<tr class="odd">' +
              '<td valign="top" colspan="6" class="dataTables_empty">Loading&hellip;</td>' +
            '</tr>'
          );
        }


    },				//"fixedHeader": {

				"fixedHeader": {
				header: true,
				},
				"autoWidth": false,
				
				//responsive: 'true',
				deferRender: true,
				"scrollX": true,
            });
			
			
	
			
			//analysis

			var jArray3 = <?php echo json_encode($alldic); ?> ;

			var table3 = $('#results').DataTable({
				
				//"aoColumnDefs": [ {
                        //"aTargets": [ 0,1 ],
                        //"mRender":function (data, type, full) {
							//if(data[0] && data[1]){
							//return data.toString().match(/\d+(\.\d{1,2})?/g)[0];}else{
							//	return '';
						//}}

                   // }],


				        serverSide: true,
       // autoWidth: false, // as I chane it myself below
        pageLength: 10, // default is 5 to be shown
       // scrollX: true,



					  'ajax': {
			url: "covid19_data.php",
			//type:"POST",  
			"data"   : function( d ) {
												d.type='analysis',

				d.action_c=s_name;  
			},
			        beforeSend: function(){
          $('#results > tbody').html(
            '<tr class="odd">' +
              '<td valign="top" colspan="6" class="dataTables_empty">Loading&hellip;</td>' +
            '</tr>'
          );
        }


    },				//"fixedHeader": {

				
				responsive: 'true',
				deferRender: true,
            });
			
			
			//compound
			
		
			var jArray4 = <?php echo json_encode($alldic); ?> ;

			var table4 = $('#results_comp').DataTable({
				        serverSide: true,
       // autoWidth: false, // as I chane it myself below
        pageLength: 10, // default is 5 to be shown
       // scrollX: true,


						  'ajax': {
			url: "covid19_data.php",
			//type:"POST",  
			"data"   : function( d ) {
				d.type='compound',

				d.action_c=s_name;  
			},
			        beforeSend: function(){
          $('#results_comp > tbody').html(
            '<tr class="odd">' +
              '<td valign="top" colspan="6" class="dataTables_empty">Loading&hellip;</td>' +
            '</tr>'
          );
        }


    },				//"fixedHeader": {

				responsive: 'true',
				deferRender: true,
            });
			
			


			//Here is correct as it will created after the datable initialized, otherwise you will get an error 
			//document.getElementsByClassName('dt-buttons')[0].style.display = "none";
			//document.getElementById('results_filter').style.display = "none";
			
			$('#FIMM_pro').click(function(e) {
							$('#sname').text("Fraunhofer IME");

				s_name='Fraunhofer IME';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();

						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();
			$('#pro_text').text("Fraunhofer IME developped a drug screen protocol that was reported in"+ 
			"Identification of inhibitors of SARS-CoV-2 in-vitro cellular toxicity in human"+
			"(Caco-2) cells using a large scale drug repurposing collection"
								);
			//$('#pro_text').css('text-align','justify');
			console.log("FIMM_pro");
			$('.noHover').attr("href", "https://www.researchsquare.com/article/rs-23951/v1");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});
			
			
			
			$('#SARS-CoV-2').click(function(e) {
				
				s_name='SARS-CoV-2, Nature,2020';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();


						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();
			
			/*In this study we identify 66 druggable human proteins or host factors targeted by 69 
			compounds (29 FDA-approved drugs, 12 drugs in clinical trials, and 28 preclinical compounds).
			Screening a subset of these in multiple viral assays identified two sets of pharmacological
			agents that displayed antiviral activity: inhibitors of mRNA translation and predicted 
			regulators of the Sigma1 and Sigma2 receptors. */

			$('#sname').text("SARS-CoV-2, Nature,2020");


			$('#pro_text').text("To identify small molecules targeting human proteins in the SARS-CoV-2 interactome, we sought ligands known to interact with the human proteins, often directly but also by pathway and complexes. Molecules were prioritised by the statistical significance of the interaction between the human and viral proteins");
			//$('#pro_text').css('text-align','justify');
			console.log("SARS-CoV-2");
			$('.noHover').attr("href", "https://www.nature.com/articles/s41586-020-2286-9");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});
			
			
			
			
				$('#NCATS').click(function(e) {
				
				s_name='NCATS';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();


						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();

			$('#sname').text("NCATS");
			
			$('#pro_text').text("NCATs uses live SARS-CoV-2 virus and measures the ability of compounds to reverse viral-induced CPE in Vero E6 host cells. Viral infection and replication leads to a loss of host cell viability, which is indirectly measured by an endpoint assessment of host cell viability after 72 hours. Compounds with antiviral activity protect the host cells from viral-induced CPE, thereby increasing viability.");
			//$('#pro_text').css('text-align','justify');
			//console.log("SARS-CoV-2");
			$('.noHover').attr("href", "https://opendata.ncats.nih.gov/covid19/");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});
		
			
			
			
			
				$('#Sangeun_Jeon').click(function(e) {
				
				s_name='Sangeun Jeon et al.';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();


						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();

			$('#sname').text("Sangeun Jeon et al.");
			
			$('#pro_text').text("Identified 24 drugs which exhibited antiviral efficacy against SARS-CoV-2. In particular, two FDA-approved drugs-niclosamide and ciclesonide– were notable in some respects. These drugs will be tested in an appropriate animal model for their antiviral activities. In near future, these already FDA-approved drugs could be further developed following clinical trials in order to provide additional therapeutic options for patients with COVID-19.");
			//$('#pro_text').css('text-align','justify');
			//console.log("SARS-CoV-2");
			$('.noHover').attr("href", "https://www.biorxiv.org/content/10.1101/2020.03.20.999730v3");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});			
			
			
				$('#Franck_Touret').click(function(e) {
				
				s_name='Franck Touret et al.';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();


						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();

			$('#sname').text("Franck Touret et al.");
			
			$('#pro_text').text("The compound hits were sorted according to their chemical composition and their known therapeutic effect, then EC50 and CC50 were determined for a subset of compounds. Several drugs, such as Azithromycine, Opipramol, Quinidine or Omeprazol present antiviral potency with 2<EC50<20µM.     "+
			" By providing new information on molecules inhibiting SARS-CoV-2 replication in vitro, this study could contribute to the short-term repurposing of drugs against Covid-19     "
			);
			//$('#pro_text').css('text-align','justify');
			//console.log("SARS-CoV-2");
			$('.noHover').attr("href", "https://www.nature.com/articles/s41598-020-70143-6");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});			
		
				$('#Stuart_Weston').click(function(e) {
				
				s_name='Stuart Weston et al.';
				table1.ajax.reload();
				table2.ajax.reload();
				table3.ajax.reload();
				table4.ajax.reload();


						    document.getElementById("general_text").style.display = "none";
						    document.getElementById("Fraunhofer_IME").style.display = "inline-block";

				console.log("text changed");
			e.preventDefault();

			$('#sname').text("Stuart Weston et al.");
			
			$('#pro_text').text("20 FDA approved drugs are tested for antiviral activity against SARS-CoV-2 that previously found to inhibit SARS-CoV and MERS-CoV. Furthermore, 17 of these also inhibit SARS-CoV-2 at a range of IC50 values at non-cytotoxic concentrations. ");
			//$('#pro_text').css('text-align','justify');
			//console.log("SARS-CoV-2");
			$('.noHover').attr("href", "https://www.biorxiv.org/content/10.1101/2020.03.25.008482v1");
		    document.getElementById("institute_link").style.display = "inline-block";
			
			});		

	});
</script>
</head>
<body>
    <div id="templatemo_wrapper">
        <div id="templatemo_site_title_bar">
            <div id="site_title">
                <h1><a href="#">
					MICHA 
			<div class="cleaner_h40"></div>
            </a></h1>
            </div>
            <ul class="social_network">
                <li>
                    <a href="https://twitter.com/NetPharMed" target="_blank"><img src="../images/twitter_icon.png" alt="twitter" /></a>
                </li>
            </ul>
        </div>
        <!-- end of templatemo_site_title_bar -->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <div id="templatemo_menu">
            <ul style="padding:0px;padding-left:15px;">
                <li><a href="../index">Home</a></li>
                <li><a href="../about/index">About</a></li>
                <li><a href="../glossary/index">Glossary</a></li>
                <li><a href="../protocols/index" >Protocols</a></li>
                <li><a href="../api">API</a></li>
                <li><a href="#" class="current">Covid-19</a></li>
                <!--<li><a href="#">Contact</a></li>-->
            </ul>
        </div>
        <!-- end of templatemo_menu -->
        <!------------------------->
        <!------------------------->
        <!------------------------->
    <div id="templatemo_search">
    
    	<div id="search_box">
<!--	<script async src="https://cse.google.com/cse.js?cx=017046730853086508825:sckkkfpde90"></script>
<div class="gcse-search"></div>-->

            <form action="compound.php" method="get">
                <input type="text" value="Enter compound name..." name="c_name" size="10" id="searchfield" title="searchfield" 
				onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>
    
    </div> <!-- end of search -->
        <!----- end of search ----->
        <!------------------------->
        <!------------------------->
        <div id="templatemo_banner">
            <div id="banner_left" style="width:600px;">
                <p id="pro_text" style="display: inline;font-size: 14.5px;">
We are working on the FAIRification of Covid19 drug screening studies. Please find the annotated compounds, 
cell lines and experimental protocols from individual studies in the right panel.
                    <span></span>
                </p>
                <div style="display:none;" id="institute_link" class="button_01">
                    <a style="margin-top: 2px;" href="" target="_blank" class='noHover'>More</a>
                </div>
            </div>
            <div id="banner_right" style="overflow-y: scroll;">
                <div class="banner_button" data-target="#templatemo_content">
                    <a href="#Fraunhofer_IME" id="FIMM_pro" style="font-size: 18px;">Fraunhofer IME</a>
                    <a href="#Fraunhofer_IME" id="SARS-CoV-2" style="font-size: 14px;">SARS-CoV-2,Nature,2020</a>
                    <a href="#Fraunhofer_IME" id="NCATS" style="font-size: 18px;">NCATS</a>
                    <a href="#Fraunhofer_IME" id="Sangeun_Jeon" style="font-size: 18px;">Sangeun Jeon et al.</a>
                    <a href="#Fraunhofer_IME" id="Franck_Touret" style="font-size: 18px;">Franck Touret et al.</a>
                    <a href="#Fraunhofer_IME" id="Stuart_Weston" style="font-size: 18px;">Stuart Weston et al.</a>
					
                </div>
            </div>
        </div>
        <!-- end of templatemo_banner -->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <div id="templatemo_content_top"></div>
        <div id="templatemo_content">
            <div class="section_w940" >
                <!------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------->
                <!----------------------------           FIMM  protocol               ----------------------------->
                <!------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------------->				
                <!------------------------------------------------------------------------------------------------->
                
				<div class="box margin_r30 box_border" style=";width: 900px;border-right: 0px dotted #999;" id="general_text">
In this box we show the annotated compounds, 
cell lines and experimental protocols for the selected study


</div>				
				<div class="box margin_r30 box_border" style="display:none;width: 900px;border-right: 0px dotted #999;" id="Fraunhofer_IME">
                    <h2 id="sname">Fraunhofer IME </h2>
                    <ul class="nav nav-tabs" role="tablist" style="margin-bottom:20px;">
                        <li class="nav-item">
                            <a class="nav-link active" href="#Compound" role="tab" data-toggle="tab">Compound</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Cell_line" role="tab" data-toggle="tab">Cell line</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Experiment" role="tab" data-toggle="tab">Experiment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Analysis" role="tab" data-toggle="tab">Analysis</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane  active" id="Compound">
                            <table id="results_comp" class="display">
                                <thead>
                                    <tr>
                                        <th>
                                            Compound name
                                        </th>
                                        <th>
                                            InchiKey
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Cell_line">
                            <div id="results_table_1">
                                <table id="results_1" class="display" style="clear:both;table-layout:fixed;width:100%;">
                                    <thead>
                                        <tr>
										
                                            <th width="188px">
                                                Cell line
                                            </th>
                                            <th width="188px">
                                                Cell line provenance
                                            </th>
                                            <th width="188px">
                                                Patient age
                                            </th>
                                            <th width="188px">
                                                Patient sex
                                            </th>
                                            <th width="188px">
                                                Patient diagnosis
                                            </th>
                                            <th width="188px">
                                                Patient_sample
                                            </th>
                                            <th width="188px">
                                                patient sample date
                                            </th>
                                            <th width="188px">
                                                Patient evaluation date
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
						
						
						
						
	
	
	
	
	
	
						
                        <div role="tabpanel" class="tab-pane fade" id="Experiment">
                            <table id="results_2" class="display" style="clear:both;table-layout:fixed;width:100%;">
                                <thead>
                                    <tr>
                                        <th width="188px">
                                            Dilution fold
                                        </th>
                                        <th width="188px">
                                            vehicle
                                        </th>
                                        <th width="188px">
                                            Experimental medium
                                        </th>
                                        <th width="188px">
                                            Plate type
                                        </th>
                                        <th width="188px">
                                            Assay format
                                        </th>
                                        <th width="188px">
                                            Assay test type
                                        </th>
                                        <th width="188px">
                                            Detection tech
                                        </th>
                                        <th width="188px">
                                            Cell density
                                        </th>
                                        <th width="188px">
                                            Method dispensation
                                        </th>
                                        <th width="188px">
                                            Volume per well
                                        </th>
                                        <th width="188px">
                                            Treatment time
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Analysis">
                            <table id="results" class="display">
                                <thead>
                                    <tr>
										
                                        <th>
                                            Min concentration
                                        </th>
                                        <th>
                                            Max concentration
                                        </th>
                                        <th>
                                            Analysis ref
                                        </th>
                                        <th>
                                            Analysis metric
                                        </th>
                                     
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                <div class="cleaner"></div>
            </div>
        </div>
        <div id="templatemo_content_bottom"></div>
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <div id="templatemo_footer" style="padding: 20px 0px;">
        </div>
        <!-- <div id="templatemo_content_bottom"></div>-->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
        <!------------------------->
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
    </div>
    <!-- end of footer -->
    </div>
    
    	<script type="text/javascript">
	   window._urq = window._urq || [];
	   _urq.push(['initSite', '1b1bafee-3533-4536-bdd8-3c02b964d2b8']);
	   (function() {
	   var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true;
	   ur.src = ('https:' == document.location.protocol ? 'https://cdn.userreport.com/userreport.js' : 'http://cdn.userreport.com/userreport.js');
	   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s);
	   })();
	</script>



</body>
</html>