Hello {{$email_data["name"]}}
</br>
Welcome to my website
</br>
Please click on the link below to verify your email address.
</br>
<a href="http://localhost:3000/email/verify/{{$email_data['verificationToken']}}">{{$email_data['verificationToken']}}</a>
</br>
Kind regards,
</br>
Ioannis

