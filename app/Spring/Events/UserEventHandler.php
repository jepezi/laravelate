<?php namespace Spring\Events;

class UserEventHandler {

  /**
   * Send a welcome email to the new user
   *
   * @param User $user
   * @return void
   */
  public function onUserCreated($user)
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
    $events->listen('user.created', 'Spring\Events\UserEventHandler@onUserCreated');
  }

}