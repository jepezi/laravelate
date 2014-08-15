<?php namespace Spring\Events;

class UserEventHandler 
{

  public function onUserActivate($user)
  {
    $user->activation_code = $this->getRandomString();
    $user->save();

    $data['user'] = $user;
    \Mail::send('emails.activate', $data, function($message) use ($user)
    {
      $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject(\Lang::get('activation.emailsubject'));
    });
  }

  public function onUserSignedUp($user)
  {
    $data['user'] = $user;
    \Mail::send('emails.welcome', $data, function($message) use ($user)
    {
      $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Welcome!');
    });
  }

  /**
   * Register the listeners for the subscriber.
   *
   * @param Illuminate\Events\Dispatcher $events
   * @return array
   */
  public function subscribe($events)
  {
    $events->listen('user.signedup', 'Spring\Events\UserEventHandler@onUserSignedUp');
    $events->listen('user.activate', 'Spring\Events\UserEventHandler@onUserActivate');
  }

  /*
  |--------------------------------------------------------------------------
  | Helper function
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function getRandomString($length = 42)
  {
    // We'll check if the user has OpenSSL installed with PHP. If they do
    // we'll use a better method of getting a random string. Otherwise, we'll
    // fallback to a reasonably reliable method.
    if (function_exists('openssl_random_pseudo_bytes'))
    {
      // We generate twice as many bytes here because we want to ensure we have
      // enough after we base64 encode it to get the length we need because we
      // take out the "/", "+", and "=" characters.
      $bytes = openssl_random_pseudo_bytes($length * 2);

      // We want to stop execution if the key fails because, well, that is bad.
      if ($bytes === false)
      {
        throw new \RuntimeException('Unable to generate random string.');
      }

      return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }

    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
  }

}