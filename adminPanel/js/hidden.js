function hdd()
{
	var demo	=document.getElementById('demo');
	var addDiv 	=document.getElementById('addDiv');
	if(addDiv.style.display==="none")
	{
		addDiv.style.display 	="flex";
		demo.style.display 		="none";
	}
	else
	{
		addDiv.style.display	="none";
		demo.style.display 		="inline";
	}
}