$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url+'api/getData.php',
        data: {page:page}
    }).done(function(data){
    	total_page = Math.ceil(data.total/10);
    	current_page = page;


        if($('#pagination').data("twbs-pagination"))
              $('#pagination').twbsPagination('destroy');


    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;

    });

}

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url+'api/getData.php',
    	data: {page:page}
	}).done(function(data){
        console.log(data)
		manageRow(data.data);
	});
}


/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.title+'</td>';
        rows = rows + '<td>'+value.glimpse_date+'</td>';
        rows = rows + '<td>'+value.heading+'</td>';
        rows = rows + '<td>'+value.content+'</td>';
        rows = rows + '<td>'+value.prayer_focus+'</td>';
        rows = rows + '<td>'+value.featured_verse+'</td>';
        rows = rows + '<td>'+value.featured_quote+'</td>';
        rows = rows + '<td>'+value.type+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        // rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var glimpse_date = $("#create-item").find("input[name='glimpse-date']").val();
    var title = $("#create-item").find("input[name='title']").val();
    var heading = $("#create-item").find("input[name='heading']").val();
    var content = $("#create-item").find("textarea[name='content']").val();
    var prayer_focus = $("#create-item").find("textarea[name='prayer-focus']").val();
    var featured_verse = $("#create-item").find("textarea[name='featured-verse']").val();
    var featured_quote = $("#create-item").find("textarea[name='featured-quote']").val();
    var type = $("#create-item").find("input[name='type']").val();

    if(title != '' && content != ''){              
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{title:title, content:content, glimpse_date:glimpse_date,
                  heading:heading, prayer_focus:prayer_focus, featured_verse:featured_verse,
                  featured_quote:featured_quote, type:type}
        }).done(function(data){

            $("#create-item").find("input[name='title']").val('');
            $("#create-item").find("input[name='glimpse-date']").val('');
            $("#create-item").find("input[name='heading']").val('');
            $("#create-item").find("textarea[name='content']").val('');
            $("#create-item").find("textarea[name='prayer-focus']").val('');
            $("#create-item").find("textarea[name='featured-verse']").val('');
            $("#create-item").find("textarea[name='featured-quote']").val('');
            $("#create-item").find("input[name='type']").val('');

            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or content.')
    }


});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'api/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });

});


// /* Edit Item */
// $("body").on("click",".edit-item",function(){

//     var id = $(this).parent("td").data('id');
//     var title = $(this).parent("td").prev("td").prev("td").text();
//     var content = $(this).parent("td").prev("td").text();

//     $("#edit-item").find("input[name='glimpse-date']").val();
//     $("#edit-item").find("input[name='title']").val();
//     $("#edit-item").find("input[name='heading']").val();
//     $("#edit-item").find("textarea[name='content']").val();
//     $("#edit-item").find("textarea[name='prayer-focus']").val();
//     $("#edit-item").find("textarea[name='featured-verse']").val();
//     $("#edit-item").find("textarea[name='featured-quote']").val();
//     $("#edit-item").find("input[name='type']").val();

//     $("#edit-item").find("input[name='title']").val(title);
//     $("#edit-item").find("textarea[name='content']").val(content);
//     $("#edit-item").find(".edit-id").val(id);

// });


// /* Updated new Item */
// $(".crud-submit-edit").click(function(e){

//     e.preventDefault();
//     var form_action = $("#edit-item").find("form").attr("action");
//     var title = $("#edit-item").find("input[name='title']").val();

//     var content = $("#edit-item").find("textarea[name='content']").val();
//     var id = $("#edit-item").find(".edit-id").val();

//     if(title != '' && content != ''){
//         $.ajax({
//             dataType: 'json',
//             type:'POST',
//             url: url + form_action,
//             data:{title:title, content:content,id:id}
//         }).done(function(data){
//             getPageData();
//             $(".modal").modal('hide');
//             toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
//         });
//     }else{
//         alert('You are missing title or content.')
//     }
// });

});