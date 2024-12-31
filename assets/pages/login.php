<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="../css/registreStyle.css">
 
   
</head>
<body>
    <button > Back to Home</button>
      <main>  
    <section class="container">
      <header>login Form</header>
      <form action="../traitement/login.php" method="POST" class="form">
       
        <div class="input-box">
          <label>Email Address</label>
          <input type="mail" name="email" placeholder="Enter email address" required />
        </div>
        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required />
          </div>
    
        
        <button>Submit</button>
      </form>
    </section>
</main>
  </body>
</html>