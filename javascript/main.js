
 //<![CDATA[ 
 // array of possible consoles in the same order as they appear in the game selection list 
 var gameLists = new Array(3) 
 gameLists["empty"] = ["Game"]; 
 gameLists["Play Station 3"] = ["PES 21"]; 
 gameLists["Play Station 4"] = ["Select","PES 21", "FIFA 21", "FIFA 22", "FIFA 23", "GTA", "MORTAL COMBAT", "CALL OF DUTY", "NEED FOR SPEED", "LAST OF US", "WWE", "NBA", "CTR", "GOD OF WAR"]; 
 gameLists["Play Station 5"] = ["Select","FIFA 22", "FIFA 23", "MORTAL COMBAT"]; 

 /* gameChange() is called from the onchange event of a select element. 
 * param selectObj - the select object which fired the on change event. 
 */ 
 function gameChange(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the gameLists array 
 cList = gameLists[which]; 
 // get the game select element via its known id 
 var cSelect = document.getElementById("game"); 
 // remove the current options from the game select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 }
 
 
 function calculateTotal()
 {
   solution = ($("#cost").val() * $("#count").val() * $("#players").val() )
   $("#due").val(solution);
   $("#due").text(solution);
 }
 
 $(function()
  {
     $(".change").on("change keyup",calculateTotal)
 })




//]]>




