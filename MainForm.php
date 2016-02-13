<!doctype html>
<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    	<title>CORE 2062 Scouting</title>
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/normalize/3.0.3/normalize.min.css" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css" />
      <link rel="stylesheet" type="text/css" href="awesomplete.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.accordion.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.tab.min.js"></script>
    <script type="text/javascript" src="awesomplete.js"></script>
		<style type="text/css">
label.RadiopPic > input{ /* HIDE RADIO */
  display: none;
}
label.RadioPic > input + img{ /* IMAGE STYLES */
  cursor: pointer;
  border: 2px solid transparent;
}
label.radiopic > input:checked + img{ /* (CHECKED) IMAGE STYLES */
  border:2px solid #FF731C;
}
input{
    text-align:center;
}
html {
    -webkit-text-size-adjust: none
}
		</style>
    <script type="text/javascript">
  function DefenseALogic(){
    switch(main.CategoryA.value){
       case "Portcullis":
         document.getElementById("DefenseAPicture").innerHTML = "<img src='images/Portcullis.PNG' width='200px'>";
         break;
       case "ChevaldeFrise":        
          document.getElementById("DefenseAPicture").innerHTML = "<img src='images/Cheval%20de%20Frise.PNG' width='200px'>";
          break;
    }
  }
  function DefenseBLogic(){
    switch(main.CategoryB.value){
       case "Ramparts":
         document.getElementById("DefenseBPicture").innerHTML = "<img src='images/Ramparts.PNG' width='200px'>";
         break;
       case "Moat":
          document.getElementById("DefenseBPicture").innerHTML = "<img src='images/Moat.PNG' width='200px'>";
          break;
    }
  }
  function DefenseCLogic(){
    switch(main.CategoryC.value){
       case "Drawbridge":
         document.getElementById("DefenseCPicture").innerHTML = "<img src='images/Drawbridge.PNG' width='200px'>";
         break;
       case "Sally Port":
          document.getElementById("DefenseCPicture").innerHTML = "<img src='images/Sally%20port.PNG' width='200px'>";
          break;     
    }
  }
  function DefenseDLogic(){
    switch(main.CategoryD.value){
       case "Rock Wall":
         document.getElementById("DefenseDPicture").innerHTML = "<img src='images/Rock%20wall.PNG' width='200px'>";
         break;
       case "Rough Terrain":
          document.getElementById("DefenseDPicture").innerHTML = "<img src='images/Rough%20terrain.PNG' width='200px'>";
          break;
    }
  }
    </script>
  	</head>
	<body>

	<form name="main" action="add_to_database.php" method="post">
		
<div class="row">
  <div class="small-12 columns">
    <ul class="tabs show-for-medium-up" data-tab>
      <li class="tab-title active"><a href="#panel1">Match/Scout Info</a></li>
      <li class="tab-title"><a href="#panel2">Defenses</a></li>
      <li class="tab-title"><a href="#panel3">Autonomous Period</a></li>
      <li class="tab-title"><a href="#panel4">Teleoperated Period</a></li>
      <li class="tab-title"><a href="#panel5">Additional Abilities</a></li>
    </ul>

	        	<dl class="accordion" data-accordion>

	        		<dd class="accordion-navigation">
	        			<a href="#panel1" class="show-for-small-only">Match/Scout Info</a>
	        			<div id="panel1" class="content active">
	        				<div class="content-box section-box">
		        				<h4>

		        					<div class="row">
										<div class="small-12 columns">
										<label>Match Number
											<input name="MatchNumber" type="text" value="<?php echo $_GET["match"]; ?>" placeholder="ex-1" readonly/>
										</label>
					         		</div>
		        					<div class="row">
										<div class="small-12 columns">
										<label>Team Number
											<input name="TeamNumber" type="text" value="<?php echo $_GET["team"]; ?>" placeholder="ex-2062" readonly/>
										</label>
					         		</div>					      
		        					<div class="row">
										<div class="small-12 columns">
										<label>Alliance Color
											<input name="AllianceColor" type="text" value="<?php echo $_GET["alliance"]; ?>" placeholder="ex-Red/Blue" readonly/>
										</label>
		        					<div class="row">
										<div class="small-12 columns">
										<label>Scout Name
											<input name="ScoutName" type="text" class="awesomplete" placeholder="John Doe" data-list="
