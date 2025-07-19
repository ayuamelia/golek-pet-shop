<body>

<div style="margin-left: 20px">
    <h1 align="center" style="padding: 10px; background: orange; width: 650px;"><img src="https://ayuameliags.files.wordpress.com/2019/07/bell.png"  width="40px" height="40px"> Your reservation was {{ $dataToCustomer['bookingStatus'] }}</h1>

    <h4 style="border-bottom: solid; width: 650px">Customer Information</h4>
    <table>
        <tr>
            <td style="width: 100px; font-size: 15px">Name</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['customerName'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Email</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['customerEmail'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Phone</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['customerPhone'] }}</td>
        </tr>
    </table>

    <h4 style="border-bottom: solid; width: 650px">Petshop Details</h4>
    <table>
        <tr>
            <td style="width: 100px; font-size: 15px">Name</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['petshopName'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Address</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['petshopAddress'] }}, {{ $dataToCustomer['petshopDistrict'] }}, {{ $dataToCustomer['petshopCity'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Phone</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['petshopPhone'] }}</td>
        </tr>
    </table>


    <h4 style="border-bottom: solid; width: 650px">Reservation Details</h4>
    <table>
        <tr>
            <td style="width: 100px; font-size: 15px">Booking Date</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['bookingDate'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Service</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['service'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Pet Type</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['petType'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Quantity</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['petQuantity'] }}</td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Estimated Price</td>
            <td style="font-size: 15px">: Rp{{ number_format($dataToCustomer['price']) }}
            </td>
        </tr>
        <tr>
            <td style="width: 100px; font-size: 15px">Note</td>
            <td style="font-size: 15px">: {{ $dataToCustomer['bookingNote'] }}</td>
        </tr>
    </table>

    <!--<h3 style="margin-left: 80px">Hope you enjoyed our services and your pet was Happy!</h3>-->

</div>
</body>