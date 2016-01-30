<!doctype html>
<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>CORE 2062 Scouting</title>
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/normalize/3.0.3/normalize.min.css" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/css/foundation.min.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.accordion.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.tab.min.js"></script>
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
		</style>
  	</head>
	<body>

	<form>
		
<div class="row">
  <div class="small-12 columns">
    <ul class="tabs show-for-medium-up" data-tab>
      <li class="tab-title active"><a href="#panel1">Match/Scout Info</a></li>
      <li class="tab-title"><a href="#panel2">Defenses</a></li>
      <li class="tab-title"><a href="#panel3">Autoonomous Period</a></li>
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
											<input name="MatchNumber"> type="text" value="<?php echo $_GET["match"]; ?>" placeholder="ex-1" readonly/>
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
										<label>Scout Name <!--Add awesomplete-->
											<input name="ScoutName" type="text" placeholder="ex-John Doe" required/>
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
												<input type="radio" name="CategoryA" id="Portcullis" value="Portcullis">
												<img src="https://diedrich.co/img/u/8e4aed12e8e405d5346be44e5a151ba0.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Cheval de Frise
												<input type="radio" name="CategoryA" value="ChevaldeFrise">
												<img src="https://diedrich.co/img/u/2805597162d50895a5b19109ead0849a.PNG">
											</label>
					         			</div>
					         		</div>

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Ramparts
												<input type="radio" name="CategoryB" value="Ramparts">
												<img src="https://diedrich.co/img/u/239796b255106f3af5d489336598383b.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Moat
												<input type="radio" name="CategoryB" value="Moat">
												<img src="https://diedrich.co/img/u/24b9e2ff71d66c2e44c7496a273a2fde.PNG">
											</label>
					         			</div>
					         		</div>		

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Drawbridge
												<input type="radio" name="CategoryC" value="Drawbridge">
												<img src="https://diedrich.co/img/u/cfff5a1571030a5988bd471cb6383939.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Sally Port
												<input type="radio" name="CategoryC" value="Sally Port">
												<img src="https://diedrich.co/img/u/6d286cf950a9dc462f1e4180af13f443.PNG">
											</label>
					         			</div>
					         		</div>						         				         	        				

		        					<div class="row">
										<div class="small-6 columns">
											<label class="radiopic">Rock Wall
												<input type="radio" name="CategoryD" value="Rock Wall">
												<img src="https://diedrich.co/img/u/7b2b539eb97b8cb5cf31145cb7ea0ab6.PNG">
											</label>
										</div>
										<div class="small-6 columns">
											<label class="radiopic">Rough Terrain
												<input type="radio" name="CategoryD" value="Rough Terrain">
												<img src="https://diedrich.co/img/u/9887aa384e012335bc75323aae7cfe8e.PNG">
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
    										<input type="radio" name="DefenseInteractionType" value="Reached"required><label>Reached</label>
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
    										<input type="radio" name="DefenseInteractionAuto" value="LowBar"><label>Low Bar</label>
  										</fieldset>
  									</div> 

		        					<div class="row">
										<div class="small-12 columns">
										<label>Low Goals
											<input name="LowGoalAuto" type="number" value="0" required/>
										</label>
					         		</div>

		        					<div class="row">
										<div class="small-12 columns">
										<label>Low Goal Misses
											<input name="LowGoalAutoMisses" type="number" value="0" required/>
										</label>
					         		</div> 

		        					<div class="row">
										<div class="small-12 columns">
										<label>High Goals
											<input name="HighGoalAuto" type="number" value="0" required/>
										</label>
					         		</div>

		        					<div class="row">
										<div class="small-12 columns">
										<label>High Goal Misses
											<input name="HighGoalAutoMisses" type="number" value="0" required/>
										</label>
					         		</div>

		        				</h4>
                    </div>
	        			</div>

	        			<a href="#panel4" class="show-for-small-only">Teleoperated Period</a>
	        			<div id="panel4" class="content">
	        				<div class="content-box section-box">
		        				<h4>
		        					
		        					<div class="row">
										<div class="small-12 columns">
										<label>Low Goals
											<input name="LowGoalTeleop" type="number" value="0" required/>
										</label>
					         		</div>

		        					<div class="row">
										<div class="small-12 columns">
										<label>Low Goal Misses
											<input name="LowGoalTeleopMisses" type="number" value="0" required/>
										</label>
					         		</div> 

		        					<div class="row">
										<div class="small-12 columns">
										<label>High Goals
											<input name="HighGoalTeleop" type="number" value="0" required/>
										</label>
					         		</div>

		        					<div class="row">
										<div class="small-12 columns">
										<label>High Goal Misses
											<input name="HighGoalTeleopMisses" type="number" value="0" required/>
										</label>
					         		</div>

		        					<div class="row">
										<div class="small-12 columns">
										<label>Category A Defense Crosses
											<input name="CategoryACrosses" type="number" value="0" required/>
										</label>
					         		</div>		

		        					<div class="row">
										<div class="small-12 columns">
										<label>Category B Defense Crosses
											<input name="CategoryBCrosses" type="number" value="0" required/>
										</label>
					         		</div>	

		        					<div class="row">
										<div class="small-12 columns">
										<label>Category C Defense Crosses
											<input name="CategoryCCrosses" type="number" value="0" required/>
										</label>
					         		</div>	

		        					<div class="row">
										<div class="small-12 columns">
										<label>Category D Defense Crosses
											<input name="CategoryDCrosses" type="number" value="0" required/>
										</label>
					         		</div>	

		        					<div class="row">
										<div class="small-12 columns">
										<label>Low Bar Defense Crosses
											<input name="LowBarCrosses" type="number" value="0" required/>
										</label>
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

	</form>



    <script type="text/javascript">
    $(document).foundation();
    </script>
  </body>
</html>