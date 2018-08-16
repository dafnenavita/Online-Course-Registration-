$('document').ready(function()
{ 
     /* validation */
 $("#searchbtn").click(function(e) {
     e.preventDefault();
	 
   var data = $("#view_form").serialize();

   $.ajax({
    
   type : 'POST',
   url  : 'studentviewcourseimpl.php',
   data : data,
   async: true,
   dataType : 'json',
   success :  function(data1)
      {  
	 
		if(data1.length>0){
	    var eTable="<table class ='table table-bordered'><thead><tr><th class='text-center'>Course Id</th><th class='text-center'>Course Name</th><th class='text-center'>Major</th><th class='text-center'>Professor Id</th><th class='text-center'>Semester</th><th class='text-center'>Year</th></tr></thead><tbody>"
		for(var i=0; i<data1.length;i++)
		{
		eTable += "<tr id = i>";
		eTable += "<td>"+data1[i]['course_id']+"</td>";
		eTable += "<td>"+data1[i]['course_name']+"</td>";
		eTable += "<td>"+data1[i]['major']+"</td>";
		eTable += "<td>"+data1[i]['prof_name']+"</td>";
		eTable += "<td>"+data1[i]['semester']+"</td>";
		eTable += "<td>"+data1[i]['year']+"</td>";
		//eTable += "<td><button class='btn btn-danger my-cart-btn' id = "+data1[i]['section_id']+" onClick = 'addtocart("+data1[i]['section_id']+")'>Add to Cart</button></td>";
		eTable += "</tr>";
		}
		eTable +="</tbody></table><br/>";
		$('#viewtable').html(eTable);
		

	  }
	  else{
		  $('#viewtable').html("<br/><p>No records found</p>");
	  }
	  }
	
	  
	});

   
});

});
