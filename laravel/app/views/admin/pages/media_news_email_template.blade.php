<html>

<body style="font-family: 'Open Sans', sans-serif;font-size: 16px;line-height:26px;color: #777;background-color: #eee;height: 100%;" >
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><h2 style="font-size:28px; line-height: 36px; font-family: Arial, sans-serif; color:#333; ">Media News Email</h2></td>
            <td align="right"><a href="{{ URL::to('admin/publishNews?publish='.$data->id) }}" style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; font-size: 18px; border-radius: 4px; color: #ffffff; background-color: #b8312f;border-color: #a42c2a;">Publish</a></td>
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
               <div style="float: left; font-family: 'Open Sans', Arial, sans serif; font-size: 24px; line-height: 24px; color:#333; margin: 0;  padding: 0;">News Info</div>
               <div style="clear:both"></div>
            </div>
            
            <div style="background: #FFFFFF; padding: 15px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
            	<table width="100%" cellpadding="8">
                    <tbody>
                   	  <tr bgcolor="#f5f5f5">
                       	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Status</span></td>
                        <td><div style="display: inline-block; margin-bottom: 0; font-family: 'Open Sans', sans-serif; font-size: 16px; font-weight: 400; text-align: center; vertical-align: middle; border: 1px solid transparent; padding: 6px 12px; color: #fff; background-color: #f0ad4e; border-color: #eea236"> {{ $data->statusText }} </div> </td>
                      </tr>
                      <tr>
                      	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">To</span></td>
                        <td>
                        @foreach( $email_ids as $reciptIds)
                        <a style="font-family: 'Open Sans', sans-serif; font-size: 16px;" href="mailto:{{ $reciptIds }}">{{ $reciptIds }}</a>;
                        @endforeach

                        </td>
                      </tr>
                      <tr>
                      	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">From</span></td>
                          <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">WEB88IR Investor Relation Solution</span></td>
                      </tr>
                      <tr bgcolor="#f5f5f5">
                      	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Subject</span></td>
                          <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;"><strong>Media News:</strong> {{$data->title }}({{$data->status}})</span></td>
                      </tr>
                      <tr>
                      	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Date</span></td>
                          <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">{{ date('d-M-Y',$data->date) }}</span></td>
                      </tr>
                      <tr bgcolor="#f5f5f5">
                      	  <td width="140"><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;">Source / URL</span></td>
                          <td><span style="font-family: 'Open Sans', sans-serif; font-size: 16px; color:#777;"> {{ $data->footer }}</span><br/> <a style="font-family: 'Open Sans', sans-serif; size: 16px;" href="{{ $data->link }}" target="_blank">{{ $data->link }}</a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
         </div>
        </td>
      </tr>
      <tr>
        <td>
        	<div style="clear: both; margin-top: 0px; margin-bottom: 25px; padding: 0px;">
            	<div style="padding: 15px; background: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom: 1px solid #e5e5e5;">
               <div style="float: left; font-family: 'Open Sans', Arial, sans serif; font-size: 24px; line-height: 24px; color:#333; margin: 0;  padding: 0;">News Content</div>
               <div style="clear:both"></div>
            </div>
            
            <div style="background: #FFFFFF; padding: 15px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td>
                            	<h2 style="color: #cc0000; font-size:28px; line-height: 36px; font-family: Arial, Helvetica, sans-serif; ">{{ $data->title }}</h2>
                                <blockquote style="padding: 10px 20px; margin: 0 0 20px; font-size: 17.5px; border-left: 5px solid #eee">
                                    <footer><cite title="Source Title"><span style="font-size: 15px; color:#999; font-style: normal; font-family: 'Open Sans', sans-serif;">{{ $data->footer }}</span></cite></footer>
                                </blockquote>
                                <div style="float:left;">
                                {{ HTML::image($data->news_image, 'Insert Image', array('style'=> 'display: block; max-width: 100%; height: auto; margin-right: 15px;' ) ) }}
                                </div>

                                  <p style="margin:0 0 20px 0; padding: 0; font-weight: 300; font-family: 'Open Sans', sans-serif; font-size: 16px;">{{ $data->content }}</p>
                                  <div style="clear:both"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>		
            <div style="clear:both"></div>
        </div> 
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span style="font-size: 15px; font-weight: 300; font-family: 'Open Sans', sans-serif;">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a style="font-family: 'Open Sans', sans-serif; font-size: 15px;" href="mailto:support@webqom.com">Webqom Support</a>.</span></td>
            <td align="right">{{ HTML::image('admin/images/logo_webqom.png', 'Webqom Technologies') }}</td>
          </tr>
      </table>
        </td>
      </tr>

    </table></td>
  </tr>

</table>

</body>
</html>