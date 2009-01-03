 <?php echo $this->render('templates/common-header.php');?>
    <div class="main">
     <!--  Main content area -->
     <div class="content">
      <?php echo $this->content ?>
     </div><!--  End main content area -->

     <!-- Right Hand Bar -->
     <div class="sidenav">
        <table width="100%">
         <tr><td style="text-align:center;">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="mike@theupstairsroom.com">
            <input type="hidden" name="item_name" value="Michael Rubinsky - Horde / Web Application Development">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="cn" value="Notes">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="tax" value="0">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="bn" value="PP-DonationsBF">
            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
           </td><td style="text-align:center;">
               <a  target="_blank" title="This site is powered by The Horde Application Framework." href="http://horde.org">
            <img alt="Powered by Horde Application Framework" style="border:0; margin-left: 5px;"src="http://<?php echo $this->host_base;?>/img/horde-power1.png" /></a>
            </td></tr></table>

       <h1>Downloads</h1>
       <ul>
         <li>
          <div class="rfNewsHeader"><a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'phpEnomUpdate.tgz')) ?>">phpEnomUpdate</a></div>
          <div class="rfNewsBody">
            Command line utility written in PHP for updating IP addresses to an
            Enom compatible dynamic DNS service.
          </div>
         </li>
         <li>
          <div class="rfNewsHeader"><a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'aeros_theme.tgz')) ?>">Aeros Theme</a></div>
          <div class="rfNewsBody">Horde theme based on colors from an Aeronautical VFR chart</div>
         </li>
         <li>
          <div class="rfNewsHeader"><a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'aphpSysInfo.tgz')) ?>">phpSystemInfo Block</a></div>
          <div class="rfNewsBody">
           Horde block for displaying data from servers running phpSystemInfo.
          </div>
         </li>
        </ul>

        <h1>Tag Cloud</h1>
        <?php  echo $this->cloud_html;?>

        <h1>Previously</h1>
        <?php echo $this->previously['html'] ?>

        <h1>Links</h1>
        <ul>
         <li>
          <div class="rfNewsHeader"><a href="http://horde.org" title="The Horde Project">The Horde Project</a></div>
          <div class="rfNewsBody">An open source web application framework and collection of applications that I'm currently involved with.</div>
         </li>
         <li>
          <div class="rfNewsHeader"><a href="http://rubinskyfamily.com" title="My family website">Rubinsky Family Website</a></div>
          <div class="rfNewsBody">In the interests of adding a more personal touch, this is my family website, with personal news, photos, and other goodies!</div>
         </li>
        </ul>

        <!--  Ads, Powered by stuff etc... -->
        <div style="text-align:center;">
        <script type="text/javascript"><!--
        google_ad_client = "pub-6734301880291294";
        google_ad_width = 120;
        google_ad_height = 600;
        google_ad_format = "120x600_as";
        google_ad_type = "text_image";
        google_ad_channel = "";
        //--></script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">;
        </script>
        </div>

     </div>
     <div class="clearer"></div>
   </div>