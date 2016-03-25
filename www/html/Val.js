  function ValidateForm() {
      var match = document.forms["main"]["MatchNumber"].value;
      var team = document.forms["main"]["TeamNumber"].value;
      var alliance = document.main.AllianceColor.value;
      var name = document.forms["main"]["ScoutName"].value;
      var catA = document.forms["main"]["CategoryA"].value;//document.main.CategoryA.value; //defense type
      var catB = document.forms["main"]["CategoryB"].value;//document.main.CategoryB.value;
      var catC = document.forms["main"]["CategoryC"].value;//document.main.CategoryC.value;
      var catD = document.forms["main"]["CategoryD"].value;//document.main.CategoryD.value;
      var DInt = document.forms["main"]["DefenseInteractionType"].value;//document.main.DefenseInteractionType.value;
      var DIntA = document.forms["main"]["DefenseInteractionAuto"].value; //document.main.DefenseInteractionAuto.value; //what
      if (match == null || match == "") {
          alert("Match Number must be filled");
          return false;
      }
      else if (team == null || team == "") {
      	alert("Team Number must be filled");
      	return false;
      }
      /*else if (alliance != "Red" || alliance != "Blue") {
      	alert("Alliance Color must be selected");
      	return false;
      }*/
      else if (name == null || name == "") {
      	alert("Scout name must be filled");
      	return false;
      }
      /*else if (catA != "Portcullis" || catA != "ChevaldeFrise") {
      	alert("Category A defense must be selected");
      	return false;
      }
      else if (catB != "Ramparts" || CatB != "Moat") {
      	alert("Category B defense must be selected");
      	return false;
      }
      else if (catC != "Drawbridge" || CatC != "Sally Port") {
      	alert("Category C defense must be selected");
      	return false;
      }
      else if (catD != "Rock Wall" || CatD != "Rough Terrain") {
      	alert("Category D defense must be selected");
      	return false;
      }
      else if (DInt != "Reached" || DInt != "Breached") {
      	alert("Auto interaction type must be selected");
      	return false;
      }*/
      else if (DInt != "No Interaction") {
            alert("Auto interaction type must be selected");
            return false;
      }
      else if (DIntA != "Other" || DIntA != "Low Bar") {
      	alert("Defense interacted with during auto must be selected");
      	return false;
      } 
      else if (DIntA != "Other") {
            alert("Defense interacted with during auto must be selected");
            return false;
      }           
  }