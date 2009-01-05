
 <div class="softwareItemBlock">
      <h1>phpEnomUpdate - Utility for updating a dynamic IP service</h1>
      <p>phpEnomUpdate is a small command line utility for sending IP address updates
     to a dynamic DNS provider that supports Enom style updates. See
     http://www.enom.com/help/faq_dynamicdns.asp for more information on the
     protocol.</p>

    <h2>Download</h2>
      <p>Download the tarball <a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'phpEnomUpdate.tgz'))?>">here.</a></p>

     <h2>Installation</h2>
     <ul>
      <li>tar xvzf phpEnomUpdate.tgz</li>
      <li>Place the phpEnomUpdate.php file in your path, and make sure it's executable.</li>
      <li>Edit the phpEnomUpdate.conf.dist file to add your zones, then save it to
          /etc/phpEnomUpdate.conf</li>
     </ul>

     <h2>Usage</h2>
     <p>Can be used from command line or cron script.</p>
 </div>

 <div class="softwareItemBlock">
   <h1>Aeros Theme - An aviation based theme for the Horde Framework and Applications</h1>
    <p>This is a very simple theme for the Horde Framework and Applicactions with an aviation flavor.
    It features a subtle background image created from a VFR Sectional, and the colors for the theme are
    all colors that appear on VFR charts. This theme is made available under
     the <a href="http://www.fsf.org/copyleft/lgpl.html">LGPL license.</a></p>
    <p>This is a work in progress, derived from work I'm doing on a pilot
    flightlog application.  This is only the general Horde theme, there are no
    specific application level files (yet).</p>
     <h2>Download</h2>
      <p>Download the tarball <a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'aeros_theme.tgz'))?>">here.</a></p>

     <h2>Installation</h2>
     <p>Simply unpack the aeros_theme.tgz file into the horde/themes directory. <br /></p>
     <h2>Screen Shots</h2>
      <div style="text-align:center;">
      <img src="<?php echo $this->host_base?>/images/aeros_theme/aeros_1.png" /><br /><img src="<?php echo $this->host_base?>/images/aeros_theme/aeros_2.png" />
      </div>
 </div>

 <div class="softwareItemBlock">
   <h1>phpSystemInfo Block for the Horde Framework</h1>
    <p>A 'portal' block for the <a href="http://horde.org">Horde Framework</a>
     that polls servers running <a href="http://phpsysinfo.sourceforge.net">
     phpSystemInfo</a> and displays server statistics.  A useful tool for
     quickly scanning a number of different servers for some quick 'how goes it'
     information.</p>
    <p>This Horde Block drops easily into an existing Horde installation.
       Configuration is done completely through Horde's portal layout page.</p>
    <p>If you would like to contribute to the development of this software,
        send any comments, suggestions,patches to
        <strong>mike at theupstairsroom dot com.</strong></p>
        <p> This software is released under the
        <a href="http://www.fsf.org/copyleft/lgpl.html">LGPL license.</a></p>

       <h2>Requirements</h2>
         <p>This may go without saying, but I'll say it anyway - the machines you wish to monitor must have a
            web accessable phpSysInfo installation running. See the phpSysInfo project for more information.
            In addition, the following are also required:
            <ul>
             <li>A working Horde install. Minimum version is <a href="http://horde.org/horde">Horde 3.2</a> - which as of this writing is currently in alpha.</li>
             <li>PHP must have either domxml(PHP4) or dom(PHP5) support build in.
                 I believe this is also a Horde prerequisite so this should not be
                 a problem.</li>
            </ul>
          </p>
        <h2>Download</h2>
        <p>The source may be downloaded
           <a href="<?php echo $this->urlWriter->urlFor('downloads', array('file' => 'phpSysInfo.tgz')) ?>" title="Download phpSysInfo Block">
            here.</a>
        </p>
        <h2>Screenshot</h2>
         <table>
          <tr>
           <td align="center">Main Display</td>
           <td align="center">Configuration </td>
          </tr>
          <tr>
           <!--<td><img src="<?php echo $this->host_base?>/images/phpSysInfoImages/display.png" alt="screenshot" style="margin:8px;"/></td>-->
          <!--<td><img src="<?php echo $this->host_base?>/images/phpSysInfoImages/config.png"  alt="Configuring the block" style="margin:8px; text-align: center;" /></td>-->
          </tr>
         </table>
        <h2>Installation</h2>
        <p>Download the file phpSysInfo.tgz and unpack into the Horde Blocks directory.
           This will usually be horde/lib/Block</p>
        <p>That's all there is to it. Now you can add as many phpSysInfo blocks to your portal page as you need
           and each one can be configured to poll a different server running phpSysInfo.</p>
 </div>

 <div class="softwareItemBlock">
   <h1>PHP IMSP Classes</h1>
   <div  style="padding:3px;border: 1px solid #ccc;"><strong>Note: </strong>
   The PHP IMSP Classes have been completely rewritten and merged with the
   Horde Framework.  They are available in the Net_IMSP framework package.
   See <a href="http://www.horde.org">www.horde.org</a> for more information.
   The original work can still be downloaded
   <a href="http://sourceforge.org">here</a> but is no longer supported.</div>
   <img src="<?php echo $this->host_base?>/images/horde3.png" width="109" height="109"  style="margin-right:10px; float:left;" /><br />
   <p>The PHP IMSP Classes are a set of classes written in PHP to communicate with an IMSP server.
       Bundled IMSP support was removed from PHP 4.  These classes, while not a drop in replacement for
       the IMSP functions from earlier PHP versions, will allow you to more easily write code to interact
       with IMSP based address books as well as IMSP based user preference storage.</p>
       <br />
 </div>

 <div class="softwareItemBlock">
   <h1>IMSP Plugin For Outlook 10</h1>
   <p><strong>IMSP Add In for Outlook 2002 (XP)</strong> Access IMSP data stores from within Microsoft Outlook 10.</p>

    <img style="float:right;" src="<?php echo $this->host_base ?>/images/imsp.png" width="159" height="109" />New since Version 1.0:
     <ul>
        <li>Addressbooks are now fully integrated into the Outlook Explorer</li>
        <li>Added support for CRAM-MD5 Authentication</li>
        <li>NOW supports SSL communications</li>
        <li>Enhanced support for read-only or &quot;global&quot; addressbooks</li>
        <li>Outlook Distribution lists now supported</li>
        <li>Expanded server information screen</li>
        <li>Added import functions</li>
        <li>Imporoved menu options and program &quot;flow&quot;</li>
        <li>Minor bug fixes</li>
        <li>Outlook Security messages reduced</li>
     </ul>
   <p style="color:#ff0000;">
    Note:
        This is now released under the GPL Opensource license. This
        application can be downloaded and used under the terms of
        the GPL License from <a href="http://sourceforge.net/projects/imsp-plugin/">sourceforge.org</a>.
        Source code is also available from the <a href="http://sourceforge.net/cvs/?group_id=126164">
        sourceforge cvs repository</a>.</p>
   <p> This application is provided for those interested, but is no longer being
   maintained.</p>
 </div>
