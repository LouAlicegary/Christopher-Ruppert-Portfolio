<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<!-- jEditable -->
<script type="text/javascript" charset="utf8" src="http://www.appelsiini.net/download/jquery.jeditable.mini.js"></script>
 

<!-- CRUD -->
<script src="includes/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="includes/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="includes/jquery.jeditable.js" type="text/javascript"></script>
<script src="includes/jquery-ui.js" type="text/javascript"></script>
<script src="includes/jquery.validate.js" type="text/javascript"></script>
<script src="includes/jquery.dataTables.editable.js" type="text/javascript"></script>

<link href="special.css" rel="stylesheet" type="text/css">

<html>
<head></head>
<body>



<h2>Site Administration - Edit Database</h2>
<br>
To edit an entry: Double-click on the item you'd like to edit, then hit [return] when finished.<br>
To delete an entry: Click on the row you'd like to delete (text will turn red), then click <button id="btnDeleteRow">Delete</button>

<br><br>Category to Edit:

<form action="edit_records.php" method="post">
    <select name='section'><option value='3'>Tattoo</option><option value='9'>Recent Work</option><option value='7'>Bio</option><option value='1'>Original Paintings</option><option value='2'>Sculpture and Performance</option><option value='4'>Master Copies</option><option value='5'>Early Work</option></select><br />
    <input name="submit" type="submit" value="Edit Category" />
</form>

<table cellpadding="0" cellspacing="0" border="0" class="dataTable" id="example">
	<thead>
		<tr>
			<th>ID</th>
			<th>item_filename</th>
            <th>title</th>
			<th>subtitle</th>
			<th>location</th>
			<th>create_date</th>
			<th>display_order</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<br>
<a href="index.php">[Return to Main Menu]</a>


<script>

$(document).ready(function() {
	
    
    var oTable = $('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
        "sDom": 'rt',
        "aoColumnDefs": [{ "bVisible": false, "aTargets": [ 0 ] }, { "sWidth": "25%", "aTargets": [ 2 ] }, { "sWidth": "10%", "aTargets": [ 5 ] }, { "sWidth": "10%", "aTargets": [ 6 ] } ],
		"sAjaxSource": "edit_records_ajax.php?myvar=" +

        <?php

             if (isset($_POST['section'])) {
                $sec_num = $_POST['section'];
              }
              else {
                $sec_num = 3;
             }
                echo $sec_num;
        ?>

	} );
    
    oTable.makeEditable({
        sUpdateURL: "me_update.php",
        sDeleteURL: "me_delete.php"
    });
    
    $("#example tbody").click(function(event) {
        //alert("click");
		$(oTable.fnSettings().aoData).each(function (){
			$(this.nTr).removeClass('row_selected');
		});
		$(event.target.parentNode).addClass('row_selected');
	});    
    
    
    
    
        
} );

</script>

</body>
</html>