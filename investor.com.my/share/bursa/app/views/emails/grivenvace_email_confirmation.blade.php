<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Dear {{ $Name }}, Please verify your email</title>
        <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,700,400italic,700italic' rel='stylesheet' type='text/css'>
                    <style type="text/css"><!--
                        
                        a {
                            color: #b8312f;text-decoration: none;outline: none;
                        }

                        a:hover {
                            color: #3a87ad;
                            text-decoration: none;
                        }


                        --></style>
                    </head>
                    <body style="font-family: 'Open Sans', sans-serif;
                            font-size: 16px;
                            line-height:26px;
                            color: #777;
                            background-color: #eee;
                            height: 100%;">
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td><h2 style="font-size:28px; line-height: 36px; font-family: Arial, sans-serif; color:#333; ">Dear <span style="color: green">{{ $Name }}</span>, Please verify your email </h2></td>
                                            <td align="right">
                
                                       <!-- <form action="{{url('grievance/verify_email')}}" id="form1" method="get" enctype="multipart/form-data">

                                            <input type="hidden" class="input-xxlarge" name="Name" value="{{$Name}}">
                                            <input type="hidden" class="input-xxlarge" name="Address" value="{{$Address}}">
                                            <input type="hidden" class="input-xxlarge" name="City" value="{{$City}}">
                                            <input type="hidden" class="input-xxlarge" name="JobTitle" value="{{$JobTitle}}">
                                            <input type="hidden" class="input-xxlarge" name="State" value="{{$State}}">
                                            <input type="hidden" class="input-xxlarge" name="Email" value="{{$Email}}">
                                            <input type="hidden" class="input-xxlarge" name="PostalCode" value="{{$PostalCode}}">
                                            <input type="hidden" class="input-xxlarge" name="Phone" value="{{$Phone}}">
                                            <input type="hidden" class="input-xxlarge" name="DDLCountry" value="{{$DDLCountry}}">
                                            <input type="hidden" class="input-xxlarge" name="message1" value="{{$Message1}}">
                                            <input type="hidden" class="input-xxlarge" name="CompanyName" value="{{$CompanyName}}">
                                            <input type="hidden" class="input-xxlarge" name="Filename" value="{{$Filename}}">
                                            
                                            <input type="submit" class="button" value="Verify Email" name="Submit" style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; font-size: 18px; border-radius: 4px; color: #ffffff; background-color: #b8312f;border-color: #a42c2a;">

                                        </form>-->
                                        <a href="{{url('grievance/verify_email?Name='.$Name.'&Address='.$Address.'&City='.$City.'&JobTitle='.$JobTitle.'&State='.$State.'&Email='.$Email.'&PostalCode='.$PostalCode.'&Phone='.$Phone.'&DDLCountry='.$DDLCountry.'&message1='.$Message1.'&CompanyName='.$CompanyName.'&Filename='.$Filename)}}"  style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; font-size: 18px; border-radius: 4px; color: #ffffff; background-color: #b8312f;border-color: #a42c2a;">Verify Email</a>
                                        <!--
                                            <a href="{{ URL::to('/') }}/grievanceform/verifyEmail/{{ $Email }}" style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; font-size: 18px; border-radius: 4px; color: #ffffff; background-color: #b8312f;border-color: #a42c2a;">Verify Email</a>
                                            -->

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <div style="clear: both; margin-top: 0px; margin-bottom: 25px; padding: 0px;">
                                                    <div style="padding: 15px; background: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom: 1px solid #e5e5e5;">
                                                        <div style="float: left; font-family: 'Open Sans', Arial, sans serif; font-size: 24px; line-height: 24px; color:#333; margin: 0;  padding: 0;">Account Details</div>
                                                        <div style="clear:both"></div>
                                                    </div>
                                                    <div style="background: #FFFFFF; padding: 15px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                        <table width="100%" cellpadding="8">
                                                            <tbody>
                                                                <tr bgcolor="#f5f5f5">
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Status</span></td>
                                                                    <td><div style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; color: #fff; background-color: #f0ad4e; border-color: #eea236">Pending for Email Confirmation</div> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Name</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Name}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Email</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Email}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Address</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Address}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">City</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$City}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">State</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$State}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Country</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$DDLCountry}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Postal Code</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$PostalCode}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Phone</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Phone}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Subject</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Subject}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Message</span></td>
                                                                    <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{$Message1}}</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td><span style="font-size: 15px; font-weight: 300; font-family: 'Open Sans', sans-serif;">©2017 <a href="http://www.webqom.com" target="_blank" style="color: #b8312f;text-decoration: none;outline: none;">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a style="font-family: 'Open Sans', sans-serif; font-size: 15px; color: #b8312f;text-decoration: none;outline: none;" href="mailto:support@webqom.com">Webqom Support</a>.</span></td>
                                                        <td align="right"><img src="{{ URL::to('/') }}/admin/images/logo_webqom.png" alt="Webqom Technologies"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table>
                    </body>
                    </html>
