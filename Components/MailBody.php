<?php

function MailActivation($p1){

echo '<style type="text/css">
@media only screen and (max-width: 480px) {
  table {
    display: block !important;
    width: 100% !important;
  }
  
  td {
    width: 480px !important;
  }
}
</style>

<body style="font-family: '."Malgun Gothic".', Arial, sans-serif; margin: 0; padding: 0; width: 100%; -webkit-text-size-adjust: none; -webkit-font-smoothing: antialiased;">

<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" id="background" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;">
    <tr>
      <td align="center" valign="top">
        <table width="600" border="0" bgcolor="#F6F6F6" cellspacing="0" cellpadding="20" id="preheader">
          <tr>
            <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td valign="top" width="600">
                    <div class="preheader_links">
                      <p style="color: #666666; font-size: 10px; line-height: 22px; text-align: right;">Dezactiveaza mesaje de genu? <a href="javascript:void(0)" :hover="text-decoration: underline;" onclick="myEvent();" onmouseover="this.style.textDecoration='."underline".'" onmouseout="this.style.textDecoration='."none".'" style="color: #666666; font-weight: bold; text-decoration: none;">Click here</a></p>
                    </div>
                  </td>
                 </tr>
                 <tr>
                  <td valign="top" width="600">
                    <div class="logo">
                      <a href="javascript:void(0)" onclick="myEvent();" onmouseover="this.style.color='."#666666".'" onmouseout="this.style.color='."#514F4E".'" style="color: #514F4E; font-size: 18px; font-weight: bold; text-align: left; text-decoration: none;">readAbook inspira</a>
                    </div>
                  </td>
                </tr>
            </table>
            </td>
          </tr>
        </table>

 <table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" id="header_container">
          <tr>
            <td align="center" valign="top">
              <table width="100%" border="0" bgcolor="#2e41ad" cellspacing="0" cellpadding="0" id="header">
                <tr>
                  <td valign="top" class="header_content">
                    <h1 style="color: #F4F4F4; font-size: 24px; text-align: center;">Link-ul de activare</h1>
                  </td>
                </tr>
              </table>
              <!-- // END #header -->
            </td>
          </tr>
        </table>
        <!-- // END #header_container -->

        <table width="600" border="0" bgcolor="#909ff4" cellspacing="0" cellpadding="20" id="body_container">
          <tr>
            <td align="center" valign="top" class="body_content">
              <table width="100%" border="0" cellspacing="0" cellpadding="20">
                <tr>
                  <td valign="top">
                    <h2 style="color: #FFFFFF; font-size: 22px; text-align: center;">Pentru activare</h2>
                    <p style="color: #FFFFFF; font-size: 14px; line-height: 22px; text-align: center;">Este suficient sa faceti click pe buton.</p>
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <div>
                    <a href="'.$p1.'" onclick="myEvent();" style="background-color:#474544;border-radius:3px;color:#FFFFFF;display:inline-block;font-family:'."Helvetica".',Arial,sans-serif;font-size:13px;height:45px;line-height:45px;text-align:center;text-decoration:none;text-transform:uppercase;width:150px;-webkit-text-size-adjust:none;mso-hide:all;" onmouseover="this.style.backgroundColor='."#514F4E".'" onmouseout="this.style.backgroundColor='."#474544".'">Activeaza</a>
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
  <table width="600" border="0" cellspacing="0" cellpadding="20" id="body_info_container">
        <tr>
          <td align="center" valign="top" class="body_info_content">
            <table width="100%" border="0" cellspacing="0" cellpadding="20">
              <tr>
                <td valign="top">
                  <h2 style="color: #474544; font-size: 20px; text-align: center;">Va multumim!</h2>
                  <p style="color: #666666; font-size: 14px; line-height: 22px; text-align: left;"> Activation linck sucessfull send.</p>
              </td>
          </tr>
      </table>
  </td>
</tr>
</table>
</td>
</tr>
</table>
</body>';
}








?>
