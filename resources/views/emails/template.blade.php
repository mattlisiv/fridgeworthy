<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>email template</title>
    <style type="text/css">
        body {
            padding-top: 20px;
        }

        @font-face {
            font-family: 'ralewayregular';
            src: url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.eot');
            src: url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.eot?#iefix') format('embedded-opentype'),
            url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.woff2') format('woff2'),
            url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.woff') format('woff'),
            url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.ttf') format('truetype'),
            url('http://www.fridge-worthy.com/fonts/raleway-regular-webfont.svg#ralewayregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        a:hover {
            border-bottom: 1px #68696a dotted;
        }

        a.clickhere:hover {
            border-bottom: 1px #ffffff dotted;
        }
    </style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                            <tr>
                                <td width="200"><a href="http://www.fridge-worthy.com" target="_blank"><img src="http://www.fridge-worthy.com/images/enewsimgs/fwlogo-enews.gif" width="187" height="135" border="0" alt="FridgeWorthy logo"/></a></td>

                                <td width="400"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="46" align="right" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>

                                                    </tr>
                                                </table></td>
                                        </tr>

                                        <tr>
                                            <td height="30"><img src="http://www.fridge-worthy.com/images/enewsimgs/bluebar.gif" width="400" height="30" border="0" alt=""/></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="40px">&nbsp;</td>

                                <td width="520px" align="left" valign="top">
                                    @if(!is_null($generic) && $generic == true )
                                        <font style="font-family: 'ralewayregular', Helvetica, sans-serif; color:#000000; font-size:24px;">Hello,</font><br /><br />
                                    @else
                                    <font style="font-family: 'ralewayregular', Helvetica, sans-serif; color:#000000; font-size:24px;">Hi {{$user->full_name}},</font><br /><br />
                                    @endif
                                    <font style="font-family:Arial, Helvetica, sans-serif; font-size: 13px; line-height: 17px; color:#68696a;">{{$message1}}<br /><br />
                                        {{$message2}}
                                        <br /><br />
                                        On behalf of FridgeWorthy,<br />
                                        {{$signer}}</font></td>
                                <td width="40px">&nbsp;</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td><img src="http://www.fridge-worthy.com/images/enewsimgs/orange-triangle.gif" width="108" height="12" style="display:block" border="0" alt=""/></td>
                                        </tr>
                                        @if(!is_null($link_text))
                                        <tr>
                                            <td align="center" valign="middle" height="40" bgcolor="#ee7830"><font style="font-family: 'ralewayregular', Helvetica, sans-serif; color:#ffffff; font-size: 16px;"><a href="{{$link}}" target="_blank" class="clickhere" style="color:#ffffff; text-decoration: none;">{{$link_text}}</a></font></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td height="10" align="center" valign="middle" bgcolor="#ee7830"> </td>
                                        </tr>
                                    </table></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><img src="http://www.fridge-worthy.com/images/enewsimgs/bluebar-lg.gif" width="600" height="30" style="display:block;" border="0" alt=""/></td>
                </tr>

                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="255px" align="left">&nbsp;</td>
                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>
                                <td width="26px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px;"><a href="http://www.fridge-worthy.com/infographic" style="color:#68696a; text-decoration: none;">about</a></font></td>
                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>
                                <td width="26px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px;"><a href="http://www.fridge-worthy.com" style="color:#68696a; text-decoration: none;">press</a></font></td>
                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>
                                <td width="34px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px;"><a href="http://www.fridge-worthy.com" style="color:#68696a; text-decoration: none;">contact</a></font></td>
                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>
                                <td width="70px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px; color:#68696a;">stay connected</font></td>
                                <td width="20px">&nbsp;</td>
                                <td width="23px" align="left"><a href="https://www.facebook.com/" target="_blank"><img src="http://www.fridge-worthy.com/images/enewsimgs/facebook.gif" alt="facebook" width="23" height="19" border="0" /></a></td>
                                <td width="23px" align="left"><a href="https://twitter.com/" target="_blank"><img src="http://www.fridge-worthy.com/images/enewsimgs/twitter.gif" alt="twitter" width="23" height="19" border="0" /></a></td>
                                <td width="23px" align="left"><a href="http://www.linkedin.com/" target="_blank"><img src="http://www.fridge-worthy.com/images/enewsimgs/in.gif" alt="linkedin" width="23" height="19" border="0" /></a></td>
                                <td width="20px">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>


                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="115px" align="left">&nbsp;</td>

                                <td width="160px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px; color:#68696a;">Copyright © 2014 FridgeWorthy, LLC</a></font></td>

                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>


                                <td width="95px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px; color:#68696a;">phone: <a href="tel:404-444-8551" style="color:#68696a; text-decoration: none;">404-444-8551</a></font></td>

                                <td width="20px" align="left" style="text-align:center;"><font style="font-family:Arial, Helvetica, sans-serif; color:#68696a; font-size: 10px;">|</font></td>

                                <td width="145px" align="left"><font style="font-family:Arial, Helvetica, sans-serif; font-size: 10px; color:#68696a;">email: <a href="mailto:support@fridge-worthy.com" style="color:#68696a; text-decoration: none;">support@fridge-worthy.com</a></font></td>

                                <td width="20px" align="left">&nbsp;</td>
                            </tr>
                        </table>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>

            </table></td>
    </tr>
</table>
</body>
</html>
