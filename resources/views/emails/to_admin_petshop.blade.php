<body>

<div style="margin-left: 20px">
    <h1 align="center" style="padding: 10px; background: orange; width: 650px;"><img src="https://ayuameliags.files.wordpress.com/2019/07/bell.png"  width="40px" height="40px"> New Reservation for your Pet Shop</h1>

    <h3 style="border-bottom-style: solid; width: 650px; margin-bottom: 10px">Detail Reservation</h3>
        <p>
            <table>
                <tr>
                    <td><img name="user" src="https://ayuameliags.files.wordpress.com/2019/07/user.png"  width="30px" height="30px" style="padding: 10px"></td>
                    <td>{{ $data['customerName'] }}</td>
                </tr>
                <tr>
                    <td><img name="date" src="https://ayuameliags.files.wordpress.com/2019/07/calendar-1.png"  width="30px" height="30px" style="padding: 10px"></td>
                    <td>{{ $data['bookingDate'] }}</td>
                </tr>
                <tr>
                    <td><img name="service" src="https://ayuameliags.files.wordpress.com/2019/07/checked.png"  width="30px" height="30px" style="padding: 10px"></td>
                    <td>{{ $data['selectedService'] }}</td>
                </tr>
                <tr>
                    <td><img name="pet" src="https://ayuameliags.files.wordpress.com/2019/07/pet.png"  width="30px" height="30px" style="padding: 10px"></td></td>
                    <td>{{ $data['petType'] }}</td>

                </tr>
                <tr>
                    <td><img name="quantity" src="https://ayuameliags.files.wordpress.com/2019/07/quantity.png"  width="30px" height="30px" style="padding: 10px"></td>
                    <td>{{ $data['petQuantity'] }} pets</td>
                </tr>
            </table>
        </p>

        <h4 style="border-top-style: solid; padding-top: 20px; width: 650px"> Please login to Golek Petshop website to approve or reject this reservervation. </h4>
        <a style="background: #4281f5; color: white; margin-left: 280px; font-size: 20px" class="btn btn-default" href="http://127.0.0.1:8000/login">Login</a>

</div>
</body>