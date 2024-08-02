function fetchData(url, callback) {
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        callback(data);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr, status, error);
      }
    });
  }
  


  function generateTable(data, columns, containor) {
    // Build the HTML table
    var html = '<table class="my-table">';
    // Add the header row
    html += '<tr>';
    $.each(columns, function(index, column) {
      html += '<th>' + column + '</th>';
    });
    html += '</tr>';
    // Add the data rows
    $.each(data, function(index, row) {
      html += '<tr>';
      $.each(columns, function(index, column) {
        html += '<td>' + row[column] + '</td>';
      });
      html += '</tr>';
    });
    html += '</table>';
    $(containor).html(html);
  }

  $(document).ready(function() {
    fetchData("get_table_data.php?function=get_account_data",function(data){//gets the data from the users table and formats to display to an admin
        generateTable(data, ['id', 'username', 'is_member','is_admin','email','phone','credits','admin_notes'],"#account_table");
    });
    fetchData("get_table_data.php?function=get_key_data",function(data){//gets the data for all the keys and displays it to the admin
      generateTable(data, ['id', '_key', 'game_id','owner_id',,'title','pltform','credits','upload_date'],"#key_table");
  });
  fetchData("get_table_data.php?function=get_purchase_data",function(data){//gets the data for all transactions and displays that to the admin
    generateTable(data, ['id', '_key', 'game_id','owner_id','buyer_id','title','pltform','credits','upload_date','purchase_date'],"#transactions_table");
});
  });