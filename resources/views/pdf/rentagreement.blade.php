<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agreement PDF</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 50px 30px 80px; /* Adjust margins to avoid content overlapping header/footer */
        }
        
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            text-align: center;
            line-height: 60px;
            background-color: #343a40;
            color: white;
            font-size: 18px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            text-align: center;
            line-height: 40px;
            background-color: #343a40;
            color: white;
            font-size: 14px;
        }

        .content {
            margin-top: 80px; /* Avoid overlap with the fixed header */
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
<div class="header">
        <strong>Company Name</strong> | Official Agreement Document
    </div>

    <div class="footer">
        Page <span class="pagenum"></span> of <span class="totalpages"></span>
    </div>

    <div class="content">
        <h2>Agreement Details</h2>
        <p><strong>Tenant Name:</strong> {{ $rent['tenant_name']}}</p>
        <p><strong>Flat No. :</strong> {{ $rent['flat_no'] }}</p>
        <p><strong>Locality:</strong> {{ $rent['locality'] }}</p>
        <p><strong>City:</strong> {{ $rent['city'] }}</p>
        <p><strong>District:</strong> {{ $rent['district'] }}</p>
        <p><strong>State:</strong> {{ $rent['state'] }}</p>

        <div class="page-break"></div> <!-- Forces a new page -->
        
        <h3>Terms and Conditions</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac lacus ut dui condimentum.</p>
    </div>

 
    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_text(520, 780, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10);
        }
    </script>
</body>
</html>
