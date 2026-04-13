<script>
function konfirmasi()
{ var jwb;
  jwb=window.confirm("Are you sure to delete this record?");
  if (jwb)
    {return true;}
  else
    {return false;}
}

function SetAllCheckBoxes(FormName, FieldName)
{	if ((document.form.selectbox.checked)==true) {var CheckValue= true;}
  	else {var CheckValue= false;}

	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function SetAllCheckBoxes1(FormName, FieldName)
{	if ((document.form.selectbox1.checked)==true) {var CheckValue= true;}
  	else {var CheckValue= false;}

	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}


</script>

