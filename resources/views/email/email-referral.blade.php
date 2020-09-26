<div style="display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            padding: 50px;
            color: #0e0e0e;
">
    <div>
        <p><b>Hi,</b></p>
        <p> Your friend  {{$data['name']}}, sent you a request to join <b>{{env("APP_NAME")}}</b><br>
            If you want to join or see about <b>{{env("APP_NAME")}}</b> please visit following this url<br>
        <a href="http://{{env("APP_NAME")}}/?ref=20100{{$data['user_id']}}">
            http://{{env("APP_NAME")}}/?ref=20100{{$data['user_id']}} </a><br><br>
        <p><b>Refer your friend to spread our brand you will award credit</b></p><br><br>
        <p>Thanks<br>
            {{env("APP_NAME")}}<br>
        </p>
    </div>
</div>
