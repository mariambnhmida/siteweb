<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi' OR $message == 'Hi' ) {
                $botman->reply('voici le lien pour créer votre propre compte : <button  class="btn btn-outline-danger btn-fw" style="background-color:hsl(40, 79%, 71%);"><a href="http://127.0.0.1:8000/regiseruser" style="color:black;">Sinscrire</a></button>');

            }
            elseif($message=='bonsoir'OR $message=='Bonsoir'){
            $botman->reply("Bienvenue");
            }
              elseif($message=='hey'){
                $botman->reply("hello");
                }
                elseif($message=='Kifech nechri formation?'){
                    $botman->reply("hey");
                    }

                elseif($message=='aaslema'){
                    $botman->reply("hello");
                    }

            else{
                $botman->reply("How can i help you ?");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Bonjour! Quel est votre nom ?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('bienvenue ' .$name. ', voici le lien pour créer votre propre compte : <a href="http://127.0.0.1:8000/regiseruser">Register</a>');

        });
    }
}
