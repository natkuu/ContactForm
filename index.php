<!DOCTYPE <html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400' rel='stylesheet' type='text/css'>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<div class="containter">

<div>
  <h1>Contact form</h1>
      <form class='form' action="client.php" method="POST">
      <p class="name">
        <p>What is your name?</p>
        <input name="name" type="TextField" placeholder="Name" class="length"/>
      </p>
      <p class="email">
        <p>What is your email address?</p>
        <input name="email" type="EmailField" placeholder="Email"  class="length"/>
      </p>
      <p class="text">
        <p>What is your message to me?</p>
        <textarea type="TextareaField" name="message" placeholder="Message"></textarea>
      </p>
      <p class="spam">
        <p>What is 2+2?</p>
        <input name="spam" type="TextField" placeholder="Anti-spam" class="length"/>
      </p>
      <span id="error"></span>
      <div>
        <button>Submit</button>
      </div>
    </form>
  <script type="text/javascript">
var $form = $('form');
$form.on('submit', function(e){
  e.preventDefault();
  $.post('/client.php', $(this).serialize(), function(data){
    console.log(data)
  });
});
</script>
</body>
</html>
