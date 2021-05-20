<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
</head>
 
<body>

    <ul>
      <li><a class="active" href="index.php">Holiday</a></li>
      <li><a href="Weather.html">Weather</a></li>
      <li><a href="#contact">Rental</a></li>
    </ul>
 
  <select id="selectCountry">
    <option value="indian">India</option>
    <option value="china">China</option>
    <option value="usa">USA</option>
    <option value="uk">UK</option>
    <option value="bm">Bermuda</option>
    <option value="swedish">Sweden</option>
  </select>
  <pre id="output"></pre>
  <script type="text/javascript">
  </script>
  
  
</body>
<script type="text/javascript">
$("#selectCountry").change(function(e) {
  $("#output").html("Loading...");
  var country = $("#selectCountry").val();
  var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/en.' + country 
                  + '%23holiday%40group.v.calendar.google.com/events?key=AIzaSyCtSlGS-tnSBD1KcLtjySmlQvxR4brjQho&timeMin=2021-01-01T00:00:00Z&timeMax=2022-01-01T00:00:00Z&orderby=starttime';
 
  $.getJSON(calendarUrl)
    .success(function(data) {
    	console.log(data);
      $("#output").empty();
      for (item in data.items) {
        $("#output").append(
          "<hr><h3>" + data.items[item].summary + "<h3>" +
          "<h4>" + data.items[item].start.date + "<h4>"
        );
      }
    })
    .error(function(error) {
      $("#output").html("An error occurred.");
    })
});
$("#selectCountry").trigger("change");
</script>