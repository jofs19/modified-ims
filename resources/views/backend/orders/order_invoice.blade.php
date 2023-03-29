<?php use Barryvdh\DomPDF\Facade as PDF; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Memorandum of Receipts</title>
<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: black;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: black;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>
</head>



<body>



  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">

    <tr>
        <td valign="top" class="pt-3 mt-3">
            <br>
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <img src="{{ public_path("frontendv2/assets/img/psu.png")  }}" width="90" alt="Vartouhi" class="pt-3 mt-3">

        </td>
        <td align="right">
            <pre class="font" >
               Pangasinan State University Lingayen, Campus
               Email:psu-edu.ph.com <br>
               Website: <a href="https://www.main.psu.edu.ph/">https://www.main.psu.edu.ph</a>  <br>
               Alvear Street, Poblacion, Lingayen, Philippines, 2401 <br>

            </pre>
        </td>
    </tr>
  </table>
  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Requestor's name:</strong> {{ $order->name }}<br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Phone:</strong> {{ $order->phone }} <br>
             </p>
        </td>
        <td>
          <p class="font">
            <h4><span>Request #:</span> <span  style="color: #0b29d7;">{{ $order->invoice_no}}</span> </h4>
            <h4 class="text-muted"> Date Requested: {{ $order->order_date }} </h4>

              <br>
             </span>
         </p>
        </td>
    </tr>



  </table>
  <br/>
<h3>Requested Items</h3>
  <table width="100%">
    <thead style="background-color: #0b29d7; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Item Name</th>

        <th>Quantity</th>

      </tr>
    </thead>
    <tbody>
     @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_thumbnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>
        <td align="center">{{ $item->qty }}</td>

      </tr>


      @endforeach

    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">


  </table>
  <div class="thanks mt-3">
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
