
  <html>

    <head>
      <link rel="stylesheet" href="{{asset('style.css')}}" />
    </head>
    
    <body>
    
    <div class="card-container">
      <span class="pro"><img src="{{asset('img/logo.png')}}" style="width: 100px;" /> </span>
      <img class="round" src="{{asset($customer_data->customer_photo_name)}}" alt="user" width="120" height="120" />
      <h3>{{$customer_data->first_name.' '.$customer_data->last_name}}</h3>
      <h6> {{$e_passes['e_pass']->city_name}} </h6>
    
      <div class="skills">
        <h4> E-Pass </h4>
        <ul>
          <li> Pass Number : {{$e_passes['e_pass']->e_pass_no}} </li>
          <!-- <li> Address : Camp Road, Amravati</li> -->
        </ul>
      </div>
    
      <div style="padding:20px;">
    
        <table> 
          
          <thead>
            <tr>
            <th scope="col"> Contact No. </th>
            <th scope="col"> Start Date </th>
            <th scope="col"> End Date </th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td data-label="Account"> {{$customer_data->contact_no}}  </td>
            <td data-label="Due Date">{{$e_passes['e_pass']->from_date}}</td>
            <td data-label="Amount">{{$e_passes['to_date']}} </td>
            </tr>
          </tbody>
          </table>
          <br>
          {!! QrCode::size(150)->generate($e_passes['e_pass']->e_pass_no); !!} 
      </div>
    
      <div class="buttons" style="padding:10px;">
        <button class="primary ghost">
          visit us at www.myatoz.in
        </button>
        <button class="primary ghost">
          Contact us on +91 880 599 6248
        </button>
      </div>
      
    </div>
    <script>
      window.onload = function(){
window.print();
};
    </script>                
    </body>
    
    </html>