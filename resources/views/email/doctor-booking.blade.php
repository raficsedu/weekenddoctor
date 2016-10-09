<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>WeekendDocs</title>
</head>

<body>

<table width="600" border="0" align="center" style="border:1px solid #dddddd;">
    <tr>
        <td height="5px" bgcolor="#298dc6"></td>
    </tr>
    <tr>
        <td align="center" style="padding:7px 0;"><img src="{{url('public/images/logo.png')}}" width="308" height="69"
                                                       alt="Logo"/></td>
    </tr>
    <tr>
        <td align="center" style="padding:3px 0;"><img src="{{url('public/images/doc.png')}}" width="180" height="261"
                                                       alt="Doctor"/></td>
    </tr>
    <tr>
        <td align="center">
            <h3 style="color:#298dc6; font-size:24px; font-family:Arial, Helvetica, sans-serif;">
                Hy, {{$doctor_name}}
            </h3>

            <p style="color:#333333; font-size:16px; font-family:Arial, Helvetica, sans-serif;">
                You have received a booking and here is your Booking Details<br><br>
                <span style="font-weight: bold;color: #298dc6">Patient Name</span> : {{$patient_name}}<br>
                <span style="font-weight: bold;color: #298dc6">Date</span> : {{$date}}<br>
                <span style="font-weight: bold;color: #298dc6">Time</span> : {{$time}}<br>
            </p>
        </td>
    </tr>
    <tr>
        <td align="center">
            <p style="color:#333333; font-size:16px; font-family:Arial, Helvetica, sans-serif; margin-top:40px;">
                Thank you for using WeekendDocs
            </p>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="30px" bgcolor="#CCCCCC" align="center"
            style="color:#333333; font-family:Arial, Helvetica, sans-serif;">copyright@weekenddocs.com
        </td>
    </tr>

</table>

</body>
</html>
