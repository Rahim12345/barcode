function prinTorder()
{
	var yourUl1 = document.getElementById("accordionSidebar");
	var yourUl2 = document.getElementById("navId");
	var yourUl3 = document.getElementById("back");
	var yourUl4 = document.getElementById("alert");
	var yourUl5 = document.getElementById("print-btn");
	var yourUl7 = document.getElementById("foot");
	yourUl1.style.display = yourUl1.style.display === 'none' ? '' : 'none';
	yourUl2.style.display = yourUl2.style.display === 'none' ? '' : 'none';
	yourUl3.style.display = yourUl3.style.display === 'none' ? '' : 'none';
	yourUl4.style.display = yourUl4.style.display === 'none' ? '' : 'none';
	yourUl5.style.display = yourUl5.style.display === 'none' ? '' : 'none';
	yourUl7.style.display = yourUl7.style.display === 'none' ? '' : 'none';
}
function printTorder2()
{
	var yourUl1 = document.getElementById("accordionSidebar");
	var yourUl2 = document.getElementById("navId");
	var yourUl3 = document.getElementById("back");
	var yourUl4 = document.getElementById("alert");
	var yourUl5 = document.getElementById("print-btn");
	var yourUl7 = document.getElementById("foot");
	yourUl1.style.display = yourUl1.style.display === 'none' ? 'flex' : 'none';
	yourUl2.style.display = yourUl2.style.display === 'none' ? 'flex' : 'none';
	yourUl3.style.display = yourUl3.style.display === 'none' ? 'block' : 'none';
	yourUl4.style.display = yourUl4.style.display === 'none' ? 'block' : 'none';
	yourUl5.style.display = yourUl5.style.display === 'none' ? 'flex' : 'none';
	yourUl7.style.display = yourUl7.style.display === 'none' ? 'flex' : 'none';
}