<!DOCTYPE html>
<html lang="en">

<head>
  <title>Certificate</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="cert-container print-m-0">
    <div id="content2" class="cert">
      <img src="img/certificate.jpg" class="cert-bg" alt="" />
      <div class="cert-content">
        <img src="img/logo.png" class="logoin" alt="" />
        <h1 class="AGaramondPro-Bold">CERTIFICATE</h1>
        <h2 class="AGaramondPro-Bold">OF ACHIEVEMENT</h2>
        <span class="Poor-Richard">THIS CERTIFICATE IS PRESENTED TO</span>
        <br /><br />
        <span class="poppins_bold"><b><?php echo $certificate->name; ?></b></span>
        <span class="pm-empty-space block underline"></span><br />
        <span class="Poor-Richard">HAS SUCCESSFULLY COMPLETED THE ONLINE CERTIFICATION COURSE OF </span><br>
        <div class="wismline">
          <span class="pm-empty-space block line Poor-Richard"><b><?php echo $certificate->course_name; ?></b></span>
          <span class="Poor-Richard"> FROM COLLECTIVE WISDOM.</span>
        </div>
        <br />
      </div>
    </div>
  </div>
</body>
</html>
