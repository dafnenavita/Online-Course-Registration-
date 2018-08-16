$('document').ready(function()
{ 
     /* validation */
 $("#searchbtn").click(function(e) {
     e.preventDefault();
	 
   var data = $("#view_form").serialize();

   $.ajax({
    
   type : 'POST',
   url  : 'editcourseimpl.php',
   data : data,
   async: true,
   dataType : 'json',
   success :  function(data1)
      {  
	 
		if(data1.length>0){
	    var eTable="<table class ='table table-bordered' style = 'width:800px; margin: 10px auto;'><thead><tr><th class='text-center'>Course Id</th><th class='text-center'>Course Name</th><th class='text-center'>Major</th><th class='text-center'>Professor Id</th><th class='text-center'>Semester</th><th class='text-center'>Year</th><th class='text-center'>Availability</th><th class='text-center'>Edit</th><th class='text-center'>Delete</th></tr></thead><tbody>"
		for(var i=0; i<data1.length;i++)
		{
		eTable += "<tr id = i>";
		eTable += "<td>"+data1[i]['course_id']+"</td>";
		eTable += "<td>"+data1[i]['course_name']+"</td>";
		eTable += "<td>"+data1[i]['major']+"</td>";
		eTable += "<td>"+data1[i]['prof_name']+"</td>";
		eTable += "<td>"+data1[i]['semester']+"</td>";
		eTable += "<td>"+data1[i]['year']+"</td>";
		eTable += "<td>"+data1[i]['availability']+"</td>";
		eTable += "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' onclick=getCourseDetails("+data1[i]['section_id']+"); data-title='Edit' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span></button></p></td>";
		eTable += "<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' onclick=deleteCourseDetails("+data1[i]['section_id']+"); ><span class='glyphicon glyphicon-trash'></span></button></p></td>";
		eTable += "</tr>";
		}
		eTable +="</tbody></table>";
		$('#viewtable').html(eTable);
		$('#pageid').css("visibility","visible");		

	  }
	  else{
		  $('#viewtable').html("<br/><p>No records found</p>");
	  }
	  }
	
	  
	});

   
});

});