Noah Backhaus,
Xander Blaetter,
Katie Carroll,
Jessica Copeland,
Curtis Copeland,
Bridger Crusan,
Spencer Dickinson,
Brett Diedrich,
Thomas Durnil,
Benjamin Garbedian,
Catherine Ge,
Shawn Ge,
Colin Gilgenbach,
Ryan Hintz,
James Homann,
Isabelle Houle,
Ali Ibrahim,
Vinesh Janarthanan,
Samuel Johnson,
Tim Kelley,
Alex Kempen,
Andrew Kempen,
Brian Koch,
Andrew Labott,
Zach Landquist,
Bjorn Larson,
John Lecher,
Quinn Lincicum,
Caitlin Martinez,
Virginia Clare O'Riordan,
Matthew Petzke,
Karla Reyes,
Kevin Sandoval,
Saul Sandoval,
Draven Schilling,
Sophy Siegel,
Gabriel Silva,
Wim Son,
Joshua Spleas,
Holly Standarski,
Lexus Stokes,
Mohamed Sudheer,
Avery Tiegs,
Spencer Tiegs,
Randy Turinske,
Sam Turner,
Elliot Waller,
Henry Waller,
Shawn Weaver,
Sophia Wirtz,
David Zastrow,
                      "  required/>
									</label>								
					         		</div>					         	
		        				</h4>
		        			</div>
	        			</div>


	        			<a href="#panel2" class="show-for-small-only">Defenses</a>
	        			<div id="panel2" class="content">
	        				<div class="content-box section-box">
		        				<h4>
		        				
		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Portcullis
												<input type="radio" name="CategoryA" value="Portcullis" onchange="DefenseALogic()">
												<img src="images/Portcullis.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Cheval de Frise
												<input type="radio" name="CategoryA" value="ChevaldeFrise" onchange="DefenseALogic()">
												<img src="images/Cheval%20de%20Frise.PNG">
											</label>
					         			</div>
					         		</div>

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Ramparts
												<input type="radio" name="CategoryB" value="Ramparts" onchange="DefenseBLogic()">
												<img src="images/Ramparts.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Moat
												<input type="radio" name="CategoryB" value="Moat" onchange="DefenseBLogic()">
												<img src="images/Moat.PNG">
											</label>
					         			</div>
					         		</div>		

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Drawbridge
												<input type="radio" name="CategoryC" value="Drawbridge" onchange="DefenseCLogic()">
												<img src="images/Drawbridge.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Sally Port
												<input type="radio" name="CategoryC" value="Sally Port" onchange="DefenseCLogic()">
												<img src="images/Sally%20port.PNG">
											</label>
					         			</div>
					         		</div>						         				         	        				

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Rock Wall
												<input type="radio" name="CategoryD" value="Rock Wall" onchange="DefenseDLogic()">
												<img src="images/Rock%20wall.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Rough Terrain
												<input type="radio" name="CategoryD" value="Rough Terrain" onchange="DefenseDLogic()">
												<img src="images/Rough%20terrain.PNG">
											</label>
					         			</div>
					         		</div>	
		        				</h4>
		        			</div>
	        			</div>

	        			<a href="#panel3" class="show-for-small-only">Autonomous Period</a>
	        			<div id="panel3" class="content">
	        				<div class="content-box section-box">
		        				<h4>

		        					<div class="row">
  										<fieldset class="large-6 columns">
    										<legend>Interaction w/ Defenses?</legend>
    										<input type="radio" name="DefenseInteractionType" value="Reached"><label>Reached</label>
    										<input type="radio" name="DefenseInteractionType" value="Breached"><label>Breached</label>
    										<input type="radio" name="DefenseInteractionType" value="No Interaction"><label>No Interaction</label>
  										</fieldset>
  									</div>

		        					<div class="row">
  										<fieldset class="large-6 columns">
    										<legend>Interaction w/ Defenses?</legend>
    										<input type="radio" name="DefenseInteractionAuto" value="CategoryA"required><label>Category A</label>
    										<input type="radio" name="DefenseInteractionAuto" value="CategoryB"><label>Category B</label>
    										<input type="radio" name="DefenseInteractionAuto" value="CategoryC"><label>Category C</label>
    										<input type="radio" name="DefenseInteractionAuto" value="CategoryD"><label>Category D</label>
    										<input type="radio" name="DefenseInteractionAuto" value="Low Bar"><label>Low Bar</label>
  										</fieldset>
  									</div> 

                  <div class="row">
                    <div class="large-12 columns">
                      <div class="row collapse">
                          <label>Low Goals</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("LowGoalAuto").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="LowGoalAuto" id="LowGoalAuto" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("LowGoalAuto").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Low Goal Misses</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("LowGoalAutoMisses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="LowGoalAutoMisses" id="LowGoalAutoMisses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("LowGoalAutoMisses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>High Goals</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("HighGoalAuto").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="HighGoalAuto" id="HighGoalAuto" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("HighGoalAuto").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>High Goal Misses</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("HighGoalAutoMisses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="HighGoalAutoMisses" id="HighGoalAutoMisses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("HighGoalAutoMisses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
	        			</div>

	        			<a href="#panel4" class="show-for-small-only">Teleoperated Period</a>
	        			<div id="panel4" class="content">
	        				<div class="content-box section-box">
		        				<h4>
		        					
                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Low Goals</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("LowGoalTeleop").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="LowGoalTeleop" id="LowGoalTeleop" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("LowGoalTeleop").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Low Goal Misses</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("LowGoalTeleopMisses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="LowGoalTeleopMissesLowGoalTeleopMisses" id="LowGoalTeleopMisses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("LowGoalTeleopMisses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>High Goals</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("HighGoalTeleop").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="HighGoalTeleop" id="HighGoalTeleop" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("HighGoalTeleop").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>High Goal Misses</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("HighGoalTeleopMisses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="HighGoalTeleopMisses" id="HighGoalTeleopMisses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("HighGoalTeleopMisses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Category A Defense Crosses</label>
                        <div class="small-5 columns" id="DefenseAPicture">
                        </div>
                        <div class="small-1 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("CategoryACrosses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-2 columns">
                            <input required type="number" name="CategoryACrosses" id="CategoryACrosses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("CategoryACrosses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>		

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Category B Defense Crosses</label>
                        <div class="small-5 columns" id="DefenseBPicture">
                        </div>
                        <div class="small-1 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("CategoryBCrosses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-2 columns">
                            <input required type="number" name="CategoryBCrosses" id="CategoryBCrosses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("CategoryBCrosses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>	

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Category C Defense Crosses</label>
                        <div class="small-5 columns" id="DefenseCPicture">
                        </div>                      
                        <div class="small-1 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("CategoryCCrosses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-2 columns">
                            <input required type="number" name="CategoryCCrosses" id="CategoryCCrosses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("CategoryCCrosses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>	

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Category D Defense Crosses</label>
                        <div class="small-5 columns" id="DefenseDPicture">
                        </div>                          
                        <div class="small-1 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("CategoryDCrosses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-2 columns">
                            <input required type="number" name="CategoryDCrosses" id="CategoryDCrosses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("CategoryDCrosses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>	

                  <div class="row">
                    <div class="small-12 columns">
                      <div class="row collapse">
                          <label>Low Bar Defense Crosses</label>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='subtract' onclick='document.getElementById("LowBarCrosses").stepDown(1);' value='-'/>
                        </div>  
                        <div class="small-4 columns">
                            <input required type="number" name="LowBarCrosses" id="LowBarCrosses" min="0" step="1" value ="0" required>
                        </div>
                        <div class="small-4 columns">
                          <input required type='button' class="button postfix" name='add' onclick='document.getElementById("LowBarCrosses").stepUp(1);' value='+'/>
                        </div>
                      </div>
                    </div>
                  </div>

		        					<div class="row">
  										<fieldset class="large-6 columns">
    										<legend>Challenged tower?</legend>
    										<input type="radio" name="ChallengedTower" value="Yes"><label>Yes</label>
    										<input type="radio" name="ChallengedTower" value="No"><label>No</label>
  										</fieldset>
  									</div>

		        					<div class="row">
  										<fieldset class="large-6 columns">
    										<legend>Scaled Tower?</legend>
    										<input type="radio" name="ScaledTower" value="Yes"><label>Yes</label>
    										<input type="radio" name="ScaledTower" value="No"><label>No</label>
  										</fieldset>
  									</div>  														         								         							         						         							         					         		

		        				</h4>
                    </div>
	        			</div>
	        			<a href="#panel5" class="show-for-small-only">Other</a>
	        			<div id="panel5" class="content">
	        				<div class="content-box section-box">
		        				<h4>Other</h4>
                    </div>
	        			</div>
	        		</dd>
	        	</dl>

  </div>
</div>

	<input class="button round SubmitButton" type="submit" value="Submit"></input required>
	</form>



    <script type="text/javascript">
    $(document).foundation();
    </script>
  </body>
</html>