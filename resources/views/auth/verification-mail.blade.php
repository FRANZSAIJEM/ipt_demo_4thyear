<p>Welcome {{ $user->name }}</p>


<p>You received this email as a result of your registration to our website</p>
<p>Please click on the verification link to verify you account</p>

<p>
    <a href="{{ url('/verification/' . $user->id . '/' . $user->remember_token) }}">Click Me!</a>
</p>
