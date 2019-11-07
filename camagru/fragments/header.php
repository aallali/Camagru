<div id="header">
  <?php if(isset($_SESSION['id'])) { ?>
      <div class="button" onclick="location.href='forms/logout.php'">
        <span>
          Disconnect
        </snap>
      </div>
  <?php } else { ?>
    <div class="button" onclick="location.href='index.php'">
      <span>
        Login
      </snap>
    </div>
     <div class="button" onclick="location.href='gallery.php'">
    <span>
      Gallery
    </snap>
  </div>
  <div class="button" onclick="location.href='about.html'">
      <span>
        ABOUT!
      </snap>
    </div>
  <?php } ?>
  <?php if(isset($_SESSION['id'])) { ?>
 
  <div class="button" onclick="location.href='gallery.php'">
    <span>
      Gallery
    </snap>
  </div>
  <div class="button" onclick="location.href='camera.php'">
    <span>
      Studio
    </snap>
  </div>
   <div class="button" onclick="location.href='member.php'">
    <span>
      Members
    </snap>
  </div>
   <div class="button" onclick="location.href='Profile.php'">
    <span>
      Profile
    </snap>
  </div>
  <div class="button" onclick="location.href='about.html'">
      <span>
        ABOUT!
      </snap>
    </div>
  <?php } ?>
</div>
