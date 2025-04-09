<style> 
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

<div class="header">
        <strong>Company Name</strong> | Official Agreement Document
    </div>

    <div class="footer">
        Page <span class="pagenum"></span> of <span class="totalpages"></span>
    </div>    
    
<div class="content">
    <h2>Agreement Details</h2>
    <p><strong>Tenant Name:</strong> <span id="tenent_name_preview"></span> </p>
    <p><strong>Flat No. :</strong> <span id="flat_no_preview"></span></p>
    <p><strong>Locality:</strong> <span id="locality_preview"></span></p>
    <p><strong>City:</strong> <span id="city_preview"></span></p>
    <p><strong>District:</strong><span id="district_preview"></span></p>
    <p><strong>State:</strong> <span id="state_preview"></span></p>

    <div class="page-break"></div> <!-- Forces a new page -->
        
    <h3>Terms and Conditions</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac lacus ut dui condimentum.</p>
</div>