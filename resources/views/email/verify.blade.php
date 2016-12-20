<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Evoneur Email Notification</title>
    <style>
        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important; }
            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important; }
            table[class=body] .content {
                padding: 0 !important; }
            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
            table[class=body] .btn table {
                width: 100% !important; }
            table[class=body] .btn a {
                width: 100% !important; }
            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }}

        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%; }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%; }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }

    </style>
</head>
<body class="" style="background-color: #EAECED;font-family: sans-serif;-webkit-font-smoothing: antialiased;font-size: 14px;line-height: 1.4;margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background-color: #fff;">
    <tr>
        <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;display: block;max-width: 90%;padding: 5% !important;width: 90% !important;margin: 0 auto !important;background: #EAECED !important;">
            <div class="content" style="box-sizing: border-box;display: block;margin: 0 auto;max-width: 100%;padding: 0 !important;">

                <!-- START CENTERED WHITE CONTAINER -->
                <table class="main" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;background: #FFF;border-radius: 0 !important;border: 1px solid #003964;margin: auto;">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper" style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;box-sizing: border-box;padding: 10px !important;">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;">
                                <tr>
                                    <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">
                                        <h3 class="user_name" style="font-size: 20px;text-transform: capitalize;margin-top: 3%;">Hello {{$name}},</h3>
                                        <p class="email_body" style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Thank you for joining with MyeHealth . Please click the link below to verify your email .</p>
                                        <p class="email_body" style="font-family: sans-serif;font-size: 16px !important;font-weight: normal;margin: 0;margin-bottom: 15px;">Verification Link : <a href="{{url('/activate/'.$confirmation_code)}}">{{url('/activate/'.$confirmation_code)}}</a></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- END MAIN CONTENT AREA -->
                </table>

                <!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td style="font-family: sans-serif;font-size: 16px !important;vertical-align: top;">&nbsp;</td>
    </tr>
</table>
</body>
</html>
