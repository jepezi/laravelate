<?php namespace Spring\Inventories;

use Illuminate\Support\Str;
use Spring\Repositories\UserInterface;
use Hash;

class UserInventory extends AbstractInventory implements Inventory {

  protected $repository;

  public function __construct(UserInterface $repository)
  {

    parent::__construct();

    $this->repository = $repository;

  }

  public function changepassword(array $data)
  {

    if (! $this->isValid('changepassword', $data))
    {
      return false;
    }

    // check if current_password matches db
    $user = \App::make('SpringApp')->user;

    if (! Hash::check( $data['current_password'] , $user->password) )
    {
      // No match, 
      // add errors to inventory 
      // and exit (controller will redirect with errors from inventory)
      $this->errors->add('current_password', 'Your current password is incorrect.');
      return false;
    }

    // Matched! 
    // update db and return the result (model)
    return $this->repository->update( array_except($data, ['current_password']) );
  }

  public function update(array $data)
  {

    if (! $this->isValid('update', $data))
    {
      return false;
    }

    return $this->repository->update( $data );
  }

  /*
  |--------------------------------------------------------------------------
  | Auth or Create
  |--------------------------------------------------------------------------
  | 
  | From Social Connect (AuthController), 
  | - if he authorised before, update token and log him him (userAuthed)
  | - if new, create new user for him (userCreated)
  | 
  */
  public function authOrCreate($observer, $auth, $user_data, $token)
    {
      // check if user was authed before from DB (being a member from clicking Login with XXX)
      // if yes, $auth return user model
      // we just update user token
      if($auth)
      {
        return $this->updateUserToken($observer, $auth, $token);
      }

      // if no, we create new user from provider's data
      // and then present them the edit form to check if modification needed
      return $this->createUserFromSocialData($observer, $user_data, $token);
    }  
  /*
  |--------------------------------------------------------------------------
  | Create - public
  |--------------------------------------------------------------------------
  | 
  | Called from Auth Controller - observer is authcontroller passed from controller itself, 
  | notify back to controller for success or invalid data
  | 
  */
  public function create($observer, array $data)
  {

    if (! $this->isValid('create', $data))
    {
      // return false;
      return $observer->invalid($this->errors());
    }

    // return $this->repository->create($data);
    return $this->createValidModel($observer, $data);
  }

  /*
  |--------------------------------------------------------------------------
  | Private methods
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */

  private function createUserFromSocialData($observer, $user_data, $token)
  {
    
    $data = $this->formatDataForDB($user_data);
    $data['oauth_token'] = $token->accessToken;

    return $this->createValidModel($observer, $data, true);
  }

  private function formatDataForDB($user_data)
  {
    /*
    -----------
    user_data from oauth provider
    -----------
      object(League\OAuth2\Client\Provider\User)[350]
      protected 'uid' => string '10152529521905376' (length=17)
      protected 'nickname' => null
      protected 'name' => string 'Jirat Arinrith' (length=14)
      protected 'firstName' => string 'Jirat' (length=5)
      protected 'lastName' => string 'Arinrith' (length=8)
      protected 'email' => string 'jepezi@hotmail.com' (length=18)
      protected 'location' => null
      protected 'description' => null
      protected 'imageUrl' => string 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1.0-1/p100x100/223439_10150232831480376_4417138_n.jpg' (length=108)
      protected 'urls' => 
      array (size=1)
        'Facebook' => string 'https://www.facebook.com/app_scoped_user_id/10152529521905376/' (length=62)
      */
    // $fillable = array('email', 'password', 'first_name', 'last_name', 'message', 
    //    'website', 'twitter', 'gender', 'oauth_token', 'oauth_token_secret', 'uid', 'avatar', 'location', 'username');

    return [
            'uid'             => $user_data->uid,
            'username'        => $user_data->nickname,
            'first_name'      => $user_data->firstName,
            'last_name'       => $user_data->lastName,
            'email'           => $user_data->email,
            'location'        => $user_data->location,
            'message'         => $user_data->description,
            'avatar'          => $user_data->imageUrl,
            'website'         => array_values($user_data->urls)[0],
        ];
  }

  private function updateUserToken($observer, $user, $token)
  {
    $user->oauth_token = $token->accessToken;
    // $user->oauth_token_secret = ''; // seems like oath2 doesn't have token_secret, oath1 like twitter does
    if (! $user->save() )
    {
      $this->errors->add('error', 'Unknown error. Please try again.');
      return $observer->invalid( $this->errors() );
    }

    return $observer->userAuthed($user);
  }

  private function createValidModel($observer, $data, $fromSocial = false)
  {
    $model = $this->repository->create($data);

    if (! $model) 
    {
      $this->errors->add('error', 'Unknown error. Please try again.');
      return $observer->invalid( $this->errors() );
    }

    return $observer->userCreated($model, $fromSocial);
  }

}