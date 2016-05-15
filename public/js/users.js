console.log('js working');
// global variables ;
var output;
var counter =0;
var url = "http://localhost:8012/inoticeboard/public/api/findAllUsers.php"
console.log(url);
// ============================================================================
// custom function for redirection
function goToLink(url){
	window.location.href=url;
}


$('#search').keyup(function () {
var searchField = $('#search').val();
if(searchField.length==0){
	output = '';
	$('#update').html(output);
} else {
var myExp = new RegExp(searchField , 'i');
$.ajax
({
   dataType:"json",
   url:url,
   data:"data",
   cache:false,
   success:function(data){
   	output="<tr>";
    $.each(data,function(key,val){
    	if(val.First_name.search(myExp) != -1 || val.Last_name.search(myExp) != -1 || val.Reg_No.search(myExp) != -1){
    			output+="<tr class='animated fadeInUp'>";
    		   output+="<td>"+val.First_name+" "+val.Last_name+"</td>";
    		   output+="<td>"+val.Reg_No+"</td>";
    			output+="<td><a href='addRole.php?user="+val.U_ID+"'><i class='material-icons'>person_add</i></a></td>";
    			output+="<td><a href='personal.php?user="+val.U_ID+"'><i class='material-icons'>inbox</i></a></td>";
    			output+="</tr>";        
    }
   });
    output+="<tr>";
    $('#tableBody').html(output);
}});
}
});
