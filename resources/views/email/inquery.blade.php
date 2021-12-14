<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ $subject }}</title>
</head>

<body>
    <div style="max-width: 800px; margin: auto; border: 1px solid #ccc;">
        <div style="background: #ebebeb; text-align: center; font-size: 48px; padding: 30px 15px;">
            {{ $setting->title }}
        </div>
        <div style="padding: 15px">
            Dear <span style="font-weight: bold;">{{ $user->name }}</span>,<br>
            <h3>{{ $subject }}</h3>
            <p>Find details as below:</p>
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Name</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Mobile</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $user->mobile }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Email</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $user->email }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Title</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->title }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Category</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->category->name }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Size</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->size->name }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Color</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->color->name }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Price</th>
                    <td style="border: 1px solid #ccc; padding:5px;">₹ {{ $inquery->price }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">GST Price</th>
                    <td style="border: 1px solid #ccc; padding:5px;">₹ {{ $inquery->gst_price }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Total Price</th>
                    <td style="border: 1px solid #ccc; padding:5px;">₹ {{ $inquery->total_price }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Txn Id</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->txn_id }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Date</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ date('d M Y h:i A',strtotime($inquery->created_at)) }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #ccc; padding:5px; text-align: left;">Remarks</th>
                    <td style="border: 1px solid #ccc; padding:5px;">{{ $inquery->notes }}</td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <p style="text-align: center;">We will contact to you as soon as posiable.</p>
            <p>&nbsp;</p>
            <p>
                Thanks &amp; Regards<br>
                {{ $setting->title }}
            </p>
        </div>
    </div>
</body>

</html>