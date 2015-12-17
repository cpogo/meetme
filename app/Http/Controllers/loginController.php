<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Redirector;
use google\apiclient\src\Google\Client;
use google\apiclient\src\Google\Service\Calendar;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { // Get the API client and construct the service object.
      $client = self::getClient();
      $service = new \Google_Service_Calendar($client);

      // Print the next 10 events on the user's calendar.
      $calendarId = 'primary';
      $optParams = array(
        'maxResults' => 10,
        'orderBy' => 'startTime',
        'singleEvents' => TRUE,
        'timeMin' => date('c'),
      );
      $results = $service->events->listEvents($calendarId, $optParams);
      $resultados = $service->calendarList->get($calendarId);
      if (count($results->getItems()) == 0) {
        print "No upcoming events found.\n";
      } else {
        print "Upcoming events:\n";
        foreach ($results->getItems() as $event) {
          $start = $event->start->dateTime;
          if (empty($start)) {
            $start = $event->start->date;
          }
          printf("%s (%s)\n", $event->getSummary(), $start);
        }
      }
      dd($results);
    }

    private static function getClient() {
        $client = new \Google_Client();
        $client->setApplicationName('Meet me');
        $client->setScopes(implode(' ', array(\Google_Service_Calendar::CALENDAR) ) );
        $client->setAuthConfigFile(__DIR__.'/client_secret.json');
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $credentialsPath = self::expandHomeDirectory('~/credentials/calendar-php-quickstart.json');
        if (file_exists($credentialsPath)) {
          $accessToken = file_get_contents($credentialsPath);
        } else {
          // Request authorization from the user.
          $authUrl = $client->createAuthUrl();
          printf("Open the following link in your browser:\n%s\n", $authUrl);
          print 'Enter verification code: ';
          $authCode = '4/S5dwdC4c3jNEvpAXZ6dhqGbAWoRjT94gtW1NJ72Gx9U#';

          // Exchange authorization code for an access token.
          $accessToken = $client->authenticate($authCode);

          // Store the credentials to disk.
          if(!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
          }
          file_put_contents($credentialsPath, $accessToken);
          printf("Credentials saved to %s\n", $credentialsPath);
        }
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
          $client->refreshToken($client->getRefreshToken());
          file_put_contents($credentialsPath, $client->getAccessToken());
        }
        return $client;
      }
      /**
       * Expands the home directory alias '~' to the full path.
       * @param string $path the path to expand.
       * @return string the expanded path.
       */
      private static function expandHomeDirectory($path) {
          $homeDirectory = getenv('HOME');
          if (empty($homeDirectory)) {
            $homeDirectory = getenv("HOMEDRIVE") . getenv("HOMEPATH");
          }
            return str_replace('~', realpath($homeDirectory), $path);
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(){
        session_start();
        if( isset( $_SESSION['key'] ) ){
            session_unset();
            session_destroy();
            return view('index');
        }else{
            return view('index');
        }
    }

    public function login(Request $request)
    {
        session_start();
        if ( User::isUserExists($request->input_username) )
        {
            $user = User::getUserByUsername($request->input_username);
            if ( User::isCorrectPassword( $user->password , $request->input_password ) ) {
                $_SESSION['key'] = $user->id;
                return redirect('dashboard');

            }else{ return redirect('login'); }
        }
        return redirect('login');
    }

    public function loginSocial($email)
    {
        session_start();
        $user = User::getUserByEmail($email);
        $_SESSION['key'] = $user->id;
        return redirect('dashboard');
    }

}
